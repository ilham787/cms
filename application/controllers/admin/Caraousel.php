<?php
defined('BASEPATH') or exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Caraousel extends CI_Controller // Mendefinisikan kelas controller Caraousel yang mewarisi dari CI_Controller
{
    public function __construct() // Metode konstruktor untuk kelas
    {
        parent::__construct(); // Memanggil konstruktor induk
        // Memeriksa apakah level sesi pengguna null; jika ya, redirect ke halaman otentikasi
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
    }

    public function index() // Metode untuk menampilkan halaman utama carousel
    {
        $this->db->from('caraousel'); // Mengambil data dari tabel 'caraousel'
        $caraousel = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array
        // Menyiapkan data untuk diteruskan ke tampilan
        $data = array(
            'judul_halaman' => 'Halaman Caraousel', // Judul halaman
            'caraousel'      => $caraousel, // Data carousel
        );
        // Memuat template dan tampilan dengan data yang disiapkan
        $this->template->load('template_admin', 'admin/caraousel_index', $data);
    }

    public function simpan() // Metode untuk menyimpan data carousel baru
    {
        $namafoto = date('YmdHis') . '.jpg'; // Menghasilkan nama file unik berdasarkan timestamp saat ini
        // Konfigurasi untuk upload file
        $config['upload_path']      = 'assets/upload/caraousel'; // Direktori upload
        $config['max_size'] = 500 * 1024; // Menetapkan ukuran maksimum 500Kb
        $config['file_name']        = $namafoto; // Menetapkan nama file
        $config['allowed_types']    = '*'; // Mengizinkan semua tipe file (pertimbangkan untuk membatasi ini demi keamanan)
        $this->load->library('upload', $config); // Memuat library upload dengan konfigurasi di atas
        
        // Memeriksa apakah ukuran file yang diupload melebihi batas
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 Kb. 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/caraousel'); // Redirect kembali ke halaman carousel
        } elseif (!$this->upload->do_upload('foto')) { // Jika upload gagal
            $error = array('error' => $this->upload->display_errors()); // Menangkap pesan kesalahan
        } else {
            $data = array('upload_data' => $this->upload->data()); // Mendapatkan data upload
        }   
        // Menyiapkan data untuk dimasukkan ke dalam database
        $data = array(
            'judul'     => $this->input->post('judul'), // Mengambil judul dari permintaan POST
            'foto'           => $namafoto, // Menetapkan nama file foto
        );
        $this->db->insert('caraousel', $data); // Menyisipkan data ke tabel 'caraousel'
        // Menetapkan pesan flash sukses
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan caraousel.menghapusnya
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/caraousel'); // Redirect ke halaman carousel
    }

    public function delete_data($id) // Metode untuk menghapus item carousel
    {
        $filename = FCPATH . '/assets/upload/caraousel/' . $id; // Membuat path file
        // Memeriksa apakah file ada sebelum mencoba menghapusnya
        if (file_exists($filename)) {
            unlink("./assets/upload/caraousel/" . $id); // Menghapus file dari server
        }
        // Menyiapkan kondisi untuk menghapus entri dari database
        $where = array(
            'foto'   => $id // Mencocokkan nama file dengan record di database
        );
        $this->db->delete('caraousel', $where); // Menghapus record dari tabel 'caraousel'
        // Menetapkan pesan flash sukses untuk penghapusan
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menghapus caraousel.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/caraousel'); // Redirect ke halaman carousel
    }
}
