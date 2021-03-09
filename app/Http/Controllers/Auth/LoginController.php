<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Symfony\Component\CssSelector\XPath\Extension\AttributeMatchingExtension;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // protected function redirectTo()
    // {
    //     return '/users';
    // }
    public function username()
    {
        return 'username';
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], true)) {
            return redirect('/users');
        }
        return redirect('/login')->with('wrongPassword','Username or Password is wrong!!!');
    }

    protected function guard()
    {
        return Auth::guard('admins');
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('status','User has been logged out!');
    }
}



