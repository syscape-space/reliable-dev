<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidationsApi\V1\Auth\ChangePasswordRequest;
use App\Http\Controllers\ValidationsApi\V1\Auth\LoginRequest;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    private function auth() {
		return auth()->guard('api');
	}
	/**
	 * Get the token array structure.
	 *
	 * @param  string $token
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function respondWithToken($token) {
		return [
			'access_token' => $token,
			'token_type'   => 'Bearer',
			'expires_in'   => $this->auth()->factory()->getTTL()*60,
			'user'         => $this->auth()->user(),
		];
	}

	/**
	 * Get the authenticated User.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function me() {
		return successResponseJson(['data' => $this->auth()->user()]);
	}

	/**
	 * Log the user out (Invalidate the token).
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function logout() {
		$this->auth()->logout();
		return successResponseJson(['message' => 'Successfully logged out']);
	}

	/**
	 * Refresh a token.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function refresh() {
		return successResponseJson(['data' => $this->respondWithToken($this->auth()->refresh())]);
	}

	public function account() {
        $this->validate(\request(), [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate(\request()->token);

        return successResponseJson(['user' => $user]);
	}

	/**
	 * Get a JWT via given credentials.
	 * Login Auth
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function login(Request $login) {
	    $val = Validator::make(request()->all(),[
            'email' => 'required|email',
			'password' => [
				'required',
				'string', Password::min(6)->mixedCase()->numbers()->symbols()->uncompromised(),
			],
	        ]);
        if($val->fails())
            return errorResponseJson(["errors"=>$val->errors()->all(),'message'=>'البيانات غير كاملة']);
            
		$credentials = request(['email', 'password']);

		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return errorResponseJson(['error' => 'Unauthorized', 'message' => trans('auth.failed')]);
			}
		} catch (JWTException $e) {
			return errorResponseJson(['error' => 'Unauthorized', 'message' => 'Could not create token']);
		}

		return successResponseJson(['data' => $this->respondWithToken($token)]);
	}
	public function register(Request $register) {
	    $val = Validator::make(request()->all(),[
	        'name' => 'required|alpha',
			'email' => 'required|email|unique:users,email',
			'password' => [
				'required',
				'string', Password::min(6)->mixedCase()->numbers()->symbols()->uncompromised(),
			],
	        ]);
        if($val->fails())
            return errorResponseJson(["errors"=>$val->errors()->all(),'message'=>'البيانات غير كاملة']);
            
		$register = $register->except('lang');
		$register['password'] = bcrypt(request('password'));
		//$register['email_verified_at'] =null;

		$user = User::create($register);

		$credentials = request(['email', 'password']);
		$token = JWTAuth::fromUser($user);

		return successResponseJson(['data' => $this->respondWithToken($token)]);
	}

	/**
	 * change Password Method
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function change_password(ChangePasswordRequest $changepassword) {
		User::where('id', $this->auth()->user()->id)->update([
				'password' => bcrypt(request('new_password')),
			]);
		return successResponseJson([
				'message' => trans('main.password_changed'),
			]);
	}
	
}
