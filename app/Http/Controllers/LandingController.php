<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class LandingController extends Controller
{
    public function index(){
        if (Auth::guard('user')->check()) {
            return redirect()->route('admin.index');
        }
    }

    public function file($folder, $data)
    {
        $path = public_path('../berkas/' . $folder . '/') . $data;
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = response()->make($file, 200);
        $response->header('Content-Type', $type);
        return $response;
    }
}
