<div id="ngilang"> <!-- Div untuk menampilkan alert atau pesan -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session, jika ada -->
</div>
<div class="col-xl-12"> <!-- Div kolom untuk konten utama -->
    <div class="card"> <!-- Membuat card untuk form input -->
        <form action="<?= base_url('admin/caraousel/simpan') ?>" method="post" enctype='multipart/form-data'> <!-- Form untuk mengupload foto -->
            <h5 class="card-header">File input</h5> <!-- Judul card -->
            <div class="card-body"> <!-- Bagian dalam card untuk input -->
                <div class="col mb-3"> <!-- Div untuk kolom input judul -->
                    <label class="form-label">Judul</label> <!-- Label untuk input judul -->
                    <input type="text" class="form-control" placeholder="Judul Foto" name="judul" required /> <!-- Input untuk judul foto, wajib diisi -->
                </div>
                <div class="mb-3"> <!-- Div untuk input foto -->
                    <label for="formFile" class="form-label">Pilih Foto dengan ukuran (1:3)</label> <!-- Label untuk input foto -->
                    <input class="form-control" type="file" name="foto"> <!-- Input untuk memilih file foto -->
                </div>
            </div>
            <div class="modal-footer col-sm-12 d-flex justify-content-end"> <!-- Bagian footer modal untuk tombol -->
                <button type="submit" class="btn btn-primary me-4 mb-4">Simpan</button> <!-- Tombol untuk menyimpan data -->
            </div>
        </form>
    </div>
</div>
<?php foreach ($caraousel as $aa) { ?> <!-- Looping untuk setiap item dalam array $caraousel -->
    <div class="card">
        <div class="card-content">
            <img class="card-img-top img-fluid" src="<?= base_url('assets/upload/caraousel/' . $aa['foto']) ?>">
            <div class="card-body">
                <h4 class="card-title"><?= $aa['judul'] ?></h4>
                <a href="<?php echo site_url('admin/caraousel/delete_data/' . $aa['foto']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol untuk menghapus foto, dengan konfirmasi -->
                    <span><i class="bi bi-trash"></i></span> <!-- Ikon untuk tombol hapus -->
                </a>
            </div>
        </div>
    </div>
<?php } ?> <!-- Akhir dari looping -->