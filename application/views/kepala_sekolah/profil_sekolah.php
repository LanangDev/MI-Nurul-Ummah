<style>
    :root {
        --hijau-nu: #0B6E4F;
        --hijau-nu-tua: #0A5A40;
    }

    .nav-tabs .nav-link.active {
        background-color: var(--hijau-nu) !important;
        color: #ffffff !important;
        border-color: var(--hijau-nu) !important;
    }

    .nav-tabs .nav-link {
        color: var(--hijau-nu);
        font-weight: 600;
    }

    .btn-primary {
        background-color: var(--hijau-nu) !important;
        border-color: var(--hijau-nu) !important;
    }

    .btn-primary:hover {
        background-color: var(--hijau-nu-tua) !important;
    }

    .img-preview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e1ebe5;
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

            <h4 class="card-title">Pengaturan Profil Sekolah</h4>

            <form action="<?= base_url('Kepala_Sekolah/profil_sekolah/simpan') ?>" method="post" enctype="multipart/form-data">
                
                <!-- Tab Header -->
                <ul class="nav nav-tabs mb-4" id="profilTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="identitas-tab" data-toggle="tab" href="#identitas" role="tab">Identitas & Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="alamat-tab" data-toggle="tab" href="#alamat" role="tab">Alamat Lengkap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="visi-tab" data-toggle="tab" href="#visi" role="tab">Sejarah, Visi & Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="foto-tab" data-toggle="tab" href="#foto" role="tab">Media & Foto</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="profilTabContent">

                    <!-- TAB 1: IDENTITAS & KONTAK -->
                    <div class="tab-pane fade show active" id="identitas" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" class="form-control" value="<?= html_escape($profil->nama_sekolah ?? '') ?>" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="font-weight-bold">NPSN</label>
                                <input type="text" name="npsn" class="form-control" value="<?= html_escape($profil->npsn ?? '') ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="font-weight-bold">NSM</label>
                                <input type="text" name="nsm" class="form-control" value="<?= html_escape($profil->nsm ?? '') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="font-weight-bold">Status Sekolah</label>
                                <input type="text" name="status_sekolah" class="form-control" placeholder="Contoh: Swasta" value="<?= html_escape($profil->status_sekolah ?? '') ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="font-weight-bold">Jenjang</label>
                                <input type="text" name="jenjang" class="form-control" placeholder="Contoh: MI / SD" value="<?= html_escape($profil->jenjang ?? '') ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="font-weight-bold">Akreditasi</label>
                                <input type="text" name="akreditasi" class="form-control" placeholder="Contoh: A" value="<?= html_escape($profil->akreditasi ?? '') ?>">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="font-weight-bold">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri" class="form-control" placeholder="YYYY" value="<?= html_escape($profil->tahun_berdiri ?? '') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="font-weight-bold">Telepon</label>
                                <input type="text" name="telepon" class="form-control" value="<?= html_escape($profil->telepon ?? '') ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= html_escape($profil->email ?? '') ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="font-weight-bold">Website</label>
                                <input type="text" name="website" class="form-control" value="<?= html_escape($profil->website ?? '') ?>">
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: ALAMAT LENGKAP -->
                    <div class="tab-pane fade" id="alamat" role="tabpanel">
                        <div class="mb-3">
                            <label class="font-weight-bold">Alamat Jalan</label>
                            <textarea name="alamat" class="form-control" rows="2"><?= html_escape($profil->alamat ?? '') ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="font-weight-bold">Desa / Kelurahan</label>
                                <input type="text" name="desa" class="form-control" value="<?= html_escape($profil->desa ?? '') ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="font-weight-bold">Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" value="<?= html_escape($profil->kecamatan ?? '') ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="font-weight-bold">Kabupaten / Kota</label>
                                <input type="text" name="kabupaten" class="form-control" value="<?= html_escape($profil->kabupaten ?? '') ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" value="<?= html_escape($profil->provinsi ?? '') ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" value="<?= html_escape($profil->kode_pos ?? '') ?>">
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: SEJARAH, VISI & MISI -->
                    <div class="tab-pane fade" id="visi" role="tabpanel">
                        <div class="mb-3">
                            <label class="font-weight-bold">Sejarah Sekolah</label>
                            <textarea name="sejarah" class="form-control" rows="4"><?= html_escape($profil->sejarah ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold">Visi</label>
                            <textarea name="visi" class="form-control" rows="3"><?= html_escape($profil->visi ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold">Misi</label>
                            <textarea name="misi" class="form-control" rows="4"><?= html_escape($profil->misi ?? '') ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold">Sambutan Kepala Sekolah</label>
                            <textarea name="sambutan_kepala" class="form-control" rows="4"><?= html_escape($profil->sambutan_kepala ?? '') ?></textarea>
                        </div>
                    </div>

                    <!-- TAB 4: MEDIA & FOTO -->
                    <div class="tab-pane fade" id="foto" role="tabpanel">
                        <div class="row">
                            <div class="col-md-4 mb-4 text-center">
                                <label class="font-weight-bold d-block">Logo Sekolah</label>
                                <?php if (!empty($profil->logo) && file_exists('./upload/profil/' . $profil->logo)): ?>
                                    <img src="<?= base_url('upload/profil/' . $profil->logo) ?>" class="img-preview mb-2">
                                <?php else: ?>
                                    <div class="img-preview mb-2 d-flex align-items-center justify-content-center text-muted m-auto">No Image</div>
                                <?php endif; ?>
                                <input type="file" name="logo" class="form-control-file mt-2">
                            </div>

                            <div class="col-md-4 mb-4 text-center">
                                <label class="font-weight-bold d-block">Foto Bangunan Sekolah</label>
                                <?php if (!empty($profil->foto_sekolah) && file_exists('./upload/profil/' . $profil->foto_sekolah)): ?>
                                    <img src="<?= base_url('upload/profil/' . $profil->foto_sekolah) ?>" class="img-preview mb-2">
                                <?php else: ?>
                                    <div class="img-preview mb-2 d-flex align-items-center justify-content-center text-muted m-auto">No Image</div>
                                <?php endif; ?>
                                <input type="file" name="foto_sekolah" class="form-control-file mt-2">
                            </div>

                            <div class="col-md-4 mb-4 text-center">
                                <label class="font-weight-bold d-block">Foto Kepala Sekolah</label>
                                <?php if (!empty($profil->foto_kepala) && file_exists('./upload/profil/' . $profil->foto_kepala)): ?>
                                    <img src="<?= base_url('upload/profil/' . $profil->foto_kepala) ?>" class="img-preview mb-2">
                                <?php else: ?>
                                    <div class="img-preview mb-2 d-flex align-items-center justify-content-center text-muted m-auto">No Image</div>
                                <?php endif; ?>
                                <input type="file" name="foto_kepala" class="form-control-file mt-2">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-4 text-right">
                    <button type="submit" class="btn btn-primary font-weight-bold px-4">
                        <i class="mdi mdi-content-save mr-1"></i> Simpan Perubahan Profil
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>