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

}
