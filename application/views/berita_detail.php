<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= html_escape($berita->judul) ?> - <?= html_escape($kontak->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,500;0,600;0,700;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  :root{
    --forest-deep:#0c3d2c; --forest:#145c40; --forest-mid:#227a54;
    --brass:#b8862f; --brass-light:#d9a94a; --clove:#7a4130;
    --ivory:#f6f2e5; --panel:#fffdf8; --ink:#1c2b22; --muted:#66756a; --line:#e2d6b8;
    --shadow:0 14px 34px rgba(12,61,44,.12);
  }
  *{box-sizing:border-box;margin:0;padding:0;}
  body{
    font-family:'Plus Jakarta Sans',ui-sans-serif,system-ui,sans-serif;
    color:var(--ink);background:var(--ivory);line-height:1.7;font-size:15.5px;
    background-image:url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%2812%2C61%2C44%2C0.055%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E");
  }
  h1,h2,h3{font-family:'Spectral',Georgia,serif;color:var(--forest-deep);font-weight:600;line-height:1.25;}
  img{max-width:100%;display:block;}
  a{text-decoration:none;color:inherit;}
  .container{max-width:1180px;margin:0 auto;padding:0 24px;}

  .page-hero{
    position:relative;overflow:hidden;padding:46px 0 34px;
    background:
      radial-gradient(ellipse at top right, rgba(217,169,74,.18), transparent 55%),
      url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%28255%2C255%2C255%2C0.14%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E") repeat,
      linear-gradient(135deg,var(--forest-deep) 0%,var(--forest) 55%,var(--forest-mid) 100%);
  }
  .breadcrumb{color:#b6d8c4;font-size:12.5px;margin-bottom:16px;}
  .breadcrumb a:hover{color:#fff;}
  .kicker{font-family:'Spectral',Georgia,serif;font-style:italic;font-weight:500;color:var(--brass-light);font-size:14.5px;display:block;margin-bottom:8px;}
  .page-hero h1{color:#fff;font-size:29px;line-height:1.35;max-width:820px;}
  .page-hero .tanggal{color:#dcefe0;font-size:13px;margin-top:14px;display:flex;align-items:center;gap:7px;}
  .tumpal{
    height:15px;width:100%;
    background:
      linear-gradient(-45deg, transparent 7.5px, var(--brass) 7.5px) 0 0/15px 15px repeat-x,
      linear-gradient(45deg, transparent 7.5px, var(--brass) 7.5px) 0 0/15px 15px repeat-x;
    background-position:0 0, 7.5px 0;
  }

  section{padding:52px 0 72px;}
  .content-wrap{display:grid;grid-template-columns:2.1fr 1fr;gap:38px;align-items:start;}

  .article-body{background:var(--panel);border:1px solid var(--line);border-radius:18px;padding:32px;box-shadow:var(--shadow);}
  .article-banner{width:100%;max-height:400px;object-fit:cover;border-radius:12px;margin-bottom:26px;}
  .article-text{font-size:15.5px;color:#2b3a32;white-space:pre-line;}
  .back-link{display:inline-flex;align-items:center;gap:7px;font-size:13.5px;font-weight:700;color:var(--forest);margin-top:30px;transition:.2s;}
  .back-link:hover{color:var(--forest-deep);gap:10px;}

  .sidebar{background:var(--panel);border:1px solid var(--line);border-radius:18px;padding:24px;}
  .sidebar h4{font-family:'Spectral',Georgia,serif;font-size:16px;font-weight:600;color:var(--forest-deep);margin-bottom:16px;padding-bottom:14px;border-bottom:2px solid var(--line);display:flex;align-items:center;gap:8px;}
  .sidebar h4 i{color:var(--brass);}
  .side-card{display:flex;gap:12px;align-items:center;margin-bottom:6px;padding:10px;border-radius:12px;transition:.2s;}
  .side-card:hover{background:#eef4ec;}
  .side-card .thumb{width:64px;height:56px;border-radius:9px;object-fit:cover;flex-shrink:0;background:linear-gradient(135deg,var(--forest-mid),var(--forest-deep));}
  .side-card .info h5{font-size:13px;color:var(--ink);line-height:1.4;margin-bottom:4px;font-weight:600;}
  .side-card .info small{color:var(--muted);font-size:11.5px;}
  .side-card:hover .info h5{color:var(--forest);}

  @media(max-width:900px){
    .content-wrap{grid-template-columns:1fr;}
    .page-hero h1{font-size:23px;}
  }
</style>
</head>
<body>

<section class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?= base_url() ?>">Beranda</a> /
      <a href="<?= base_url('Berita') ?>">Berita &amp; Pengumuman</a> /
      <?= html_escape($berita->judul) ?>
    </div>
    <span class="kicker">Kabar madrasah</span>
    <h1><?= html_escape($berita->judul) ?></h1>
    <div class="tanggal"><i class="bi bi-calendar3"></i> <?= date('d F Y', strtotime($berita->tanggal)) ?></div>
  </div>
</section>
<div class="tumpal"></div>

<section>
  <div class="container">
    <div class="content-wrap">

      <div class="article-body">
        <?php if (!empty($berita->foto) && file_exists('./upload/pengumuman/' . $berita->foto)): ?>
          <img class="article-banner" src="<?= base_url('upload/pengumuman/' . $berita->foto) ?>" alt="<?= html_escape($berita->judul) ?>">
        <?php endif; ?>

        <div class="article-text"><?= nl2br(html_escape($berita->isi)) ?></div>

        <a href="<?= base_url('Berita') ?>" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Berita</a>
      </div>

      <aside class="sidebar">
        <h4><i class="bi bi-newspaper"></i> Berita Lainnya</h4>
        <?php if (!empty($berita_lain)): ?>
          <?php foreach ($berita_lain as $lain): ?>
            <a href="<?= base_url('Berita/detail/' . $lain->id_pengumuman) ?>" class="side-card">
              <?php if (!empty($lain->foto) && file_exists('./upload/pengumuman/' . $lain->foto)): ?>
                <img class="thumb" src="<?= base_url('upload/pengumuman/' . $lain->foto) ?>" alt="<?= html_escape($lain->judul) ?>">
              <?php else: ?>
                <div class="thumb"></div>
              <?php endif; ?>
              <div class="info">
                <h5><?= html_escape($lain->judul) ?></h5>
                <small><?= date('d M Y', strtotime($lain->tanggal)) ?></small>
              </div>
            </a>
          <?php endforeach; ?>
        <?php else: ?>
          <p style="color:var(--muted);font-size:13px;">Belum ada berita lain.</p>
        <?php endif; ?>
      </aside>

    </div>
  </div>
</section>

</body>
</html>