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

    .gallery-card {
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        border: 1px solid #e1ebe5;
    }

    .gallery-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }

    .gallery-img {
        height: 180px;
        object-fit: cover;
        width: 100%;
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
                <h4 class="card-title mb-0">Galeri Kegiatan Sekolah</h4>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" data-toggle="modal" data-target="#TambahGaleriModal">
                    <i class="mdi mdi-plus"></i> Tambah Foto Galeri
                </button>
            </div>

            <div class="row">
                <?php foreach ($galeri as $row): ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card gallery-card h-100">
                            <?php if (!empty($row->foto) && file_exists('./upload/galeri/' . $row->foto)): ?>
                                <img src="<?= base_url('upload/galeri/' . $row->foto) ?>" class="gallery-img card-img-top" alt="<?= html_escape($row->judul_kegiatan) ?>">
                            <?php else: ?>
                                <div class="gallery-img bg-light d-flex align-items-center justify-content-center text-muted">
                                    <i class="mdi mdi-image-broken mdi-36px"></i>
                                </div>
                            <?php endif; ?>

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-dark font-weight-bold mb-2"><?= html_escape($row->judul_kegiatan) ?></h5>
                                
                                <div class="mb-2 text-muted small">
                                    <span class="mr-2"><i class="mdi mdi-calendar"></i> <?= $row->tanggal ? date('d M Y', strtotime($row->tanggal)) : '-' ?></span>
                                    <span><i class="mdi mdi-map-marker"></i> <?= $row->lokasi ? html_escape($row->lokasi) : '-' ?></span>
                                </div>

                                <p class="card-text text-secondary small flex-grow-1 text-dark">
                                    <?= $row->deskripsi ? html_escape($row->deskripsi) : '-' ?>
                                </p>

                                <div class="mt-3 pt-2 border-top text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $row->id_galeri ?>" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <a href="<?= base_url('Kepala_Sekolah/galeri/hapus/' . $row->id_galeri) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus foto kegiatan ini?')" title="Hapus">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $row->id_galeri ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?= base_url('Kepala_Sekolah/galeri/update/' . $row->id_galeri) ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Foto Galeri</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <div class="mb-3">
                                            <label class="font-weight-bold">Judul Kegiatan</label>
                                            <input type="text" name="judul_kegiatan" class="form-control" value="<?= html_escape($row->judul_kegiatan) ?>" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="font-weight-bold">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" value="<?= $row->tanggal ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="font-weight-bold">Lokasi</label>
                                                <input type="text" name="lokasi" class="form-control" value="<?= html_escape($row->lokasi) ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="font-weight-bold">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" rows="3"><?= html_escape($row->deskripsi) ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="font-weight-bold">Foto (kosongkan jika tidak diubah)</label>
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

                <?php if (empty($galeri)): ?>
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="mdi mdi-image-multiple mdi-48px d-block mb-2"></i>
                        Belum ada foto kegiatan di dalam galeri.
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<!-- Modal Tambah Galeri -->
<div class="modal fade" id="TambahGaleriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('Kepala_Sekolah/galeri/simpan') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Foto Galeri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="mb-3">
                        <label class="font-weight-bold">Judul Kegiatan</label>
                        <input type="text" name="judul_kegiatan" class="form-control" placeholder="Contoh: Upacara Hari Santri" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Halaman Madrasah">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi singkat kegiatan..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="font-weight-bold">Foto Kegiatan</label>
                        <input type="file" name="foto" class="form-control-file" required>
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