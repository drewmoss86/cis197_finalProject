<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facade\Auth;
use View;
use Illuminate\Http\Request; //for Request class
use App\User;
use App\Admin;
use App\CimtUser;
use App\ResourceProvider;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your main screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
        //create alias so we don't override AuthenticatesUsers
        // redirectPath as laravelRedirectPath;    
    

    protected function authenticated(Request $request, $user)
    {
        $request->session()->flash('success', 'Login Successful!');
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override login form
     * 
     * @return view
     */
    public function showLoginForm() 
    {
        return view('custom/login');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    public function index() 
    {
        return view('custom/login');
    }

}
