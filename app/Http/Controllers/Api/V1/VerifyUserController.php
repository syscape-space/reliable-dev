<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdentityRequest;
use App\Models\Identity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VerifyUserController extends Controller
{

    public function checkIdentityStatus()
    {
        $user = Auth::user();
        if (is_null($user) || empty($user)) {
            redirect('/');
        }
        $user_id = $user->id;
        $identity = Identity::where('user_id', $user_id)->first();
        if (is_null($identity) || empty($identity)) {
            return successResponseJson(['identity_status' => 'unset']);
        }
        return successResponseJson(['identity_status' => $identity->verified, 'identity' => $identity]);
    }

    public function uploadIdentity(Request $request)
    {
        $user_id = Auth()->user()->id;
        $identity = Identity::where('user_id', $user_id)->first();
        $create = is_null($identity) || empty($identity);
        $front_side_url = null;
        $back_side_url = null;
        $selfie_url = null;

        if (request()->hasFile('front_side')) {
            if (!$create) {
                it()->delete($identity->front_side);
            }
            $front_side_url = it()->upload('front_side', 'useridentities/' . $user_id);
        }
        if (request()->hasFile('back_side')) {
            if (!$create) {
                it()->delete($identity->back_side);
            }
            $back_side_url = it()->upload('back_side', 'useridentities/' . $user_id);
        }
        if (request()->hasFile('selfie')) {
            if (!$create) {
                it()->delete($identity->selfie);
            }
            $selfie_url = it()->upload('selfie', 'useridentities/' . $user_id);
        }

        if ($front_side_url && $back_side_url && $selfie_url) {
            try {
                if ($create) {
                    Identity::create([
                        'front_side' => $front_side_url,
                        'back_side' => $back_side_url,
                        'selfie' => $selfie_url,
                        'user_id' => $user_id,
                        'comment' => $request->comment,
                    ]);
                } else {
                    Identity::where('user_id', $user_id)->update([
                        'front_side' => $front_side_url,
                        'back_side' => $back_side_url,
                        'selfie' => $selfie_url,
                        'verified' => 'pending',
                        'reject_reason' => null,
                    ]);
                }
                return successResponseJson(['message' => 'تم رفع الهوية بنجاح سيتم التحقق منها في اقرب منها']);
            } catch (Exception $e) {
                return errorResponseJson(['message' => $e->getMessage()]);
            }
        } else {
            return errorResponseJson(['message' => 'هناك خطأ من فضلك حاول مرة اخري لاحقا']);
        }
    }

    public function takeAction(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'verified'       => 'required|in:verified,rejected,pending',
            'reject_reason'  => 'nullable|string',
            'id' => 'required|numeric|exists:identities'
        ]);

        // process the login
        if ($validator->fails()) {
            return errorResponseJson(['message' => join(', ', $validator->errors()->all())]);
        }


        Identity::where('id', $data['id'])->update([
            'verified' => $data['verified'],
            'reject_reason' => isset($data['reject_reason']) ? $data['reject_reason'] : null,
        ]);

        return successResponseJson(['message' => 'تم التعديل بنجاج']);
    }
}
