<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisiController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_visi')->select('tb_visi.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_visi.id_petugas')->orderByDesc('tb_visi.id_visi')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_visi;
                })
                ->make(true);
        }
        return view('admin.visi.index');
    }
    public function create()
    {
        return view('admin.visi.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_visi')->insertGetId($save);
        return redirect()->route('admin.visi.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_visi')->where('id_visi', $id)->first();
        return view('admin.visi.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_visi')->where('id_visi', $id)->first();
        return view('admin.visi.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_visi')->where('id_visi', $id)->update($save);
        return redirect()->route('admin.visi.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_visi')->where('id_visi', $id)->delete();
    }
}
