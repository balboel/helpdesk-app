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
    protected $redirectTo = '/home';

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
            'nipp' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt(['nipp' => $input['nipp'], 'password' => $input['password']])) {
            if (auth()->user()->roles->contains('id', 1)) {
                return redirect()->route('tiket.daftar');
            } else {
                return redirect()->route('user.tiketsaya');
            }
        } else {
            return redirect()->route('login')->with('error', 'NIPP atau password salah');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
