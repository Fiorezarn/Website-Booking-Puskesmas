<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan 7 Hari Terakhir</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>NIK</th>
                <th>Usia</th>
                <th>Kelamin</th>
                <th>No Telefon</th>
                <th>Alamat</th>
                <th>Poli</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->namapasien }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->usia }}</td>
                    <td>{{ $data->jeniskelamin }}</td>
                    <td>{{ $data->nohp }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->kategori }}</td>
                    <td>{{ $data->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
