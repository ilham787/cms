<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class User extends CI_Controller { // Mendefinisikan kelas controller User yang mewarisi dari CI_Controller
    public function __construct(){ // Metode konstruktor untuk kelas
        parent::__construct(); // Memanggil konstruktor induk
        $this->load->model('User_model'); // Memuat model User_model untuk berinteraksi dengan data pengguna
        // Memeriksa apakah level sesi pengguna bukan 'Admin'; jika ya, redirect ke halaman otentikasi
        if($this->session->userdata('level')<>'Admin'){
            redirect('auth'); // Arahkan ke halaman auth jika pengguna bukan admin
        }
    }

    public function index() // Metode untuk menampilkan daftar pengguna
    {
        $this->db->from('user'); // Mengambil data dari tabel 'user'
        $this->db->order_by('nama', 'ASC'); // Mengurutkan pengguna berdasarkan nama secara ascending
        $user = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array
        
        // Menyiapkan data untuk diteruskan ke tampilan
        $data = array(
            'judul_halaman' => 'Data Pengguna', // Judul halaman
            'user'          => $user // Data pengguna
        );
        // Memuat template dan tampilan pengguna dengan data yang disiapkan
        $this->template->load('template_admin', 'admin/user_index', $data);
    }

    public function simpan() // Metode untuk menyimpan pengguna baru
    {
        // Memeriksa apakah username sudah ada
        $this->db->from('user'); // Mengambil data dari tabel 'user'
        $this->db->where('username',$this->input->post('username')); // Mencari pengguna berdasarkan username
        $cek = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array
        
        // Jika username sudah ada
        if($cek<>NULL){
            // Menetapkan pesan flash jika username sudah ada
            $this->session->set_flashdata('alert','
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Username sudah ada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/user'); // Redirect kembali ke halaman pengguna
        }
        
        // Memanggil metode simpan dari User_model untuk menyimpan data pengguna baru
        $this->User_model->simpan();
        
        // Menetapkan pesan flash sukses
        $this->session->set_flashdata('alert','
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/user'); // Redirect ke halaman pengguna
    }

    public function delete_data($id) // Metode untuk menghapus pengguna
    {
        // Menyiapkan kondisi untuk menghapus data
        $where = array(
            'id_user'   => $id // Mencocokkan id_user untuk dihapus
        );
        
        $this->db->delete('user',$where); // Menghapus record dari tabel 'user'
        
        // Menetapkan pesan flash sukses untuk penghapusan
        $this->session->set_flashdata('alert','
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menghapus user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/user'); // Redirect ke halaman pengguna
    }

    public function update() // Metode untuk memperbarui data pengguna
    {
        $this->User_model->update(); // Memanggil metode update dari User_model
        
        // Menetapkan pesan flash sukses untuk pembaruan
        $this->session->set_flashdata('alert','
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        redirect('admin/user'); // Redirect ke halaman pengguna
    }
}
