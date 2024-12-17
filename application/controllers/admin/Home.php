<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Home extends CI_Controller { // Mendefinisikan kelas controller Home yang mewarisi dari CI_Controller
    public function __construct(){ // Metode konstruktor untuk kelas
        parent::__construct(); // Memanggil konstruktor induk
        // Memeriksa apakah level sesi pengguna null; jika ya, redirect ke halaman otentikasi
        if($this->session->userdata('level')==NULL){
            redirect('auth'); // Arahkan ke halaman auth jika pengguna belum terautentikasi
        }
    }

    public function index() // Metode untuk menampilkan halaman dashboard
    {
        // Menyiapkan data untuk diteruskan ke tampilan
        $data = array(
            'judul_halaman' => 'Halaman Dashboard' // Judul halaman dashboard
        );
        // Memuat template dan tampilan dashboard dengan data yang disiapkan
        $this->template->load('template_admin', 'admin/dashboard', $data);
    }
}
