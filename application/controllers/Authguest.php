<?php
class Authguest extends CI_Controller {

    public function guestlogin() {
        $username = $this->input->get('username');
        $kode = $this->input->get('kode');

        // Kirim nilai ke view
        $data['username'] = $username;
        $data['kode'] = $kode;
        $this->load->view('guest/guest_login');
    }

    public function processLogin() {
        $this->load->model('Guest_model');
        $username = $this->input->post('username');
        $code = $this->input->post('kode');
        
        $user = $this->Guest_model->getGuestData($username, $code);
    
        if ($user) {
            $data = array(
                'username' => $user->username,
                'logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('guest_dashboard');
        } else {
            // Handle invalid login
            echo 'Invalid login credentials';
        }
    }
    

    public function logout() {
        $this->session->sess_destroy();
        redirect('Authguest/guestlogin');
    }

}
?>
