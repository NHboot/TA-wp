<?php
require_once('includes/fpdf/fpdf.php');
require_once('includes/nilai.inc.php'); // Jika kelas Nilai digunakan

class CetakNilai {
    private $db;
    private $pdf;
    private $nilai;

    public function __construct($db) {
        $this->db = $db;
        $this->pdf = new FPDF();
        $this->nilai = new Nilai($db);
    }

    public function generatePDF() {
        $this->pdf->AddPage();
        $this->header();
        $this->nilaiReferensi();
        $this->footer();
        $this->pdf->Output();
    }

    private function header() {
		$this->pdf->SetFont('Arial', 'B', 14);  // Ganti 'Courier' dengan 'Arial'
        $this->pdf->Cell(80);
        $this->pdf->Cell(30, 10, 'LAPORAN NILAI', 0, 0, 'C');
        $this->pdf->Ln(20);
    }

    private function footer() {
        $this->pdf->SetY(-15);
		  $this->pdf->SetFont('Arial', 'B', 14);  // Ganti 'Courier' dengan 'Arial'
        $this->pdf->Cell(0, 10, 'Halaman ' . $this->pdf->PageNo(), 0, 0, 'C');
    }

    private function nilaiReferensi() {
		$this->pdf->SetFont('Times', 'B', 14);
        $this->pdf->Cell(40, 7, 'ID Nilai', 1, 0, 'L');
        $this->pdf->Cell(50, 7, 'Keterangan Nilai', 1, 0, 'L');
        $this->pdf->Cell(40, 7, 'Jumlah Nilai', 1, 0, 'L');
        $this->pdf->Ln();

        $this->pdf->SetFont('Times', 'B', 14);
        $stmt = $this->nilai->readAll();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->pdf->Cell(40, 7, $row['id_nilai'], 1, 0, 'L');
            $this->pdf->Cell(50, 7, $row['ket_nilai'], 1, 0, 'L');
            $this->pdf->Cell(40, 7, $row['jum_nilai'], 1, 0, 'L');
            $this->pdf->Ln();
        }
    }
}
?>