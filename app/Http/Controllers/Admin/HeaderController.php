<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Costum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
    public function index(Request $req)
    {

        if ($req->ajax()) {
            $all = DB::table('tb_header')->select('tb_header.*', 'tb_petugas.nama_petugas')->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_header.id_petugas')->orderByDesc('tb_header.id_header')->get();
            return datatables()::of($all)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return $model->id_header;
                })
                ->make(true);
        }
        return view('admin.header.index');
    }
    public function create()
    {
        return view('admin.header.create');
    }

    public function store(Request $request)
    {

        $save = $request->all();
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
        $request->file('foto')->move('header', $fileName);
        $save['foto'] = $fileName;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_header')->insertGetId($save);
        return redirect()->route('admin.header.index');
    }

    public function show($id)
    {
        $one = DB::table('tb_header')->where('id_header', $id)->first();
        return view('admin.header.show', compact('one'));
    }

    public function edit($id)
    {
        $one = DB::table('tb_header')->where('id_header', $id)->first();
        return view('admin.header.edit', compact('one', 'id'));
    }

    public function update(Request $request, $id)
    {

        $save = $request->all();
        $one = DB::table('tb_header')->where('id_header',$id)->first();
        if ($one != null && $one->foto != null) {
           if ($request->foto != null) {
                $fileName = $one->foto;
                $filePath = 'header/' . $fileName;
                if (file_exists(public_path($filePath))) {
                    unlink(public_path($filePath));
                }
                $extension = $request->file('header')->getClientOriginalExtension();
                $fileName = substr(date('Ymd') . rand(10000, 99999), 0, 20). '.' . $extension;
                $request->file('header')->move('header', $fileName);
                $save['header'] = $fileName;
           }else{
            unset($save['header']);
           }
        }else{
            unset($save['header']);
        }
        $save['id_petugas'] = Auth::user('web')->id_petugas;
        unset($save['_token']);
        unset($save['_method']);
        DB::table('tb_header')->where('id_header', $id)->update($save);
        return redirect()->route('admin.header.index');
    }

    public function destroy($id)
    {
        $one = DB::table('tb_header')->where('id_header',$id)->first();
        if ($one != null && $one->foto != null) {
            $fileName = $one->foto;
            $filePath = 'header/' . $fileName;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        return DB::table('tb_header')->where('id_header',$id)->delete();
    }
}
