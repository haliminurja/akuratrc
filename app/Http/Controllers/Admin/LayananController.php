<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LayananController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_layanan')
                ->select('tb_layanan.*', 'tb_petugas.nama_petugas', 'tb_jenis_layanan.nama_layanan as jenis_layanan')
                ->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_layanan.id_petugas')
                ->leftJoin('tb_jenis_layanan', 'tb_jenis_layanan.id_jenis_layanan', '=', 'tb_layanan.id_jenis_layanan')
                ->orderByDesc('tb_layanan.id_layanan')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_layanan;
                })
                ->make(true);
        }
        return view('admin.layanan.index');
    }
    public function create()
    {
        $all = DB::table('tb_jenis_layanan')->where('status', 'y')->get();
        return view('admin.layanan.create', compact('all'));
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_layanan')->insertGetId($save);
        return redirect()->route('admin.layanan.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_layanan')->where('id_layanan', $id)->first();
        return view('admin.layanan.show', compact('one'));
    }

    public function edit($id)
    {
        $all = DB::table('tb_jenis_layanan')->where('status', 'y')->get();
        $one = DB::table('tb_layanan')->where('id_layanan', $id)->first();
        return view('admin.layanan.edit', compact('one', 'id', 'all'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_layanan')->where('id_layanan', $id)->update($save);
        return redirect()->route('admin.layanan.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_layanan')->where('id_layanan', $id)->delete();
    }
}
