<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JenisJabatanController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_jenis_jabatan')->select('tb_jenis_jabatan.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_jenis_jabatan.id_petugas')->orderByDesc('tb_jenis_jabatan.id_jenis_jabatan')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_jenis_jabatan;
                })
                ->make(true);
        }
        return view('admin.jenis_jabatan.index');
    }
    public function create()
    {
        return view('admin.jenis_jabatan.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_jenis_jabatan')->insertGetId($save);
        return redirect()->route('admin.jenis_jabatan.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_jenis_jabatan')->where('id_jenis_jabatan', $id)->first();
        return view('admin.jenis_jabatan.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_jenis_jabatan')->where('id_jenis_jabatan', $id)->first();
        return view('admin.jenis_jabatan.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_jenis_jabatan')->where('id_jenis_jabatan', $id)->update($save);
        return redirect()->route('admin.jenis_jabatan.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_jenis_jabatan')->where('id_jenis_jabatan', $id)->delete();
    }
}
