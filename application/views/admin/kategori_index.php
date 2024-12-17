<div id="ngilang"> <!-- Div untuk menampilkan alert atau pesan -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session, jika ada -->
</div>
<div class="col-lg-12 col-md-12"> <!-- Div kolom untuk konten utama -->
    <div class="mt-1 mb-3"> <!-- Div untuk margin atas dan bawah -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> <!-- Tombol untuk membuka modal tambah kategori -->
            Tambah Kategori
        </button>

        <!-- Modal Tambah Kategori -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"> <!-- Modal untuk menambahkan kategori -->
            <div class="modal-dialog modal-lg" role="document"> <!-- Dialog modal dengan ukuran besar -->
                <form action="<?= base_url('admin/kategori/simpan') ?>" method="post"> <!-- Form untuk menyimpan kategori -->
                    <div class="modal-content"> <!-- Konten modal -->
                        <div class="modal-header"> <!-- Header modal -->
                            <h5 class="modal-title" id="modalCenterTitle">Tambah Kategori</h5> <!-- Judul modal -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
                        </div>
                        <div class="modal-body"> <!-- Bagian isi modal -->
                            <div class="row"> <!-- Baris untuk layout -->
                                <div class="col mb-3"> <!-- Kolom untuk input nama kategori -->
                                    <label class="form-label">Nama Kategori</label> <!-- Label untuk input nama kategori -->
                                    <input type="text" class="form-control" placeholder="Nama kategori" name="nama_kategori" required /> <!-- Input untuk nama kategori, wajib diisi -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"> <!-- Bagian footer modal -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol untuk menutup modal -->
                            <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan kategori -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Kategori Konten -->
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Kategori Konten</h4>
    </div>
    <div class="card-content">
        <!-- table striped -->
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th> <!-- Kolom nomor -->
                        <th>Nama Kategori Konten</th> <!-- Kolom nama kategori -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $aa) { ?>
                        <tr>
                            <td><?= $no ?></td> <!-- Menampilkan nomor urut -->
                            <td><?= $aa['nama_kategori'] ?></td> <!-- Menampilkan nama kategori -->
                            <td> <!-- Kolom untuk aksi -->
                                <!-- Tombol Hapus -->
                                <a href="<?php echo site_url('admin/kategori/delete_data/' . $aa['id_kategori']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol untuk menghapus kategori dengan konfirmasi -->
                                    <span><i class="bi bi-trash"></i></span> <!-- Ikon untuk tombol hapus -->
                                </a>

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $aa['id_kategori'] ?>"> <!-- Tombol untuk membuka modal edit kategori -->
                                    <span><i class="bi bi-pencil-square"></i></span> <!-- Ikon untuk tombol edit -->
                                </button>

                                <!-- Modal Edit Kategori -->
                                <div class="modal fade" id="edit<?= $aa['id_kategori'] ?>" tabindex="-1" aria-hidden="true"> <!-- Modal untuk edit kategori -->
                                    <div class="modal-dialog modal-md" role="document"> <!-- Dialog modal dengan ukuran sedang -->
                                        <form action="<?= base_url('admin/kategori/update') ?>" method="post"> <!-- Form untuk memperbarui kategori -->
                                            <input type="hidden" name="id_kategori" value="<?= $aa['id_kategori'] ?>"> <!-- Input tersembunyi untuk ID kategori -->
                                            <div class="modal-content"> <!-- Konten modal -->
                                                <div class="modal-header"> <!-- Header modal -->
                                                    <h5 class="modal-title" id="modalCenterTitle">Perbarui Kategori</h5> <!-- Judul modal -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
                                                </div>
                                                <div class="modal-body"> <!-- Bagian isi modal -->
                                                    <div class="row"> <!-- Baris untuk layout -->
                                                        <div class="col mb-3"> <!-- Kolom untuk input nama kategori -->
                                                            <label class="form-label">Nama Kategori Konten</label> <!-- Label untuk input nama kategori -->
                                                            <input type="text" class="form-control" value="<?= $aa['nama_kategori'] ?>" name="nama_kategori" /> <!-- Input untuk nama kategori, dengan nilai awal dari kategori yang ada -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer"> <!-- Bagian footer modal -->
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol untuk menutup modal -->
                                                    <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan perubahan kategori -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- Akhiri modal -->
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>