<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JenisLayananController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_jenis_layanan')->select('tb_jenis_layanan.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_jenis_layanan.id_petugas')->orderByDesc('tb_jenis_layanan.id_jenis_layanan')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_jenis_layanan;
                })
                ->make(true);
        }
        return view('admin.jenis_layanan.index');
    }
    public function create()
    {
        return view('admin.jenis_layanan.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_jenis_layanan')->insertGetId($save);
        return redirect()->route('admin.jenis_layanan.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_jenis_layanan')->where('id_jenis_layanan', $id)->first();
        return view('admin.jenis_layanan.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_jenis_layanan')->where('id_jenis_layanan', $id)->first();
        return view('admin.jenis_layanan.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_jenis_layanan')->where('id_jenis_layanan', $id)->update($save);
        return redirect()->route('admin.jenis_layanan.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_jenis_layanan')->where('id_jenis_layanan', $id)->delete();
    }
}
