<?php
// Pastikan Anda sudah mengimpor kelas FPDF terlebih dahulu
require_once('fpdf/fpdf.php');

class CetakNilai {

    private $pdf;
    private $db;

    public function __construct($db) {
        // Membuat objek FPDF baru
        $this->pdf = new FPDF();
        $this->db = $db;
    }

    public function generatePDF() {
        // Menambahkan halaman baru
        $this->pdf->AddPage();
        
        // Menambahkan header
        $this->header();

        // Menambahkan data nilai
        $this->nilaiReferensi();

        // Menambahkan footer
        $this->footer();

        // Menghasilkan output PDF
        $this->pdf->Output();
    }

    private function header() {
        // Set font dan menambahkan judul
        $this->pdf->SetFont('Arial', 'B', 14);
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'LAPORAN NILAI', 0, 0, 'C');
        $this->pdf->Ln(20);
    }

    private function footer() {
        // Menambahkan footer
        $this->pdf->SetY(-15);
        $this->pdf->SetFont('Arial', 'I', 8);
        $this->pdf->Cell(0, 10, 'Page ' . $this->pdf->PageNo(), 0, 0, 'C');
    }

    private function nilaiReferensi() {
        // Set font untuk tabel
        $this->pdf->SetFont('Arial', 'B', 12);
        $this->pdf->Cell(40, 7, 'ID Nilai', 1);
        $this->pdf->Cell(50, 7, 'Keterangan Nilai', 1);
        $this->pdf->Cell(40, 7, 'Jumlah Nilai', 1);
        $this->pdf->Ln();

        // Ambil data nilai dari database
        $query = "SELECT id_nilai, ket_nilai, jum_nilai FROM nilai";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        // Menampilkan data dalam tabel
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->pdf->Cell(40, 7, $row['id_nilai'], 1);
            $this->pdf->Cell(50, 7, $row['ket_nilai'], 1);
            $this->pdf->Cell(40, 7, $row['jum_nilai'], 1);
            $this->pdf->Ln();
        }
    }
}
?>

<?php
// Inisialisasi database dan kelas CetakNilai
include_once '../includes/config.php';  // Pastikan pathnya benar
include_once '../includes/cetak_nilai.php'; // Pastikan pathnya benar

// Membuat objek CetakNilai dan menghasilkan PDF
$cetak = new CetakNilai($db);
$cetak->generatePDF();
?>
