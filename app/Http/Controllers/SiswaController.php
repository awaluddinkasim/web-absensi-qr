<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mapel;
use App\Models\QRKode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        DB::table('qrcode')->where('created_at', '<=', Carbon::now()->subMinutes(5)->toDateTimeString())->update([
            'scannable' => '0'
        ]);
        return view('pages.user.index');
    }

    public function jadwal($id = null)
    {
        if ($id) {
            $data = Mapel::find($id);
            $qr = QRKode::where('id_mapel', $id)->latest()->first();
            $kehadiran = Absensi::where('id_mapel', $id)->where('nis', auth()->user()->nis)->orderBy('pertemuan')->get();
            return view('pages.user.jadwal-mapel', ['data' => $data, 'qr' => $qr, 'kehadiran' => $kehadiran]);
        }
        return view('pages.user.jadwal');
    }

    public function scan()
    {
        return view('pages.user.scanner');
    }

    public function scanning($hash, $id_mapel, $pertemuan)
    {
        if ($hash != md5($id_mapel)) {
            return redirect('/');
        }
        if (Absensi::where('id_mapel', $id_mapel)->where('pertemuan', $pertemuan)->where('nis', auth()->user()->nis)->first()) {
            return redirect('/scan')->with('failed', 'Absen hanya bisa dilakukan sekali dalam satu pertemuan');
        }

        $a = new Absensi;
        $a->nis = auth()->user()->nis;
        $a->id_mapel = $id_mapel;
        $a->pertemuan = $pertemuan;
        $a->status = 'Hadir';
        $a->tanggal = Carbon::now();
        $a->save();

        return redirect('/scan')->with('success', 'Scan berhasil');
    }
}
