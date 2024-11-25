<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{

    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = User::all();
            return Datatables::of($all)
                ->addIndexColumn()
                ->addColumn('cek', function ($model) {
                    return $model->id_petugas;
                })
                ->addColumn('action', function ($model) {
                    return $model->id_petugas;
                })
                ->make(true);
        }
        return view('admin.user.index');
    }

    public function store(Request $request)
    {
        $x = User::where('email', $request->email)->first();
        if ($x != null) {
            return Redirect()->route('admin.user.create')->withInput()->with('error', 'Email ' . $request->email . ' sudah ada');
        }
        $x = User::where('username', $request->username)->first();
        if ($x != null) {
            return Redirect()->route('admin.user.create')->withInput()->with('error', 'Username ' . $request->username . ' sudah ada');
        }

        $save = $request->all();
        $save['password'] = bcrypt($request->password);

        User::create($save);
        return Redirect()->route('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function show($id)
    {
        $one = User::where('id_petugas', $id)->first();

        return view('admin.user.show', compact('one'));
    }

    public function edit($id)
    {
        $one = User::where('id_petugas', $id)->first();

        return view('admin.user.edit', compact('id', 'one'));
    }

    public function update(Request $request, $id)
    {

        $y = User::where('id_petugas', $id)->first();
        $x = User::where('email', $request->email)->first();
        if ($x != null) {
            if ($x->email != $y->email) {
                return Redirect()->route('admin.user.edit', ['user' => $id])->withInput()->with('error', 'Email ' . $request->email . ' sudah ada');
            }
        }
        $x = User::where('username', $request->username)->first();
        if ($x != null) {
            if ($x->username != $y->username) {
                return Redirect()->route('admin.user.edit', ['user' => $id])->withInput()->with('error', 'Username ' . $request->username . ' sudah ada');
            }
        }
        if ($request->password != '') {
            User::find($id)->update([
                'nama_petugas' => $request->nama_petugas,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'username' => $request->username,
                'status' => $request->status,
                'password' => bcrypt($request->password)
            ]);
        } else {
            User::find($id)->update([
                'nama_petugas' => $request->nama_petugas,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'username' => $request->username,
                'status' => $request->status,
            ]);
        }
        return Redirect()->route('admin.user.index');

    }

    public function destroy($id)
    {
        $x = User::where('id_petugas', $id)->first();
        return $x->delete();
    }

    public function edit_multi(Request $request)
    {
        foreach ($request->id_petugas as $row) {
            $save['status'] = $request->status;
            User::updateOrCreate(['id_petugas' => $row], $save);

        }
        return response()->json(['status' => 'success']);
    }
}
