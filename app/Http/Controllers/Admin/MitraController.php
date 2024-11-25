<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_mitra')->select('tb_mitra.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_mitra.id_petugas')->orderByDesc('tb_mitra.id_mitra')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_mitra;
                })
                ->make(true);
        }
        return view('admin.mitra.index');
    }
    public function create()
    {
        return view('admin.mitra.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        $extension = $request->file('foto_mitra')->getClientOriginalExtension();
        $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
        $request->file('foto_mitra')->move('berkas/mitra', $fileName);
        $save['foto_mitra'] = $fileName;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_mitra')->insertGetId($save);
        return redirect()->route('admin.mitra.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_mitra')->where('id_mitra', $id)->first();
        return view('admin.mitra.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_mitra')->where('id_mitra', $id)->first();
        return view('admin.mitra.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $one = DB::table('tb_mitra')->where('id_mitra',$id)->first();
        if ($one != null && $one->foto_mitra != null) {
           if ($request->foto_mitra != null) {
                $fileName = $one->foto_mitra;
                $filePath = 'berkas/mitra/' . $fileName;
                if (file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
                $extension = $request->file('foto_mitra')->getClientOriginalExtension();
                $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
                $request->file('foto_mitra')->move('berkas/mitra', $fileName);
                $save['foto_mitra'] = $fileName;
           }else{
            unset($save['foto_mitra']);
           }
        }else{
            unset($save['foto_mitra']);
        }
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_mitra')->where('id_mitra', $id)->update($save);
        return redirect()->route('admin.mitra.index');
    }

    public function destroy($id)
    {
        $one = DB::table('tb_mitra')->where('id_mitra',$id)->first();
        if ($one != null && $one->foto_mitra != null) {
            $fileName = $one->foto_mitra;
            $filePath = 'berkas/mitra/' . $fileName;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        return DB::table('tb_mitra')->where('id_mitra',$id)->delete();
    }
}
