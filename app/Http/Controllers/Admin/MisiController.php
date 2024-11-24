<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MisiController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_misi')
                ->select('tb_misi.*', 'tb_petugas.nama_petugas', 'tb_visi.deskripsi as visi', 'tb_visi.tahun_awal', 'tb_visi.tahun_akhir')
                ->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_misi.id_petugas')
                ->leftJoin('tb_visi', 'tb_visi.id_visi', '=', 'tb_misi.id_visi')
                ->orderByDesc('tb_misi.id_misi')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_misi;
                })
                ->make(true);
        }
        return view('admin.misi.index');
    }
    public function create()
    {
        $all = DB::table('tb_visi')->where('status', 'y')->get();
        return view('admin.misi.create', compact('all'));
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_misi')->insertGetId($save);
        return redirect()->route('admin.misi.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_misi')->where('id_misi', $id)->first();
        return view('admin.misi.show', compact('one'));
    }

    public function edit($id)
    {
        $all = DB::table('tb_visi')->where('status', 'y')->get();
        $one = DB::table('tb_misi')->where('id_misi', $id)->first();
        return view('admin.misi.edit', compact('one', 'id', 'all'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_misi')->where('id_misi', $id)->update($save);
        return redirect()->route('admin.misi.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_misi')->where('id_misi', $id)->delete();
    }
}
