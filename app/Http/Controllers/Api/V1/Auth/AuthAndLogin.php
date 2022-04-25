<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidationsApi\V1\Auth\ChangePasswordRequest;
use App\Http\Controllers\ValidationsApi\V1\Auth\LoginRequest;
use App\Models\Judger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;

// Auto Configured by (IT) Baboon maker (phpanonymous/it package)

class AuthAndLogin extends Controller
{

	/**
	 * Create a new AuthController instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//		$this->middleware('auth:api', ['except' => ['login']]);
	}

	private function auth()
	{
		return auth()->guard('api');
	}
	/**
	 * Get the token array structure.
	 *
	 * @param  string $token
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function respondWithToken($token)
	{
		return [
			'access_token' => $token,
			'token_type'   => 'Bearer',
			'expires_in'   => $this->auth()->factory()->getTTL() * 60,
			'user'         => $this->auth()->user(),
		];
	}

	/**
	 * Get the authenticated User.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function me()
	{
		return successResponseJson(['data' => $this->auth()->user()]);
	}

	/**
	 * Log the user out (Invalidate the token).
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */

	public function logout()
	{

		$this->auth()->logout();

		// delete all sessions in application for logout based on senario af app
		return successResponseJson(['message' => 'Successfully logged out']);

	}

	/**
	 * Refresh a token.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function refresh()
	{
		return successResponseJson(['data' => $this->respondWithToken($this->auth()->refresh())]);
	}

	public function account()
	{
        $user_id =  $this->auth()->id();

        $user = User::query()->select('*')
            ->selectSub(function ($query) use ($user_id) {
            $query->from('orders')
                ->selectRaw('COUNT(*)');
        },'orders_count')
            ->with(['occupations','specialties','mainDepartment','subDepartment'])
            ->find($user_id)
            ->append(
                'license_submitted',
                'commercial_submitted',
                'current_subscription',
                'my_all_orders',
            );
		return successResponseJson(['data' => $user]);
	}

	/**
	 * Get a JWT via given credentials.
	 * Login Auth
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function login(LoginRequest $login)
	{
		$credentials = request(['email', 'password']);

		try {
			if (!$token = $this->auth()->attempt($credentials)) {
				return errorResponseJson(['error' => 'Unauthorized', 'message' => trans('auth.failed')]);
			}
		} catch (JWTException $e) {
			return errorResponseJson(['error' => 'Unauthorized', 'message' => 'Could not create token']);
		}

		return successResponseJson(['data' => $this->respondWithToken($token)]);
	}

	/**
	 * change Password Method
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function change_password(ChangePasswordRequest $changepassword)
	{
		User::where('id', $this->auth()->user()->id)->update([
			'password' => bcrypt(request('new_password')),
		]);
		return successResponseJson([
			'message' => trans('passwords.reset'),
		]);
	}

	/**
	 * verify password
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function verify_password(Request $request)
	{
		$data = $request->only('current_password');
		if (!$data['current_password'] || !Hash::check($data['current_password'], $this->auth()->user()->password)) {
			return errorResponseJson(['message' => 'كلمة مرور غير صحيحة',]);
		}
		return successResponseJson([
			'message' => 'تم التحقق بنجاج',
		]);
	}
}
