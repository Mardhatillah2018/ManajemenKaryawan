<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji - {{ $gaji->karyawan->nama }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            max-width: 700px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #e0e0e0;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        table th {
            background-color: #f9f9f9;
            font-weight: 600;
            color: #333;
        }
        table td {
            color: #555;
        }
        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 14px;
            color: #fff;
            font-weight: 600;
            text-align: center;
        }
        .status-belum {
            background-color: #ff9800;
        }
        .status-diterima {
            background-color: #4caf50;
        }
        .footer {
            text-align: center;
            padding-top: 10px;
            border-top: 2px solid #e0e0e0;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Slip Gaji</h2>
            <p>Periode: {{ \Carbon\Carbon::parse($gaji->bulan_tahun)->translatedFormat('F Y') }}</p>
        </div>

        <table>
            <tr>
                <th>Nama</th>
                <td>{{ $gaji->karyawan->nama }}</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>{{ $gaji->karyawan->nik }}</td>
            </tr>
            <tr>
                <th>Departemen</th>
                <td>{{ $gaji->departemen->nama_departemen }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $gaji->jabatan->nama_jabatan }}</td>
            </tr>
            <tr>
                <th>Gaji Pokok</th>
                <td>Rp {{ number_format($gaji->jabatan->gaji_pokok, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Bonus</th>
                <td>Rp {{ number_format($gaji->bonus, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Potongan</th>
                <td>Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Gaji</th>
                <td>Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <span class="status {{ $gaji->status == 'Belum Diterima' ? 'status-belum' : 'status-diterima' }}">
                        {{ $gaji->status == 'Belum Diterima' ? 'Belum Diterima' : 'Diterima' }}
                    </span>
                </td>
            </tr>
        </table>

        <div class="footer">
            <p>Terima kasih atas kerja keras Anda.</p>
        </div>
    </div>
</body>
</html>
