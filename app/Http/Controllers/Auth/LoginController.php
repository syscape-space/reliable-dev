<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/orders';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'id_number' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->id_number, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array('id_number' => $input['id_number'], 'password' => $input['password'])))
        {
            return redirect()->intended('/');
        }else{
            return redirect()->route('login');
        }
          
    }
}
