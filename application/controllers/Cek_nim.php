<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Cek_nim extends Admin_Controller {

   public function __construct() {
      parent::__construct();     
      $this->db2 = $this->load->database('second', TRUE);
      $this->db3 = $this->load->database('third', TRUE);

      $this->halaman = 'cek_nim';
   }

   public function index() {

      $data = [
         'halaman' => $this->halaman,
         'main'    => 'cek_nim/list',
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function cari() {
      $nim   = $this->input->GET('nim', TRUE);

      $sql = "SELECT * 
              FROM tr_pembayaran
              WHERE KdMahasiswa = '$nim'";
      $hasil = $this->db3->query($sql)->row();

        $data = [
         'halaman' => $this->halaman,
         'cari'    => $hasil,
         'main'    => 'cek_nim/list_search',
         'nim'     => $nim
        ];

      $this->load->view('layouts/template', $data);
   } 
}