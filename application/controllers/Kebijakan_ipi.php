<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Kebijakan_ipi extends Admin_Controller {

   public function __construct() {
      parent::__construct();     

      $this->load->model('Kebijakan_ipi_model', 'kebijakan');
      $this->halaman = 'kebijakan_ipi';
      $this->db2 = $this->load->database('second', TRUE);
   }

   public function index() {

      $data = [
         'halaman'   => $this->halaman,
         'main'      => 'kebijakan_ipi/list',
         'kebijakan' => $this->db->get('kebijakan_ipi')->result()
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function tambah() {
      $data = [
         'halaman' => $this->halaman,
         'main'    => 'kebijakan_ipi/tambah',
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function ubah($id_kebijakan) {
      $mhs = $this->db->where('id_kebijakan', $id_kebijakan)->get('kebijakan_ipi')->row();

      $data = [
         'halaman'      => $this->halaman,
         'main'         => 'kebijakan_ipi/ubah',
         'id_kebijakan' => $id_kebijakan,
         'mhs'          => $mhs,
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function ajax_add()
   {

      $data = array(
         'nim'            => $this->input->post('nim'),
         'no_pendaftaran' => $this->input->post('no_pendaftaran'),
         'jlh_ipi'        => $this->input->post('jlh_ipi'),
         'jlh_keringanan' => $this->input->post('jlh_keringanan'), 
         'angsuran'       => $this->input->post('angsuran'), 
         'tgl_input'      => date('Y-m-d H:i:s'), 
         'bulan_1'        => $this->input->post('bulan_1'), 
         'bulan_2'        => $this->input->post('bulan_2'), 
         'verifikator'    => $this->input->post('verifikator'), 
      );

      $insert = $this->db->insert('kebijakan_ipi', $data);

      redirect('kebijakan_ipi');
   }

   public function ajax_update($id_kebijakan)
   {
      $data = array(
         'nim'            => $this->input->post('nim'),
         'no_pendaftaran' => $this->input->post('no_pendaftaran'),
         'jlh_ipi'        => $this->input->post('jlh_ipi'),
         'jlh_keringanan' => $this->input->post('jlh_keringanan'), 
         'angsuran'       => $this->input->post('angsuran'), 
         'bulan_1'        => $this->input->post('bulan_1'), 
         'bulan_2'        => $this->input->post('bulan_2'), 
         'verifikator'    => $this->input->post('verifikator'), 
      );

      $this->db->where('id_kebijakan', $id_kebijakan)->update('kebijakan_ipi', $data);
      redirect('kebijakan_ipi');
   }

   public function ajax_delete($id_kebijakan)
   {
      $hapus = $this->db->where('id_kebijakan', $id_kebijakan)->delete('kebijakan_ipi');

      redirect('kebijakan_ipi');
   }   
}