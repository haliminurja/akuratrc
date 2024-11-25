<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_berita')
            ->select('tb_berita.*', 'tb_petugas.nama_petugas','tb_kategori_berita.nama_kategori')
            ->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_berita.id_petugas')
            ->leftJoin('tb_kategori_berita', 'tb_kategori_berita.id_kategori', '=', 'tb_berita.id_kategori')
            ->orderByDesc('tb_berita.id_berita')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_berita;
                })
                ->make(true);
        }
        return view('admin.berita.index');
    }
    public function create()
    {
        $all = DB::table('tb_kategori_berita')->where('status', 'y')->get();

        return view('admin.berita.create',compact('all'));
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
        $request->file('foto')->move('berkas/berita', $fileName);
        $save['foto'] = $fileName;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_berita')->insertGetId($save);
        return redirect()->route('admin.berita.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_berita')->where('id_berita', $id)->first();
        return view('admin.berita.show', compact('one'));
    }

    public function edit($id)
    {
        $all = DB::table('tb_kategori_berita')->where('status', 'y')->get();
        $one = DB::table('tb_berita')->where('id_berita', $id)->first();
        return view('admin.berita.edit', compact('one', 'id','all'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $one = DB::table('tb_berita')->where('id_berita',$id)->first();
        if ($one != null && $one->foto != null) {
           if ($request->foto != null) {
                $fileName = $one->foto;
                $filePath = 'berkas/berita/' . $fileName;
                if (file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
                $extension = $request->file('berita')->getClientOriginalExtension();
                $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
                $request->file('berita')->move('berkas/berita', $fileName);
                $save['berita'] = $fileName;
           }else{
            unset($save['berita']);
           }
        }else{
            unset($save['berita']);
        }
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_berita')->where('id_berita', $id)->update($save);
        return redirect()->route('admin.berita.index');
    }

    public function destroy($id)
    {
        $one = DB::table('tb_berita')->where('id_berita',$id)->first();
        if ($one != null && $one->foto != null) {
            $fileName = $one->foto;
            $filePath = 'berkas/berita/' . $fileName;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        return DB::table('tb_berita')->where('id_berita',$id)->delete();
    }
}
