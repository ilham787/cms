<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Home extends CI_Controller { // Mendefinisikan kelas controller Home yang mewarisi dari CI_Controller
    public function __construct(){ // Metode konstruktor untuk kelas
        parent::__construct(); // Memanggil konstruktor induk
    }

    public function index() // Metode untuk menampilkan halaman beranda
    {
        // Mengambil data konfigurasi dari tabel 'konfigurasi'
        $this->db->from('konfigurasi'); 
        $konfig = $this->db->get()->row(); // Mendapatkan satu baris data konfigurasi

        // Mengambil data dari tabel 'caraousel'
        $this->db->from('caraousel'); 
        $caraousel = $this->db->get()->result_array(); // Mendapatkan semua data caraousel

        // Mengambil data dari tabel 'kategori'
        $this->db->from('kategori'); 
        $kategori = $this->db->get()->result_array(); // Mendapatkan semua data kategori

        // Mengambil data konten dengan join tabel kategori dan user
        $this->db->from('konten a'); 
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel user
        $this->db->order_by('tanggal', 'ASC'); // Mengurutkan berdasarkan tanggal
        $konten = $this->db->get()->result_array(); // Mendapatkan semua data konten

        // Menyiapkan data untuk tampilan
        $data = array(
            'judul'     =>  "Beranda | Hamz77", // Judul halaman
            'konfig'    =>  $konfig, // Data konfigurasi
            'kategori'  =>  $kategori, // Data kategori
            'caraousel' =>  $caraousel, // Data caraousel
            'konten'    =>  $konten, // Data konten
        );

        $this->load->view('beranda', $data); // Memuat tampilan beranda dengan data yang telah disiapkan
    }

    public function kategori($id) // Metode untuk menampilkan konten berdasarkan kategori
    {
        // Mengambil data konfigurasi
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mendapatkan satu baris data konfigurasi   

        // Mengambil data dari tabel 'caraousel'
        $this->db->from('caraousel'); 
        $caraousel = $this->db->get()->result_array(); // Mendapatkan semua data caraousel

        // Mengambil data dari tabel 'kategori'
        $this->db->from('kategori'); 
        $kategori = $this->db->get()->result_array(); // Mendapatkan semua data kategori

        // Mengambil data konten berdasarkan id kategori
        $this->db->from('konten a'); 
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel user
        $this->db->where('a.id_kategori',$id); // Memfilter konten berdasarkan id kategori
        $konten = $this->db->get()->result_array(); // Mendapatkan semua data konten yang sesuai

        // Mengambil nama kategori berdasarkan id
        $this->db->from('kategori'); 
        $this->db->where('id_kategori', $id); // Memfilter kategori berdasarkan id
        $nama_kategori = $this->db->get()->row()->nama_kategori; // Mendapatkan nama kategori

        // Menyiapkan data untuk tampilan
        $data = array(
            'judul'          =>  $nama_kategori." | Hamz77", // Judul halaman dengan nama kategori
            'nama_kategori'  =>  $nama_kategori, // Nama kategori
            'konfig'        =>  $konfig, // Data konfigurasi
            'kategori'      =>  $kategori, // Data kategori
            'konten'        =>  $konten, // Data konten
        );

        $this->load->view('kategori', $data); // Memuat tampilan kategori dengan data yang telah disiapkan
    }

    public function artikel($id) // Metode untuk menampilkan detail artikel
    {
        // Mengambil data konfigurasi
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mendapatkan satu baris data konfigurasi

        // Mengambil data dari tabel 'kategori'
        $this->db->from('kategori'); 
        $kategori = $this->db->get()->result_array(); // Mendapatkan semua data kategori

        // Mengambil data konten berdasarkan slug
        $this->db->from('konten a'); 
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan tabel kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan tabel user
        $this->db->where('slug',$id); // Memfilter konten berdasarkan slug
        $konten = $this->db->get()->row(); // Mendapatkan satu baris data konten

        // Menyiapkan data untuk tampilan
        $data = array(
            'judul'     =>  $konten->judul." | Hamz77", // Judul halaman dengan judul konten
            'konfig'    =>  $konfig, // Data konfigurasi
            'kategori'  =>  $kategori, // Data kategori
            'konten'    =>  $konten, // Data konten
        );

        $this->load->view('detail', $data); // Memuat tampilan detail dengan data yang telah disiapkan
    }
}
