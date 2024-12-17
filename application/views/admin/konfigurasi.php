<div id="ngilang"> <!-- Div untuk menampilkan alert atau pesan -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session, jika ada -->
</div>
<form action="<?= base_url('admin/konfigurasi/update') ?>" method="post"> <!-- Form untuk memperbarui konfigurasi website -->
    <div class="modal-content"> <!-- Konten modal -->
        <div class="modal-header"> <!-- Header modal -->
            <h5 class="modal-title mb-4" id="modalCenterTitle">Konfigurasi</h5> <!-- Judul modal -->
        </div>
        <div class="modal-body"> <!-- Bagian isi modal -->
            <div class="row"> <!-- Baris untuk layout -->
                <div class="col mb-3"> <!-- Kolom untuk input judul website -->
                    <label class="form-label">Judul Website</label> <!-- Label untuk input judul -->
                    <input type="text" class="form-control" name="judul" value="<?= $konfig->judul_website; ?>" /> <!-- Input untuk judul website, dengan nilai awal dari konfigurasi yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Baris untuk input profil website -->
                <div class="col mb-3"> <!-- Kolom untuk input profil -->
                    <label class="form-label">Profile</label> <!-- Label untuk input profil -->
                    <textarea name="profil_website" class="form-control"><?= $konfig->profil_website; ?></textarea> <!-- Textarea untuk profil website, dengan nilai awal dari konfigurasi yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Baris untuk input Facebook -->
                <div class="col mb-3"> <!-- Kolom untuk input Facebook -->
                    <label class="form-label">Facebook</label> <!-- Label untuk input Facebook -->
                    <input type="text" class="form-control" name="facebook" value="<?= $konfig->facebook; ?>" /> <!-- Input untuk link Facebook, dengan nilai awal dari konfigurasi yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Baris untuk input Instagram -->
                <div class="col mb-3"> <!-- Kolom untuk input Instagram -->
                    <label class="form-label">Instagram</label> <!-- Label untuk input Instagram -->
                    <input type="text" class="form-control" name="instagram" value="<?= $konfig->instagram; ?>" /> <!-- Input untuk link Instagram, dengan nilai awal dari konfigurasi yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Baris untuk input Email -->
                <div class="col mb-3"> <!-- Kolom untuk input Email -->
                    <label class="form-label">Email</label> <!-- Label untuk input Email -->
                    <input type="email" class="form-control" name="email" value="<?= $konfig->email; ?>" /> <!-- Input untuk Email, dengan nilai awal dari konfigurasi yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Baris untuk input Alamat -->
                <div class="col mb-3"> <!-- Kolom untuk input Alamat -->
                    <label class="form-label">Alamat</label> <!-- Label untuk input Alamat -->
                    <input type="text" class="form-control" name="alamat" value="<?= $konfig->alamat; ?>" /> <!-- Input untuk alamat, dengan nilai awal dari konfigurasi yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Baris untuk input WhatsApp -->
                <div class="col mb-3"> <!-- Kolom untuk input WhatsApp -->
                    <label class="form-label">Whatapp</label> <!-- Label untuk input WhatsApp -->
                    <input type="text" class="form-control" name="no_wa" value="<?= $konfig->no_wa; ?>" /> <!-- Input untuk nomor WhatsApp, dengan nilai awal dari konfigurasi yang ada -->
                </div>
            </div>
            <div class="modal-footer"> <!-- Bagian footer modal -->
                <button button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan perubahan konfigurasi -->
            </div>
        </div>
</form>
