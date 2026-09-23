<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $judul; ?></title>

  <!-- Regal Template CSS -->
  <link rel="stylesheet" href="<?= base_url('regal-1.0.0/vendors/mdi/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('regal-1.0.0/vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('regal-1.0.0/css/style.css'); ?>">
  <link rel="shortcut icon" href="<?= base_url('regal-1.0.0/images/MI.png'); ?>" />

  <style>
    /* ===== DEFINISI VARIABEL WARNA HIJAU NU ===== */
    :root {
      --hijau-nu: #0B6E4F;        /* Hijau Utama NU */
      --hijau-nu-tua: #0A5A40;    /* Hijau Tua untuk Active & Gradient */
      --hijau-nu-terang: #14875F; /* Hijau Terang untuk Hover */
      --hijau-nu-soft: #eaf6f0;
    }

    body.bg-light{
      background:#f4f7f5 !important;
    }

    .content-wrapper{
      align-items:flex-start !important;
      padding-top:2.5rem !important;
    }

    /* ===== OVERRIDE BADGE & TEKS PRIMARY BOOTSTRAP ===== */
    .badge-primary {
      background-color: var(--hijau-nu) !important;
      color: #ffffff !important;
      border: none !important;
    }

    .text-primary {
      color: var(--hijau-nu) !important;
    }

    /* ===== PROFILE CARD & COVER ===== */
    .card-corporate {
      border: none;
      border-radius: 14px;
      box-shadow: 0 10px 28px rgba(11,110,79,.08);
      overflow: hidden;
    }

    .profile-cover {
      height: 120px;
      background: linear-gradient(135deg, var(--hijau-nu) 0%, var(--hijau-nu-tua) 100%) !important;
      position: relative;
      z-index: 1;
      overflow: hidden;
    }
    .profile-cover::before{
      content:"";
      position:absolute;
      width:180px;height:180px;border-radius:50%;
      background:rgba(255,255,255,.08);
      top:-90px;right:-40px;
    }
    .profile-cover::after{
      content:"";
      position:absolute;
      width:120px;height:120px;border-radius:50%;
      background:rgba(255,255,255,.06);
      bottom:-70px;left:10%;
    }

    .profile-avatar-container {
      margin-top: -55px;
      position: relative;
      z-index: 2;
    }

    .profile-avatar {
      width: 110px;
      height: 110px;
      object-fit: cover;
      border: 4px solid #ffffff;
      box-shadow: 0 6px 16px rgba(0,0,0,.15);
      background-color: #ffffff;
    }

    .badge-role{
      display:inline-flex;
      align-items:center;
      gap:6px;
    }

    /* ===== METADATA AKUN (SIDEBAR) ===== */
    .meta-list{
      text-align:left;
    }
    .meta-item{
      display:flex;
      align-items:flex-start;
      gap:12px;
      padding:12px 0;
      border-bottom:1px dashed #e7ece9;
    }
    .meta-item:last-child{
      border-bottom:none;
      padding-bottom:0;
    }
    .meta-item:first-child{
      padding-top:0;
    }
    .meta-icon{
      width:34px;
      height:34px;
      border-radius:9px;
      background:var(--hijau-nu-soft);
      color:var(--hijau-nu);
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:16px;
      flex-shrink:0;
    }
    .meta-text{min-width:0;}
    .info-label {
      font-size: 0.72rem;
      font-weight: 700;
      color: #8d97ad;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      display:block;
    }

    .info-value {
      font-size: 0.92rem;
      color: #2a2b2c;
      font-weight: 600;
      margin-top:2px;
      word-break:break-word;
    }

    /* ===== TAB NAVIGATION FIX ===== */
    .profile-tab-header{
      display:flex;
      align-items:center;
      justify-content:space-between;
      flex-wrap:wrap;
      gap:12px;
    }

    .nav-tabs .nav-link {
      color: #6c757d !important;
      border: none !important;
      font-weight: 600;
    }

    .nav-tabs .nav-link.active {
      border-bottom: 3px solid var(--hijau-nu) !important;
      color: var(--hijau-nu) !important;
      font-weight: bold;
      background: transparent !important;
    }

    .nav-tabs .nav-link:hover {
      color: var(--hijau-nu-terang) !important;
      border-color: transparent !important;
    }

    /* ===== TOMBOL OUTLINE SECONDARY FIX ===== */
    .btn-outline-secondary {
      color: var(--hijau-nu) !important;
      border-color: var(--hijau-nu) !important;
      transition:.2s;
    }

    .btn-outline-secondary:hover {
      background-color: var(--hijau-nu) !important;
      color: #ffffff !important;
      border-color: var(--hijau-nu) !important;
      box-shadow: none !important;
      transform:translateX(-2px);
    }

    /* ===== TABEL RINGKASAN DATA ===== */
    .summary-table td{
      padding:14px 10px;
      border-bottom:1px solid #f0f2f1;
      vertical-align:middle;
    }
    .summary-table tr:last-child td{
      border-bottom:none;
    }
    .summary-table tr:hover td{
      background:#fafcfb;
    }
    .summary-table .label-cell{
      display:flex;
      align-items:center;
      color:#5c6b64;
      font-weight:500;
    }
    .summary-table .value-cell{
      display:flex;
      align-items:center;
      gap:8px;
      color:#1f2b25;
      font-weight:700;
    }
    .summary-table .value-cell::before{
      content:":";
      color:#c2cbc6;
      font-weight:400;
    }

    @media (max-width:576px){
      .content-wrapper{padding-top:1.2rem !important;}
      .profile-tab-header .btn{width:100%;justify-content:center;}
    }
  </style>
</head>
<body class="bg-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex py-4">
        <div class="container">

          <!-- Flash Message Notification -->
          <?php if ($this->session->flashdata('pesan')): ?>
            <div class="row">
              <div class="col-lg-12">
                <?= $this->session->flashdata('pesan'); ?>
              </div>
            </div>
          <?php endif; ?>

          <div class="row">
            <!-- Sidebar Kiri: Kartu Identitas Pegawai -->
            <div class="col-lg-4 mb-4">
              <div class="card card-corporate">
                <div class="profile-cover"></div>
                <div class="card-body text-center pt-0">

                  <div class="profile-avatar-container mb-3">
                    <?php
                      $foto_path = !empty($user['foto'])
                        ? base_url('upload/foto_user/' . $user['foto'])
                        : base_url('assets/images/faces/default.jpg');
                    ?>
                    <img src="<?= $foto_path; ?>"
                         alt="Foto Pegawai"
                         class="rounded-circle profile-avatar"
                         id="preview-foto">
                  </div>

                  <h4 class="font-weight-bold mb-1 text-dark">
                    <?= !empty($user['nama']) ? html_escape($user['nama']) : html_escape($user['username']); ?>
                  </h4>

                  <div class="d-flex justify-content-center align-items-center mb-3">
                    <span class="badge badge-primary badge-role px-3 py-1 font-weight-medium">
                      <i class="mdi mdi-shield-check"></i>
                      <?= isset($user['role']) ? html_escape(str_replace('_', ' ', $user['role'])) : 'User'; ?>
                    </span>
                  </div>

                  <hr class="my-3">

                  <!-- Metadata Akun Sistem Kantor -->
                  <div class="meta-list">
                    <div class="meta-item">
                      <div class="meta-icon"><i class="mdi mdi-account-outline"></i></div>
                      <div class="meta-text">
                        <span class="info-label">ID / NIP</span>
                        <p class="info-value mb-0">#USE-<?= str_pad($user['id_user'], 4, '0', STR_PAD_LEFT); ?></p>
                      </div>
                    </div>
                    <div class="meta-item">
                      <div class="meta-icon"><i class="mdi mdi-email-outline"></i></div>
                      <div class="meta-text">
                        <span class="info-label">Email Anda</span>
                        <p class="info-value mb-0 text-truncate"><?= html_escape($user['email']); ?></p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- Panel Kanan: Detail & Form Pengaturan -->
            <div class="col-lg-8">
              <div class="card card-corporate">
                <div class="card-body p-4">

                  <!-- Header Navigasi: Tab & Tombol Kembali -->
                  <div class="profile-tab-header border-bottom mb-4 pb-2">
                    <ul class="nav nav-tabs border-bottom-0" id="profileTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active pb-2" id="detail-tab" data-toggle="tab" href="#detail" role="tab">
                          <i class="mdi mdi-account-card-details mr-1"></i> Informasi Akun
                        </a>
                      </li>
                    </ul>

                    <!-- Tombol Kembali ke Halaman Awal -->
                    <a href="<?= base_url('Guru/Halaman'); ?>" class="btn btn-outline-secondary btn-sm btn-icon-text font-weight-bold mb-2">
                      <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Kembali
                    </a>
                  </div>

                  <div class="tab-content" id="profileTabContent">

                    <!-- TAB 1: Detail Informasi -->
                    <div class="tab-pane fade show active" id="detail" role="tabpanel">
                      <h5 class="font-weight-bold text-dark mb-3">Ringkasan Data Anda</h5>
                      <div class="table-responsive">
                        <table class="table table-borderless summary-table">
                          <tbody>
                            <tr>
                              <td style="width: 35%;">
                                <div class="label-cell"><i class="mdi mdi-account-box text-primary mr-2"></i>Username</div>
                              </td>
                              <td><div class="value-cell"><?= html_escape($user['username']); ?></div></td>
                            </tr>
                            <tr>
                              <td>
                                <div class="label-cell"><i class="mdi mdi-email text-primary mr-2"></i>Email Resmi</div>
                              </td>
                              <td><div class="value-cell"><?= html_escape($user['email']); ?></div></td>
                            </tr>
                            <tr>
                              <td>
                                <div class="label-cell"><i class="mdi mdi-shield-account text-primary mr-2"></i>Hak Akses Sistem</div>
                              </td>
                              <td><div class="value-cell"><?= isset($user['role']) ? html_escape(str_replace('_', ' ', $user['role'])) : 'User'; ?></div></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Regal Template JS -->
  <script src="<?= base_url('regal-1.0.0/vendors/js/vendor.bundle.base.js'); ?>"></script>
  <script src="<?= base_url('regal-1.0.0/js/off-canvas.js'); ?>"></script>
  <script src="<?= base_url('regal-1.0.0/js/hoverable-collapse.js'); ?>"></script>
  <script src="<?= base_url('regal-1.0.0/js/template.js'); ?>"></script>

  <!-- Script Preview Foto dan Label File -->
  <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function() {
        const output = document.getElementById('preview-foto');
        output.src = reader.result;
      }
      if(event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
        event.target.nextElementSibling.innerText = event.target.files[0].name;
      }
    }
  </script>
</body>
</html>