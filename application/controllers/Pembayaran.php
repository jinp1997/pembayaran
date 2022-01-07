<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Pembayaran extends Admin_Controller {

   public function __construct() {
      parent::__construct();     

      $this->load->model('Pembayaran_model', 'pembayaran');
      $this->halaman = 'pembayaran';
      $this->db2 = $this->load->database('second', TRUE);
   }

   public function index() {
      $data = [
         'halaman' => $this->halaman,
         'main'    => 'pembayaran/list',
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function cari() {
      $nim   = $this->input->GET('nim', TRUE);

      $sql = "SELECT * 
              FROM mahasiswa_registrasi
              WHERE mhsregMhsNiu = '$nim'";
      $hasil = $this->db2->query($sql)->result();

        $data = [
         'halaman'  => $this->halaman,
         'cari'     => $hasil,
         'main'     => 'pembayaran/list_search',
         'nim'      => $nim
        ];

      $this->load->view('layouts/template', $data);
   }

   public function ajax_edit($id_pembayaran)
   {
      $data = $this->pembayaran->get_by_id($id_pembayaran);      
      echo json_encode($data);
   }

   public function tambah($nim) {
      $data = [
         'halaman' => $this->halaman,
         'main'    => 'pembayaran/tambah',
         'nim'     => $nim
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function ubah($mhsregMhsNiu, $mhsregSemId) {
      $mhs = $this->db2->where('mhsregMhsNiu', $mhsregMhsNiu)->where('mhsregSemId', $mhsregSemId)->get('mahasiswa_registrasi')->row();

      $tgl = date('Y-m-d', strtotime($mhs->mhsregTanggalRegistrasi));
      $jam = date('H:i', strtotime($mhs->mhsregTanggalRegistrasi));

      $data = [
         'halaman'  => $this->halaman,
         'main'     => 'pembayaran/ubah',
         'nim'      => $mhsregMhsNiu,
         'semester' => $mhsregSemId,
         'mhs'      => $mhs,
         'jam'      => $jam,
         'tgl'      => $tgl
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function validasi($nim)
   {

      $data = array(
         'nim'          => $nim,
         'tgl_validasi' => date('Y-m-d H:i:s'),
         'yg_validasi'  => $this->session->userdata('nama_admin'), 
      );

      $insert = $this->db->insert('validasi', $data);

      redirect('pembayaran/cari?nim='. $nim);
   }

   public function ajax_add()
   {

      $data = array(
         'mhsregMhsNiu'            => $this->input->post('nim'),
         'mhsregSemId'             => $this->input->post('mhsregSemId'),
         'mhsregTotalBayar'        => $this->input->post('mhsregTotalBayar'), 
         'mhsregKeterangan'        => $this->input->post('mhsregKeterangan'), 
         'mhsregSksTeori'          => '0', 
         'mhsregTanggalRegistrasi' => $this->input->post('tanggal') . ' ' . $this->input->post('jam'), 
      );

      $insert = $this->db2->insert('unima_gtakademik.mahasiswa_registrasi', $data);

      if ($insert) {
        $data_in = array(
           'mhsstbyrMhsNiu'             => $this->input->post('nim'),
           'mhsstbyrSemId'              => $this->input->post('mhsregSemId'),
           'mhsstbyrIdJnsPembayaran'    => '1', 
           'mhsstbyrLabelJnsPembayaran' => 'SPP', 
           'mhsstbyrIsLunas'            => '1', 
        );

        $this->db2->insert('unima_gtakademik.mahasiswa_status_bayar', $data_in);
      }

      redirect('pembayaran/cari?nim='. $this->input->post('nim'));
   }

   public function ajax_update($nim, $semester)
   {
      $data = array(
         'mhsregMhsNiu'            => $this->input->post('nim'),
         'mhsregSemId'             => $semester,
         'mhsregTotalBayar'        => $this->input->post('mhsregTotalBayar'), 
         'mhsregKeterangan'        => $this->input->post('mhsregKeterangan'), 
         'mhsregSksTeori'          => '0', 
         'mhsregTanggalRegistrasi' => $this->input->post('tanggal') . ' ' . $this->input->post('jam'), 
      );

      $this->db2->where('mhsregMhsNiu', $nim)->where('mhsregSemId', $semester)->update('unima_gtakademik.mahasiswa_registrasi', $data);
      redirect('pembayaran/cari?nim='. $nim);
   }

   public function ajax_delete($mhsregMhsNiu, $mhsregSemId)
   {
      $hapus = $this->db2->where('mhsregMhsNiu', $mhsregMhsNiu)->where('mhsregSemId', $mhsregSemId)->delete('unima_gtakademik.mahasiswa_registrasi');

      if ($hapus) {
        $this->db2->where('mhsstbyrMhsNiu', $mhsregMhsNiu)->where('mhsstbyrSemId', $mhsregSemId)->delete('unima_gtakademik.mahasiswa_status_bayar');
      }

      redirect('pembayaran/cari?nim='. $mhsregMhsNiu);
   }   
}