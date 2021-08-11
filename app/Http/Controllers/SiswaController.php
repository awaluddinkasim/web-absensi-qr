<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mapel;
use App\Models\QRKode;
use App\Models\Siswa;
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
        return view('pages.user.index');
    }

    public function profile()
    {
        return view('pages.user.profile');
    }

    public function profileSimpan(Request $req)
    {
        $me = Siswa::find(auth()->user()->nis);
        $me->nama = $req->nama;
        $me->tempat_lahir = $req->tempat_lahir;
        $me->tgl_lahir = $req->tgl_lahir;
        if ($req->password) {
            $me->password = bcrypt($req->password);
        }
        $me->save();
        return redirect('/profil')->with('success', 'Profil berhasil diperbaharui');
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
        if (QRKode::where('id_mapel', $id_mapel)->where('pertemuan', $pertemuan)->latest()->first()->scannable == '0') {
            return redirect('/scan')->with('failed', 'QR Code tersebut sudah expired');
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
