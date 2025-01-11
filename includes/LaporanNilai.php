<?php
$host = 'localhost';
$dbname = 'dggarage';
$username = 'root';
$password = ''; 

try {
    // Membuat koneksi PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Menyiapkan mode error untuk PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    exit;
}

// Memasukkan file nilai.inc.php untuk akses kelas Nilai
include_once __DIR__ . '/../includes/nilai.inc.php';  // Pastikan path benar

// Inisialisasi objek Nilai
$pro = new Nilai($db);
$stmt = $pro->readAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cetak Nilai</title>
    <link rel="icon" href="../images/th.jpeg" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .kop {
            text-align: center;
            margin-top: 20px;
        }
        .kop img {
            max-width: 100px;
        }
        .kop h3, .kop p {
            margin: 0;
            padding: 0;
        }
        .kop .alamat {
            font-size: 14px;
        }
        .garis {
            border-top: 2px solid black;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .judul-laporan {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            text-align: left;
            font-size: 14px;
        }
        .footer .tanggal {
            margin-bottom: 40px;
        }
        .footer .manager {
            font-weight: bold;
        }
        .footer .atasan {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="kop">
    <!-- Ganti dengan logo dan informasi perusahaan -->
    <img src="/images/logodg.jpeg" alt="Logo Perusahaan" width="200" height="100">
    <h3>Nama Perusahaan</h3>
    <p class="alamat">Alamat Perusahaan, Kota, Provinsi</p>
</div>

<div class="garis"></div>

<div class="judul-laporan">
    <p>Data Nilai</p>
</div>

<table>
    <thead>
        <tr>
            <th>Keterangan Nilai</th>
            <th>Jumlah Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $row['ket_nilai']; ?></td>
                <td><?php echo $row['jum_nilai']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<div class="footer">
    <div class="tanggal">
        <?php
        // Array bulan dalam Bahasa Indonesia
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        
        // Mengambil tanggal, bulan, dan tahun
        $tanggal = date('d');  // Mendapatkan tanggal dalam format 2 digit
        $bulan = $bulan[date('n')];  // Mendapatkan nama bulan berdasarkan nomor bulan
        $tahun = date('Y');  // Mendapatkan tahun dalam format 4 digit
        
        // Menampilkan tanggal dalam format Indonesia
        echo 'Jakarta, ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
        ?>
        <p> Manager</p>
    </div>
    <br><br>
        <p>Nama Atasan Perusahaan</p>
</div>

</body>
</html>
