<div id="ngilang"> <!-- Div untuk menampilkan alert atau pesan -->
	<?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session, jika ada -->
</div>
<div class="col-lg-12 col-md-12"> <!-- Kolom untuk tampilan konten -->
	<div class="mt-1 mb-3"> <!-- Margin atas dan bawah untuk spasi -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> <!-- Tombol untuk membuka modal tambah konten -->
			Tambah User
		</button>

		<!-- Modal untuk tambah konten -->
		<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"> <!-- Modal dialog -->
			<div class="modal-dialog modal-lg" role="document"> <!-- Dialog modal dengan ukuran besar -->
				<form action="<?= base_url('admin/user/simpan') ?>" method="post" enctype='multipart/form-data'> <!-- Form untuk menyimpan konten -->
					<div class="modal-content"> <!-- Konten modal -->
						<div class="modal-header"> <!-- Header modal -->
							<h5 class="modal-title" id="modalCenterTitle">Tambah User</h5> <!-- Judul modal -->
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
						</div>
						<div class="modal-body"> <!-- Bagian isi modal -->
							<div class="row"> <!-- Baris untuk layout -->
								<div class="col mb-3"> <!-- Kolom untuk input nama -->
									<label class="form-label">Nama</label> <!-- Label untuk input nama -->
									<input type="text" class="form-control" placeholder="Nama" name="nama" required /> <!-- Input untuk nama, wajib diisi -->
								</div>
							</div>
							<div class="row"> <!-- Baris untuk input username -->
								<div class="col mb-3"> <!-- Kolom untuk input username -->
									<label class="form-label">Username</label> <!-- Label untuk input username -->
									<input type="text" class="form-control" placeholder="Username" name="username" required /> <!-- Input untuk username, wajib diisi -->
								</div>
							</div>
							<div class="row"> <!-- Baris untuk input password -->
								<div class="col mb-3"> <!-- Kolom untuk input password -->
									<label class="form-label">Password</label> <!-- Label untuk input password -->
									<input type="password" class="form-control" placeholder="Password" name="password" required /> <!-- Input untuk password, wajib diisi -->
								</div>
							</div>
							<div class="row"> <!-- Baris untuk memilih level user -->
								<div class="col mb-3"> <!-- Kolom untuk input level -->
									<label class="form-label">Level</label> <!-- Label untuk input level -->
									<select name="level" class="form-control"> <!-- Dropdown untuk memilih level user -->
										<option value="Admin">Admin</option> <!-- Opsi untuk level admin -->
										<option value="Kontributor">Kontributor</option> <!-- Opsi untuk level kontributor -->
									</select>
								</div>
							</div>
						</div>
						<div class="modal-footer"> <!-- Bagian footer modal -->
							<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> <!-- Tombol untuk menutup modal -->
								Close
							</button>
							<button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan user -->
						</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h4 class="card-title">Data Pengguna</h4>
	</div>
	<div class="card-content">
		<!-- table striped -->
		<div class="table-responsive">
			<table class="table table-striped mb-0">
				<thead>
					<tr>
						<th>Username</th>
						<th>Nama</th>
						<th>Level</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($user as $aa) { ?>
						<tr>
							<td><?= $aa['username'] ?></td>
							<td><?= $aa['nama'] ?></td>
							<td><?= $aa['level'] ?></td>
							<td> <!-- Kolom aksi -->
								<a href="<?php echo site_url('admin/user/delete_data/' . $aa['id_user']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol untuk menghapus pengguna -->
									<span><i class="bi bi-trash"></i></span> <!-- Ikon hapus -->
								</a>
								<button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $aa['id_user'] ?>"> <!-- Tombol untuk membuka modal edit pengguna -->
									<span><i class="bi bi-pencil-square"></i></span> <!-- Ikon edit -->
								</button>
								<div class="modal fade" id="edit<?= $aa['id_user'] ?>" tabindex="-1" aria-hidden="true"> <!-- Modal untuk edit pengguna -->
									<div class="modal-dialog modal-md" role="document"> <!-- Dialog modal dengan ukuran sedang -->
										<form action="<?= base_url('admin/user/update') ?>" method="post"> <!-- Form untuk memperbarui pengguna -->
											<input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>"> <!-- Input hidden untuk ID pengguna -->
											<div class="modal-content"> <!-- Konten modal -->
												<div class="modal-header"> <!-- Header modal -->
													<h5 class="modal-title" id="modalCenterTitle">Perbarui Nama User</h5> <!-- Judul modal -->
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol untuk menutup modal -->
												</div>
												<div class="modal-body"> <!-- Bagian isi modal -->
													<div class="row"> <!-- Baris untuk input nama -->
														<div class="col mb-3"> <!-- Kolom untuk input nama -->
															<label class="form-label">Nama</label> <!-- Label untuk input nama -->
															<input type="text" class="form-control" value="<?= $aa['nama'] ?>" name="nama" /> <!-- Input untuk nama dengan nilai awal -->
														</div>
													</div>
													<div class="row"> <!-- Baris untuk input username -->
														<div class="col mb-3"> <!-- Kolom untuk input username -->
															<label class="form-label">Username</label> <!-- Label untuk input username -->
															<input type="text" class="form-control" value="<?= $aa['username'] ?>" name="username" readonly /> <!-- Input untuk username, tidak dapat diedit -->
														</div>
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
					<?php } ?>
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
