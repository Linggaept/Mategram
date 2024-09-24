<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function register() {
        $data = array(
            'username' => $this->input->post('username'),
            'nickname' => $this->input->post('nickname'),
            'profilepicture' => $this->upload->data('file_name'), // Simpan nama file gambar
            'password' => $this->input->post('password'),
            'kode'     => $this->input->post('kode')
        );

        return $this->db->insert('admin', $data);
    }

}
