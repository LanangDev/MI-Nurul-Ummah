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

            <?php if ($this->session->flashdata('notifikasi')): ?>
                <?= $this->session->flashdata('notifikasi'); ?>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">Kategori Prestasi</h4>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle="modal" data-target="#TambahKategoriModal">
                    <i class="mdi mdi-plus"></i> Tambah Kategori
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($kategori)): ?>
                            <?php $no = 1; foreach ($kategori as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td class="font-weight-bold"><?= html_escape($row['nama_kategori']) ?></td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#editModal<?= $row['id_kategori'] ?>" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <a href="<?= base_url('Kepala_Sekolah/kategori_prestasi/hapus/' . $row['id_kategori']) ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Yakin ingin menghapus kategori prestasi ini?')" title="Hapus">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $row['id_kategori'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="<?= base_url('Kepala_Sekolah/kategori_prestasi/update/' . $row['id_kategori']) ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Kategori Prestasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                                <div class="row">
                                                    <div class="col-md-8 mb-3">
                                                        <label class="font-weight-bold">Nama Kategori Prestasi</label>
                                                        <input type="text" name="nama_kategori" class="form-control" value="<?= html_escape($row['nama_kategori']) ?>" required>
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
                            <td colspan="3" class="text-center py-4 text-muted">Belum ada data kategori.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="TambahKategoriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('Kepala_Sekolah/kategori_prestasi/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Contoh: Sains" required>
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