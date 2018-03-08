<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/fpdf.php';

class Cetak extends FPDF {
  public function Header(){
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 7, 'Laporan Penjualan Apotek Berkah', 0, 1, 'C');
    $this->Cell(0, 7, 'Maret 2018', 0, 1, 'C');
  }

  public function Footer(){
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', '8');
    $this->Cell(0, 10, 'Apotek Berkah 2018-03-10', 0, 0, 'C');
  }
}