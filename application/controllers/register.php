<?php
defined('BASEPATH') or exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Register extends CI_Controller
{ // Mendefinisikan kelas controller User yang mewarisi dari CI_Controller
	public function __construct()
	{ // Metode konstruktor untuk kelas
		parent::__construct(); // Memanggil konstruktor induk
		$this->load->model('User_model'); // Memuat model User_model untuk berinteraksi dengan data pengguna
		// Memeriksa apakah level sesi pengguna bukan 'Admin'; jika ya, redirect ke halaman otentikasi
	}

	public function index() // Metode untuk menampilkan daftar pengguna
	{
		$this->load->view('register');
	}

	public function simpan() // Metode untuk menyimpan pengguna baru
	{
		// Memeriksa apakah username sudah ada
		$this->db->from('user'); // Mengambil data dari tabel 'user'
		$this->db->where('username', $this->input->post('username')); // Mencari pengguna berdasarkan username
		$cek = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array

		// Jika username sudah ada
		if ($cek <> NULL) {
			// Menetapkan pesan flash jika username sudah ada
			$this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Username sudah ada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
			redirect('admin/user'); // Redirect kembali ke halaman pengguna
		}

		// Memanggil metode simpan dari User_model untuk menyimpan data pengguna baru
		$this->User_model->register();

		// Menetapkan pesan flash sukses
		$this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
		redirect('Auth'); // Redirect ke halaman pengguna
	}
}
