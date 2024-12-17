<?php
defined('BASEPATH') or exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Auth extends CI_Controller
{ // Mendefinisikan kelas controller Auth yang mewarisi dari CI_Controller
    public function __construct()
    { // Metode konstruktor untuk kelas
        parent::__construct(); // Memanggil konstruktor induk
    }

    public function index() // Metode untuk menampilkan halaman login
    {
        $this->load->view('login'); // Memuat tampilan login
    }

    public function login() // Metode untuk memproses login
    {
        // Mengambil username dan password dari input
        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); // Menghash password dengan md5

        $this->db->from('user'); // Mengambil data dari tabel 'user'
        $this->db->where('username', $username); // Mencari pengguna berdasarkan username
        $cek = $this->db->get()->row(); // Mendapatkan satu baris data pengguna

        // Jika pengguna tidak ditemukan
        if ($cek == NULL) {
            // Menetapkan pesan flash jika username tidak ada
            $this->session->set_flashdata('alert', '
            <div class="btn btn-light btn-block" role="alert">
				<div class="alert-icon">
					<i class="icon-info"></i>
				</div>
				<div class="alert-message">
				<span>Username tidak ada.</span>
				</div>
            </div>
            ');
            redirect('auth'); // Redirect kembali ke halaman login
        }
        // Jika password cocok dengan password di database
        else if ($password == $cek->password) {
            // Menyiapkan data sesi untuk pengguna yang berhasil login
            $data = array(
                'id_user'   => $cek->id_user, // Menyimpan id_user
                'nama'      => $cek->nama, // Menyimpan nama
                'username'  => $cek->username, // Menyimpan username
                'level'     => $cek->level, // Menyimpan level akses
            );
            $this->session->set_userdata($data); // Menyimpan data sesi pengguna
            redirect('admin/home'); // Redirect ke halaman admin home setelah login berhasil
        } else {
            // Menetapkan pesan flash jika password salah
            $this->session->set_flashdata('alert', '
            <div class="btn btn-light btn-block" role="alert">
			<div class="alert-icon">
				<i class="icon-info"></i>
			</div>
			<div class="alert-message">
				<span>Password salah.</span>
			</div>
            </div>
            ');
            redirect('auth'); // Redirect kembali ke halaman login
        }
    }

    public function logout() // Metode untuk logout pengguna
    {
        $this->session->sess_destroy(); // Menghancurkan sesi pengguna
        redirect('home'); // Redirect ke halaman home setelah logout
    }
}
