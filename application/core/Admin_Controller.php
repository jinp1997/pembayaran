<?php
class Admin_Controller extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $level    = $this->session->userdata('level');
        $is_login = $this->session->userdata('is_login');

        if (!$is_login) {
            redirect('login_admin');
            return;
        }

        if ($level !== 'admin') {
            redirect(site_url('login_admin'));
            return;
        }
    }
}
