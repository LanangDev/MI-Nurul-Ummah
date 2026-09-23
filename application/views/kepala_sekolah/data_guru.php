<style>
    :root {
        --hijau-nu: #0B6E4F;
        --hijau-nu-tua: #0A5A40;
        --hijau-nu-muda: #E8F5EE;
    }

    .guru-card {
        border: none;
        border-radius: 14px;
        overflow: hidden;
        transition: transform .18s ease, box-shadow .18s ease;
        box-shadow: 0 2px 8px rgba(15, 40, 30, 0.08);
        background: #ffffff;
    }

    .guru-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(11, 110, 79, 0.16);
    }

    /* PERBAIKAN: Tinggi header dinaikkan agar proporsional */
    .guru-card-top {
        background: linear-gradient(135deg, var(--hijau-nu) 0%, var(--hijau-nu-tua) 100%);
        height: 70px;
        position: relative;
    }

    /* PERBAIKAN: Margin-top disesuaikan agar foto berada pas di tengah garis perbatasan */
    .guru-avatar-wrap {
        margin-top: -42px;
        display: flex;
        justify-content: center;
        position: relative;
        z-index: 2;
    }

    .guru-avatar {
        width: 84px;
        height: 84px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.12);
        background: #ffffff;
    }

    .guru-nama {
        font-weight: 600;
        font-size: 1rem;
        color: #1e2a25;
        margin-bottom: 2px;
    }

    .guru-jabatan {
        font-size: 0.78rem;
        color: var(--hijau-nu);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: .03em;
        margin-bottom: 12px;
    }

    .guru-info-list {
        text-align: left;
        font-size: 0.8rem;
        color: #5a6b64;
        padding: 0 4px;
    }

    .guru-info-list .info-row {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 6px;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .guru-info-list .info-row i {
        color: var(--hijau-nu);
        font-size: 0.85rem;
        width: 16px;
        height: 16px;
        line-height: 16px;
        text-align: center;
        flex: 0 0 16px;
        display: inline-block;
    }

    .guru-info-list .info-row span {
        line-height: 1.2;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .guru-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        letter-spacing: .02em;
        line-height: 1;
    }

    .guru-badge i {
        line-height: 1;
    }

    .guru-badge-aktif {
        background: var(--hijau-nu-muda);
        color: var(--hijau-nu-tua);
    }

    .guru-badge-nonaktif {
        background: #f1f1f1;
        color: #888;
    }

    .guru-card-footer {
        border-top: 1px solid #f0f0f0;
        background: #fafcfb;
    }

    .guru-card-footer .btn {
        border-radius: 8px;
        padding: 4px 10px;
    }

    .guru-card-footer .btn-edit-guru {
        border: 1px solid var(--hijau-nu);
        color: var(--hijau-nu);
        background: transparent;
    }

    .guru-card-footer .btn-edit-guru:hover {
        background: var(--hijau-nu);
        color: #ffffff;
    }

    .guru-card-footer .btn-hapus-guru {
        border: 1px solid #d64545;
        color: #d64545;
        background: transparent;
    }

    .guru-card-footer .btn-hapus-guru:hover {
        background: #d64545;
        color: #ffffff;
    }

    .guru-empty {
        text-align: center;
        padding: 48px 16px;
        color: #8a988f;
    }

    .guru-empty i {
        font-size: 2.5rem;
        color: var(--hijau-nu-muda);
        margin-bottom: 12px;
        display: block;
    }
	.btn-primary{
		background-color: var(--hijau-nu) !important;
		color: #ffffff !important;
		border-color: var(--hijau-nu) !important;
	}
	.btn-primary:hover{
		background-color: var(--hijau-nu-tua) !important;
		color: #ffffff !important;
		border-color: var(--hijau-nu-tua) !important;
	}
</style>
<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between align-items-center mb-4">
				<div>
					<h4 class="card-title mb-0">Data Guru</h4>
					<p class="text-muted mb-0" style="font-size: 0.82rem;">
						<?= count($guru) ?> guru terdaftar
					</p>
				</div>
				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
					data-target="#TambahGuruModal">
					<i class="mdi mdi-plus menu-icon"></i> Tambah Guru
				</button>
			</div>

			<?php if (empty($guru)): ?>
				<div class="guru-empty">
					<i class="mdi mdi-account-search"></i>
					Belum ada data guru. Klik "Tambah Guru" untuk menambahkan.
				</div>
			<?php else: ?>
			<div class="row">
				<?php foreach($guru as $row){
					$is_aktif = (strtolower($row['status']) == 'aktif');
					$punya_foto = !empty($row['foto']);
					$inisial = '';
					if (!$punya_foto) {
						$kata = explode(' ', trim($row['nama_guru']));
						$inisial = strtoupper(substr($kata[0], 0, 1) . (isset($kata[1]) ? substr($kata[1], 0, 1) : ''));
					}
				?>
				<div class="col-md-4 col-lg-3 mb-4">
					<div class="card guru-card h-100">
						<div class="guru-card-top"></div>
						<div class="guru-avatar-wrap">
							<?php if ($punya_foto): ?>
								<img src="<?= base_url('upload/foto_guru/' . $row['foto']) ?>"
									alt="<?= htmlspecialchars($row['nama_guru']) ?>" class="guru-avatar">
							<?php else: ?>
								<div class="guru-avatar-fallback"><?= $inisial ?: '?' ?></div>
							<?php endif; ?>
						</div>
						<div class="card-body text-center pt-2 pb-3">
							<div class="guru-nama"><?= htmlspecialchars($row['nama_guru']) ?></div>
							<div class="guru-jabatan"><?= htmlspecialchars($row['jabatan'] ?: 'Guru') ?></div>

							<div class="guru-info-list mb-3">
								<div class="info-row" title="NIP">
									<i class="mdi mdi-account-card-details-outline"></i>
									<span>NIP: <?= htmlspecialchars($row['nip'] ?: '-') ?></span>
								</div>
								<div class="info-row" title="NUPTK">
									<i class="mdi mdi-numeric"></i>
									<span>NUPTK: <?= htmlspecialchars($row['nuptk'] ?: '-') ?></span>
								</div>
								<div class="info-row" title="Mata Pelajaran">
									<i class="mdi mdi-book-open-variant"></i>
									<span><?= htmlspecialchars($row['mata_pelajaran'] ?: '-') ?></span>
								</div>
							</div>

							<span class="guru-badge <?= $is_aktif ? 'guru-badge-aktif' : 'guru-badge-nonaktif' ?>">
								<i class="mdi <?= $is_aktif ? 'mdi-check-circle' : 'mdi-close-circle' ?>" style="font-size: 0.75rem;"></i>
								<?= htmlspecialchars($row['status']) ?>
							</span>
						</div>
						<div class="card-footer guru-card-footer text-center py-2">
							<button type="button" class="btn btn-edit-guru btn-sm mr-1" data-toggle="modal"
								data-target="#editModal<?= $row['id_guru'] ?>" title="Edit">
								<i class="mdi mdi-pencil"></i>
							</button>
							<a href="<?= base_url('Kepala_Sekolah/data_guru/hapus/' . $row['id_guru']) ?>"
								class="btn btn-hapus-guru btn-sm" title="Hapus"
								onclick="return confirm('Yakin ingin menghapus data guru ini?')">
								<i class="mdi mdi-delete"></i>
							</a>
						</div>
					</div>
				</div>

				<!-- Modal Edit per guru -->
				<div class="modal fade" id="editModal<?= $row['id_guru'] ?>" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<form action="<?= base_url('Kepala_Sekolah/data_guru/update') ?>"
								method="post" enctype="multipart/form-data">
								<div class="modal-header">
									<h5 class="modal-title">Edit Data Guru</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<input type="hidden" name="id_guru" value="<?= $row['id_guru'] ?>">
									<div class="row">
										<div class="col-md-6 mb-3">
											<label class="form-label">Nama Guru</label>
											<input type="text" name="nama_guru" class="form-control"
												value="<?= htmlspecialchars($row['nama_guru']) ?>" required>
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">NIP</label>
											<input type="text" name="nip" class="form-control"
												value="<?= htmlspecialchars($row['nip']) ?>">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">NUPTK</label>
											<input type="text" name="nuptk" class="form-control"
												value="<?= htmlspecialchars($row['nuptk']) ?>">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Jenis Kelamin</label>
											<select name="jenis_kelamin" class="form-control" required>
												<option value="Laki-laki" <?= $row['jenis_kelamin']=='Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
												<option value="Perempuan" <?= $row['jenis_kelamin']=='Perempuan' ? 'selected' : '' ?>>Perempuan</option>
											</select>
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Jabatan</label>
											<input type="text" name="jabatan" class="form-control"
												value="<?= htmlspecialchars($row['jabatan']) ?>">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Mata Pelajaran</label>
											<input type="text" name="mata_pelajaran" class="form-control"
												value="<?= htmlspecialchars($row['mata_pelajaran']) ?>">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Pendidikan Terakhir</label>
											<input type="text" name="pendidikan_terakhir" class="form-control"
												value="<?= htmlspecialchars($row['pendidikan_terakhir']) ?>">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Status Kepegawaian</label>
											<input type="text" name="status_kepegawaian" class="form-control"
												value="<?= htmlspecialchars($row['status_kepegawaian']) ?>">
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Status</label>
											<select name="status" class="form-control" required>
												<option value="Aktif" <?= $row['status']=='Aktif' ? 'selected' : '' ?>>Aktif</option>
												<option value="Tidak Aktif" <?= $row['status']=='Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
											</select>
										</div>
										<div class="col-md-6 mb-3">
											<label class="form-label">Foto</label>
											<input type="file" name="foto" class="form-control">
											<small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
									<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php endif; ?>
		</div>

		<!-- Modal Tambah Guru -->
		<div class="modal fade" id="TambahGuruModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form action="<?= base_url('Kepala_Sekolah/data_guru/simpan') ?>" method="post"
						enctype="multipart/form-data">
						<div class="modal-header">
							<h5 class="modal-title">Tambah Guru</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6 mb-3">
									<label class="form-label">Nama Guru</label>
									<input type="text" name="nama_guru" class="form-control" required>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">NIP</label>
									<input type="text" name="nip" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">NUPTK</label>
									<input type="text" name="nuptk" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Jenis Kelamin</label>
									<select name="jenis_kelamin" class="form-control" required>
										<option value="">-- Pilih --</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Jabatan</label>
									<input type="text" name="jabatan" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Mata Pelajaran</label>
									<input type="text" name="mata_pelajaran" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Pendidikan Terakhir</label>
									<input type="text" name="pendidikan_terakhir" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Status Kepegawaian</label>
									<input type="text" name="status_kepegawaian" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Status</label>
									<select name="status" class="form-control" required>
										<option value="Aktif" selected>Aktif</option>
										<option value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Foto</label>
									<input type="file" name="foto" class="form-control">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>