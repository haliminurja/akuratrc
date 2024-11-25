<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use function Ramsey\Uuid\v1;

class LandingController extends Controller
{
    public function index()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('admin.index');
        }
        $header = DB::table('tb_header')->where('status', 'y')->first();
        $jenis_layanan = DB::table('tb_jenis_layanan')->where('status', 'y')->get();
        $berita = DB::table('tb_berita')
            ->select('tb_berita.id_berita', 'tb_berita.judul', 'tb_berita.foto', 'tb_petugas.nama_petugas', 'tb_kategori_berita.nama_kategori')
            ->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_berita.id_petugas')
            ->leftJoin('tb_kategori_berita', 'tb_kategori_berita.id_kategori', '=', 'tb_berita.id_kategori')
            ->orderByDesc('tanggal')->limit(8)->get();
        return view('landing.index', compact('header', 'berita','jenis_layanan'));
    }

    public function file($folder, $data)
    {
        $path = public_path('../berkas/' . $folder . '/') . $data;
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = response()->make($file, 200);
        $response->header('Content-Type', $type);
        return $response;
    }

    public function visiMisi()
    {
        return '';
    }


    public function layanan($layanan)
    {
        $one = DB::table('tb_jenis_layanan')->where('id_jenis_layanan',$layanan)->where('status', 'y')->first();
        $all = DB::table('tb_layanan')->where('id_jenis_layanan',$layanan)->where('status', 'y')->get();
        return view('landing.layanan', compact('one','all'));
    }

    public function berita (Request $request){

        $query = DB::table('tb_berita')
        ->select('tb_berita.id_berita', 'tb_berita.judul', 'tb_berita.foto', 'tb_berita.tanggal', 'tb_petugas.nama_petugas', 'tb_kategori_berita.nama_kategori')
        ->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_berita.id_petugas')
        ->leftJoin('tb_kategori_berita', 'tb_kategori_berita.id_kategori', '=', 'tb_berita.id_kategori')
        ->orderByDesc('tanggal');

        $id_kategori = $request->id_kategori;
        if($id_kategori){
            $query->where('tb_berita.id_kategori',$id_kategori);
        }

        $kategori = DB::table('tb_kategori_berita')->where('status','y')->get();

        $all = $query->paginate(6);
        return view('landing.berita',compact('all','kategori'));
    }
    public function beritaDetail($id)
    {
        $berita = DB::table('tb_berita')->whereNot('id_berita',$id)->limit(4)->orderByDesc('tanggal')->get();
        $one = DB::table('tb_berita')
        ->select('tb_berita.*', 'tb_petugas.nama_petugas', 'tb_kategori_berita.nama_kategori')
        ->leftJoin('tb_petugas', 'tb_petugas.id_petugas', '=', 'tb_berita.id_petugas')
        ->leftJoin('tb_kategori_berita', 'tb_kategori_berita.id_kategori', '=', 'tb_berita.id_kategori')
        ->where('tb_berita.id_berita',$id)->first();
        return view('landing.berita_detail',compact('berita','one'));
    }
}
