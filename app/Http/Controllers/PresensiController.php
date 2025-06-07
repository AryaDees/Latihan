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
        try {
            $npm = auth()->user()->npm;
            $tgl_presensi = date("Y-m-d");
            $jam = date("H:i:s");
            $lokasi = $request->lokasi;
            $image = $request->image;

            // Ensure storage directory exists
            $folderPath = "public/uploads/absensi/";
            Storage::makeDirectory($folderPath);

            // Process image
            $formatName = $npm . "-" . $tgl_presensi . "-" . str_replace(":", "", $jam);
            $image_parts = explode(";base64,", $image);
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $formatName . ".png";
            $file = $folderPath . $fileName;

            // Save image first
            if (!Storage::put($file, $image_base64)) {
                throw new \Exception('Failed to save image');
            }

            // Save to database
            $data = [
                'npm' => $npm,
                'tgl_presensi' => $tgl_presensi,
                'jam_in' => $jam,
                'foto_in' => $fileName,
                'lokasi' => $lokasi
            ];

            if (!DB::table('presensi')->insert($data)) {
                // If database insert fails, delete the saved image
                Storage::delete($file);
                throw new \Exception('Failed to save attendance data');
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Presensi berhasil ditambahkan'
            ], 200);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
