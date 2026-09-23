<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Berita &amp; Pengumuman - <?= html_escape($kontak->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></title>
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
    color:var(--ink);background:var(--ivory);line-height:1.6;font-size:15.5px;
    background-image:url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%2812%2C61%2C44%2C0.055%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E");
  }
  h1,h2,h3{font-family:'Spectral',Georgia,serif;color:var(--forest-deep);font-weight:600;line-height:1.2;}
  img{max-width:100%;display:block;}
  a{text-decoration:none;color:inherit;}
  .container{max-width:1180px;margin:0 auto;padding:0 24px;}

  .page-hero{
    position:relative;overflow:hidden;padding:50px 0 40px;
    background:
      radial-gradient(ellipse at top right, rgba(217,169,74,.18), transparent 55%),
      url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%28255%2C255%2C255%2C0.14%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E") repeat,
      linear-gradient(135deg,var(--forest-deep) 0%,var(--forest) 55%,var(--forest-mid) 100%);
  }
  .breadcrumb{color:#b6d8c4;font-size:12.5px;margin-bottom:16px;}
  .breadcrumb a:hover{color:#fff;}
  .kicker{font-family:'Spectral',Georgia,serif;font-style:italic;font-weight:500;color:var(--brass-light);font-size:14.5px;display:block;margin-bottom:8px;}
  .page-hero h1{color:#fff;font-size:32px;margin-bottom:10px;}
  .page-hero p{color:#dcefe0;font-size:14.5px;max-width:560px;}
  .tumpal{
    height:15px;width:100%;
    background:
      linear-gradient(-45deg, transparent 7.5px, var(--brass) 7.5px) 0 0/15px 15px repeat-x,
      linear-gradient(45deg, transparent 7.5px, var(--brass) 7.5px) 0 0/15px 15px repeat-x;
    background-position:0 0, 7.5px 0;
  }

  section{padding:56px 0 70px;}
  .berita-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:26px;}
  .berita-card{background:var(--panel);border:1px solid var(--line);border-radius:16px;overflow:hidden;box-shadow:0 6px 18px rgba(12,61,44,.06);transition:.25s;display:flex;flex-direction:column;}
  .berita-card:hover{transform:translateY(-5px);box-shadow:var(--shadow);}
  .berita-card .img-wrap{width:100%;height:175px;background:linear-gradient(135deg,var(--forest-mid),var(--forest-deep));position:relative;}
  .berita-card .img-wrap img{width:100%;height:100%;object-fit:cover;}
  .berita-card .body{padding:20px 22px 22px;display:flex;flex-direction:column;flex:1;}
  .berita-card .tanggal{font-size:12px;color:var(--brass);font-weight:700;display:flex;align-items:center;gap:6px;margin-bottom:9px;}
  .berita-card h3{font-size:16.5px;color:var(--forest-deep);line-height:1.4;margin-bottom:10px;min-height:44px;}
  .berita-card .excerpt{font-size:13px;color:var(--muted);margin-bottom:16px;flex:1;}
  .berita-card .read-more{font-size:13.5px;font-weight:700;color:var(--forest);border-bottom:1px solid transparent;align-self:flex-start;margin-top:auto;transition:.2s;}
  .berita-card:hover .read-more{border-color:var(--forest);color:var(--forest-deep);}

  .empty-state{text-align:center;color:var(--muted);padding:60px 0;grid-column:1/-1;border:1px dashed var(--line);border-radius:16px;background:var(--panel);}

  @media(max-width:900px){ .berita-grid{grid-template-columns:repeat(2,1fr);} }
  @media(max-width:600px){ .berita-grid{grid-template-columns:1fr;} .page-hero h1{font-size:26px;} }

  .back-link{display:inline-flex;align-items:center;gap:7px;font-size:13.5px;font-weight:700;color:var(--forest);margin-top:30px;transition:.2s;}
  .back-link:hover{color:var(--forest-deep);gap:10px;}
</style>
</head>
<body>

<section class="page-hero">
  <div class="container">
    <div class="breadcrumb"><a href="<?= base_url() ?>">Beranda</a> / Berita &amp; Pengumuman</div>
    <span class="kicker">Informasi terbaru</span>
    <h1>Berita &amp; Pengumuman</h1>
    <p>Ikuti kabar dan informasi terbaru seputar <?= html_escape($kontak->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?>.</p>
  </div>
</section>
<div class="tumpal"></div>

<section>
  <div class="container">
    <div class="berita-grid">
      <?php if (!empty($berita_list)): ?>
        <?php foreach ($berita_list as $row): ?>
          <?php
            // Ambil cuplikan isi (tanpa HTML) maksimal 110 karakter
            $excerpt = strip_tags($row->isi);
            $excerpt = (strlen($excerpt) > 110) ? substr($excerpt, 0, 110) . '...' : $excerpt;
          ?>
          <article class="berita-card">
            <div class="img-wrap">
              <?php if (!empty($row->foto) && file_exists('./upload/pengumuman/' . $row->foto)): ?>
                <img src="<?= base_url('upload/pengumuman/' . $row->foto) ?>" alt="<?= html_escape($row->judul) ?>">
              <?php endif; ?>
            </div>
            <div class="body">
              <div class="tanggal"><i class="bi bi-calendar3"></i> <?= date('d M Y', strtotime($row->tanggal)) ?></div>
              <h3><?= html_escape($row->judul) ?></h3>
              <p class="excerpt"><?= html_escape($excerpt) ?></p>
              <a href="<?= base_url('Berita/detail/' . $row->id_pengumuman) ?>" class="read-more">
                Baca selengkapnya
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="empty-state">Belum ada berita atau pengumuman.</div>
      <?php endif; ?>
    </div>
    <a href="<?= base_url('landing_page') ?>" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
  </div>
</section>

</body>
</html>