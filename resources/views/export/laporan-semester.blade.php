<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Semester</title>
    <style>
        * {
            font-size: 9pt;
        }

        html, body {
            margin: 5pt;
        }

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
    <h4>Absensi {{ $mapel->mapel }} Kelas {{ $mapel->kelas }} Jurusan {{ $mapel->jurusan == "TKJ" ? strtoupper($mapel->jurusan) : ucwords($mapel->jurusan) }}</h4>
    <table border="1" cellspacing="0" cellpadding="0" style="table-layout: fixed; width: 100%">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">NIS</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">L/P</th>
            <th colspan="24">Pertemuan</th>
        </tr>
        <tr>
            @for ($i = 1; $i <= 24; $i++)
            <td style="width: 2%; padding: 0px; text-align: center">{{ $i }}</td>
            @endfor
        </tr>
        @foreach ($siswa as $item)
        <tr>
            <td style="width: 4%">{{ $loop->iteration }}</td>
            <td style="width: 12%">{{ $item->nis }}</td>
            <td>{{ $item->nama }}</td>
            <td style="width: 4%">{{ $item->jk }}</td>
            {{-- absen --}}
            @for ($pertemuan = 1; $pertemuan <= 24; $pertemuan++)
            <td style="padding: 0px 5px">
                @if ($item->absensi($pertemuan, $mapel->id)->first())
                <i class="fas fa-check"></i>
                @endif
            </td>
            @endfor
        </tr>
        @endforeach
    </table>

</body>
</html>
