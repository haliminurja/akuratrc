<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function login (){
        return view('admin.portal');
    }

    public function auth_login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $login = DB::table('tb_petugas')->where('username', '=', $username)->where('status', 'y')->first();
        if ($login != null) {
            if (Hash::check($password, $login->password)) {
                if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
                    return redirect()->intended(url('/'));
                } else {
                    return Redirect()->route('admin.login')->withInput()->with('error', 'Username dan Password salah1');
                }
            } else {
                return Redirect()->route('admin.login')->withInput()->with('error', 'Username dan Password salah2');
            }
        } else {
            return Redirect()->route('admin.login')->withInput()->with('error', 'Username dan Password salah3');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        session()->flush();
        return redirect()->route('index');
    }
    public function index(){
        return view('admin.index');
    }
}
