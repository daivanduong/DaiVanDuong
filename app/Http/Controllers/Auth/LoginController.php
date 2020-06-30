<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Session;

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
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'deleted' => false,'block' =>false])) {
            $user = Auth::user();

            if($user->level==0)
                return redirect()->route('homepage');
            else if($user->level==1||$user->level==2)
                return redirect()->route('dashboard');
            
        }else
            Session::flash('error', 'Email hoặc mật khẩu không đúng!');
        return redirect('login');
        
    }
}
