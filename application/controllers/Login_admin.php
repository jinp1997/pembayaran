<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin extends MY_Controller {	

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_admin_model', 'login');
    }

	public function index() {
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $this->load->view('auths/login_admin', compact('input'));
            return;
        }

        if ($this->login->login($input)) {            
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('message', 'Username atau password salah, Coba lagi!');
        }

        redirect('login_admin');
	}

	public function logout() {		
        $this->login->logout();
        redirect('login_admin');
	}
}