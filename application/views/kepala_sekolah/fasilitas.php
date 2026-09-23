<style>
    /* ===== OVERRIDE STYLING HIJAU NU UNTUK HALAMAN DATA FASILITAS ===== */
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

    /* Override Badge Kondisi 'Baik' menjadi Hijau NU */
    .badge-success {
        background-color: var(--hijau-nu) !important;
        color: #ffffff !important;
    }

    /* Styling Header Modal */
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

    /* Focus Input Form agar tidak berwarna ungu */
    .form-control:focus {
        border-color: var(--hijau-nu) !important;
        box-shadow: 0 0 0 0.2rem rgba(11, 110, 79, 0.25) !important;
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

            <h4 class="card-title">Data Fasilitas</h4>
            <button type="button" class="btn btn-primary btn-sm mb-3 font-weight-bold" data-toggle="modal"
                data-target="#TambahFasilitasModal">
                <i class="mdi mdi-plus menu-icon"></i> Tambah Fasilitas
            </button>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Fasilitas</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($fasilitas as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if (!empty($row->foto) && file_exists('./upload/foto_fasilitas/' . $row->foto)): ?>
                                    <img src="<?= base_url('upload/foto_fasilitas/' . $row->foto) ?>"
                                        alt="<?= html_escape($row->nama_fasilitas) ?>"
                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 6px;">
                                <?php else: ?>
                                    <span class="text-muted font-italic" style="font-size: 0.85rem;">Tidak ada foto</span>
                                <?php endif; ?>
                            </td>
                            <td class="font-weight-bold"><?= html_escape($row->nama_fasilitas) ?></td>
                            <td><?= $row->jumlah ?></td>
                            <td>
                                <?php
                                    $badge = 'badge-success';
                                    if ($row->kondisi === 'Rusak Ringan') $badge = 'badge-warning text-white';
                                    if ($row->kondisi === 'Rusak Berat')  $badge = 'badge-danger';
                                ?>
                                <span class="badge <?= $badge ?> px-2 py-1"><?= $row->kondisi ?></span>
                            </td>
                            <td><?= $row->keterangan ? html_escape($row->keterangan) : '-' ?></td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="#editModal<?= $row->id_fasilitas ?>" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <a href="<?= base_url('Kepala_Sekolah/fasilitas/hapus/' . $row->id_fasilitas) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus fasilitas ini?')" title="Hapus">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit per baris -->
                        <div class="modal fade" id="editModal<?= $row->id_fasilitas ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="<?= base_url('Kepala_Sekolah/fasilitas/update/' . $row->id_fasilitas) ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Fasilitas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Nama Fasilitas</label>
                                                <input type="text" name="nama_fasilitas" class="form-control"
                                                    value="<?= html_escape($row->nama_fasilitas) ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Jumlah</label>
                                                <input type="number" name="jumlah" class="form-control" min="0"
                                                    value="<?= $row->jumlah ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold">Kondisi</label>
                                                <select name="kondisi" class="form-control" required>
                                                    <option value="Baik" <?= $row->kondisi == 'Baik' ? 'selected' : '' ?>>Baik</option>
                                                    <option value="Rusak Ringan" <?= $row->kondisi == 'Rusak Ringan' ? 'selected' : '' ?>>Rusak Ringan</option>
                                                    <option value="Rusak Berat" <?= $row->kondisi == 'Rusak Berat' ? 'selected' : '' ?>>Rusak Berat</option>
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

                        <?php if (empty($fasilitas)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada data fasilitas.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Tambah Fasilitas -->
        <div class="modal fade" id="TambahFasilitasModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('Kepala_Sekolah/fasilitas/simpan') ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Fasilitas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Nama Fasilitas</label>
                                <input type="text" name="nama_fasilitas" class="form-control" placeholder="Masukkan nama fasilitas" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" min="0" value="1" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Kondisi</label>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Baik" selected>Baik</option>
                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                    <option value="Rusak Berat">Rusak Berat</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan tambahan (opsional)"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label font-weight-bold">Foto Fasilitas</label>
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