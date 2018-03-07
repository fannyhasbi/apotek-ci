<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
  
  public function checkAdmin($username){
    return $this->db->get_where('admin', ['username' => $username]);
  }

  public function getAdmin($username){
    $query = $this->db->get_where('admin', ['username' => $username]);

    return $query->row();
  }

  public function getPemesanan(){
    $q = "SELECT * FROM pemesanan WHERE status IN ('L', 'T') ORDER BY tanggal DESC, status ASC";
    $query = $this->db->query($q);

    return $query->result();
  }

  public function getPemesananByKode($kode){
    $q = "SELECT * FROM pemesanan WHERE kode_pesan = '". $kode ."'";
    $query = $this->db->query($q);
    return $query->row();
  }

  public function getDetailPemesanan($kode){
    // SELECT o.nama, d.jumlah, (d.jumlah * o.harga) AS subtotal
    // FROM detail_pemesanan d, obat o
    // WHERE d.kode_obat = o.kode_obat;

    $q = "SELECT o.nama, d.jumlah, o.harga, (d.jumlah * o.harga) AS subtotal
          FROM detail_pemesanan d, obat o
          WHERE d.kode_obat = o.kode_obat
            AND d.kode_pesan = '". $kode ."'";

    $query = $this->db->query($q);
    return $query->result();
  }

  public function getDetailPembeliByPemesanan($kode){
    // SELECT p.nama FROM pembeli WHERE id = (
    //   SELECT id_pemesan FROM pemesanan WHERE id_pemesan = '$kode'
    // );

    $q = "SELECT nama FROM pembeli WHERE id = (
            SELECT id_pemesan FROM pemesanan WHERE kode_pesan = '$kode'
          )";
    $query = $this->db->query($q);
    return $query->row();
  }

  public function getDataDashboard(){
    $q = "
      SELECT
      (SELECT COUNT(DISTINCT(kode_obat)) FROM obat) AS jumlah_obat,
      (SELECT COUNT(DISTINCT(id)) FROM pembeli) AS jumlah_pembeli,
      (SELECT COUNT(*) FROM pemesanan) AS jumlah_transaksi,
      (SELECT SUM(jumlah) FROM detail_pemesanan) AS jumlah_obat_terjual
    ";

    $query = $this->db->query($q);
    return $query->row();
  }

  public function getGrafik(){
    $q = "
      SELECT p.tanggal,
        SUM(d.jumlah) AS jumlah_obat_terjual,
        COUNT(*) AS jumlah_transaksi
      FROM detail_pemesanan d
      INNER JOIN pemesanan p
        ON d.kode_pesan = p.kode_pesan
      WHERE MONTH(p.tanggal) = MONTH(CURRENT_DATE())
        AND YEAR(p.tanggal) = YEAR(CURRENT_DATE())
        AND p.status = 'L'
      GROUP BY p.tanggal
    ";

    $query = $this->db->query($q);
    return $query->result();
  }

  public function insertObat(){
    $kode = $this->input->post('kode_obat');
    $nama = $this->input->post('nama');
    $bentuk = $this->input->post('bentuk');
    $harga  = $this->input->post('harga');
    $konsum = $this->input->post('konsumen');
    $manfaat= $this->input->post('manfaat');

    $q = "INSERT INTO obat VALUES
          ('$kode', '$nama', '$bentuk', '$konsum', '$manfaat', '$harga')";

    if($this->db->query($q))
      return true;
    else
      return false;
  }

  public function updateObat($kode){
    $kode = $this->input->post('kode_obat');
    $nama = $this->input->post('nama');
    $bentuk = $this->input->post('bentuk');
    $harga  = $this->input->post('harga');
    $konsum = $this->input->post('konsumen');
    $manfaat= $this->input->post('manfaat');

    $q = "UPDATE obat SET kode_obat = '$kode', nama = '$nama', bentuk = '$bentuk',
          harga = $harga, konsumen = '$konsum', manfaat = '$manfaat'
          WHERE kode_obat = '$kode'";

    if($this->db->query($q))
      return true;
    else
      return false;
  }

  public function deleteObat($kode){
    $q = "DELETE FROM obat WHERE kode_obat = '$kode'";
    if($this->db->query($q))
      return true;
    else
      return false;
  }

  public function getKonfirmasi(){
    $q = "
      SELECT pemesanan.*, pembeli.nama
      FROM pemesanan pemesanan
      INNER JOIN pembeli
        ON pemesanan.id_pemesan = pembeli.id
      WHERE pemesanan.status = 'B'
    ";

    $query = $this->db->query($q);
    return $query->result();
  }

  public function getKonfirmasiByKode($kode){
    $data = array(
      'kode_pesan' => $kode,
      'status' => 'B'
    );

    $query = $this->db->get_where('pemesanan', $data);
    return $query->row();
  }

}
