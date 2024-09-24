<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model'); // Ganti 'Auth_model' menjadi 'auth_model'
        $this->load->model('Login_model');
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function register()
    {
        $this->load->view('admin/register');
    }
    public function do_register()
    {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('profilepicture', 'ProfilePicture', 'callback_validate_profilepicture');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('kode', 'Kode', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form registrasi
            $this->load->view('admin/register');
        } else {
            // Jika validasi berhasil, tambahkan data ke database
            $this->Auth_model->register();
            // Redirect atau tampilkan pesan berhasil
            redirect('Auth/login'); // Ganti 'auth/login' sesuai dengan halaman login Anda
        }
    }

    public function validate_profilepicture()
    {
        // Konfigurasi validasi untuk profilepicture
        $config['upload_path'] = './assets/profile';  // Ganti dengan path direktori upload Anda
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;  // Ganti dengan ukuran maksimal yang diinginkan (dalam kilobita)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profilepicture')) {
            return true;  // Validasi sukses
        } else {
            $this->form_validation->set_message('validate_profilepicture', $this->upload->display_errors());
            return false;  // Validasi gagal
        }
    }


    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect('auth/dashboard');
        } else {
            $this->load->view('admin/login');
        }
    }

    public function do_login()
    {
        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form login
            $this->load->view('admin/login');
        } else {
            // Jika validasi berhasil, cek login
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->Login_model->login($username, $password);  // Gunakan login_model

            if ($user) {
                // Login berhasil, set session
                $this->session->set_userdata('username', $user->username);
                // Set nickname ke dalam sesi
                $nickname = $this->Dashboard_model->get_nickname_by_username($username);
                $this->session->set_userdata('nickname', $nickname);
                redirect('auth/dashboard');
            } else {
                // Login gagal, tampilkan pesan atau redirect ke halaman login
                $this->session->set_flashdata('message', 'Username or password is incorrect.');
                redirect('auth/login');
            }
        }
    }


    public function dashboard()
    {
        // Implementasi halaman dashboard atau setelah login
        // Disini Anda dapat memuat konten dari tabel gambar sesuai dengan session 'nickname'
        $username = $this->session->userdata('username');
        $data['images'] = $this->Login_model->get_images_by_username($username);
        // Tambahkan baris ini untuk mendapatkan URL gambar profil
        $data['profile_picture'] = $this->Dashboard_model->get_profile_picture_by_username($username);
        $data['nickname'] = $this->Dashboard_model->get_nickname_by_username($username);
        $this->load->view('admin/dashboard', $data);
    }

    public function logout()
    {
        // Logout dan hapus session
        $this->session->unset_userdata('username');
        redirect('auth/login');
    }
}
