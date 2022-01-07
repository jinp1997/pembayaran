<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin_model extends MY_Model {

	protected $table = 'admin';

	public function getValidationRules() {
        $validationRules = [
            [
                'field' => 'username',
                'label' => 'username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|required'
            ]
        ];

        return $validationRules;
    }

    public function getDefaultValues() {
        return [
            'username' => '',
            'password' => '',
        ];
    }

    public function login($input) {
        $input->password = md5($input->password);

        $user = $this->db->where('username', $input->username)
                         ->where('password', $input->password)
                         ->limit(1)
                         ->get($this->table)
                         ->row();

        if (($user)) {
            $data = [
                'id_admin'   => $user->id_admin,
                'nama_admin' => $user->nama_admin,
                'username'   => $user->username,
                'level'      => 'admin',
                'is_login'   => true
            ];

            $this->session->set_userdata($data);
            return true;
        }

        return false;
    }   

    public function logout() {
        $data = [
            'id_admin'   => null,
            'nama_admin' => null,
            'username'   => null,
            'level'      => null,
            'is_login'   => null
        ];
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
    }
}