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

// Memasukkan file alternatif.inc.php untuk akses kelas Alternatif
include_once __DIR__ . '/../includes/alternatif.inc.php';  // Pastikan path benar

// Inisialisasi objek Alternatif
$pro = new Alternatif($db);
$stmt = $pro->readAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Alternatif</title>
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
            max-width: 250px;
            height: 80px;
            width: 180px align:max-content;
            margin: 40 auto 50px;
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
    <img src="/GARAGE/images/logodg.jpeg" alt="Logo Perusahaan" width="400" height="200">
    <h3>PT. Diesel One Garage</h3>
    <p class="alamat">Jl. Pecenongan No.3, RT.1/RW.4, Kb. Klp., Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10120 </p>
</div>

<div class="garis"></div>

<div class="judul-laporan">
    <p>Data Alternatif</p>
</div>

<table>
    <thead>
        <tr>
            <th>Nama Alternatif</th>
            <th>Vektor S</th>
            <th>Vektor V</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?php echo $row['nama_alternatif']; ?></td>
                <td><?php echo $row['vektor_s']; ?></td>
                <td><?php echo $row['vektor_v']; ?></td>
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
        <p>Head Purchasing</p>
        <br><br>
        <p>Rudi</p>
    </div>
</div>

</body>
</html>
