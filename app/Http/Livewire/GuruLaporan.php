<?php

namespace App\Http\Livewire;

use App\Models\Absensi;
use App\Models\Mapel;
use App\Models\QRKode;
use App\Models\Siswa;
use Livewire\Component;

use PDF;

class GuruLaporan extends Component
{
    public $id_mapel;
    public $mapel;
    public $filterPertemuan;

    public function mount()
    {
        $this->filterPertemuan = '';
        $this->mapel = Mapel::find($this->id_mapel);
    }

    public function render()
    {
        $pertemuan = QRKode::where('id_mapel', $this->id_mapel)->distinct()->get(['pertemuan']);
        $siswa = Siswa::where('kelas', $this->mapel->kelas)->where('jurusan', $this->mapel->jurusan)->get();
        return view('livewire.guru-laporan', compact('pertemuan', 'siswa'));
    }
}
