<style>
    /* ===== OVERRIDE STYLING HIJAU NU UNTUK HALAMAN EKSTRAKURIKULER ===== */
    :root {
        --hijau-nu: #0B6E4F;        /* Hijau Utama NU */
        --hijau-nu-tua: #0A5A40;    /* Hijau Tua Hover */
        --hijau-nu-terang: #14875F; /* Hijau Terang Aksen */
    }

    /* Tombol Utama (Tambah & Simpan) */
    .btn-primary {
        background-color: var(--hijau-nu) !important;
        border-color: var(--hijau-nu) !important;
        color: #ffffff !important;
    }

    .btn-primary:hover, 
    .btn-primary:focus, 
    .btn-primary:active {
        background-color: var(--hijau-nu-tua) !important;
        border-color: var(--hijau-nu-tua) !important;
        box-shadow: none !important;
    }

    /* Badge Override */
    .badge-success {
        background-color: var(--hijau-nu) !important;
        color: #ffffff !important;
    }

    /* Header Modal */
    .modal-header {
        background-color: var(--hijau-nu) !important;
        color: #ffffff !important;
        border-bottom: none !important;
    }

    .modal-header .modal-title {
        color: #ffffff !important;
        font-weight: 600;
    }

    .modal-header .close,
    .modal-header .btn-close {
        color: #ffffff !important;
        opacity: 0.8;
        text-shadow: none !important;
    }

    .modal-header .close:hover {
        opacity: 1;
        color: #ffffff !important;
    }

    /* Focus Input Form */
    .form-control:focus {
        border-color: var(--hijau-nu) !important;
        box-shadow: 0 0 0 0.2rem rgba(11, 110, 79, 0.25) !important;
    }
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <!-- Flash Message Success -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Flash Message Error -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <h4 class="card-title">Data Ekstrakurikuler</h4>
            <button type="button" class="btn btn-primary btn-sm mb-3 font-weight-bold" data-toggle="modal"
                data-target="#TambahEkstraModal">
                <i class="mdi mdi-plus menu-icon"></i> Tambah Ekstrakurikuler
            </button>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Ekstrakurikuler</th>
                            <th>Pembina</th>
                            <th>Jadwal & Tempat</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($ekstra as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if (!empty($row->foto) && file_exists('./upload/foto_ekstra/' . $row->foto)): ?>
                                    <img src="<?= base_url('upload/foto_ekstra/' . $row->foto) ?>"
                                        alt="<?= html_escape($row->nama_ekstrakurikuler) ?>"
                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                <?php else: ?>
                                    <span class="text-muted font-italic" style="font-size: 0.85rem;">Tidak ada foto</span>
                                <?php endif; ?>
                            </td>
                            <td class="font-weight-bold"><?= html_escape($row->nama_ekstrakurikuler) ?></td>
                            <td><?= $row->pembina ? html_escape($row->pembina) : '-' ?></td>
                            <td>
                                <small class="d-block font-weight-bold text-dark"><i class="mdi mdi-calendar"></i> <?= $row->hari ? html_escape($row->hari) : '-' ?></small>
                                <small class="d-block text-muted"><i class="mdi mdi-clock-outline"></i> <?= $row->waktu ? html_escape($row->waktu) : '-' ?></small>
                                <small class="d-block text-muted"><i class="mdi mdi-map-marker"></i> <?= $row->tempat ? html_escape($row->tempat) : '-' ?></small>
                            </td>
                            <td>
                                <?php if ($row->status === 'Aktif'): ?>
                                    <span class="badge badge-success px-2 py-1">Aktif</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary px-2 py-1">Tidak Aktif</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $row->keterangan ? html_escape($row->keterangan) : '-' ?></td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="#editModal<?= $row->id_ekstrakurikuler ?>" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <a href="<?= base_url('Kepala_Sekolah/ekstrakulikuler/hapus/' . $row->id_ekstrakurikuler) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')" title="Hapus">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit per baris -->
                        <div class="modal fade" id="editModal<?= $row->id_ekstrakurikuler ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="<?= base_url('Kepala_Sekolah/ekstrakulikuler/update/' . $row->id_ekstrakurikuler) ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Ekstrakurikuler</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Nama Ekstrakurikuler</label>
                                                <input type="text" name="nama_ekstrakurikuler" class="form-control"
                                                    value="<?= html_escape($row->nama_ekstrakurikuler) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Pembina</label>
                                                <input type="text" name="pembina" class="form-control"
                                                    value="<?= html_escape($row->pembina) ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label font-weight-bold">Hari</label>
                                                    <select name="hari" class="form-control">
                                                        <option value="">-- Pilih Hari --</option>
                                                        <?php 
                                                        $hari_list = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                                                        foreach ($hari_list as $h) {
                                                            $selected = ($row->hari == $h) ? 'selected' : '';
                                                            echo "<option value='$h' $selected>$h</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label font-weight-bold">Waktu</label>
                                                    <input type="text" name="waktu" class="form-control"
                                                        placeholder="Contoh: 15.00 - 17.00 WIB"
                                                        value="<?= html_escape($row->waktu) ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Tempat</label>
                                                <input type="text" name="tempat" class="form-control"
                                                    value="<?= html_escape($row->tempat) ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Status</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="Aktif" <?= $row->status == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                                    <option value="Tidak Aktif" <?= $row->status == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Keterangan</label>
                                                <textarea name="keterangan" class="form-control" rows="3"><?= html_escape($row->keterangan) ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Foto (kosongkan jika tidak diubah)</label>
                                                <input type="file" name="foto" class="form-control-file">
                                                <?php if (!empty($row->foto)): ?>
                                                    <small class="text-muted d-block mt-1">Foto saat ini: <?= $row->foto ?></small>
                                                <?php endif; ?>
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

                        <?php if (empty($ekstra)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data ekstrakurikuler.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah Ekstrakurikuler -->
        <div class="modal fade" id="TambahEkstraModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Kepala_Sekolah/ekstrakulikuler/simpan') ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Ekstrakurikuler</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Nama Ekstrakurikuler</label>
                                <input type="text" name="nama_ekstrakurikuler" class="form-control" placeholder="Contoh: Pramuka, Paskibra" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Pembina</label>
                                <input type="text" name="pembina" class="form-control" placeholder="Nama pembina / pelatih">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-bold">Hari</label>
                                    <select name="hari" class="form-control">
                                        <option value="">-- Pilih Hari --</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label font-weight-bold">Waktu</label>
                                    <input type="text" name="waktu" class="form-control" placeholder="Contoh: 15.00 - 17.00 WIB">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Tempat</label>
                                <input type="text" name="tempat" class="form-control" placeholder="Contoh: Lapangan Sekolah">
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="Aktif" selected>Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Foto Ekstrakurikuler</label>
                                <input type="file" name="foto" class="form-control-file">
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