<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * ログイン後の処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @override \Illuminate\Http\Foundation\Auth\AuthenticatesUsers
     */
    protected function authenticated(Request $request)
    {
        // // フラッシュメッセージを表示
        // toastr()->success('ログインしました');
        return redirect($this->redirectTo);
    }
    

        /**
     * Overrides default logout: logs out user from system
     *
     * @return void
     */
    public function logout(Request $request) {
        // Use specific guard to log out
        Auth::guard('user')->logout();

        // Invalidates the current session.
        // Clears all session attributes and flashes and regenerates the session and deletes the old session from persistence.
        $request->session()->invalidate();

        // Redirect back to login
        return redirect('/admin/login');
    }

    
}
