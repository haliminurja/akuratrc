<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_kategori_berita')->select('tb_kategori_berita.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_kategori_berita.id_petugas')->orderByDesc('tb_kategori_berita.id_kategori')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_kategori;
                })
                ->make(true);
        }
        return view('admin.kategori.index');
    }
    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_kategori_berita')->insertGetId($save);
        return redirect()->route('admin.kategori.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_kategori_berita')->where('id_kategori', $id)->first();
        return view('admin.kategori.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_kategori_berita')->where('id_kategori', $id)->first();
        return view('admin.kategori.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_kategori_berita')->where('id_kategori', $id)->update($save);
        return redirect()->route('admin.kategori.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_kategori_berita')->where('id_kategori', $id)->delete();
    }
}
