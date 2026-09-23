<style>
    :root {
        --hijau-nu: #0B6E4F;
        --hijau-nu-tua: #0A5A40;
    }

    .btn-primary {
        background-color: var(--hijau-nu) !important;
        border-color: var(--hijau-nu) !important;
        color: #ffffff !important;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: var(--hijau-nu-tua) !important;
        border-color: var(--hijau-nu-tua) !important;
    }

    .modal-header {
        background-color: var(--hijau-nu) !important;
        color: #ffffff !important;
    }

    .modal-header .modal-title,
    .modal-header .close {
        color: #ffffff !important;
    }

    .form-control:focus {
        border-color: var(--hijau-nu) !important;
        box-shadow: 0 0 0 0.2rem rgba(11, 110, 79, 0.25) !important;
    }

    .foto-prestasi {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 6px;
    }
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">Data Prestasi</h4>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle="modal" data-target="#TambahPrestasiModal">
                    <i class="mdi mdi-plus"></i> Tambah Prestasi
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul Prestasi</th>
                            <th>Kategori</th>
                            <th>Tingkat</th>
                            <th>Tahun</th>
                            <th>Penyelenggara</th>
                            <th>Penerima</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($prestasi)): ?>
                            <?php $no = 1; foreach ($prestasi as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?php if (!empty($row['foto'])): ?>
                                        <img src="<?= base_url('upload/prestasi/' . $row['foto']) ?>" class="foto-prestasi" alt="Foto Prestasi">
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="font-weight-bold"><?= html_escape($row['judul_prestasi']) ?></td>
                                <td><?= html_escape($row['nama_kategori'] ?? '-') ?></td>
                                <td><?= html_escape($row['tingkat']) ?></td>
                                <td><?= html_escape($row['tahun']) ?></td>
                                <td><?= html_escape($row['penyelenggara']) ?></td>
                                <td><?= html_escape($row['penerima']) ?></td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#editModal<?= $row['id_prestasi'] ?>" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <a href="<?= base_url('Kepala_Sekolah/prestasi/hapus/' . $row['id_prestasi']) ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Yakin ingin menghapus prestasi ini?')" title="Hapus">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $row['id_prestasi'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="<?= base_url('Kepala_Sekolah/prestasi/update/' . $row['id_prestasi']) ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="foto_lama" value="<?= html_escape($row['foto']) ?>">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Prestasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <div class="row">
                                                    <div class="col-md-8 mb-3">
                                                        <label class="font-weight-bold">Judul Prestasi</label>
                                                        <input type="text" name="judul_prestasi" class="form-control" value="<?= html_escape($row['judul_prestasi']) ?>" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="font-weight-bold">Kategori</label>
                                                        <select name="id_kategori" class="form-control" required>
                                                            <option value="">-- Pilih Kategori --</option>
                                                            <?php foreach ($kategori as $kat): ?>
                                                                <option value="<?= $kat['id_kategori'] ?>" <?= ($kat['id_kategori'] == $row['id_kategori']) ? 'selected' : '' ?>>
                                                                    <?= html_escape($kat['nama_kategori']) ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="font-weight-bold">Tingkat</label>
                                                        <select name="tingkat" class="form-control" required>
                                                            <?php foreach (['Sekolah','Kecamatan','Kabupaten/Kota','Provinsi','Nasional','Internasional'] as $opt): ?>
                                                                <option value="<?= $opt ?>" <?= ($row['tingkat'] == $opt) ? 'selected' : '' ?>><?= $opt ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="font-weight-bold">Tahun</label>
                                                        <input type="number" name="tahun" class="form-control" value="<?= html_escape($row['tahun']) ?>" min="2000" max="2100" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="font-weight-bold">Penyelenggara</label>
                                                        <input type="text" name="penyelenggara" class="form-control" value="<?= html_escape($row['penyelenggara']) ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="font-weight-bold">Penerima</label>
                                                        <input type="text" name="penerima" class="form-control" value="<?= html_escape($row['penerima']) ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="font-weight-bold">Foto / Sertifikat</label>
                                                        <input type="file" name="foto" class="form-control-file" accept=".jpg,.jpeg,.png">
                                                        <?php if (!empty($row['foto'])): ?>
                                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="font-weight-bold">Deskripsi</label>
                                                        <textarea name="deskripsi" class="form-control" rows="3"><?= html_escape($row['deskripsi']) ?></textarea>
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
                            <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">Belum ada data prestasi.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tambah Prestasi -->
<div class="modal fade" id="TambahPrestasiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('Kepala_Sekolah/prestasi/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="font-weight-bold">Judul Prestasi</label>
                            <input type="text" name="judul_prestasi" class="form-control" placeholder="Contoh: Juara 1 Olimpiade Matematika" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Kategori</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $kat): ?>
                                    <option value="<?= $kat['id_kategori'] ?>"><?= html_escape($kat['nama_kategori']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Tingkat</label>
                            <select name="tingkat" class="form-control" required>
                                <option value="">-- Pilih Tingkat --</option>
                                <?php foreach (['Sekolah','Kecamatan','Kabupaten/Kota','Provinsi','Nasional','Internasional'] as $opt): ?>
                                    <option value="<?= $opt ?>"><?= $opt ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Tahun</label>
                            <input type="number" name="tahun" class="form-control" placeholder="2025" min="2000" max="2100" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Penyelenggara</label>
                            <input type="text" name="penyelenggara" class="form-control" placeholder="Contoh: Dinas Pendidikan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Penerima</label>
                            <input type="text" name="penerima" class="form-control" placeholder="Nama siswa penerima">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Foto / Sertifikat</label>
                            <input type="file" name="foto" class="form-control-file" accept=".jpg,.jpeg,.png">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)"></textarea>
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