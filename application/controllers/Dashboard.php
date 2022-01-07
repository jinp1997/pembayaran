<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		
        $this->halaman = 'dashboard';
	}
	
	public function index() {
        $data = [
            'halaman' => $this->halaman,
            'main'    => 'dashboard',
        ];

		$this->load->view('layouts/template', $data);
	}

	public function ajax_edit($id_admin)
    {
      $data = $this->admin->get_by_id($id_admin);      
      echo json_encode($data);
    }

    public function ajax_update()
    {
      
      $admin = $this->admin->get();

      if ($this->input->post('password') == '') {
         $password = $admin->password;
      } else {
         $password = md5($this->input->post('password'));
      }

      $data = array(
         'nama_admin' => $this->input->post('nama_admin'),
         'username'   => $this->input->post('username'),
         'password'   => $password,  
      );

      $this->admin->ubah(array('id_admin' => $this->input->post('id_admin')), $data);
      echo json_encode(array("status" => TRUE));
    }
}