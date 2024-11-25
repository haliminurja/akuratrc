<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GaleriFotoController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_galeri_foto')->select('tb_galeri_foto.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_galeri_foto.id_petugas')->orderByDesc('tb_galeri_foto.id_foto')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_foto;
                })
                ->make(true);
        }
        return view('admin.galeri_foto.index');
    }
    public function create()
    {
        return view('admin.galeri_foto.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
        $request->file('foto')->move('foto', $fileName);
        $save['foto'] = $fileName;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_galeri_foto')->insertGetId($save);
        return redirect()->route('admin.galeri_foto.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_galeri_foto')->where('id_foto', $id)->first();
        return view('admin.galeri_foto.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_galeri_foto')->where('id_foto', $id)->first();
        return view('admin.galeri_foto.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $one = DB::table('tb_galeri_foto')->where('id_foto',$id)->first();
        if ($one != null && $one->foto != null) {
           if ($request->foto != null) {
                $fileName = $one->foto;
                $filePath = 'foto/' . $fileName;
                if (file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
                $extension = $request->file('foto')->getClientOriginalExtension();
                $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
                $request->file('foto')->move('foto', $fileName);
                $save['foto'] = $fileName;
           }else{
            unset($save['foto']);
           }
        }else{
            unset($save['foto']);
        }
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_galeri_foto')->where('id_foto', $id)->update($save);
        return redirect()->route('admin.galeri_foto.index');
    }

    public function destroy($id)
    {
        $one = DB::table('tb_galeri_foto')->where('id_foto',$id)->first();
        if ($one != null && $one->foto != null) {
            $fileName = $one->foto;
            $filePath = 'foto/' . $fileName;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        return DB::table('tb_galeri_foto')->where('id_foto',$id)->delete();
    }
}
