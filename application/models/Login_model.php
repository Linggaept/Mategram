<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function login($username, $password) {
        // Mengambil data user berdasarkan username
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');
        return $query->row();
    }

    public function get_images_by_username($username) {
        // Mengambil data gambar berdasarkan username
        $this->db->where('username', $username);
        $query = $this->db->get('gambar');
        return $query->result();
    }
}
