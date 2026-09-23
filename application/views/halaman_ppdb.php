<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PPDB - MI Madrasah Ibtidaiyah</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{
    --green-dark:#0b4a2f;
    --green:#146b3a;
    --green-mid:#1c8a4c;
    --gold:#f2b705;
    --gold-dark:#d99a00;
    --ink:#16281f;
    --muted:#5c6b62;
    --line:#e4e9e3;
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  body{font-family:'Poppins',sans-serif;color:var(--ink);background:#fff;line-height:1.5;}
  img{max-width:100%;display:block;}
  a{text-decoration:none;color:inherit;}
  ul{list-style:none;}
  .container{max-width:1200px;margin:0 auto;padding:0 24px;}
  .btn{display:inline-flex;align-items:center;gap:8px;padding:13px 26px;border-radius:8px;font-weight:600;font-size:14.5px;cursor:pointer;border:none;transition:.2s;}
  .btn-gold{background:var(--gold);color:#3a2a00;box-shadow:0 6px 16px rgba(242,183,5,.28);}
  .btn-gold:hover{background:var(--gold-dark);transform:translateY(-2px);box-shadow:0 10px 20px rgba(242,183,5,.35);}
  .btn-white-outline{background:transparent;border:1.5px solid rgba(255,255,255,.6);color:#fff;}
  .btn-white-outline:hover{background:rgba(255,255,255,.12);border-color:#fff;transform:translateY(-2px);}
  .btn-outline{background:#fff;color:var(--green-dark);border:1.5px solid #d8ded9;}

  /* ===== topbar ===== */
  .topbar{background:var(--green-dark);color:#dfeee3;font-size:12px;padding:9px 0;overflow:hidden;border-bottom:1px solid rgba(255,255,255,.06);}
  .topbar .container{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:nowrap;
    gap:18px;
  }
  .topbar .container > div:first-child{
    flex:1 1 auto;
    min-width:0;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    font-weight:500;
    letter-spacing:.1px;
  }
  .topbar .right{
    display:flex;
    align-items:center;
    gap:18px;
    flex:0 0 auto;
    white-space:nowrap;
  }
  .topbar .right span{display:flex;align-items:center;gap:6px;white-space:nowrap;opacity:.95;}
  .topbar .social{display:flex;gap:8px;margin-left:6px;flex-shrink:0;}
  .topbar .social a{width:20px;height:20px;border:1px solid rgba(255,255,255,.35);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:9px;transition:.2s;}
  .topbar .social a:hover{background:var(--gold);border-color:var(--gold);color:#3a2a00;}

  /* ===== nav ===== */
  header.nav{background:#fff;border-bottom:1px solid var(--line);position:sticky;top:0;z-index:50;}
  .nav .container{display:flex;align-items:center;justify-content:space-between;padding:14px 24px;gap:20px;}
  .brand{display:flex;align-items:center;gap:12px;}
  .brand .logo{width:44px;height:44px;border-radius:50%;background:conic-gradient(from 180deg,var(--gold),var(--green-mid),var(--gold));display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
  .brand .logo span{background:#fff;width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;}
  .brand h1{font-size:15px;color:var(--green-dark);letter-spacing:.2px;}
  .brand p{font-size:11px;color:var(--muted);margin-top:1px;}
  nav.links{display:flex;align-items:center;gap:28px;flex:1;padding-left:20px;}
  nav.links a{font-size:14.5px;font-weight:500;color:#333;position:relative;padding:4px 0;}
  nav.links a::after{content:"";position:absolute;left:0;bottom:-2px;width:0;height:2px;background:var(--green);transition:.2s;}
  nav.links a:hover::after{width:100%;}
  nav.links a.active{color:var(--green);font-weight:600;}
  nav.links a:hover{color:var(--green);}

  /* ===== hero ===== */
  .page-hero{background:linear-gradient(120deg,var(--green-dark) 0%,var(--green) 55%,var(--green-mid) 100%);padding:50px 0 82px;position:relative;overflow:hidden;}
  .page-hero::before{content:"";position:absolute;width:340px;height:340px;border-radius:50%;background:rgba(255,255,255,.06);top:-140px;right:-80px;}
  .page-hero::after{content:"";position:absolute;width:220px;height:220px;border-radius:50%;background:rgba(242,183,5,.10);bottom:-100px;left:8%;}
  .page-hero .container{position:relative;z-index:2;}
  .page-hero .tag{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.14);color:#fff;padding:6px 15px;border-radius:30px;font-size:12.5px;margin-bottom:16px;}
  .page-hero h1{color:#fff;font-size:36px;margin-bottom:10px;letter-spacing:-.3px;}
  .page-hero p{color:#dcefe0;font-size:14.5px;max-width:560px;}
  .breadcrumb{color:#bcd9c6;font-size:12.5px;margin-bottom:16px;}
  .breadcrumb a{color:#bcd9c6;}
  .breadcrumb a:hover{color:#fff;}

  /* ===== status card ===== */
  .status-card{max-width:1120px;margin:-46px auto 0;background:#fff;border-radius:16px;box-shadow:0 18px 40px rgba(20,60,40,.14);position:relative;z-index:5;padding:26px 30px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;border-left:5px solid var(--green);}
  .status-card.tutup{border-left-color:#c82828;}
  .status-card .left{display:flex;align-items:center;gap:14px;}
  .status-card .dot{width:12px;height:12px;border-radius:50%;background:#1fa04d;box-shadow:0 0 0 5px #e3f6e8;flex-shrink:0;}
  .status-card.tutup .dot{background:#c82828;box-shadow:0 0 0 5px #f8e3e3;}
  .status-card b{display:block;font-size:15.5px;color:var(--green-dark);}
  .status-card small{color:var(--muted);font-size:12.5px;}
  .status-card .tahun{background:#e9f6ec;color:var(--green-dark);font-weight:700;padding:10px 20px;border-radius:10px;font-size:14px;white-space:nowrap;}

  section{padding:64px 0;}
  .section-head{margin-bottom:30px;text-align:left;}
  .section-head .eyebrow{color:var(--green-mid);font-weight:600;font-size:13px;display:flex;align-items:center;gap:6px;margin-bottom:8px;}
  .section-head h2{font-size:25px;color:var(--green-dark);letter-spacing:-.2px;}

  /* ===== pengumuman - grid kartu ===== */
  .pengumuman-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:24px;
  }
  .pengumuman-card{
    background:#fff;
    border:1px solid var(--line);
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 4px 14px rgba(20,60,40,.06);
    transition:.25s;
  }
  .pengumuman-card:hover{
    transform:translateY(-5px);
    box-shadow:0 14px 28px rgba(20,60,40,.13);
    border-color:transparent;
  }
  .pengumuman-card .card-img-wrap{position:relative;}
  .pengumuman-card .card-img{
    width:100%;
    height:175px;
    object-fit:cover;
    background:linear-gradient(135deg,var(--green-mid),var(--green-dark));
  }
  .status-badge{
    position:absolute;
    top:12px;
    right:12px;
    font-size:11.5px;
    font-weight:700;
    padding:5px 13px;
    border-radius:20px;
    backdrop-filter:blur(4px);
  }
  .status-buka{
    background:rgba(31,160,77,.9);
    color:#fff;
    border:1px solid rgba(31,160,77,.4);
  }
  .status-tutup{
    background:rgba(200,40,40,.88);
    color:#fff;
    border:1px solid rgba(200,40,40,.35);
  }
  .pengumuman-card .card-body{padding:19px 20px 20px;}
  .pengumuman-card .card-body h3{
    font-size:15.5px;
    color:var(--green-dark);
    margin-bottom:10px;
    line-height:1.4;
    min-height:44px;
  }
  .pengumuman-card .card-body .meta{
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:12.5px;
    color:var(--muted);
    padding-top:9px;
    border-top:1px dashed var(--line);
    margin-top:2px;
  }
  .pengumuman-card .card-body .meta b{color:var(--ink);}

  @media(max-width:900px){
    .pengumuman-grid{grid-template-columns:repeat(2,1fr);}
  }
  @media(max-width:600px){
    .pengumuman-grid{grid-template-columns:1fr;}
  }

  /* ===== koordinator (1 kartu, dipusatkan) ===== */
  .koor-wrap{display:flex;justify-content:center;}
  .koor-card{
    background:linear-gradient(135deg,var(--green-dark),var(--green));
    border-radius:18px;
    padding:32px 40px;
    color:#fff;
    display:flex;
    gap:22px;
    align-items:center;
    width:100%;
    max-width:560px;
    box-shadow:0 16px 34px rgba(11,74,47,.22);
  }
  .koor-card .avatar{width:66px;height:66px;border-radius:50%;background:rgba(255,255,255,.15);display:flex;align-items:center;justify-content:center;font-size:26px;flex-shrink:0;border:2px solid rgba(255,255,255,.3);}
  .koor-card .role{font-size:11.5px;color:var(--gold);font-weight:700;text-transform:uppercase;letter-spacing:.05em;margin-bottom:5px;}
  .koor-card b{font-size:17px;display:block;margin-bottom:8px;}
  .koor-card .phone{display:flex;align-items:center;gap:8px;font-size:14.5px;font-weight:600;background:rgba(255,255,255,.14);padding:8px 15px;border-radius:8px;width:fit-content;}

  /* ===== cta ===== */
  .cta-ppdb{background:linear-gradient(120deg,var(--green-dark),var(--green));border-radius:20px;padding:48px 40px;color:#fff;text-align:center;position:relative;overflow:hidden;}
  .cta-ppdb::before{content:"";position:absolute;width:260px;height:260px;border-radius:50%;background:rgba(242,183,5,.10);top:-120px;right:-60px;}
  .cta-ppdb::after{content:"";position:absolute;width:180px;height:180px;border-radius:50%;background:rgba(255,255,255,.05);bottom:-90px;left:-40px;}
  .cta-ppdb > *{position:relative;z-index:2;}
  .cta-ppdb h2{font-size:25px;margin-bottom:9px;}
  .cta-ppdb p{color:#dcefe0;font-size:14px;margin-bottom:26px;max-width:520px;margin-left:auto;margin-right:auto;}
  .cta-row{display:flex;gap:14px;justify-content:center;flex-wrap:wrap;}
  .cta-row .btn{padding:14px 30px;font-size:15px;}

  footer{background:var(--green-dark);color:#cfe1d3;padding:36px 0 22px;margin-top:10px;}
  footer .container{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;font-size:12.5px;}
  footer a:hover{color:#fff;}

  @media(max-width:900px){
    nav.links{display:none;}
    .status-card{flex-direction:column;align-items:flex-start;}
  }
  @media(max-width:600px){
    .page-hero{padding:40px 0 68px;}
    .page-hero h1{font-size:27px;}
    section{padding:46px 0;}
    .koor-card{flex-direction:column;text-align:center;padding:28px 26px;}
    .koor-card .phone{margin:0 auto;}
    footer .container{flex-direction:column;text-align:center;}
  }
</style>
</head>
<body>

<div class="topbar">
  <div class="container">
    <div>🕌 Selamat Datang di <?= html_escape($kontak->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></div>
    <div class="right">
      <span>📍 <?= html_escape($kontak->alamat ?? '-') ?></span>
      <span>📞 <?= html_escape($kontak->telepon ?? '-') ?></span>
      <span>✉️ <?= html_escape($kontak->email ?? '-') ?></span>
    </div>
  </div>
</div>

<header class="nav">
  <div class="container">
    <div class="brand">
      <?php if (!empty($kontak->logo)): ?>
        <img src="<?= base_url('upload/kontak/' . $kontak->logo) ?>" alt="Logo" style="width:44px;height:44px;border-radius:50%;object-fit:cover">
      <?php else: ?>
        <div class="logo"><span>🕌</span></div>
      <?php endif; ?>
      <div>
        <h1><?= html_escape(strtoupper($kontak->nama_sekolah ?? 'MI MADRASAH IBTIDAIYAH')) ?></h1>
        <p><?= html_escape($kontak->jenjang ?? 'Islami, Cerdas, Berkarakter') ?></p>
      </div>
    </div>
    <nav class="links">
      <a href="<?= base_url('landing_page') ?>" ><b>Beranda</b></a>
    </nav>
    <a href="<?= base_url('auth/login');?>" class="btn btn-gold">Login -></a>
  </div>
</header>

<section class="page-hero">
  <div class="container">
    <div class="breadcrumb"><a href="<?= base_url() ?>">Beranda</a> / PPDB</div>
    <div class="tag">📝 Penerimaan Peserta Didik Baru</div>
    <h1>Pendaftaran Peserta Didik Baru</h1>
    <p>Bergabunglah bersama <?= html_escape($kontak->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?> dan wujudkan pendidikan Islami, cerdas, dan berkarakter untuk putra-putri Anda.</p>
  </div>
</section>

<div class="container">
  <?php $statusTerbuka = (strtolower(trim($ppdb->status ?? '')) === 'buka'); ?>
  <div class="status-card <?= $statusTerbuka ? '' : 'tutup' ?>">
    <div class="left">
      <div class="dot"></div>
      <div>
        <b><?= $statusTerbuka ? 'Pendaftaran Sedang Dibuka' : 'Pendaftaran Sedang Ditutup' ?></b>
        <small><?= $statusTerbuka ? 'Kuota tersisa terbatas, segera lakukan pendaftaran' : 'Nantikan info pendaftaran periode berikutnya' ?></small>
      </div>
    </div>
    <div class="tahun">Tahun Ajaran <?= html_escape($ppdb->tahun_ajaran ?? '-') ?></div>
  </div>
</div>

<section id="pengumuman">
  <div class="container">
    <div class="section-head">
      <div class="eyebrow">📢 Pengumuman Resmi</div>
      <h2>Pengumuman Penerimaan Peserta Didik Baru</h2>
    </div>

    <div class="pengumuman-grid">
      <?php if (!empty($ppdb_list)): ?>
        <?php foreach ($ppdb_list as $p): ?>
        <?php $isBuka = (strtolower(trim($p['status'] ?? '')) === 'buka'); ?>
        <article class="pengumuman-card">
          <div class="card-img-wrap">
            <?php if (!empty($p['foto'])): ?>
              <img class="card-img" src="<?= base_url('upload/foto_ppdb/' . $p['foto']) ?>" alt="<?= html_escape($p['judul']) ?>">
            <?php else: ?>
              <div class="card-img"></div>
            <?php endif; ?>

            <?php if ($isBuka): ?>
              <span class="status-badge status-buka">🟢 Dibuka</span>
            <?php else: ?>
              <span class="status-badge status-tutup">🔴 Ditutup</span>
            <?php endif; ?>
          </div>
          <div class="card-body">
            <h3><?= html_escape($p['judul']) ?></h3>
            <div class="meta">
              <span>Tahun Ajaran</span>
              <b><?= html_escape($p['tahun_ajaran']) ?></b>
            </div>
            <div class="meta">
              <span>Koordinator</span>
              <b><?= html_escape($p['nama_kordinator']) ?></b>
            </div>
          </div>
        </article>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="text-align:center;color:var(--muted);grid-column:1/-1">Belum ada data PPDB.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<section id="koordinator" style="background:#f6faf6;">
  <div class="container">
    <div class="section-head" style="text-align:center;">
      <div class="eyebrow" style="justify-content:center;">☎️ Butuh Bantuan?</div>
      <h2>Koordinator PPDB Tahun Ajaran <?= html_escape($ppdb->tahun_ajaran ?? '-') ?></h2>
    </div>
    <div class="koor-wrap">
      <div class="koor-card">
        <div class="avatar">👳</div>
        <div>
          <div class="role">Koordinator PPDB</div>
          <b><?= html_escape($ppdb->nama_kordinator ?? 'Koordinator PPDB') ?></b>
          <div class="phone">📱 <?= html_escape($ppdb->nomor_kordinator ?? '-') ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="daftar">
  <div class="container">
    <div class="cta-ppdb">
      <h2>Jangan Lewatkan Kesempatan Ini!</h2>
      <p>Segera daftarkan putra-putri Anda sebelum kuota Tahun Ajaran <?= html_escape($ppdb->tahun_ajaran ?? '-') ?> terpenuhi. Untuk informasi lebih lanjut silakan hubungi koordinator PPDB kami.</p>
      <div class="cta-row">
        <a href="https://wa.me/<?= html_escape($ppdb->nomor_kordinator ?? '-') ?>" class="btn btn-gold">📞 Hubungi Koordinator</a>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="container">
    <div>© <?= date('Y') ?> <?= html_escape($kontak->nama_sekolah ?? 'MI Madrasah Ibtidaiyah') ?>. All Rights Reserved.</div>
    <div><a href="<?= base_url() ?>">← Kembali ke Beranda</a></div>
  </div>
</footer>

</body>
</html>