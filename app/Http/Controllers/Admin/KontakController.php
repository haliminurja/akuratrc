<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_kontak')->select('tb_kontak.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_kontak.id_petugas')->orderByDesc('tb_kontak.id_kontak')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_kontak;
                })
                ->make(true);
        }
        return view('admin.kontak.index');
    }
    public function create()
    {
        return view('admin.kontak.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_kontak')->insertGetId($save);
        return redirect()->route('admin.kontak.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_kontak')->where('id_kontak', $id)->first();
        return view('admin.kontak.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_kontak')->where('id_kontak', $id)->first();
        return view('admin.kontak.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_kontak')->where('id_kontak', $id)->update($save);
        return redirect()->route('admin.kontak.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_kontak')->where('id_kontak', $id)->delete();
    }
}
