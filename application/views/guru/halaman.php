<style>
    :root {
        --hijau-nu: #0B6E4F;
        --hijau-nu-tua: #0A5A40;
        --hijau-muda: #E8F5E9;
    }

    .welcome-card {
        background: linear-gradient(135deg, var(--hijau-nu) 0%, var(--hijau-nu-tua) 100%);
        color: #ffffff;
        border-radius: 12px;
    }

    .stat-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-3px);
    }

    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .bg-light-green { background-color: #E8F5E9; color: var(--hijau-nu); }
    .bg-light-blue  { background-color: #E3F2FD; color: #1976D2; }
    .bg-light-orange{ background-color: #FFF3E0; color: #F57C00; }
    .bg-light-purple{ background-color: #F3E5F5; color: #7B1FA2; }

    .btn-nu {
        background-color: var(--hijau-nu);
        color: #fff !important;
    }
    .btn-nu:hover {
        background-color: var(--hijau-nu-tua);
    }

    .gallery-thumb {
        height: 100px;
        width: 100%;
        object-fit: cover;
        border-radius: 6px;
    }
</style>

<!-- Banner Selamat Datang -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card welcome-card p-3 p-md-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="font-weight-bold mb-1">Selamat Datang di Panel Sistem Informasi</h3>
                    <p class="mb-0 opacity-8"><?= html_escape($profil->nama_sekolah ?? 'MI Nurul Ummah') ?> — Portal Manajemen Konten Web Resmi</p>
                </div>
                <div class="d-none d-md-block">
                    <?php if (!empty($profil->logo) && file_exists('./upload/profil/' . $profil->logo)): ?>
                        <img src="<?= base_url('upload/profil/' . $profil->logo) ?>" alt="Logo" style="height: 65px;">
                    <?php else: ?>
                        <i class="mdi mdi-school mdi-48px"></i>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cards Kartu Statistik -->
<div class="row mb-4">
    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted mb-1">Total Pengumuman</h6>
                    <h3 class="font-weight-bold mb-0 text-dark"><?= $total_pengumuman ?></h3>
                </div>
                <div class="icon-box bg-light-green">
                    <i class="mdi mdi-bullhorn"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted mb-1">Galeri Foto</h6>
                    <h3 class="font-weight-bold mb-0 text-dark"><?= $total_galeri ?></h3>
                </div>
                <div class="icon-box bg-light-blue">
                    <i class="mdi mdi-image-multiple"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted mb-1">Akreditasi</h6>
                    <h3 class="font-weight-bold mb-0 text-dark"><?= !empty($profil->akreditasi) ? $profil->akreditasi : '-' ?></h3>
                </div>
                <div class="icon-box bg-light-orange">
                    <i class="mdi mdi-certificate"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted mb-1">NPSN</h6>
                    <h3 class="font-weight-bold mb-0 text-dark" style="font-size: 1.1rem;"><?= !empty($profil->npsn) ? $profil->npsn : '-' ?></h3>
                </div>
                <div class="icon-box bg-light-purple">
                    <i class="mdi mdi-card-bulleted"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Konten Utama Dashboard -->
<div class="row">
    <!-- Pengumuman Terbaru -->
    <div class="col-lg-7 grid-margin stretch-card mb-4">
        <div class="card stat-card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 font-weight-bold text-dark"><i class="mdi mdi-bullhorn mr-1 text-success"></i> Pengumuman Terbaru</h5>
                    <a href="<?= base_url('Guru/pengumuman') ?>" class="btn btn-sm btn-outline-success">Lihat Semua</a>
                </div>

                <div class="list-group list-group-flush">
                    <?php foreach ($pengumuman_terbaru as $row): ?>
                        <div class="list-group-item px-0 py-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="font-weight-bold text-dark mb-1"><?= html_escape($row->judul) ?></h6>
                                    <p class="text-muted small mb-0"><?= html_escape($row->isi)?></p>
                                </div>
                                <span class="badge badge-light text-muted small ml-2"><i class="mdi mdi-calendar"></i> <?= date('d M Y', strtotime($row->tanggal)) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($pengumuman_terbaru)): ?>
                        <div class="text-center py-4 text-muted">Belum ada pengumuman yang diterbitkan.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri & Pintasan Akses -->
    <div class="col-lg-5 grid-margin stretch-card mb-4">
        <div class="card stat-card h-100">
            <div class="card-body">
                <h5 class="card-title mb-3 font-weight-bold text-dark"><i class="mdi mdi-rocket-launch mr-1 text-success"></i> Pintasan Menu</h5>
                <div class="row mb-4">
                    <div class="col-6 mb-2">
                        <a href="<?= base_url('Guru/pengumuman') ?>" class="btn btn-light btn-block text-left py-2">
                            <i class="mdi mdi-bullhorn text-info mr-2"></i> Pengumuman
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="<?= base_url('Guru/galeri') ?>" class="btn btn-light btn-block text-left py-2">
                            <i class="mdi mdi-image-multiple text-warning mr-2"></i> Galeri Foto
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0 font-weight-bold text-dark"><i class="mdi mdi-image-album mr-1 text-success"></i> Foto Galeri Terbaru</h5>
                    <a href="<?= base_url('Guru/galeri') ?>" class="btn btn-sm btn-outline-success">Lihat Galeri</a>
                </div>

                <div class="row">
                    <?php foreach ($galeri_terbaru as $g): ?>
                        <div class="col-6 mb-3">
                            <?php if (!empty($g->foto) && file_exists('./upload/galeri/' . $g->foto)): ?>
                                <img src="<?= base_url('upload/galeri/' . $g->foto) ?>" class="gallery-thumb" alt="<?= html_escape($g->judul_kegiatan) ?>">
                            <?php else: ?>
                                <div class="gallery-thumb bg-light d-flex align-items-center justify-content-center text-muted small">No Image</div>
                            <?php endif; ?>
                            <small class="d-block text-truncate font-weight-bold mt-1 text-dark"><?= html_escape($g->judul_kegiatan) ?></small>
                        </div>
                    <?php endforeach; ?>

                    <?php if (empty($galeri_terbaru)): ?>
                        <div class="col-12 text-center py-3 text-muted">Belum ada foto kegiatan.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>