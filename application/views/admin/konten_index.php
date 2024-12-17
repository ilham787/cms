<div id="ngilang"> <!-- Div untuk menampilkan alert atau pesan -->
	<?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session, jika ada -->
</div>
<div class="col-lg-12 col-md-12"> <!-- Kolom untuk tampilan konten -->
	<div class="mt-1 mb-3"> <!-- Margin atas dan bawah untuk spasi -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> <!-- Tombol untuk membuka modal tambah konten -->
			Tambah Konten
		</button>

		<!-- Modal untuk tambah konten -->
		<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"> <!-- Modal dialog -->
			<div class="modal-dialog modal-lg" role="document"> <!-- Dialog modal dengan ukuran besar -->
				<form action="<?= base_url('admin/konten/simpan') ?>" method="post" enctype='multipart/form-data'> <!-- Form untuk menyimpan konten -->
					<div class="modal-content"> <!-- Konten modal -->
						<div class="modal-header"> <!-- Header modal -->
							<h5 class="modal-title" id="modalCenterTitle">Tambah Konten</h5> <!-- Judul modal -->
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
						</div>
						<div class="modal-body"> <!-- Bagian isi modal -->
							<div class="row"> <!-- Baris untuk layout -->
								<div class="col mb-3"> <!-- Kolom untuk input judul -->
									<label class="form-label">Judul</label> <!-- Label untuk input judul -->
									<input type="text" class="form-control" placeholder="Judul" name="judul" required /> <!-- Input untuk judul, wajib diisi -->
								</div>
							</div>
							<div class="row"> <!-- Baris untuk input kategori -->
								<div class="col mb-3"> <!-- Kolom untuk input kategori -->
									<label class="form-label">Kategori</label> <!-- Label untuk input kategori -->
									<select name="id_kategori" class="form-control"> <!-- Dropdown untuk memilih kategori -->
										<?php foreach ($kategori as $aa) { ?> <!-- Looping untuk menampilkan semua kategori -->
											<option value="<?= $aa['id_kategori'] ?>"><?= $aa['nama_kategori'] ?></option> <!-- Opsi kategori -->
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row"> <!-- Baris untuk input keterangan -->
								<div class="col mb-3"> <!-- Kolom untuk input keterangan -->
									<label class="form-label">Keterangan</label> <!-- Label untuk input keterangan -->
									<textarea name="keterangan" class="form-control"></textarea> <!-- Textarea untuk keterangan konten -->
								</div>
							</div>
							<div class="row"> <!-- Baris untuk input foto -->
								<div class="col mb-3"> <!-- Kolom untuk input foto -->
									<label class="form-label">foto</label> <!-- Label untuk input foto -->
									<input type="file" name="foto" class="form-control" accept="image/png, image/jpeg"> <!-- Input file untuk foto, hanya menerima gambar PNG dan JPEG -->
								</div>
							</div>
							<div class="modal-footer"> <!-- Bagian footer modal -->
								<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> <!-- Tombol untuk menutup modal -->
									Close
								</button>
								<button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan konten -->
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h4 class="card-title">Konten</h4>
	</div>
	<div class="card-content">
		<!-- table striped -->
		<div class="table-responsive">
			<table class="table table-striped mb-0">
				<thead>
					<tr>
						<th>No</th> <!-- Kolom nomor -->
						<th>Judul</th> <!-- Kolom judul -->
						<th>Kategori Konten</th> <!-- Kolom kategori konten -->
						<th>Tanggal</th> <!-- Kolom tanggal -->
						<th>Kreator</th> <!-- Kolom kreator -->
						<th>Foto</th> <!-- Kolom foto -->
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($konten as $aa) { ?>
						<tr>
							<td><?= $no ?></td> <!-- Menampilkan nomor urut -->
							<td><?= $aa['judul'] ?></td> <!-- Menampilkan judul konten -->
							<td><?= $aa['nama_kategori'] ?></td> <!-- Menampilkan kategori konten -->
							<td><?= $aa['tanggal'] ?></td> <!-- Menampilkan tanggal konten -->
							<td><?= $aa['nama'] ?></td> <!-- Menampilkan nama kreator -->
							<td> <!-- Kolom untuk menampilkan foto -->
								<!-- Button to trigger modal -->
								<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#fotoModal<?= $no ?>">
									<span class="bi bi-search"></span> Lihat Foto
								</button>

								<!-- Modal to display image -->
								<div class="modal fade" id="fotoModal<?= $no ?>" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Foto: <?= $aa['judul'] ?></h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<img src="<?= base_url('assets/upload/konten/' . $aa['foto']) ?>" class="img-fluid" alt="Foto <?= $aa['judul'] ?>">
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</td>
							<td> <!-- Kolom aksi -->
								<a href="<?php echo site_url('admin/konten/delete_data/' . $aa['foto']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol untuk menghapus konten -->
									<span><i class="bi bi-trash"></i></span> <!-- Ikon hapus -->
								</a>
								<button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#konten<?= $no ?>"> <!-- Tombol untuk membuka modal edit konten -->
									<span><i class="bi bi-pencil-square"></i></span> <!-- Ikon edit -->
								</button>
								<!-- Modal untuk edit konten -->
								<div class="modal fade" id="konten<?= $no ?>" tabindex="-1" aria-hidden="true"> <!-- Modal dialog untuk edit -->
									<div class="modal-dialog modal-lg" role="document"> <!-- Dialog modal dengan ukuran besar -->
										<form action="<?= base_url('admin/konten/update') ?>" method="post" enctype='multipart/form-data'> <!-- Form untuk memperbarui konten -->
											<input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>"> <!-- Input hidden untuk nama foto yang akan diperbarui -->
											<div class="modal-content"> <!-- Konten modal -->
												<div class="modal-header"> <!-- Header modal -->
													<h5 class="modal-title" id="modalCenterTitle"><?= $aa['judul'] ?></h5> <!-- Judul modal diisi dengan judul konten -->
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
												</div>
												<div class="modal-body"> <!-- Bagian isi modal -->
													<div class="row"> <!-- Baris untuk layout -->
														<div class="col mb-3"> <!-- Kolom untuk input judul -->
															<label class="form-label">Judul</label> <!-- Label untuk input judul -->
															<input type="text" class="form-control" value="<?= $aa['judul'] ?>" name="judul" /> <!-- Input untuk judul dengan nilai awal dari konten -->
														</div>
													</div>
													<div class="row"> <!-- Baris untuk input kategori -->
														<div class="col mb-3"> <!-- Kolom untuk input kategori -->
															<label class="form-label">Kategori</label> <!-- Label untuk input kategori -->
															<select name="id_kategori" class="form-control"> <!-- Dropdown untuk memilih kategori -->
																<?php foreach ($kategori as $uu) { ?> <!-- Looping untuk menampilkan semua kategori -->
																	<option <?php if ($uu['id_kategori'] == $aa['id_kategori']) {
																				echo "selected";
																			} ?> value="<?= $uu['id_kategori'] ?>"><?= $uu['nama_kategori'] ?></option> <!-- Opsi kategori, menandai yang dipilih -->
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="row"> <!-- Baris untuk input keterangan -->
														<div class="col mb-3"> <!-- Kolom untuk input keterangan -->
															<label class="form-label">Keterangan</label> <!-- Label untuk input keterangan -->
															<textarea name="keterangan" class="form-control"><?= $aa['keterangan'] ?> </textarea> <!-- Textarea untuk keterangan dengan nilai awal dari konten -->
														</div>
													</div>
													<div class="row"> <!-- Baris untuk input foto -->
														<div class="col mb-3"> <!-- Kolom untuk input foto -->
															<label class="form-label">foto</label> <!-- Label untuk input foto -->
															<input type="file" name="foto" class="form-control" accept="image/png, image/jpeg"> <!-- Input file untuk foto, hanya menerima gambar PNG dan JPEG -->
														</div>
													</div>
													<div class="modal-footer"> <!-- Bagian footer modal -->
														<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> <!-- Tombol untuk menutup modal -->
															Close
														</button>
														<button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan perubahan -->
													</div>
										</form>
									</div>
								</div>
							</td>
						</tr>
					<?php $no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script src="https://cdn.tiny.cloud/1/ci89906qqnu15v51qs80bi3iyiwv2w16iev3g7ifdy70gz6a/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	tinymce.init({
		selector: 'textarea',
		plugins: [
			// Core editing features
			'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
			// Your account includes a free trial of TinyMCE premium features
			// Try the most popular premium features until Dec 16, 2024:
			'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
			// Early access to document converters
			'importword', 'exportword', 'exportpdf'
		],
		toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
		tinycomments_mode: 'embedded',
		tinycomments_author: 'Author name',
		mergetags_list: [{
				value: 'First.Name',
				title: 'First Name'
			},
			{
				value: 'Email',
				title: 'Email'
			},
		],
		ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
	});
</script>
