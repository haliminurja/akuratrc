<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SejarahController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_sejarah')->select('tb_sejarah.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_sejarah.id_petugas')->orderByDesc('tb_sejarah.id_sejarah')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_sejarah;
                })
                ->make(true);
        }
        return view('admin.sejarah.index');
    }
    public function create()
    {
        return view('admin.sejarah.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_sejarah')->insertGetId($save);
        return redirect()->route('admin.sejarah.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_sejarah')->where('id_sejarah', $id)->first();
        return view('admin.sejarah.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_sejarah')->where('id_sejarah', $id)->first();
        return view('admin.sejarah.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_sejarah')->where('id_sejarah', $id)->update($save);
        return redirect()->route('admin.sejarah.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_sejarah')->where('id_sejarah', $id)->delete();
    }
}
