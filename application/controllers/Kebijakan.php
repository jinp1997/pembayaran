<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Kebijakan extends Admin_Controller {

   public function __construct() {
      parent::__construct();     

      $this->load->model('Kebijakan_model', 'kebijakan');
      $this->halaman = 'kebijakan';
      $this->db2 = $this->load->database('second', TRUE);
      $this->db3 = $this->load->database('third', TRUE);
   }

   public function index() {

      $data = [
         'halaman'   => $this->halaman,
         'main'      => 'kebijakan/list',
         'kebijakan' => $this->db->get('kebijakan')->result()
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function tambah() {
      $data = [
         'halaman' => $this->halaman,
         'main'    => 'kebijakan/tambah',
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function ubah($id_kebijakan) {
      $mhs = $this->db->where('id_kebijakan', $id_kebijakan)->get('kebijakan')->row();

      $data = [
         'halaman'      => $this->halaman,
         'main'         => 'kebijakan/ubah',
         'id_kebijakan' => $id_kebijakan,
         'mhs'          => $mhs,
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function ajax_add()
   {
      $nim = $this->input->post('nim');

      $data = array(
         'nim'            => $this->input->post('nim'),
         'no_pendaftaran' => $this->input->post('no_pendaftaran'),
         'jlh_ukt'        => $this->input->post('jlh_ukt'),
         'jlh_keringanan' => $this->input->post('jlh_keringanan'), 
         'angsuran'       => $this->input->post('angsuran'), 
         'tgl_input'      => date('Y-m-d H:i:s'), 
         'bulan_1'        => $this->input->post('bulan_1'), 
         'bulan_2'        => $this->input->post('bulan_2'), 
         'verifikator'    => $this->input->post('verifikator'), 
         'cicil_2'    => $this->input->post('cicil_2'), 
         'status'    => $this->input->post('status'), 
      );

      if (empty($nim)) {
         $insert = $this->db->insert('kebijakan', $data);   
      } else {
         $insert = $this->db->insert('kebijakan', $data);

         if ($insert) {
            $data_byr = array(
               'Nilai'  => $this->input->post('jlh_keringanan'),
            );

            $update = $this->db3->where('KdMahasiswa', $nim)->update('tr_pembayaran', $data_byr);
         }
      }

      redirect('kebijakan');
   }

   public function ajax_update($id_kebijakan)
   {
      $data = array(
         'nim'            => $this->input->post('nim'),
         'no_pendaftaran' => $this->input->post('no_pendaftaran'),
         'jlh_ukt'        => $this->input->post('jlh_ukt'),
         'jlh_keringanan' => $this->input->post('jlh_keringanan'), 
         'angsuran'       => $this->input->post('angsuran'), 
         'tgl_input'      => date('Y-m-d H:i:s'), 
         'bulan_1'        => $this->input->post('bulan_1'), 
         'bulan_2'        => $this->input->post('bulan_2'), 
         'verifikator'    => $this->input->post('verifikator'), 
         'cicil_2'    => $this->input->post('cicil_2'), 
         'status'    => $this->input->post('status'), 
      );

      $this->db->where('id_kebijakan', $id_kebijakan)->update('kebijakan', $data);
      redirect('kebijakan');
   }

   public function ajax_delete($id_kebijakan)
   {
      $hapus = $this->db->where('id_kebijakan', $id_kebijakan)->delete('kebijakan');

      redirect('kebijakan');
   }   
}