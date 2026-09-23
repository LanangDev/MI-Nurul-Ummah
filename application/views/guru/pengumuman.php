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
                <h4 class="card-title mb-0">Data Pengumuman</h4>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle="modal" data-target="#TambahPengumumanModal">
                    <i class="mdi mdi-plus"></i> Tambah Pengumuman
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto / Banner</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Isi Pengumuman</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pengumuman as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if (!empty($row->foto) && file_exists('./upload/pengumuman/' . $row->foto)): ?>
                                    <img src="<?= base_url('upload/pengumuman/' . $row->foto) ?>" 
                                         alt="Banner" 
                                         style="width: 70px; height: 50px; object-fit: cover; border-radius: 4px;">
                                <?php else: ?>
                                    <span class="text-muted small font-italic">Tidak ada foto</span>
                                <?php endif; ?>
                            </td>
                            <td class="font-weight-bold"><?= html_escape($row->judul) ?></td>
                            <td>
                                <small class="text-muted"><i class="mdi mdi-calendar"></i> <?= date('d M Y', strtotime($row->tanggal)) ?></small>
                            </td>
                            <td><?= html_escape($row->isi)?></td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#editModal<?= $row->id_pengumuman ?>" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <a href="<?= base_url('Kepala_Sekolah/pengumuman/hapus/' . $row->id_pengumuman) ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Yakin ingin menghapus pengumuman ini?')" title="Hapus">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?= $row->id_pengumuman ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="<?= base_url('Kepala_Sekolah/pengumuman/update/' . $row->id_pengumuman) ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Pengumuman</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <div class="row">
                                                <div class="col-md-8 mb-3">
                                                    <label class="font-weight-bold">Judul Pengumuman</label>
                                                    <input type="text" name="judul" class="form-control" value="<?= html_escape($row->judul) ?>" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="font-weight-bold">Tanggal</label>
                                                    <input type="date" name="tanggal" class="form-control" value="<?= $row->tanggal ?>" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="font-weight-bold">Isi Pengumuman</label>
                                                <textarea name="isi" class="form-control" rows="6" required><?= html_escape($row->isi) ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="font-weight-bold">Foto / Banner (kosongkan jika tidak diubah)</label>
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
                        <?php endforeach; ?>

                        <?php if (empty($pengumuman)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Belum ada data pengumuman.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tambah Pengumuman -->
<div class="modal fade" id="TambahPengumumanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('Kepala_Sekolah/pengumuman/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label class="font-weight-bold">Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control" placeholder="Contoh: Jadwal Libur Semester Ganjil" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold">Isi Pengumuman</label>
                        <textarea name="isi" class="form-control" rows="6" placeholder="Tuliskan isi pengumuman secara detail..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold">Foto / Banner Lampiran</label>
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