<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StrukturController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_struktur')
            ->select('tb_struktur.*', 'tb_petugas.nama_petugas','tb_jenis_jabatan.nama_jabatan')
            ->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_struktur.id_petugas')
            ->leftJoin('tb_jenis_jabatan', 'tb_jenis_jabatan.id_jenis_jabatan', '=', 'tb_struktur.id_jenis_jabatan')
            ->orderByDesc('tb_struktur.id_struktur')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_struktur;
                })
                ->make(true);
        }
        return view('admin.struktur.index');
    }
    public function create()
    {
        $all = DB::table('tb_jenis_jabatan')->where('status','y')->get();
        return view('admin.struktur.create', compact('all'));
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
        $request->file('foto')->move('struktur', $fileName);
        $save['foto'] = $fileName;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_struktur')->insertGetId($save);
        return redirect()->route('admin.struktur.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_struktur')->where('id_struktur', $id)->first();
        return view('admin.struktur.show', compact('one'));
    }

    public function edit($id)
    {
        $all = DB::table('tb_jenis_jabatan')->where('status','y')->get();
        $one = DB::table('tb_struktur')->where('id_struktur', $id)->first();
        return view('admin.struktur.edit', compact('one', 'id','all'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $one = DB::table('tb_struktur')->where('id_struktur',$id)->first();
        if ($one != null && $one->foto != null) {
           if ($request->foto != null) {
                $fileName = $one->foto;
                $filePath = 'struktur/' . $fileName;
                if (file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
                $extension = $request->file('foto')->getClientOriginalExtension();
                $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
                $request->file('foto')->move('struktur', $fileName);
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
        DB::table('tb_struktur')->where('id_struktur', $id)->update($save);
        return redirect()->route('admin.struktur.index');
    }

    public function destroy($id)
    {
        $one = DB::table('tb_struktur')->where('id_struktur',$id)->first();
        if ($one != null && $one->foto != null) {
            $fileName = $one->foto;
            $filePath = 'struktur/' . $fileName;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        return DB::table('tb_struktur')->where('id_struktur',$id)->delete();
    }
}
