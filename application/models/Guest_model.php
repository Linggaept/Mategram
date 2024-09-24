<?php
class Guest_model extends CI_Model {
    public function getGuestData($username, $kode) {
        $this->db->where('username', $username);
        if ($kode !== null) {
            $this->db->where('kode', $kode);
        }
        return $this->db->get('admin')->row();
    }

    public function getGuestImages($username, $kode) {
        $this->db->where('username', $username);
        if ($kode !== null) {
            $this->db->where('kode', $kode);
        }
        return $this->db->get('gambar')->result();
    }

    public function get_profile_picture_by_username($username) {
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

    public function get_image_by_filename($gambar) {
        return $this->db->get_where('gambar', array('gambar' => $gambar))->row();
    }
    
}
?>
