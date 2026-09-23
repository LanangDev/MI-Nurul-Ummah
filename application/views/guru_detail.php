<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= html_escape($guru->nama_guru) ?> - <?= html_escape($kontak->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,500;0,600;0,700;1,500&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  :root{
    --forest-deep:#0c3d2c; --forest:#145c40; --forest-mid:#227a54; --forest-soft:#eaf3ee;
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
    position:relative;overflow:hidden;padding:40px 0 74px;
    background:
      radial-gradient(ellipse at top right, rgba(217,169,74,.18), transparent 55%),
      url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%28255%2C255%2C255%2C0.14%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E") repeat,
      linear-gradient(135deg,var(--forest-deep) 0%,var(--forest) 55%,var(--forest-mid) 100%);
  }
  .breadcrumb{color:#b6d8c4;font-size:12.5px;margin-bottom:20px;display:flex;gap:6px;align-items:center;flex-wrap:wrap;}
  .breadcrumb a:hover{color:#fff;}
  .breadcrumb .sep{opacity:.6;}
  .breadcrumb .current{color:#fff;font-weight:600;}

  .profile-card{
    background:var(--panel);border-radius:20px;box-shadow:var(--shadow);
    padding:30px 32px;display:flex;gap:24px;align-items:center;
    position:relative;z-index:3;
  }
  .profile-photo{width:112px;height:112px;border-radius:16px;object-fit:cover;flex-shrink:0;box-shadow:0 8px 20px rgba(12,61,44,.16);}
  .profile-photo-placeholder{
    width:112px;height:112px;border-radius:16px;flex-shrink:0;
    background:linear-gradient(135deg,var(--forest-mid),var(--forest-deep));
    color:#fff;display:grid;place-items:center;font-size:38px;font-weight:700;font-family:'Spectral',serif;
    box-shadow:0 8px 20px rgba(12,61,44,.16);
  }
  .profile-main h1{font-size:23px;color:var(--ink);margin-bottom:10px;}
  .profile-tags{display:flex;gap:8px;flex-wrap:wrap;}
  .tag{display:inline-flex;align-items:center;gap:6px;padding:6px 13px;border-radius:999px;font-size:12.5px;font-weight:700;}
  .tag.jabatan{background:var(--forest-soft);color:var(--forest);}
  .tag.status{background:#f3e6de;color:var(--clove);}
  .tag.mapel{background:#fbf1de;color:var(--brass);}

  @media(max-width:640px){ .profile-card{flex-direction:column;text-align:center;padding:26px 22px;} .profile-tags{justify-content:center;} }

  section.main{padding:44px 0 70px;}
  .content-wrap{display:grid;grid-template-columns:2.1fr 1fr;gap:32px;align-items:start;}

  .panel{background:var(--panel);border:1px solid var(--line);border-radius:18px;padding:28px 30px;}
  .panel + .panel{margin-top:20px;}
  .panel h4{font-size:15.5px;color:var(--forest-deep);margin-bottom:18px;display:flex;align-items:center;gap:8px;}
  .panel h4 i{color:var(--brass);}

  .info-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px 24px;}
  .info-item{border-bottom:1px dashed var(--line);padding-bottom:12px;}
  .info-item label{display:block;font-size:11px;text-transform:uppercase;letter-spacing:.04em;color:var(--muted);font-weight:700;margin-bottom:5px;}
  .info-item .val{font-size:14.5px;color:var(--ink);font-weight:600;}
  .info-item .val.empty{color:var(--muted);font-weight:400;font-style:italic;}

  @media(max-width:520px){ .info-grid{grid-template-columns:1fr;} }

  .back-link{display:inline-flex;align-items:center;gap:7px;font-size:13.5px;font-weight:700;color:var(--forest);margin-top:26px;transition:.2s;}
  .back-link:hover{color:var(--forest-deep);gap:10px;}

  .sidebar h4{font-size:15.5px;color:var(--forest-deep);margin-bottom:16px;padding-bottom:12px;border-bottom:2px solid var(--line);display:flex;align-items:center;gap:8px;}
  .sidebar h4 i{color:var(--brass);}
  .side-card{display:flex;gap:12px;align-items:center;margin-bottom:6px;padding:10px;border-radius:12px;transition:.2s;}
  .side-card:hover{background:var(--forest-soft);}
  .side-card .thumb{width:56px;height:56px;border-radius:10px;object-fit:cover;flex-shrink:0;}
  .side-card .thumb-placeholder{
    width:56px;height:56px;border-radius:10px;flex-shrink:0;
    background:linear-gradient(135deg,var(--forest-mid),var(--forest-deep));
    color:#fff;display:grid;place-items:center;font-size:18px;font-weight:700;font-family:'Spectral',serif;
  }
  .side-card .info h5{font-size:13px;color:var(--ink);line-height:1.4;margin-bottom:3px;font-weight:600;}
  .side-card .info span{color:var(--forest);font-size:11.5px;font-weight:600;}
  .side-card:hover .info h5{color:var(--forest-deep);}
  .empty-note{color:var(--muted);font-size:13px;}
</style>
</head>
<body>

<section class="page-hero">
  <div class="container">
    <div class="breadcrumb">
      <a href="<?= base_url() ?>">Beranda</a>
      <span class="sep">/</span>
      <a href="<?= base_url('Data_guru') ?>">Data Guru</a>
      <span class="sep">/</span>
      <span class="current"><?= html_escape($guru->nama_guru) ?></span>
    </div>

    <div class="profile-card">
      <?php if (!empty($guru->foto) && file_exists('./upload/foto_guru/' . $guru->foto)): ?>
        <img class="profile-photo" src="<?= base_url('upload/foto_guru/' . $guru->foto) ?>" alt="<?= html_escape($guru->nama_guru) ?>">
      <?php else: ?>
        <div class="profile-photo-placeholder"><?= html_escape(strtoupper(substr($guru->nama_guru, 0, 1))) ?></div>
      <?php endif; ?>

      <div class="profile-main">
        <h1><?= html_escape($guru->nama_guru) ?></h1>
        <div class="profile-tags">
          <?php if (!empty($guru->jabatan)): ?>
            <span class="tag jabatan"><i class="bi bi-briefcase-fill"></i> <?= html_escape($guru->jabatan) ?></span>
          <?php endif; ?>
          <?php if (!empty($guru->mata_pelajaran)): ?>
            <span class="tag mapel"><i class="bi bi-journal-bookmark-fill"></i> <?= html_escape($guru->mata_pelajaran) ?></span>
          <?php endif; ?>
          <?php if (!empty($guru->status)): ?>
            <span class="tag status"><i class="bi bi-patch-check-fill"></i> <?= html_escape($guru->status) ?></span>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="main">
  <div class="container">
    <div class="content-wrap">

      <div class="article-body">
        <div class="panel">
          <h4><i class="bi bi-person-vcard-fill"></i> Data Diri</h4>
          <div class="info-grid">
            <div class="info-item">
              <label>NIP</label>
              <div class="val <?= empty($guru->nip) ? 'empty' : '' ?>"><?= !empty($guru->nip) ? html_escape($guru->nip) : 'Belum diisi' ?></div>
            </div>
            <div class="info-item">
              <label>NUPTK</label>
              <div class="val <?= empty($guru->nuptk) ? 'empty' : '' ?>"><?= !empty($guru->nuptk) ? html_escape($guru->nuptk) : 'Belum diisi' ?></div>
            </div>
            <div class="info-item">
              <label>Jenis Kelamin</label>
              <div class="val <?= empty($guru->jenis_kelamin) ? 'empty' : '' ?>"><?= !empty($guru->jenis_kelamin) ? html_escape($guru->jenis_kelamin) : 'Belum diisi' ?></div>
            </div>
            <div class="info-item">
              <label>Status Kepegawaian</label>
              <div class="val <?= empty($guru->status) ? 'empty' : '' ?>"><?= !empty($guru->status) ? html_escape($guru->status) : 'Belum diisi' ?></div>
            </div>
            <div class="info-item">
              <label>Jabatan</label>
              <div class="val <?= empty($guru->jabatan) ? 'empty' : '' ?>"><?= !empty($guru->jabatan) ? html_escape($guru->jabatan) : 'Belum diisi' ?></div>
            </div>
            <div class="info-item">
              <label>Mata Pelajaran</label>
              <div class="val <?= empty($guru->mata_pelajaran) ? 'empty' : '' ?>"><?= !empty($guru->mata_pelajaran) ? html_escape($guru->mata_pelajaran) : 'Belum diisi' ?></div>
            </div>
          </div>
        </div>

        <a href="<?= base_url('Data_guru') ?>" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Daftar Guru</a>
      </div>

      <aside class="sidebar">
        <h4><i class="bi bi-people-fill"></i> Guru Lainnya</h4>
        <?php if (!empty($guru_lain)): ?>
          <?php foreach ($guru_lain as $lain): ?>
            <a href="<?= base_url('Data_guru/detail/' . $lain->id_guru) ?>" class="side-card">
              <?php if (!empty($lain->foto) && file_exists('./upload/foto_guru/' . $lain->foto)): ?>
                <img class="thumb" src="<?= base_url('upload/foto_guru/' . $lain->foto) ?>" alt="<?= html_escape($lain->nama_guru) ?>">
              <?php else: ?>
                <div class="thumb-placeholder"><?= html_escape(strtoupper(substr($lain->nama_guru, 0, 1))) ?></div>
              <?php endif; ?>
              <div class="info">
                <h5><?= html_escape($lain->nama_guru) ?></h5>
                <?php if (!empty($lain->jabatan)): ?><span><?= html_escape($lain->jabatan) ?></span><?php endif; ?>
              </div>
            </a>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="empty-note">Belum ada guru lain.</p>
        <?php endif; ?>
      </aside>

    </div>
  </div>
</section>

</body>
</html>