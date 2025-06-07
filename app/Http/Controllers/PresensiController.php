<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function create()
    {
        return view('presensi.create');
    }
    public function store(Request $request)
    {
        $npm = auth()->user()->npm;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");
        $lokasi = $request->lokasi;
        $image = $request->image;
        $folderPath = "public/uploads/absensi/";
        $formatName = $npm . "-" . $tgl_presensi . $jam;
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;
        $data = [
            'npm' => $npm,
            'tgl_presensi' => $tgl_presensi,
            'jam_in' => $jam,
            'foto_in' => $fileName,
            'lokasi' => $lokasi
        ];
        $simpan = DB::table('presensi')->insert($data);
        if ($simpan) {


             Storage::put($file, $image_base64);
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data presensi');
        }
    }
}
