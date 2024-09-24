<?php
class Guest_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Guest_model');
    }

    public function index() {
        $username = $this->session->userdata('username');
        $code = $this->session->userdata('kode');

        $data['username'] = $username;
        $data['profile_picture'] = $this->Guest_model->get_profile_picture_by_username($username);
        $data['images'] = $this->Guest_model->getGuestImages($username, $code);

        $this->load->view('guest/guest_dashboard', $data);
    }

    public function view_image($gambar) {
        // Ambil data gambar dari model
        $data['image'] = $this->Guest_model->get_image_by_filename($gambar);
    
        // Tampilkan halaman edit dengan data gambar
        $this->load->view('guest/guest_view_image', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Authguest/guestlogin');
    }
}
?>
