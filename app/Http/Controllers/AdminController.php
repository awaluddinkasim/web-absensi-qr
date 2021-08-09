<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $tot_siswa = Siswa::get()->count();
        $tot_guru = Guru::get()->count();
        $tot_mapel = Mapel::distinct()->get(['mapel'])->count();
        return view('pages.admin.index', compact('tot_siswa', 'tot_guru', 'tot_mapel'));
    }

    public function master($jenis)
    {
        switch ($jenis) {
            case 'guru':
                $data = Guru::all();
                return view('pages.admin.master-guru', ['data' => $data]);
                break;

            case 'siswa':
                return view('pages.admin.master-siswa');
                break;

            case 'mapel':
                return view('pages.admin.master-mapel');
                break;

            default:
                return redirect('/admin');
                break;
        }
    }

    public function masterInput(Request $req, $jenis)
    {
        switch ($jenis) {
            case 'guru':
                $g = new Guru;
                $g->username = $req->username;
                $g->nip = $req->nip;
                $g->nama = $req->nama;
                $g->jk = $req->jk;
                $g->tempat_lahir = $req->tempat_lahir;
                $g->tgl_lahir = $req->tgl_lahir;
                $g->jabatan = $req->jabatan;
                $g->password = bcrypt('rahasia');
                $g->save();

                return redirect('/admin/master/'.$jenis);
                break;

            default:
                return redirect('/admin');
                break;
        }
    }

    public function masterPerJurusan($jenis, $jurusan, $kelas)
    {
        switch ($jenis) {
            case 'siswa':
                $data = Siswa::where('jurusan', $jurusan)->where('kelas', $kelas)->orderBy('nis')->orderBy('nama')->get();
                return view('pages.admin.master-siswa-jurusan', ['data' => $data], compact('jurusan', 'kelas'));
                break;

            case 'mapel':
                $data = Mapel::where('jurusan', $jurusan)->where('kelas', $kelas)->orderBy('hari', 'DESC')->orderBy('jam')->get();
                $guru = Guru::all();
                return view('pages.admin.master-mapel-jurusan', ['daftarGuru' => $guru, 'data' => $data], compact('jurusan', 'kelas'));
                break;

            default:
                return redirect('/admin');
                break;
        }
    }

    public function masterPerJurusanInput(Request $req, $jenis, $jurusan, $kelas)
    {
        switch ($jenis) {
            case 'siswa':
                $siswa = new Siswa;
                $siswa->nis = $req->nis;
                $siswa->password = bcrypt('rahasia');
                $siswa->nama = $req->nama;
                $siswa->jk = $req->jk;
                $siswa->tempat_lahir = $req->tempat_lahir;
                $siswa->tgl_lahir = $req->tgl_lahir;
                $siswa->kelas = $kelas;
                $siswa->jurusan = $jurusan;
                $siswa->save();
                return redirect('/admin/master/siswa/'.$jurusan.'/'.$kelas);
                break;

            case 'mapel':
                $pel = new Mapel;
                $pel->mapel = $req->nama;
                $pel->hari = $req->hari;
                $pel->jam = $req->jam;
                $pel->kelas = $kelas;
                $pel->jurusan = $jurusan;
                $pel->pengajar = $req->guru;
                $pel->save();

                return redirect('/admin/master/mapel/'.$jurusan.'/'.$kelas);
                break;

            default:
                return redirect('/admin');
                break;
        }
    }
}
