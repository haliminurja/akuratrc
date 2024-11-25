<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GaleriVideoController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_galeri_video')->select('tb_galeri_video.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_galeri_video.id_petugas')->orderByDesc('tb_galeri_video.id_video')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_video;
                })
                ->make(true);
        }
        return view('admin.galeri_video.index');
    }
    public function create()
    {
        return view('admin.galeri_video.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_galeri_video')->insertGetId($save);
        return redirect()->route('admin.galeri_video.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_galeri_video')->where('id_video', $id)->first();
        return view('admin.galeri_video.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_galeri_video')->where('id_video', $id)->first();
        return view('admin.galeri_video.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_galeri_video')->where('id_video', $id)->update($save);
        return redirect()->route('admin.galeri_video.index');
    }

    public function destroy($id)
    {
        return DB::table('tb_galeri_video')->where('id_video', $id)->delete();
    }
}
