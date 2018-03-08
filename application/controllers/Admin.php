<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('admin_model');
    $this->load->model('home_model');
  }

  //cek apakah admin sudah login
  private function cekLogin(){
    if(!$this->session->userdata('login_admin')){
      redirect(site_url('login'));
    }
  }

  public function index(){
    $this->cekLogin();

    $data['dashboard'] = $this->admin_model->getDataDashboard();
    $data['grafik'] = $this->admin_model->getGrafik();

    $data['view_title']= 'Dashboard Admin';
    $data['view_name'] = 'dashboard';
    $this->load->view('admin/index_view', $data);
  }

  public function login(){
    if($this->session->userdata('login_admin'))
      redirect(site_url('admin'));

    if($this->input->post('login')){
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      //jika admin terdaftar
      if($this->admin_model->checkAdmin($username)->num_rows() > 0){
        $admin = $this->admin_model->getAdmin($username);

        if(password_verify($password, $admin->password)){
          $data_session = array(
            'login_admin' => true,
            'username'    => $admin->username,
            'nama_admin'  => $admin->nama
          );

          $this->session->set_userdata($data_session);
        }
        else {
          $message = '<div class="alert alert-danger">Username atau password salah</div>';
          $this->session->set_flashdata('msg', $message);
        }
      }
      else {
        $message = '<div class="alert alert-danger">Username atau password salah</div>';
        $this->session->set_flashdata('msg', $message);
      }

      redirect(site_url('admin/login'));
    }
    else {
      $data['message'] = $this->session->flashdata('msg');
      $this->load->view('admin/login', $data);
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect(site_url('admin'));
  }

  public function transaksi($kode = NULL){
    $this->cekLogin();

    if($kode == NULL){
      $data['transaksi'] = $this->admin_model->getPemesanan();

      $data['view_title'] = 'Transaksi Pembelian';
      $data['view_name'] = 'transaksi';
      $this->load->view('admin/index_view', $data);
    }
    else {
      $data['pemesanan'] = $this->admin_model->getPemesananByKode($kode);
      $data['detail_pemesanan'] = $this->admin_model->getDetailPemesanan($kode);
      $data['pembeli'] = $this->admin_model->getDetailPembeliByPemesanan($kode);

      $data['view_title'] = 'Detail Transaksi '. $data['pemesanan']->kode_pesan;
      $data['view_name'] = 'transaksi_detail';
      $this->load->view('admin/index_view', $data);
    }
  }

  public function daftar_obat(){
    $this->cekLogin();

    $data['obat'] = $this->home_model->getObat();

    //didapat dari penghapusan obat
    $data['message'] = $this->session->flashdata('msg');

    $data['view_title'] = 'Daftar Obat';
    $data['view_name'] = 'daftar_obat';
    $this->load->view('admin/index_view', $data);
  }

  public function tambah_obat(){
    $this->cekLogin();

    if($this->input->post('tambah')){
      if($this->admin_model->insertObat())
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Obat '. $this->input->post('nama') .' berhasil dimasukkan kedalam database</div>');
      else
        $this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>Terjadi kesalahan</b>, obat gagal dimasukkan kedalam database</div>');
      redirect(site_url('admin/obat/tambah'));
    }
    else {
      $data['message'] = $this->session->flashdata('msg');

      $data['view_title'] = 'Tambah Obat';
      $data['view_name'] = 'tambah_obat';
      $this->load->view('admin/index_view', $data);
    }
  }

  public function edit_obat($kode){
    $this->cekLogin();

    if($this->input->post('edit')){
      if($this->admin_model->updateObat($kode))
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Obat dengan kode <b>'.$kode .'</b> berhasil diupdate</div>');
      else
        $this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>Terjadi kesalahan</b>, obat '. $kode .' gagal diupdate</div>');
      redirect(site_url('admin/obat/edit/'.$kode));
    }
    else {
      $data['obat'] = $this->home_model->getObat($kode);
      $data['message'] = $this->session->flashdata('msg');

      $data['view_title'] = 'Edit Obat <span class="text-info">'. $data['obat']->nama .'</span>';
      $data['view_name'] = 'edit_obat';
      $this->load->view('admin/index_view', $data);
    }
  }

  public function hapus_obat($kode){
    $this->cekLogin();

    if($this->admin_model->deleteObat($kode)){
      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Obat dengan kode <mark>'. $kode ."'</mark> berhasil dihapus</div>");
      redirect(site_url('admin/obat'));
    }
    else{
      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Obat dengan kode <mark>'. $kode ."</mark> gagal dihapus</div>");
      redirect(site_url('admin/obat'));
    }
  }

  public function konfirmasi($kode = NULL){
    $this->cekLogin();

    if($kode == NULL){
      $data['pemesanan'] = $this->admin_model->getKonfirmasi();

      $data['message'] = $this->session->flashdata('msg');

      $data['view_title'] = 'Konfirmasi Pembelian';
      $data['view_name'] = 'konfirmasi';
      $this->load->view('admin/index_view', $data);
    }
    else {
      $data['pemesanan'] = $this->admin_model->getKonfirmasiByKode($kode);
      $data['detail_pemesanan'] = $this->admin_model->getDetailPemesanan($kode);
      $data['pembeli'] = $this->admin_model->getDetailPembeliByPemesanan($kode);

      $data['view_title'] = 'Detail Transaksi '. $data['pemesanan']->kode_pesan;
      $data['view_name'] = 'konfirmasi_detail';
      $this->load->view('admin/index_view', $data);
    }
  }

  public function do_konfirmasi($kode = NULL){
    $this->cekLogin();

    if($kode === NULL){
      // Belum ada kodenya
      redirect(site_url('admin/konfirmasi'));
    }
    else {
      $this->admin_model->updateStatusPemesanan($kode);

      $this->session->set_flashdata('msg', 'Pesanan '. $kode .' berhasil dikonfirmasi');

      redirect(site_url('admin/konfirmasi'));
    }
  }

  public function cetak_bulanan(){
    require_once APPPATH."third_party/fpdf/fpdf.php";

    $con = mysqli_connect('localhost', 'root', '', 'apotek') OR die('Error database');
    $q1 = "
      SELECT
      (SELECT COUNT(*)
        FROM pemesanan
        WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
      ) jumlah_transaksi,
      (SELECT COUNT(*)
        FROM pemesanan
        INNER JOIN pembeli
          ON pemesanan.id_pemesan = pembeli.id
        WHERE MONTH(pemesanan.tanggal) = MONTH(CURRENT_DATE())
      ) jumlah_pembeli
    ";
    $h1 = mysqli_query($con, $q1);
    $r1 = mysqli_fetch_assoc($h1);

    $q2 = "
      SELECT o.kode_obat AS kode_obat,
        o.nama AS nama,
        o.harga AS harga,
        SUM(d.jumlah) AS terjual,
        SUM(d.jumlah * o.harga) AS untung
      FROM pemesanan p
      INNER JOIN detail_pemesanan d
        ON p.kode_pesan = d.kode_pesan
      INNER JOIN obat o
        ON d.kode_obat = o.kode_obat
      WHERE MONTH(p.tanggal) = MONTH(CURRENT_DATE())
        AND YEAR(p.tanggal) = YEAR(CURRENT_DATE())
      GROUP BY o.kode_obat
    ";
    $h2 = mysqli_query($con, $q2);

    // -----------------------
    // Info kertas A4
    // -----------------------
    // panjang = 210
    // lebar   = 297
    // margin : 5 5 5 ?

    // -----------------------
    // Utama
    // -----------------------

    $this->load->library('cetak');

    $pdf = new Cetak('P', 'mm', 'A4');
    $pdf->SetMargins(5, 5, 5);
    $pdf->AddPage();

    // Ringkasan
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50, 4, 'Total Transaksi : '. $r1['jumlah_transaksi'], 0, 1);
    $pdf->Cell(50, 4, 'Total Pembeli : '. $r1['jumlah_pembeli'], 0, 1);

    // Tabel
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Ln(5);
    $pdf->Cell(15, 5, "#KODE", 'TLBR', 0, 'C');
    $pdf->Cell(80, 5, "OBAT", 'TBR', 0, 'C');
    $pdf->Cell(20, 5, "HARGA", 'TBR', 0, 'C');
    $pdf->Cell(20, 5, "TERJUAL", 'TBR', 0, 'C');
    $pdf->Cell(50, 5, "UNTUNG", 'TBR', 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    // $pdf->Cell(15, 5, "A0001", 'LB', 0, '');
    // $pdf->Cell(80, 5, "Acarbose", 'LB', 0, '');
    // $pdf->Cell(20, 5, "123.000", 'LB', 0, 'C');
    // $pdf->Cell(20, 5, "12", 'LB', 0, 'C');
    // $pdf->Cell(50, 5, "50.000", 'LRB', 1, 'R');
    while($r = mysqli_fetch_assoc($h2)){
      $pdf->Cell(15, 5, $r['kode_obat'], 'LB', 0, '');
      $pdf->Cell(80, 5, $r['nama'], 'LB', 0, '');
      $pdf->Cell(20, 5, number_format($r['harga'], 0, ',', '.'), 'LB', 0, 'R');
      $pdf->Cell(20, 5, $r['terjual'], 'LB', 0, 'C');
      $pdf->Cell(50, 5, number_format($r['untung'], 0, ',', '.'), 'LRB', 1, 'R');
    }


    // -----------------------
    // Output
    // -----------------------
    $pdf->Output();
  }

}
