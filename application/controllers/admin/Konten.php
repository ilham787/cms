<?php
defined('BASEPATH') or exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class Konten extends CI_Controller // Mendefinisikan kelas controller Konten yang mewarisi dari CI_Controller
{
    public function __construct() // Metode konstruktor untuk kelas
    {
        parent::__construct(); // Memanggil konstruktor induk
        // Memeriksa apakah level sesi pengguna null; jika ya, redirect ke halaman otentikasi
        if ($this->session->userdata('level') == NULL) {
            redirect('auth'); // Arahkan ke halaman auth jika pengguna belum terautentikasi
        }
    }

    public function index() // Metode untuk menampilkan halaman konten
    {
        $this->db->from('kategori'); // Mengambil data dari tabel 'kategori'
        $this->db->order_by('nama_kategori', 'ASC'); // Mengurutkan kategori berdasarkan nama kategori secara ascending
        $kategori = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array

        // Mengambil data konten dengan join
        $this->db->from('konten a'); // Mengambil data dari tabel 'konten'
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Menggabungkan tabel kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Menggabungkan tabel user
        $this->db->order_by('tanggal', 'ASC'); // Mengurutkan konten berdasarkan tanggal secara ascending
        $konten = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array
        
        // Menyiapkan data untuk diteruskan ke tampilan
        $data = array(
            'judul_halaman' => 'Halaman Konten', // Judul halaman
            'kategori'      => $kategori, // Data kategori
            'konten'        => $konten // Data konten
        );
        // Memuat template dan tampilan konten dengan data yang disiapkan
        $this->template->load('template_admin', 'admin/konten_index', $data);
    }

    public function simpan() // Metode untuk menyimpan konten baru
    {
        $namafoto = date('YmdHis') . '.jpg'; // Menghasilkan nama file foto berdasarkan waktu saat ini
        $config['upload_path']      = 'assets/upload/konten'; // Menentukan path upload foto
        $config['max_size'] = 500 * 1024; // 500 Kb
        $config['file_name']        = $namafoto; // Menentukan nama file foto
        $config['allowed_types']    = '*'; // Mengizinkan semua jenis file
        
        $this->load->library('upload', $config); // Memuat library upload dengan konfigurasi yang ditentukan
        
        // Memeriksa ukuran foto yang diupload
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            // Menetapkan pesan flash jika ukuran foto terlalu besar
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 Kb. 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/konten'); // Redirect kembali ke halaman konten
        } elseif (!$this->upload->do_upload('foto')) { // Jika upload gagal
            $error = array('error' => $this->upload->display_errors()); // Simpan pesan kesalahan
        } else {
            $data = array('upload_data' => $this->upload->data()); // Ambil data upload
        }

        // Memeriksa apakah judul konten sudah ada
        $this->db->from('konten'); // Mengambil data dari tabel 'konten'
        $this->db->where('judul', $this->input->post('judul')); // Mencari konten berdasarkan judul yang diinput
        $cek = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array
        
        // Jika judul konten sudah ada
        if ($cek <> NULL) {
            // Menetapkan pesan flash jika judul konten sudah ada
            $this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Judul konten sudah ada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/konten'); // Redirect kembali ke halaman konten
        }

        // Menyiapkan data untuk dimasukkan ke dalam database
        $data = array(
            'judul'     => $this->input->post('judul'), // Mengambil judul konten dari permintaan POST
            'id_kategori'     => $this->input->post('id_kategori'), // Mengambil ID kategori dari permintaan POST
            'keterangan'     => $this->input->post('keterangan'), // Mengambil keterangan dari permintaan POST
            'tanggal'        => date('Y-m-d'), // Mengambil tanggal saat ini
            'foto'           => $namafoto, // Menyimpan nama foto
            'username'        => $this->session->userdata('username'), // Mengambil username dari sesi
            'slug'     => str_replace(' ', '-', $this->input->post('judul')), // Membuat slug dari judul konten
        );

        $this->db->insert('konten', $data); // Menyisipkan data ke tabel 'konten'
        
        // Menetapkan pesan flash sukses
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan konten.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten'); // Redirect ke halaman konten
    }

    public function update() // Metode untuk memperbarui konten
    {
        $namafoto = $this->input->post('nama_foto'); // Mengambil nama foto dari input
        $config['upload_path']      = 'assets/upload/konten'; // Menentukan path upload foto
        $config['max_size'] = 500 * 1024; // 500 Kb
        $config['file_name']        = $namafoto; // Menentukan nama file foto
        $config['overwrite']        = true; // Mengizinkan penimpaan file yang ada
        $config['allowed_types']    = '*'; // Mengizinkan semua jenis file
        
        $this->load->library('upload', $config); // Memuat library upload dengan konfigurasi yang ditentukan
        
        // Memeriksa ukuran foto yang diupload
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            // Menetapkan pesan flash jika ukuran foto terlalu besar
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 Kb. 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/konten'); // Redirect kembali ke halaman konten
        } elseif (!$this->upload->do_upload('foto')) { // Jika upload gagal
            $error = array('error' => $this->upload->display_errors()); // Simpan pesan kesalahan
        } else {
            $data = array('upload_data' => $this->upload->data()); // Ambil data upload
        }

        // Menyiapkan data untuk diperbarui
        $data = array(
            'judul'     => $this->input->post('judul'), // Mengambil judul dari permintaan POST
            'id_kategori'     => $this->input->post('id_kategori'), // Mengambil ID kategori dari permintaan POST
            'keterangan'     => $this->input->post('keterangan'), // Mengambil keterangan dari permintaan POST
            'slug'     => str_replace(' ', '-', $this->input->post('judul')), // Membuat slug dari judul konten
        );

        // Menyiapkan kondisi untuk memperbarui data
        $where = array(
            'foto'      => $this->input->post('nama_foto') // Mencocokkan nama foto yang ada
        );

        $this->db->update('konten', $data, $where); // Memperbarui record dalam tabel 'konten'
        
        // Menetapkan pesan flash sukses untuk pembaruan
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui konten.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten'); // Redirect ke halaman konten
    }

    public function delete_data($id) // Metode untuk menghapus konten
    {
        $filename = FCPATH . '/assets/upload/konten/' . $id; // Menentukan path file foto
        // Memeriksa apakah file foto ada
        if (file_exists($filename)) {
            unlink("./assets/upload/konten/" . $id); // Menghapus file foto
        }

        // Menyiapkan kondisi untuk menghapus data
        $where = array(
            'foto'   => $id // Mencocokkan nama foto untuk dihapus
        );
        
        $this->db->delete('konten', $where); // Menghapus record dari tabel 'konten'
        
        // Menetapkan pesan flash sukses untuk penghapusan
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menghapus konten.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/konten'); // Redirect ke halaman konten
    }
}
