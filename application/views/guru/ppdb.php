<style>
	:root {
		--hijau-nu: #0B6E4F;
		--hijau-nu-tua: #0A5A40;
		--hijau-nu-muda: #E8F5EE;
		--merah: #D64545
	}

	.ppdb-admin-card {
		border: 0;
		border-radius: 18px;
		overflow: hidden;
		background: #fff;
		box-shadow: 0 3px 14px rgba(15, 40, 30, .08);
		transition: .2s
	}

	.ppdb-admin-card:hover {
		transform: translateY(-3px);
		box-shadow: 0 12px 28px rgba(11, 110, 79, .12)
	}

	.ppdb-banner-wrap {
		height: 245px;
		background: #eef5f1;
		position: relative;
		overflow: hidden
	}

	.ppdb-banner {
		width: 100%;
		height: 100%;
		object-fit: cover
	}

	.ppdb-no-image {
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		color: #93a199;
		gap: 8px
	}

	.ppdb-no-image i {
		font-size: 48px;
		color: #b9d9c8
	}

	.ppdb-status {
		position: absolute;
		top: 14px;
		right: 14px;
		padding: 6px 12px;
		border-radius: 30px;
		font-size: 12px;
		font-weight: 700;
		background: #fff;
		box-shadow: 0 4px 12px rgba(0, 0, 0, .12)
	}

	.ppdb-status.buka {
		color: var(--hijau-nu)
	}

	.ppdb-status.tutup {
		color: var(--merah)
	}

	.ppdb-body {
		padding: 22px
	}

	.ppdb-title {
		color: #1e2a25;
		font-size: 1.05rem;
		font-weight: 700;
		margin-bottom: 5px
	}

	.ppdb-year {
		color: #65756d;
		font-size: .85rem;
		margin-bottom: 18px
	}

	.ppdb-actions {
		border-top: 1px solid #e8eeea;
		padding-top: 16px;
		display: flex;
		justify-content: space-between;
		align-items: center
	}

	.btn-edit-ppdb {
		border: 1px solid var(--hijau-nu);
		color: var(--hijau-nu);
		background: transparent;
		border-radius: 8px
	}

	.btn-edit-ppdb:hover {
		background: var(--hijau-nu);
		color: #fff
	}

	.btn-delete-ppdb {
		border: 1px solid var(--merah);
		color: var(--merah);
		background: transparent;
		border-radius: 8px
	}

	.btn-delete-ppdb:hover {
		background: var(--merah);
		color: #fff
	}

	.ppdb-empty {
		text-align: center;
		padding: 55px 20px;
		color: #8a988f
	}

	.ppdb-empty i {
		display: block;
		font-size: 48px;
		color: #b9d9c8;
		margin-bottom: 12px
	}

	.btn-primary {
		background-color: var(--hijau-nu) !important;
		color: #fff !important;
		border-color: var(--hijau-nu) !important
	}

	.btn-primary:hover {
		background-color: var(--hijau-nu-tua) !important;
		border-color: var(--hijau-nu-tua) !important
	}

	.ppdb-preview {
		width: 100%;
		height: 190px;
		object-fit: cover;
		border-radius: 10px;
		border: 1px solid #e8eeea
	}

	@media(max-width:767px) {
		.ppdb-banner-wrap {
			height: 210px
		}
	}
</style>

<div class="col-lg-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">

			<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
				<div>
					<h4 class="card-title mb-1">PPDB</h4>
					<p class="text-muted mb-0" style="font-size:.82rem;">Kelola foto/banner, nama, tahun ajaran, dan
						status PPDB.</p>
				</div>
				<button type="button" class="btn btn-primary btn-sm mt-2 mt-md-0" data-toggle="modal"
					data-target="#TambahPPDBModal">
					<i class="mdi mdi-plus menu-icon"></i> Tambah PPDB</button>
			</div>

			<?php if (empty($ppdb)): ?>
			<div class="ppdb-empty"><i class="mdi mdi-image-plus"></i><strong>Belum ada data PPDB</strong>
				<div class="mt-1">Klik "Tambah PPDB" untuk menambahkan banner PPDB.</div>
			</div>
			<?php else: ?>
			<div class="row">
				<?php $no=1; foreach($ppdb as $row): ?>
				<?php
                    $status=strtolower(trim($row['status']??'Tutup'));
                    $statusClass=$status==='buka'?'buka':'tutup';
                    ?>
				<div class="col-md-6 col-xl-4 mb-4">
					<div class="ppdb-admin-card h-100">
						<div class="ppdb-banner-wrap">
							<?php if(!empty($row['foto'])): ?>
							<img src="<?= base_url('upload/foto_ppdb/'.$row['foto']) ?>"
								alt="<?= htmlspecialchars($row['judul']??'PPDB') ?>" class="ppdb-banner">
							<?php else: ?>
							<div class="ppdb-no-image"><i class="mdi mdi-image-off-outline"></i><span>Belum ada foto
									PPDB</span></div>
							<?php endif; ?>
							<span class="ppdb-status <?= $statusClass ?>"><i
									class="mdi mdi-circle-small"></i><?= htmlspecialchars(ucwords($row['status']??'Tutup')) ?></span>
						</div>
						<div class="ppdb-body">
							<div class="ppdb-title">
								<?= htmlspecialchars($row['judul']??'Penerimaan Peserta Didik Baru') ?></div>
							<div class="ppdb-year"><i class="mdi mdi-calendar-outline mr-1"></i>Tahun Ajaran
								<?= htmlspecialchars($row['tahun_ajaran']) ?></div>
							<div class="ppdb-year"><i class="mdi mdi-calendar-outline mr-1"></i>Nomor Kordinator
								<?= htmlspecialchars($row['nomor_kordinator']) ?></div>
							<div class="ppdb-year"><i class="mdi mdi-calendar-outline mr-1"></i>Nama Kordinator
								<?= htmlspecialchars($row['nama_kordinator']) ?></div>
							<div class="ppdb-actions">
								<small class="text-muted font-weight-bold">#<?= $no++ ?></small>
								<div>
									<button type="button" class="btn btn-edit-ppdb btn-sm mr-1" data-toggle="modal"
										data-target="#editPPDBModal<?= $row['id_ppdb'] ?>" title="Edit PPDB"><i
											class="mdi mdi-pencil"></i></button>
									<a href="<?= base_url('Kepala_Sekolah/ppdb/hapus/'.$row['id_ppdb']) ?>"
										class="btn btn-delete-ppdb btn-sm" title="Hapus PPDB"
										onclick="return confirm('Yakin ingin menghapus data PPDB ini?')"><i
											class="mdi mdi-delete"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="editPPDBModal<?= $row['id_ppdb'] ?>" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<form action="<?= base_url('Kepala_Sekolah/ppdb/update/' . $row['id_ppdb']) ?>"
								method="post" enctype="multipart/form-data">
								<div class="modal-header">
									<h5 class="modal-title">Edit PPDB</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="mb-3">
										<label class="form-label">Nama PPDB</label>
										<input type="text" name="judul" class="form-control"
											value="<?= htmlspecialchars($row['judul']) ?>" required>
									</div>
									<div class="mb-3">
										<label class="form-label">Tahun Ajaran</label>
										<input type="text" name="tahun_ajaran" class="form-control"
											value="<?= htmlspecialchars($row['tahun_ajaran']) ?>" required>
									</div>
									<div class="mb-3">
										<label class="form-label">Nomor Kordinator</label>
										<input type="text" name="nomor_kordinator" class="form-control"
											value="<?= htmlspecialchars($row['nomor_kordinator']) ?>" required>
									</div>
									<div class="mb-3">
										<label class="form-label">Nama Kordinator</label>
										<input type="text" name="nama_kordinator" class="form-control"
											value="<?= htmlspecialchars($row['nama_kordinator']) ?>" required>
									</div>
									<div class="mb-3">
										<label class="form-label">Foto</label>
										<input type="file" name="foto" class="form-control">
										<small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
									</div>
									<div class="mb-3">
										<label class="form-label">Status PPDB</label>
										<select name="status" class="form-control" required>
											<option value="Buka"
												<?= strtolower($row['status']) == 'buka' ? 'selected' : '' ?>>Buka
											</option>
											<option value="Tutup"
												<?= strtolower($row['status']) == 'tutup' ? 'selected' : '' ?>>Tutup
											</option>
										</select>
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
				<?php endforeach; ?>
			</div>
             <div class="modal fade" id="TambahPPDBModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Kepala_Sekolah/ppdb/simpan') ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah PPDB</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Kordinator</label>
                                <input type="text" name="nomor_kordinator" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="foto" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Kordinator</label>
                                <input type="text" name="nama_kordinator" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Buka">Buka</option>
                                    <option value="Tutup">Tutup</option>
                                </select>
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
			<?php endif; ?>
       
		</div>
	</div>
</div>
