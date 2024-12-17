<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // Mencegah akses langsung ke file jika bukan bagian dari framework CodeIgniter

class User_model extends CI_Model { // Mendefinisikan kelas model User_model yang mewarisi dari CI_Model

    public function simpan() // Metode untuk menyimpan data pengguna baru
    {
        // Menyiapkan data untuk disimpan ke dalam tabel 'user'
        $data = array(
            'nama'      => $this->input->post('nama'), // Mengambil nama dari input form
            'username'  => $this->input->post('username'), // Mengambil username dari input form
            'password'  => md5($this->input->post('password')), // Mengambil dan mengenkripsi password dengan MD5
            'level'     => $this->input->post('level'), // Mengambil level pengguna dari input form
        );

        $this->db->insert('user', $data); // Menyimpan data ke dalam tabel 'user'
    }

    public function update() // Metode untuk memperbarui data pengguna yang sudah ada
    {
        // Menyiapkan kondisi untuk menemukan pengguna berdasarkan id_user
        $where = array(
            'id_user'   => $this->input->post('id_user') // Mengambil id_user dari input form
        );
        // Menyiapkan data yang akan diperbarui
        $data = array(
            'nama'      => $this->input->post('nama') // Mengambil nama baru dari input form
        );
        $this->db->update('user', $data, $where); // Memperbarui data pengguna dalam tabel 'user' berdasarkan kondisi yang ditentukan
    }

	public function register()
	{
		$data = array(
			'nama'     => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'level'    => 'Kontributor', // Set default level to 'kontributor'
		);

		$this->db->insert('user', $data);
	}
}

