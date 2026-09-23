<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Sekolah - <?= html_escape($profil->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  :root{
    --green-dark:#0b4a2f; --green:#146b3a; --green-mid:#1c8a4c;
    --green-soft:#eaf7ef;
    --gold:#f2b705; --gold-dark:#d99a00;
    --ink:#16281f; --muted:#5c6b62; --line:#e4e9e3; --bg:#f7faf8;
    --shadow:0 12px 32px rgba(11,74,47,.10);
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  body{font-family:'Poppins',sans-serif;color:var(--ink);background:var(--bg);line-height:1.75; overflow-x:hidden;}
  img{max-width:100%;display:block;}
  a{text-decoration:none;color:inherit;}
  .container{max-width:1180px;margin:0 auto;padding:0 24px;}
  h2{font-size:clamp(24px,3vw,32px);color:var(--green-dark);}

  /* HERO */
  .page-hero{background:linear-gradient(120deg,var(--green-dark) 0%,var(--green) 55%,var(--green-mid) 100%);padding:40px 0 100px;position:relative;overflow:hidden;color:#fff;}
  .page-hero::before{content:"";position:absolute;width:320px;height:320px;border-radius:50%;background:rgba(255,255,255,.06);top:-140px;right:-70px;}
  .page-hero::after{content:"";position:absolute;inset:auto -5% -1px -5%;height:60px;background:var(--bg);border-radius:50% 50% 0 0/60% 60% 0 0;}
  .page-hero .container{position:relative;z-index:2;}
  .breadcrumb{color:#bcd9c6;font-size:12.5px;margin-bottom:16px;display:flex;gap:6px;align-items:center;flex-wrap:wrap;}
  .breadcrumb a:hover{color:#fff;}
  .breadcrumb .sep{opacity:.6;}
  .breadcrumb .current{color:#fff;font-weight:600;}
  .hero-top{display:flex;gap:22px;align-items:center;}
  .hero-logo{width:76px;height:76px;border-radius:18px;object-fit:cover;flex-shrink:0;box-shadow:0 8px 20px rgba(0,0,0,.2);}
  .hero-logo-placeholder{width:76px;height:76px;border-radius:18px;flex-shrink:0;background:rgba(255,255,255,.14);display:grid;place-items:center;font-size:28px;font-weight:800;box-shadow:0 8px 20px rgba(0,0,0,.15);}
  .hero-top h1{font-size:clamp(24px,4vw,34px);margin-bottom:6px;}
  .hero-top p{color:#dcefe0;font-size:13.5px;}

  /* PROFILE SUMMARY CARD (overlaps hero) */
  .summary-card{
    background:#fff;border-radius:22px;box-shadow:var(--shadow);
    display:grid;grid-template-columns:1.1fr .9fr;gap:0;overflow:hidden;
    position:relative;z-index:3;margin-top:34px;
  }
  .summary-photo{min-height:280px;background:linear-gradient(135deg,var(--green-mid),var(--green-dark));position:relative;}
  .summary-photo img{width:100%;height:100%;object-fit:cover;position:absolute;inset:0;}
  .summary-photo .ph-icon{position:absolute;inset:0;display:grid;place-items:center;color:rgba(255,255,255,.55);font-size:44px;}
  .summary-body{padding:32px 34px;}
  .summary-body .eyebrow{
    display:inline-flex;padding:6px 12px;border-radius:999px;background:var(--green-soft);
    color:var(--green);font-size:12px;font-weight:800;margin-bottom:12px;
  }
  .summary-body p{color:var(--muted);font-size:14px;margin-bottom:18px;}
  .quick-facts{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
  .qf-item label{display:block;font-size:10.5px;text-transform:uppercase;letter-spacing:.04em;color:var(--muted);font-weight:700;margin-bottom:4px;}
  .qf-item .val{font-size:14px;font-weight:700;color:var(--ink);}

  @media(max-width:800px){
    .summary-card{grid-template-columns:1fr;}
    .summary-photo{min-height:200px;}
    .hero-top{flex-direction:column;text-align:center;}
  }

  /* SECTIONS */
  section.block{padding:56px 0;}
  section.block.alt{background:#fff;}
  .section-head{margin-bottom:30px;}
  .section-head .eyebrow{
    display:inline-flex;padding:6px 12px;border-radius:999px;background:var(--green-soft);
    color:var(--green);font-size:12px;font-weight:800;margin-bottom:10px;
  }
  .section-head p{color:var(--muted);max-width:680px;margin-top:8px;font-size:14.5px;}

  .prose{color:#2b3a32;font-size:14.5px;white-space:pre-line;}

  /* KEPALA SEKOLAH CARD (Diperbaiki menjadi 1 card menyatu) */
  .principal-card-unified {
    background:#fff;border:1px solid var(--line);border-radius:22px;box-shadow:var(--shadow);
    display:grid;grid-template-columns:300px 1fr;overflow:hidden;gap:0;
  }
  .principal-sidebar {
    background:var(--green-soft);padding:36px 24px;display:flex;flex-direction:column;align-items:center;text-align:center;border-right:1px solid var(--line);justify-content:center;
  }
  .principal-img-box {
    width:150px;height:180px;border-radius:16px;overflow:hidden;box-shadow:0 8px 20px rgba(11,74,47,0.15);background:linear-gradient(135deg,var(--green-mid),var(--green-dark));margin-bottom:18px;position:relative;
  }
  .principal-img-box img {
    width:100%;height:100%;object-fit:cover;
  }
  .principal-img-placeholder {
    width:100%;height:100%;display:grid;place-items:center;color:#fff;font-size:48px;
  }
  .principal-sidebar h3 {
    font-size:16px;color:var(--ink);margin-bottom:4px;font-weight:700;
  }
  .principal-sidebar span {
    font-size:12.5px;color:var(--green);font-weight:600;
  }
  .principal-content {
    padding:36px 40px;position:relative;
  }
  .principal-content::before {
    content:"“";position:absolute;top:15px;right:30px;font-size:100px;color:var(--green-soft);font-family:'Georgia',serif;line-height:1;z-index:0;opacity:0.6;pointer-events:none;
  }
  .principal-speech-text {
    position:relative;z-index:1;color:var(--muted);font-size:14px;line-height:1.8;white-space:pre-line;
  }

  @media(max-width:900px){
    .principal-card-unified{grid-template-columns:1fr;}
    .principal-sidebar{border-right:none;border-bottom:1px solid var(--line);padding:28px 20px;}
    .principal-content{padding:28px 24px;}
  }

  /* VISI MISI */
  .vm-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
  .vm-card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:28px;}
  .vm-card .icon{width:48px;height:48px;border-radius:14px;background:var(--green-soft);color:var(--green);display:grid;place-items:center;font-size:22px;margin-bottom:16px;}
  .vm-card h3{font-size:16px;margin-bottom:10px;color:var(--ink);}
  .vm-card p{color:var(--muted);font-size:14px;}
  .misi-list{list-style:none;display:flex;flex-direction:column;gap:10px;}
  .misi-list li{display:flex;gap:10px;font-size:14px;color:var(--muted);align-items:flex-start;}
  .misi-list li i{color:var(--green);margin-top:3px;flex-shrink:0;}
  @media(max-width:800px){ .vm-grid{grid-template-columns:1fr;} }

  /* DATA SEKOLAH TABLE */
  .data-panel{background:#fff;border:1px solid var(--line);border-radius:18px;padding:8px;}
  .data-grid{display:grid;grid-template-columns:1fr 1fr;}
  .data-row{display:flex;justify-content:space-between;gap:16px;padding:16px 24px;border-bottom:1px solid var(--line);}
  .data-row label{font-size:13px;color:var(--muted);font-weight:600;}
  .data-row .val{font-size:13.5px;color:var(--ink);font-weight:700;text-align:right;}
  @media(max-width:700px){ .data-grid{grid-template-columns:1fr;} }

  /* KONTAK */
  .contact-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;}
  .contact-card{background:#fff;border:1px solid var(--line);border-radius:16px;padding:22px;text-align:center;transition:.2s;}
  .contact-card:hover{transform:translateY(-4px);box-shadow:var(--shadow);}
  .contact-card i{font-size:22px;color:var(--green);display:block;margin-bottom:10px;}
  .contact-card label{display:block;font-size:11px;text-transform:uppercase;color:var(--muted);font-weight:700;margin-bottom:6px;letter-spacing:.03em;}
  .contact-card .val{font-size:13px;color:var(--ink);font-weight:600;word-break:break-word;}
  @media(max-width:900px){ .contact-grid{grid-template-columns:1fr 1fr;} }
  @media(max-width:520px){ .contact-grid{grid-template-columns:1fr;} }

  .back-link{display:inline-flex;align-items:center;gap:6px;font-size:13.5px;font-weight:700;color:var(--green);margin-top:8px;}
  .back-link:hover{color:var(--green-dark);gap:9px;transition:.2s;}
</style>
</head>
<body>

<section class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?= base_url() ?>">Beranda</a>
      <span class="sep">/</span>
      <span class="current">Profil Sekolah</span>
    </div>

    <div class="hero-top">
      <?php if (!empty($profil->logo)): ?>
        <img class="hero-logo" src="<?= base_url('upload/profil/' . $profil->logo) ?>" alt="Logo">
      <?php else: ?>
        <div class="hero-logo-placeholder">MI</div>
      <?php endif; ?>
      <div>
        <h1><?= html_escape($profil->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></h1>
        <p><?= html_escape($profil->jenjang ?? 'Pendidikan Dasar Islam') ?> &middot; NPSN <?= html_escape($profil->npsn ?? '-') ?></p>
      </div>
    </div>

    <div class="summary-card">
      <div class="summary-photo">
        <?php if (!empty($profil->foto_sekolah)): ?>
          <img src="<?= base_url('upload/profil/' . $profil->foto_sekolah) ?>" alt="Gedung Sekolah">
        <?php else: ?>
          <div class="ph-icon"><i class="bi bi-building"></i></div>
        <?php endif; ?>
      </div>
      <div class="summary-body">
        <span class="eyebrow">Tentang Kami</span>
        <p>
          <?= !empty($profil->sejarah)
              ? nl2br(html_escape(mb_strimwidth(strip_tags($profil->sejarah), 0, 280, '...')))
              : 'Lembaga pendidikan dasar yang mengintegrasikan kurikulum nasional dengan nilai-nilai Islam untuk membentuk generasi yang cerdas, berakhlak mulia, mandiri, dan siap menghadapi masa depan.' ?>
        </p>
        <div class="quick-facts">
          <div class="qf-item"><label>NPSN</label><div class="val"><?= html_escape($profil->npsn ?? '-') ?></div></div>
          <div class="qf-item"><label>Jenjang</label><div class="val"><?= html_escape($profil->jenjang ?? '-') ?></div></div>
          <div class="qf-item"><label>Akreditasi</label><div class="val"><?= html_escape($profil->akreditasi ?? '-') ?></div></div>
          <div class="qf-item"><label>Tahun Berdiri</label><div class="val"><?= html_escape($profil->tahun_berdiri ?? '-') ?></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SAMBUTAN KEPALA SEKOLAH (Card yang Menyatu & Rapi) -->
<section class="block">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Sambutan</span>
      <h2>Sambutan Kepala Sekolah</h2>
    </div>
    
    <div class="principal-card-unified">
      <div class="principal-sidebar">
        <div class="principal-img-box">
          <?php if (!empty($profil->foto_kepala_sekolah)): ?>
            <img src="<?= base_url('upload/foto_guru/' . $profil->foto_kepala_sekolah) ?>" alt="<?= html_escape($profil->kepala_sekolah ?? 'Kepala Sekolah') ?>">
          <?php elseif (!empty($profil->foto_kepala_sekolah)): ?>
            <img src="<?= base_url('upload/profil/' . $profil->foto_kepala_sekolah) ?>" alt="Kepala Sekolah">
          <?php else: ?>
            <div class="principal-img-placeholder"><i class="bi bi-person-fill"></i></div>
          <?php endif; ?>
        </div>
        <h3><?= html_escape($profil->kepala_sekolah ?? 'Kepala Sekolah') ?></h3>
        <span>Kepala Madrasah</span>
      </div>
      
      <div class="principal-content">
        <div class="principal-speech-text">
          <?= !empty($profil->sambutan_kepala) ? nl2br(html_escape($profil->sambutan_kepala)) : 'Assalamu’alaikum Wr. Wb. Selamat datang di website resmi sekolah kami. Kami berkomitmen untuk memberikan pendidikan terbaik yang mengintegrasikan ilmu pengetahuan umum dan nilai-nilai keislaman demi mencetak generasi yang cerdas, berakhlak mulia, serta berkarakter.' ?>
        </div>
      </div>
    </div>

  </div>
</section>

<?php if (!empty($profil->sejarah)): ?>
<section class="block alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Sejarah</span>
      <h2>Sejarah Berdirinya Sekolah</h2>
    </div>
    <div class="prose"><?= nl2br(html_escape($profil->sejarah)) ?></div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($profil->visi) || !empty($profil->misi)): ?>
<section class="block">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Arah &amp; Tujuan</span>
      <h2>Visi &amp; Misi</h2>
    </div>
    <div class="vm-grid">
      <div class="vm-card">
        <div class="icon"><i class="bi bi-eye-fill"></i></div>
        <h3>Visi</h3>
        <p><?= !empty($profil->visi) ? nl2br(html_escape($profil->visi)) : 'Visi sekolah belum diisi.' ?></p>
      </div>
      <div class="vm-card">
        <div class="icon"><i class="bi bi-flag-fill"></i></div>
        <h3>Misi</h3>
        <?php if (!empty($profil->misi)): ?>
          <ul class="misi-list">
            <?php foreach (preg_split('/\r\n|\r|\n/', trim($profil->misi)) as $baris_misi): ?>
              <?php if (trim($baris_misi) !== ''): ?>
                <li><i class="bi bi-check-circle-fill"></i><span><?= html_escape(trim($baris_misi)) ?></span></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>Misi sekolah belum diisi.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="block alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Identitas</span>
      <h2>Data Sekolah</h2>
    </div>
    <div class="data-panel">
      <div class="data-grid">
        <div class="data-row"><label>Nama Sekolah</label><div class="val"><?= html_escape($profil->nama_sekolah ?? '-') ?></div></div>
        <div class="data-row"><label>NPSN</label><div class="val"><?= html_escape($profil->npsn ?? '-') ?></div></div>
        <div class="data-row"><label>Jenjang</label><div class="val"><?= html_escape($profil->jenjang ?? '-') ?></div></div>
        <div class="data-row"><label>Status Akreditasi</label><div class="val"><?= html_escape($profil->akreditasi ?? '-') ?></div></div>
        <div class="data-row"><label>Tahun Berdiri</label><div class="val"><?= html_escape($profil->tahun_berdiri ?? '-') ?></div></div>
        <div class="data-row"><label>Status Kepemilikan</label><div class="val"><?= html_escape($profil->status_kepemilikan ?? '-') ?></div></div>
        <div class="data-row"><label>Kepala Sekolah</label><div class="val"><?= html_escape($profil->kepala_sekolah ?? '-') ?></div></div>
        <div class="data-row"><label>Jumlah Guru</label><div class="val"><?= html_escape($jumlah_guru ?? '-') ?></div></div>
      </div>
    </div>
  </div>
</section>

<section class="block">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Hubungi Kami</span>
      <h2>Informasi Kontak</h2>
    </div>
    <div class="contact-grid">
      <div class="contact-card">
        <i class="bi bi-geo-alt-fill"></i>
        <label>Alamat</label>
        <div class="val"><?= html_escape($kontak->alamat ?? '-') ?></div>
      </div>
      <div class="contact-card">
        <i class="bi bi-telephone-fill"></i>
        <label>Telepon</label>
        <div class="val"><?= html_escape($kontak->telepon ?? '-') ?></div>
      </div>
      <div class="contact-card">
        <i class="bi bi-envelope-fill"></i>
        <label>Email</label>
        <div class="val"><?= html_escape($kontak->email ?? '-') ?></div>
      </div>
      <div class="contact-card">
        <i class="bi bi-clock-fill"></i>
        <label>Jam Operasional</label>
        <div class="val"><?= html_escape($kontak->jam_operasional ?? '-') ?></div>
      </div>
    </div>
  </div>
</section>

<section class="block alt">
  <div class="container">
    <a href="<?= base_url() ?>" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
  </div>
</section>

</body>
</html>