<?php
include('koneksi.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'NO');
$sheet->setCellValue('B1', 'TANGGAL');
$sheet->setCellValue('C1', 'NAMA TAMU');
$sheet->setCellValue('D1', 'ALAMAT');
$sheet->setCellValue('E1', 'NO TELEPON/HP');
$sheet->setCellValue('F1', 'BERTEMU DENGAN');
$sheet->setCellValue('G1', 'KEPENTINGAN');

if(isset($_GET['cari'])){
    $p_awal = $_GET['p_awal'];
    $p_akhir = $_GET['p_akhir'];
    $data = mysqli_query($koneksi, "SELECT * FROM buku_tamu WHERE tanggal BETWEEN '$p_awal' AND '$p_akhir'");
} else {
    $data = mysqli_query($koneksi, "SELECT * FROM buku_tamu");
}
$i = 2;
$no = 1;
while($d = mysqli_fetch_assoc($data)){
    $sheet->setCellValue('A' . $no, $no);
    $sheet->setCellValue('B' . $no, $d['tanggal']);
    $sheet->setCellValue('C' . $no, $d['nama_tamu']);
    $sheet->setCellValue('D' . $no, $d['alamat']);
    $sheet->setCellValue('E' . $no, $d['no_hp']);
    $sheet->setCellValue('F' . $no, $d['bertemu']);
    $sheet->setCellValue('G' . $no, $d['kepentingan']);
    $no++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('Laporan_Buku_Tamu.xlsx');
echo "<script>window.location.href = 'Laporan_Buku_Tamu.xlsx'</script>";
?>