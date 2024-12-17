<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Kategori extends CI_Controller { // Mendefinisikan kelas controller Kategori yang mewarisi dari CI_Controller
    public function __construct(){ // Metode konstruktor untuk kelas
        parent::__construct(); // Memanggil konstruktor induk
        // Memeriksa apakah level sesi pengguna null; jika ya, redirect ke halaman otentikasi
        if($this->session->userdata('level')==NULL){
            redirect('auth'); // Arahkan ke halaman auth jika pengguna belum terautentikasi
        }
    }

    public function index() // Metode untuk menampilkan halaman kategori
    {
        $this->db->from('kategori'); // Mengambil data dari tabel 'kategori'
        $this->db->order_by('nama_kategori', 'ASC'); // Mengurutkan kategori berdasarkan nama kategori secara ascending
        $kategori = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array
        // Menyiapkan data untuk diteruskan ke tampilan
        $data = array(
            'judul_halaman' => 'Kategori Konten', // Judul halaman
            'kategori'      => $kategori // Data kategori
        );
        // Memuat template dan tampilan kategori dengan data yang disiapkan
        $this->template->load('template_admin', 'admin/kategori_index', $data);
    }

    public function simpan() // Metode untuk menyimpan kategori baru
    {
        $this->db->from('kategori'); // Mengambil data dari tabel 'kategori'
        $this->db->where('nama_kategori', $this->input->post('nama_kategori')); // Mencari kategori berdasarkan nama yang diinput
        $cek = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array
        
        // Memeriksa apakah kategori sudah ada
        if($cek <> NULL){
            // Menetapkan pesan flash jika kategori sudah digunakan
            $this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Kategori konten sudah digunakan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/kategori'); // Redirect kembali ke halaman kategori
        }

        // Menyiapkan data untuk dimasukkan ke dalam database
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori') // Mengambil nama kategori dari permintaan POST
        );
        $this->db->insert('kategori', $data); // Menyisipkan data ke tabel 'kategori'
        
        // Menetapkan pesan flash sukses
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan kategori.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/kategori'); // Redirect ke halaman kategori
    }

    public function delete_data($id) // Metode untuk menghapus kategori berdasarkan ID
    {
        // Menyiapkan kondisi untuk menghapus kategori
        $where = array(
            'id_kategori' => $id // Mencocokkan ID kategori yang akan dihapus
        );
        $this->db->delete('kategori', $where); // Menghapus record dari tabel 'kategori'
        
        // Menetapkan pesan flash sukses untuk penghapusan
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menghapus kategori.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/kategori'); // Redirect ke halaman kategori
    }

    public function update() // Metode untuk memperbarui kategori
    {
        // Menyiapkan kondisi untuk memperbarui kategori
        $where = array('id_kategori' => $this->input->post('id_kategori')); // Mengambil ID kategori dari permintaan POST
        // Menyiapkan data yang akan diperbarui
        $data = array('nama_kategori' => $this->input->post('nama_kategori')); // Mengambil nama kategori baru dari permintaan POST
        $this->db->update('kategori', $data, $where); // Memperbarui record dalam tabel 'kategori'
        
        // Menetapkan pesan flash sukses untuk pembaruan
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui kategori.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/kategori'); // Redirect ke halaman kategori
    }
}
