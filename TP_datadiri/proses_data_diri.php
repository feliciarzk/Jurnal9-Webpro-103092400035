
<?php

// Mengambil data dari form
$nama = $_POST['nama'] ?? '';
$tanggal = $_POST['tanggal_lahir'] ?? '';
$hobi = $_POST['hobi'] ?? [];

// Mengamankan output
$nama = htmlspecialchars($nama);

// Mengubah format tanggal
$bulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
];

$waktu = DateTime::createFromFormat('!Y-m-d', $tanggal);

if ($waktu) {
    $tanggalFormat = $waktu->format('j') . ' ' .
                     $bulan[(int)$waktu->format('n')] . ' ' .
                     $waktu->format('Y');
} else {
    $tanggalFormat = 'Tanggal tidak valid';
}

// Mengolah hobi
if (!empty($hobi)) {
    $hobiFormat = implode(', ', array_map('htmlspecialchars', $hobi));
} else {
    $hobiFormat = 'Tidak ada hobi yang dipilih';
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Diri</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 550px;
            margin: auto;
            background: white;
            padding: 25px;
            border: 1px solid #ddd;
        }

        h2 {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }

        .data {
            display: flex;
            margin: 20px 0;
        }

        .judul {
            width: 130px;
            font-weight: bold;
        }

        a {
            color: #087bea;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tampilan Data Anda</h2>

    <div class="data">
        <div class="judul">Nama Lengkap</div>
        <div>: <?= $nama ?></div>
    </div>

    <div class="data">
        <div class="judul">Tanggal Lahir</div>
        <div>: <?= htmlspecialchars($tanggalFormat) ?></div>
    </div>

    <div class="data">
        <div class="judul">Hobi</div>
        <div>: <?= $hobiFormat ?></div>
    </div>

    <br>

    <a href="form_data_diri.html">&laquo; Kembali ke Form</a>

</div>

</body>
</html>
