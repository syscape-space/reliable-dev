<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdentityRequest;
use App\Models\Identity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return successResponseJson(['status' => 'unset']);
        }
        return successResponseJson(['status' => $identity->verified]);
    }

    public function uploadIdentity(IdentityRequest $request)
    {
        $user_id = Auth()->user()->id;
        $front_side_url = null;
        $back_side_url = null;
        $selfie_url = null;
        if (request()->hasFile('front_side')) {
            $front_side_url = it()->upload('front_side', 'useridentities/' . $user_id);
        }
        if (request()->hasFile('back_side')) {
            $back_side_url = it()->upload('back_side', 'useridentities/' . $user_id);
        }
        if (request()->hasFile('selfie')) {
            $selfi_url = it()->upload('selfie', 'useridentities/' . $user_id);
        }

        if ($front_side_url && $back_side_url && $selfi_url) {
            try {
                Identity::create([
                    'front_side' => $front_side_url,
                    'back_side' => $back_side_url,
                    'selfie' => $selfie_url,
                    'user_id' => $user_id,
                    'comment' => $request->comment,
                ]);
                return successResponseJson(['message' => 'تم رفع الهوية بنجاح سيتم التحقق منها في اقرب منها']);
            } catch (Exception $e) {
                return errorResponseJson(['message' => $e->getMessage()]);
            }
        } else {
            return errorResponseJson(['message' => 'هناك خطأ من فضلك حاول مرة اخري لاحقا']);
        }
    }
}
