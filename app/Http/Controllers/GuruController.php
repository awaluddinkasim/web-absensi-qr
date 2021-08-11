<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\QRKode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Str;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:guru');
    }

    public function index()
    {
        return view('pages.guru.index');
    }

    public function profile()
    {
        return view('pages.guru.profile');
    }

    public function profileSimpan(Request $req)
    {
        $me = Guru::find(auth()->user()->username);
        $me->nip = $req->nip;
        $me->nama = $req->nama;
        $me->tempat_lahir = $req->tempat_lahir;
        $me->tgl_lahir = $req->tgl_lahir;
        if ($req->password) {
            $me->password = bcrypt($req->password);
        }
        $me->save();
        return redirect('/guru/profil')->with('success', 'Profil berhasil disimpan');
    }

    public function absensi($id = null)
    {
        if ($id) {
            $data = Mapel::find($id);
            $qr = QRKode::where('id_mapel', $id)->latest()->first();
            return view('pages.guru.absensi-mapel', compact('data', 'qr'));
        }
        return view('pages.guru.absensi');
    }

    public function absensiQR(Request $req, $id)
    {
        $kode = Str::random(9).'.svg';

        $qr = new QRKode;
        $qr->id_mapel = $id;
        $qr->pertemuan = $req->pertemuan;
        $qr->scannable = '1';
        $qr->qrcode = $kode;
        $qr->save();
        QrCode::size(200)->generate("/scan/".md5($id).'/'.$id.'/'.$req->pertemuan, public_path('qr/'.$kode));
        return redirect('/guru/absensi/'.$id);
    }

    public function laporan()
    {
        return view('pages.admin.laporan');
    }
}
