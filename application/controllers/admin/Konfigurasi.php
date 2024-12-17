<?php
defined('BASEPATH') or exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Konfigurasi extends CI_Controller // Mendefinisikan kelas controller Konfigurasi yang mewarisi dari CI_Controller
{
    public function __construct() // Metode konstruktor untuk kelas
    {
        parent::__construct(); // Memanggil konstruktor induk
        // Memeriksa apakah level sesi pengguna null; jika ya, redirect ke halaman otentikasi
        if ($this->session->userdata('level') == NULL) {
            redirect('auth'); // Arahkan ke halaman auth jika pengguna belum terautentikasi
        }
    }

    public function index() // Metode untuk menampilkan halaman konfigurasi
    {
        $this->db->from('konfigurasi'); // Mengambil data dari tabel 'konfigurasi'
        $konfig = $this->db->get()->row(); // Mendapatkan satu baris data konfigurasi
        // Menyiapkan data untuk diteruskan ke tampilan
        $data = array(
            'judul_halaman' => 'Halaman Konfigurasi', // Judul halaman
            'konfig'        => $konfig // Data konfigurasi
        );
        // Memuat template dan tampilan konfigurasi dengan data yang disiapkan
        $this->template->load('template_admin', 'admin/konfigurasi', $data);
    }

    public function update() // Metode untuk memperbarui konfigurasi
    {
        // Menyiapkan kondisi untuk memperbarui data konfigurasi
        $where = array('id_konfigurasi' => 1); // Mencari konfigurasi dengan ID 1
        // Menyiapkan data yang akan diperbarui
        $data = array(
            'judul_website'  => $this->input->post('judul'), // Mengambil judul website dari permintaan POST
            'profil_website' => $this->input->post('profil_website'), // Mengambil profil website dari permintaan POST
            'facebook'       => $this->input->post('facebook'), // Mengambil link Facebook dari permintaan POST
            'instagram'      => $this->input->post('instagram'), // Mengambil link Instagram dari permintaan POST
            'email'          => $this->input->post('email'), // Mengambil email dari permintaan POST
            'alamat'         => $this->input->post('alamat'), // Mengambil alamat dari permintaan POST
            'no_wa'         => $this->input->post('no_wa'), // Mengambil nomor WhatsApp dari permintaan POST
        );
        $this->db->update('konfigurasi', $data, $where); // Memperbarui record dalam tabel 'konfigurasi'
        
        // Menetapkan pesan flash sukses untuk pembaruan
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui konfigurasi.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konfigurasi'); // Redirect ke halaman konfigurasi setelah pembaruan
    }
}
