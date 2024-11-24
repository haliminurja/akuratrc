<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(){
        if (Auth::guard('user')->check()) {
            return redirect()->route('admin.index');
        }
    }
}
