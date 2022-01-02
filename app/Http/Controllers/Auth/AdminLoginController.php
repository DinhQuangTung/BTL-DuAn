<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect()->route('management.index');
        } else {
            return redirect()->back()
                ->with('error', 'Username or Password are wrong.');
        }
    }

    public function logout()
    {
        auth()->logout();
        
        return redirect()->route('admin.show_login')->with('success', "Logout successfully!");
    }
}
