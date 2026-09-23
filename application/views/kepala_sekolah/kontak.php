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

    .form-control:focus {
        border-color: var(--hijau-nu) !important;
        box-shadow: 0 0 0 0.2rem rgba(11, 110, 79, 0.25) !important;
    }

    .section-title {
        color: var(--hijau-nu);
        font-weight: 700;
        border-bottom: 2px solid #e1ebe5;
        padding-bottom: 6px;
        margin-bottom: 20px;
    }

    .map-responsive {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding-top: 56.25%; /* Ratio 16:9 */
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .map-responsive iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        border: 0;
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

            <h4 class="card-title mb-4">Pengaturan Kontak & Media Sosial</h4>

            <form action="<?= base_url('Kepala_Sekolah/kontak/simpan') ?>" method="post">
                
                <!-- Informasi Utama -->
                <h5 class="section-title"><i class="mdi mdi-school mr-1"></i> Informasi Utama</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control" value="<?= html_escape($kontak->nama_sekolah ?? '') ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Jam Operasional</label>
                        <input type="text" name="jam_operasional" class="form-control" placeholder="Contoh: Senin - Sabtu (07.00 - 14.00 WIB)" value="<?= html_escape($kontak->jam_operasional ?? '') ?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="font-weight-bold">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Jl. Raya No. XX, Desa, Kecamatan, Kabupaten..."><?= html_escape($kontak->alamat ?? '') ?></textarea>
                    </div>
                </div>

                <!-- Saluran Komunikasi -->
                <h5 class="section-title mt-3"><i class="mdi mdi-phone-classic mr-1"></i> Kontak & Komunikasi</h5>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold">Telepon Kantor</label>
                        <input type="text" name="telepon" class="form-control" placeholder="021-XXXXXXX" value="<?= html_escape($kontak->telepon ?? '') ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold">WhatsApp Admin</label>
                        <input type="text" name="whatsapp" class="form-control" placeholder="08XXXXXXXXXX" value="<?= html_escape($kontak->whatsapp ?? '') ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold">Email Resmi</label>
                        <input type="email" name="email" class="form-control" placeholder="info@sekolah.sch.id" value="<?= html_escape($kontak->email ?? '') ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="font-weight-bold">Website Resmi</label>
                        <input type="text" name="website" class="form-control" placeholder="https://sekolah.sch.id" value="<?= html_escape($kontak->website ?? '') ?>">
                    </div>
                </div>

                <!-- Media Sosial & Peta -->
                <h5 class="section-title mt-3"><i class="mdi mdi-share-variant mr-1"></i> Media Sosial & Lokasi Peta</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Facebook</label>
                        <input type="text" name="facebook" class="form-control" placeholder="https://facebook.com/namahalaman" value="<?= html_escape($kontak->facebook ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Instagram</label>
                        <input type="text" name="instagram" class="form-control" placeholder="https://instagram.com/namasakun" value="<?= html_escape($kontak->instagram ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Youtube</label>
                        <input type="text" name="youtube" class="form-control" placeholder="https://youtube.com/namakanal" value="<?= html_escape($kontak->youtube ?? '') ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="font-weight-bold">Tiktok</label>
                        <input type="text" name="tiktok" class="form-control" placeholder="https://tiktok.com/namasakun" value="<?= html_escape($kontak->tiktok ?? '') ?>">
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <div class="row mt-4">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary font-weight-bold px-4 py-2">
                            <i class="mdi mdi-content-save mr-1"></i> Simpan Perubahan Kontak
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>