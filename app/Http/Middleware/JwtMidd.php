<?php

namespace App\Http\Middleware;
use JWTAuth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JwtMidd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // try {
        //     $user = JWTAuth::parseToken()->authenticate();
        // } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        //     return response()->json(['status' => 'Token is Invalid']);
        // }catch(\Tymon\JWTAuth\Exceptions\TokenExpiredException $e){
        //     return response()->json(['status' => 'Token is Expired']);
        
        // }finally{
        //     return response()->json(['status' => 'Authorization Token not found']);
        // }
        $val = Validator::make(\request()->all(), [
            'token' => 'required'
        ]);
        if($val->fails())
            return errorResponseJson(["errors"=>$val->errors()->all(),'message'=>'البيانات غير كاملة']);
        try{
            JWTAuth::setToken(\request('token'));
            $user = JWTAuth::authenticate(\request('token'));
            if(!$user){
                return errorResponseJson(["message"=>$e->getMessage(),'message'=>'invalid token']);
            }
        }catch(\Exeption $e){
            return errorResponseJson(["message"=>$e->getMessage(),'message'=>'البيانات غير كاملة']);
        }
        return $next($request);
    }
}
