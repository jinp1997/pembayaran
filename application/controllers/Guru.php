<?php

if (!defined('BASEPATH'))
   exit('No direct script access allowed');

class Guru extends Admin_Controller {

   public function __construct() {
      parent::__construct();     

      $this->load->model('Guru_model', 'guru');
      $this->halaman = 'guru';
   }

   public function index() {
      $data = [
         'halaman' => $this->halaman,
         'main'    => 'admin/guru/list_guru',
      ];
      
      $this->load->view('layouts/template', $data);
   }

   public function ajax_list() {
      $draw   = intval($this->input->get("draw"));
      $start  = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $list = $this->guru->get_datatables($start, $length);
      $data = array();
      $no = 1;
      foreach ($list->result() as $guru) {         

         $row = array();
         $row[] = $no;
         $row[] = $guru->nip;
         $row[] = $guru->nama_guru;
         $row[] = $guru->jk;
         $row[] = '<a href="javascript:void(0)" onclick="edit('.$guru->id_guru.')" class="btn btn-warning btn-sm">
                      <i class="fas fa-fw fa-edit"></i>
                   </a>
                   <a href="javascript:void(0)" onclick="hapus('.$guru->id_guru.')" class="btn btn-danger btn-sm">
                      <i class="fa fa-fw fa-trash"></i>
                   </a>';
      
         $data[] = $row;
         $no++;
      }

      $total = $this->guru->get_total();
      $output = array(
         "draw"            => $draw,
         "recordsTotal"    => $total,
         "recordsFiltered" => $total,
         "data"            => $data,
      );
      
      echo json_encode($output);
      exit();
   }

   public function ajax_edit($id_guru)
   {
      $data = $this->guru->get_by_id($id_guru);      
      echo json_encode($data);
   }

   public function ajax_add()
   {
      $this->_validate();

      $data = array(
         'nip'       => $this->input->post('nip'),
         'nama_guru' => $this->input->post('nama_guru'),
         'jk'        => $this->input->post('jk'), 
      );

      $insert = $this->guru->save($data);

      echo json_encode(array("status" => TRUE));
   }

   public function ajax_update()
   {
      $data = array(
         'nip'       => $this->input->post('nip'),
         'nama_guru' => $this->input->post('nama_guru'),
         'jk'        => $this->input->post('jk'), 
      );
      $this->guru->ubah(array('id_guru' => $this->input->post('id_guru')), $data);
      echo json_encode(array("status" => TRUE));
   }

   public function ajax_delete($id_guru)
   {
      $this->guru->delete_by_id($id_guru);
      echo json_encode(array("status" => TRUE));
   }   

   private function _validate()
   {
      $data                 = array();
      $data['error_string'] = array();
      $data['inputerror']   = array();      
      $data['status']       = TRUE;

      if($this->input->post('nama_guru') == '')
      {
         $data['inputerror'][]   = 'nama_guru';
         $data['error_string'][] = 'Nama guru harus di isi!';
         $data['status']         = FALSE;
      }  

      if($this->input->post('nip') == '')
      {
         $data['inputerror'][]   = 'nip';
         $data['error_string'][] = 'NIP harus di isi!';
         $data['status']         = FALSE;
      }     

      if($data['status'] === FALSE)
      {
         echo json_encode($data);
         exit();
      }
   }
}