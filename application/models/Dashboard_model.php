<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function get_images_by_username($username)
    {
        // Mengambil data gambar berdasarkan username
        $this->db->where('username', $username);
        $query = $this->db->get('gambar');
        return $query->result();
    }

    public function add_data($username, $judul, $gambar, $deskripsi)
    {
        $data = array(
            'username' => $username,
            'judul'    => $judul,
            'gambar'   => $gambar,
            'deskripsi' => $deskripsi
        );

        $this->db->insert('gambar', $data);
        redirect('auth/dashboard');
    }

    public function delete_image($gambar)
    {
        // Hapus data gambar dari database berdasarkan nama file
        $this->db->where('gambar', $gambar);
        $this->db->delete('gambar');
    }
    // Tambahkan fungsi get_image_by_filename, update_image
    public function get_image_by_filename($gambar)
    {
        return $this->db->get_where('gambar', array('gambar' => $gambar))->row();
    }

    public function update_image($gambar, $judul, $deskripsi)
    {
        $data = array('judul' => $judul);
        $data = array('deskripsi' => $deskripsi);
        $this->db->where('gambar', $gambar);
        $this->db->update('gambar', $data);
    }

    public function get_user_by_username($username)
    {
        return $this->db->get_where('admin', array('username' => $username))->row();
    }

    public function get_nickname_by_username($username)
    {
        // Mengambil data nickname berdasarkan username
        $this->db->select('nickname');
        $this->db->where('username', $username);
        $query = $this->db->get('admin');
        return $query->row()->nickname;
    }

    public function get_profile_picture_by_username($username)
    {
        $this->db->select('profilepicture');
        $this->db->where('username', $username);
        $query = $this->db->get('admin');

        // Pastikan ada hasil query
        if ($query->num_rows() > 0) {
            return $query->row()->profilepicture;
        } else {
            // Handle jika tidak ada data (misalnya, kembalikan URL default)
            return 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Default_pfp.svg';
        }
    }
}
