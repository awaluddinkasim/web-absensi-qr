<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Harian</title>
    <style>
        th, td, h1, h2, h3, h4, h5, h6 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif';
        }

        th {
            padding: 5px 0px;
        }
        td {
            padding: 5px 10px;
        }
    </style>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <h4>Absensi {{ $mapel->mapel }} pertemuan {{ $filterPertemuan }}</h4>
    <table border="1" cellspacing="0" cellpadding="0" style="table-layout: fixed; width: 100%">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nomor Induk Siswa</th>
            <th rowspan="2">Nama Lengkap</th>
            <th rowspan="2">Jenis Kelamin</th>
            <th colspan="2">Keterangan</th>
        </tr>
        <tr>
            <th>Hadir</th>
            <th>Tidak Hadir</th>
        </tr>
        @forelse ($siswa as $item)
        <tr>
            <td style="width: 5%">{{ $loop->iteration }}</td>
            <td style="width: 18%">{{ $item->nis }}</td>
            <td>{{ $item->nama }}</td>
            <td style="width: 12%; text-align: center">{{ $item->jk }}</td>
            <td style="width: 10%">
                @if ($item->absensi($filterPertemuan, $mapel->id)->first())
                <i class="fas fa-check"></i>
                @endif
            </td>
            <td style="width: 10%">
                @if (!$item->absensi($filterPertemuan, $mapel->id)->first())
                    <i class="fas fa-check"></i>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align: center">Tidak ada data</td>
        </tr>
        @endforelse
    </table>
</body>
</html>
