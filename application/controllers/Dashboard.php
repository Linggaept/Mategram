<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
    }

    public function index()
    {
        $username = $this->session->userdata('username');

        // Ambil gambar profil untuk pengguna
        $data['profile_picture'] = $this->Dashboard_model->get_profile_picture_by_username($username);

        // Periksa apakah dilakukan pencarian
        $search_query = $this->input->get('search');
        if (!empty($search_query)) {
            // Lakukan pencarian berdasarkan judul menggunakan metode model Anda
            $data['images'] = $this->Dashboard_model->search_images_by_title($username, $search_query);

            // Perbarui gambar profil jika diperlukan
            $data['profile_picture'] = $this->Dashboard_model->get_profile_picture_by_username($username);
        } else {
            // Jika tidak ada pencarian, ambil semua gambar
            $data['images'] = $this->Dashboard_model->get_images_by_username($username);
        }

        $this->load->view('dashboard', $data);
    }


    public function add_data()
    {
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('username')) {
            // Jika tidak, redirect ke halaman login atau berikan pesan kesalahan
            redirect('auth/login');
        }

        // Ambil data dari formulir
        $username = $this->session->userdata('username');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');

        // Ambil informasi file dari formulir
        $files = isset($_FILES['gambar']) ? $_FILES['gambar'] : NULL;

        // Cek apakah ada file yang diunggah
        if (!empty($files['name'][0])) {
            // Loop untuk setiap file yang diunggah
            for ($i = 0; $i < count($files['name']); $i++) {
                $_FILES['gambar']['name']     = $files['name'][$i];
                $_FILES['gambar']['type']     = $files['type'][$i];
                $_FILES['gambar']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['gambar']['error']    = $files['error'][$i];
                $_FILES['gambar']['size']     = $files['size'][$i];

                // Konfigurasi upload file
                $config['upload_path']   = './assets/upload/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 10240; // 10 MB
                $config['encrypt_name']  = TRUE;

                $this->upload->initialize($config);

                // Coba upload file
                if (!$this->upload->do_upload('gambar')) {
                    // Jika upload gagal, simpan pesan kesalahan
                    $data['upload_errors'][] = $this->upload->display_errors();
                } else {
                    // Jika upload berhasil, ambil data file
                    $upload_data = $this->upload->data();
                    $gambar = $upload_data['file_name'];

                    // Tambahkan data ke database
                    $this->Dashboard_model->add_data($username, $judul, $gambar, $deskripsi);

                    // Tampilkan pesan berhasil (untuk debugging)
                    echo "Data berhasil ditambahkan!";
                }
            }
        } else {
            // Tampilkan pesan bahwa tidak ada file yang diunggah
            $this->form_validation->set_message($this->upload->display_errors());
            //echo "Tidak ada file yang diunggah.";
        }

        // Redirect atau tampilkan halaman yang sesuai
        $this->load->view('admin/add_data');
    }

    // Tambahkan fungsi edit_image dan update_image
    public function edit_image($gambar)
    {
        // Ambil data gambar dari model
        $data['image'] = $this->Dashboard_model->get_image_by_filename($gambar);

        // Tampilkan halaman edit dengan data gambar
        $this->load->view('admin/edit_image', $data);
    }

    public function view_image($gambar)
    {
        // Ambil data gambar dari model
        $data['image'] = $this->Dashboard_model->get_image_by_filename($gambar);

        // Tampilkan halaman edit dengan data gambar
        $this->load->view('admin/view_image', $data);
    }

    public function update_image()
    {
        // Ambil data dari formulir edit
        $judul = $this->input->post('judul');
        $gambar = $this->input->post('gambar');
        $deskripsi = $this->input->post('deskripsi');

        // Update data gambar ke dalam database
        $this->Dashboard_model->update_image($gambar, $judul, $deskripsi);

        // Redirect ke halaman dashboard setelah update
        redirect('dashboard/view_image/' . $gambar);
    }


    public function delete_image($gambar)
    {
        // Ambil path gambar dari database
        $image_data = $this->Dashboard_model->get_image_by_filename($gambar);

        // Hapus gambar dari sistem file server
        $image_path = FCPATH . 'assets/upload/' . $gambar;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Hapus data gambar dari database
        $this->Dashboard_model->delete_image($gambar);

        // Redirect atau berikan respons sesuai kebutuhan Anda
        redirect('auth/dashboard');
    }
    public function profile()
    {
        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('username')) {
            // Jika tidak, redirect ke halaman login atau berikan pesan kesalahan
            redirect('auth/login');
        }

        // Ambil data pengguna dari model
        $username = $this->session->userdata('username');
        $data['profile_picture'] = $this->Dashboard_model->get_profile_picture_by_username($username);
        $data['user'] = $this->Dashboard_model->get_user_by_username($username);

        // Tampilkan halaman profil dengan data pengguna
        $this->load->view('admin/profile', $data);
    }
}
