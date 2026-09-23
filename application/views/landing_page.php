<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= html_escape($profil->nama_sekolah ?? 'MI Madrasah Ibtidaiyah') ?> | Website Sekolah</title>
  <meta name="description" content="Website resmi <?= html_escape($profil->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?>">
  <link rel="icon" type="image/png" href="<?= base_url(!empty($profil->logo) ? 'upload/profil/' . $profil->logo : 'regal-1.0.0/images/MI.png') ?>" />
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
      --container:1180px;
    }
    *{box-sizing:border-box;margin:0;padding:0}
    html{scroll-behavior:smooth; overflow-x: hidden;}
    body{
      font-family:'Plus Jakarta Sans',ui-sans-serif,system-ui,sans-serif;
      color:var(--ink);background:var(--ivory);line-height:1.65;font-size:15.5px;
      overflow-x:hidden; width: 100%;
      background-image:url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%2812%2C61%2C44%2C0.05%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E");
    }
    a{text-decoration:none;color:inherit}
    img{display:block;width:100%;object-fit:cover}
    .container{width:min(var(--container),calc(100% - 36px));margin:auto}
    .section{padding:80px 0}
    .section-head{text-align:center;margin-bottom:38px}
    .kicker{font-family:'Spectral',Georgia,serif;font-style:italic;font-weight:500;color:var(--brass);font-size:15px;display:block;margin-bottom:8px}
    h1,h2,h3{font-family:'Spectral',Georgia,serif;color:var(--forest-deep);font-weight:600;line-height:1.2}
    h2{font-size:clamp(27px,4vw,38px)}
    .section-head p{color:var(--muted);max-width:620px;margin:12px auto 0}

    .read-more{
      display:inline-flex;align-items:center;gap:6px;margin-top:16px;
      font-size:13.5px;font-weight:700;color:var(--forest);
      border-bottom:1px solid transparent;
    }
    .read-more:hover{border-color:var(--forest);color:var(--forest-deep)}

    .tumpal{
      height:15px;width:100%;
      background:
        linear-gradient(-45deg, transparent 7.5px, var(--brass) 7.5px) 0 0/15px 15px repeat-x,
        linear-gradient(45deg, transparent 7.5px, var(--brass) 7.5px) 0 0/15px 15px repeat-x;
      background-position:0 0, 7.5px 0;
    }

    /* card image placeholder */
    .card-img,.gallery-item,.thumb-placeholder{
      display:flex;align-items:center;justify-content:center;
      background:linear-gradient(135deg,var(--forest-mid),var(--forest-deep));
      color:#fff;font-size:26px;position:relative;overflow:hidden;
    }
    .card-img::before,.gallery-item::before,.thumb-placeholder::before{
      content:"";position:absolute;inset:0;
      background-image:url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2790%27%20height%3D%2790%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27%23d9b569%27%20stroke-width%3D%271%27%20opacity%3D%270.45%27%3E%3Ccircle%20cx%3D%2745%27%20cy%3D%270%27%20r%3D%2726%27/%3E%3Ccircle%20cx%3D%2745%27%20cy%3D%2790%27%20r%3D%2726%27/%3E%3Ccircle%20cx%3D%270%27%20cy%3D%2745%27%20r%3D%2726%27/%3E%3Ccircle%20cx%3D%2790%27%20cy%3D%2745%27%20r%3D%2726%27/%3E%3Ccircle%20cx%3D%2745%27%20cy%3D%2745%27%20r%3D%2713%27/%3E%3C/g%3E%3C/svg%3E");
      background-size:90px 90px;
    }
    .card-img i,.gallery-item i,.thumb-placeholder i{position:relative;z-index:1}
    .card-img img,.gallery-item img{position:relative;z-index:1}

    /* TOPBAR */
    .topbar{background:var(--forest-deep);color:#fff;font-size:12.5px;padding:8px 0;}
    .topbar-inner{
      display:flex;align-items:center;justify-content:space-between;gap:15px;
      flex-wrap:wrap;
    }
    .topbar .left-info {
      display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
    }
    .topbar .right{display:flex;gap:15px;opacity:.9;align-items:center;flex-wrap:wrap;}
    .topbar .right span, .topbar .left-info span {
      display: inline-flex; align-items: center; gap: 5px;
    }

    /* NAVBAR */
    .navbar{
      position:sticky;top:0;z-index:50;background:rgba(255,253,248,.95);
      backdrop-filter:blur(14px);border-bottom:1px solid var(--line)
    }
    .nav-inner{min-height:78px;display:flex;align-items:center;justify-content:space-between;gap:15px;padding:10px 0;}
    .brand{display:flex;align-items:center;gap:10px;flex: 1; min-width: 0;}
    .brand div{overflow:hidden;}
    .logo{
      width:42px;height:42px;border-radius:12px;flex-shrink:0;
      background:linear-gradient(135deg,var(--forest-mid),var(--forest-deep));
      color:#fff;display:grid;place-items:center;font-size:18px;font-weight:700;font-family:'Spectral',serif;
      box-shadow:0 7px 18px rgba(12,61,44,.22)
    }
    .brand strong{display:block;font-size:13.5px;color:var(--ink);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
    .brand span{display:block;color:var(--muted);font-size:11px}
    .nav-links{display:flex;align-items:center;gap:22px;font-size:14px;font-weight:600}
    .nav-links a{position:relative;padding:4px 0}
    .nav-links a::after{content:"";position:absolute;left:0;bottom:-2px;width:0;height:2px;background:var(--brass);transition:.2s}
    .nav-links a:hover::after{width:100%}
    .nav-links a:hover{color:var(--forest)}
    
    .nav-cta,.btn-primary{
      background:var(--brass);color:#fff;padding:12px 18px;border-radius:10px;
      font-weight:700;border:0;cursor:pointer;transition:.2s;display:inline-flex;align-items:center;gap:7px;
      white-space: nowrap;
    }
    .nav-cta:hover,.btn-primary:hover{background:#9c6f26}
    
    /* Pengaturan Tombol Login Mobile & Desktop */
    .mobile-login-btn { display: none; } /* Default tersembunyi di desktop */
    .desktop-login-btn { display: inline-flex; } /* Tampil di desktop */

    .menu-btn{display:none;border:0;background:transparent;font-size:26px;cursor:pointer;color:var(--forest-deep);flex-shrink:0;padding:4px;}

    /* HERO */
    .hero{
      min-height:600px;display:flex;align-items:center;color:#fff;position:relative;overflow:hidden;
      background-color:var(--forest-deep);
      background-image:
        radial-gradient(ellipse at top right, rgba(217,169,74,.2), transparent 55%),
        url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%28255%2C255%2C255%2C0.14%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E") repeat,
        linear-gradient(115deg,rgba(12,61,44,.97) 0%,rgba(20,92,64,.9) 45%,rgba(20,92,64,.4) 100%),
        url("assets/hero.jpg");
      background-position:center;background-size:auto,84px 84px,cover,cover;background-repeat:no-repeat,repeat,no-repeat,no-repeat;
    }
    .hero:after{
      content:"";position:absolute;inset:auto -5% -100px -5%;height:190px;background:var(--ivory);
      border-radius:50% 50% 0 0/45% 45% 0 0;
    }
    .hero-content{max-width:680px;position:relative;z-index:2;padding:65px 0 120px}
    .hero small{font-size:16px;font-weight:700;color:var(--brass-light);letter-spacing:.02em}
    .hero h1{font-size:clamp(36px,5.6vw,68px);margin:10px 0 18px;color:#fff}
    .hero h1 span{color:var(--brass-light)}
    .hero p{max-width:580px;color:#e6f2ea;font-size:16px}
    .hero-buttons{display:flex;gap:12px;margin-top:28px;flex-wrap:wrap}
    .btn-secondary{
      padding:13px 20px;border:1px solid rgba(255,255,255,.65);border-radius:10px;
      color:#fff;font-weight:700;transition:.2s;display:inline-flex;align-items:center;gap:7px;
    }
    .btn-secondary:hover{background:rgba(255,255,255,.12);border-color:#fff}
    .accreditation{
      position:absolute;right:5%;bottom:145px;z-index:3;background:var(--panel);color:var(--forest-deep);
      padding:16px 20px;border-radius:16px;text-align:center;box-shadow:var(--shadow)
    }
    .accreditation i{color:var(--brass);font-size:18px;margin-bottom:4px;display:block}
    .accreditation b{font-size:40px;display:block;line-height:1;font-family:'Spectral',serif}
    .accreditation small{font-weight:700}

    /* STATS */
    .stats{position:relative;z-index:5;margin-top:-56px}
    .stats-grid{
      background:var(--panel);border-radius:16px;box-shadow:var(--shadow);display:grid;
      grid-template-columns:repeat(5,1fr);overflow:hidden;border:1px solid var(--line);
    }
    .stat{padding:24px 16px;text-align:center;border-right:1px solid var(--line)}
    .stat:last-child{border:0}
    .stat i{font-size:19px;color:var(--brass);margin-bottom:6px;display:block}
    .stat b{display:block;font-size:28px;color:var(--forest-deep);font-family:'Spectral',serif}
    .stat span{font-size:12.5px;color:var(--muted)}

    /* ABOUT */
    .about-grid{display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
    .about-image{border-radius:18px;overflow:hidden;box-shadow:var(--shadow);min-height:400px;border:1px solid var(--line)}
    .about-image img{height:100%;min-height:400px}
    .about-copy h2{margin-bottom:16px}
    .about-copy>p{color:var(--muted);margin-bottom:22px}
    .check-list{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:26px}
    .check-list div{font-weight:600;font-size:13.5px;display:flex;align-items:center;gap:8px}
    .check-list div::before{content:"\f26e";font-family:"bootstrap-icons";display:grid;place-items:center;width:24px;height:24px;flex-shrink:0;
      border-radius:7px;background:var(--forest-soft);color:var(--forest);font-size:12px}

    /* FEATURE GRID */
    .gray-section{background:#eff3ec}
    .feature-grid{display:grid;grid-template-columns:repeat(6,1fr);gap:14px}
    .feature-card,.mini-card,.news-card,.award-card{
      background:var(--panel);border:1px solid var(--line);border-radius:14px;overflow:hidden;
      transition:border-color .2s,box-shadow .2s;
    }
    .feature-card:hover,.mini-card:hover,.news-card:hover,.award-card:hover{
      border-color:var(--brass);box-shadow:var(--shadow);
    }
    .feature-card{padding:24px 15px;text-align:center}
    .icon{
      width:50px;height:50px;border-radius:13px;background:var(--forest-soft);color:var(--forest);
      display:grid;place-items:center;font-size:21px;margin:0 auto 14px
    }
    .feature-card h3{font-size:15px;margin-bottom:7px}
    .feature-card p{font-size:12px;color:var(--muted)}

    /* MINI CARD (program / facility) */
    .mini-grid{display:grid;grid-template-columns:repeat(6,1fr);gap:14px}
    .mini-card .card-img,.mini-card .thumb-placeholder{height:150px;font-size:22px}
    .mini-card .body{padding:14px}
    .mini-card h3{font-size:14.5px}
    .mini-card .jabatan{font-size:12px;color:var(--forest);font-weight:600;margin-top:3px}

    /* ACHIEVEMENT */
    .achievement-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
    .award-card{padding:22px;text-align:center}
    .award-card .card-img{height:120px;border-radius:10px;margin-bottom:14px;font-size:22px}
    .award-card h3{font-size:15.5px}
    .award-tags{display:flex;gap:6px;justify-content:center;flex-wrap:wrap;margin-top:8px}
    .award-tag{font-size:11px;font-weight:700;padding:3px 10px;border-radius:999px;background:#fbf1de;color:var(--brass)}

    /* GALLERY */
    .gallery-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:12px}
    .gallery-item{height:180px;border-radius:12px;overflow:hidden;position:relative}
    .gallery-item img{height:100%;transition:.3s}
    .gallery-item:hover img{transform:scale(1.05)}
    .gallery-item:first-child{grid-row:span 2;height:372px}

    /* NEWS */
    .news-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
    .news-card .card-img{height:200px}
    .news-card .body{padding:20px}
    .date{font-size:12px;color:var(--brass);font-weight:700}
    .news-card h3{font-size:17.5px;margin:7px 0}
    .news-card p{font-size:13px;color:var(--muted)}

    /* PPDB */
    .ppdb{
      background:linear-gradient(115deg,var(--forest-deep),var(--forest));color:#fff;
      border-radius:20px;padding:44px 48px 34px;display:grid;grid-template-columns:1.3fr 1fr;gap:34px;align-items:center;
      overflow:hidden;position:relative;
    }
    .ppdb::before{
      content:"";position:absolute;inset:0;opacity:.4;pointer-events:none;
      background-image:url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%28255%2C255%2C255%2C0.12%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E");
      background-size:84px 84px;
    }
    .ppdb .tumpal{position:absolute;left:0;right:0;bottom:0;filter:brightness(1.3)}
    .ppdb > *{position:relative;z-index:2}
    .ppdb h2{color:#fff;font-size:34px}
    .ppdb p{color:#d9eee1;margin:12px 0 22px}
    .ppdb-list{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
    .ppdb-item{padding:16px;border:1px solid rgba(255,255,255,.16);border-radius:12px;background:rgba(255,255,255,.08);transition:.2s}
    .ppdb-item:hover{background:rgba(255,255,255,.14)}
    .ppdb-item b{display:block;font-size:14px}
    .ppdb-item span{font-size:12px;color:#d9eee1}

    /* TEACHERS/FACILITIES */
    .teacher-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
    .teacher-card{background:var(--panel);border:1px solid var(--line);border-radius:14px;overflow:hidden;transition:border-color .2s,box-shadow .2s}
    .teacher-card:hover{border-color:var(--brass);box-shadow:var(--shadow)}
    .teacher-card img{height:250px}
    .teacher-body{padding:16px;text-align:center}
    .teacher-body h3{font-size:15.5px}
    .teacher-body p{font-size:12px;color:var(--muted)}

    /* TESTIMONIAL */
    .testimonial{background:var(--panel);border:1px solid var(--line);border-radius:20px;padding:44px;max-width:880px;margin:auto;text-align:center;box-shadow:var(--shadow)}
    .quote{font-family:'Spectral',serif;font-size:44px;color:var(--brass);line-height:1}
    .testimonial p{max-width:680px;margin:12px auto;color:var(--muted)}
    .person{font-weight:700;color:var(--forest)}

    /* FOOTER */
    footer{background:var(--forest-deep);color:#dcece3;padding:56px 0 25px;position:relative;overflow:hidden}
    footer::before{
      content:"";position:absolute;inset:0;opacity:.25;pointer-events:none;
      background-image:url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2784%27%20height%3D%2784%27%3E%3Cg%20fill%3D%27none%27%20stroke%3D%27rgba%28255%2C255%2C255%2C0.1%29%27%20stroke-width%3D%271.1%27%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2021%2021%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2721%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2063%2021%29%27/%3E%3Cellipse%20cx%3D%2721%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%28-45%2021%2063%29%27/%3E%3Cellipse%20cx%3D%2763%27%20cy%3D%2763%27%20rx%3D%2715%27%20ry%3D%279.5%27%20transform%3D%27rotate%2845%2063%2063%29%27/%3E%3Ccircle%20cx%3D%2742%27%20cy%3D%2742%27%20r%3D%277%27/%3E%3C/g%3E%3C/svg%3E");
      background-size:84px 84px;
    }
    footer .container{position:relative;z-index:1}
    .footer-grid{display:grid;grid-template-columns:1.4fr .8fr 1fr 1fr;gap:40px}
    footer h3{color:#fff;font-size:15.5px;margin-bottom:14px}
    footer p,footer a,footer span{font-size:13px;color:#c0d7ca;transition:.2s}
    .footer-links{display:grid;gap:10px}
    .footer-links a i{margin-right:6px}
    .footer-links a.facebook:hover{color:#8fb4ff}
    .footer-links a.instagram:hover{color:#f0a6c9}
    .footer-links a.youtube:hover{color:#ff9d9d}
    .footer-links a.tiktok:hover{color:#9fe6ec}
    .footer-links a:hover{opacity:.9}
    .copyright{border-top:1px solid rgba(255,255,255,.14);margin-top:34px;padding-top:20px;
      display:flex;justify-content:space-between;font-size:12px;color:#9fc0ad}

    /* WHATSAPP FLOATING BUTTON */
    .whatsapp{
      position:fixed;right:22px;bottom:22px;z-index:60;width:56px;height:56px;border-radius:50%;
      background:#20bd67;color:#fff;display:grid;place-items:center;font-size:25px;
      box-shadow:0 8px 25px rgba(0,0,0,.25);transition:.2s;
    }
    .whatsapp:hover{transform:scale(1.08);background:#1da357}

    /* Responsive adjustments */
    @media(max-width:1050px){
      .nav-links{gap:14px}
      .feature-grid,.mini-grid{grid-template-columns:repeat(3,1fr)}
      .gallery-grid{grid-template-columns:repeat(3,1fr)}
      .teacher-grid{grid-template-columns:repeat(2,1fr)}
    }
    @media(max-width:850px){
      .topbar{display:none}
      .menu-btn{display:block}
      
      /* Logika Tampilan Tombol Login di Mobile/HP */
      .desktop-login-btn { display: none !important; }
      .mobile-login-btn { display: inline-flex !important; }

      .nav-links{
        display:none;position:absolute;left:18px;right:18px;top:78px;background:var(--panel);
        padding:20px;border-radius:0 0 16px 16px;box-shadow:var(--shadow);flex-direction:column;align-items:flex-start;
        max-height: calc(100vh - 100px); overflow-y: auto;
      }
      .nav-links.open{display:flex}
      .nav-links a { width: 100%; padding: 8px 0; border-bottom: 1px solid var(--line); }
      .nav-links a:last-child { border-bottom: none; }
      
      .hero{min-height:580px}
      .accreditation{display:none}
      .stats-grid{grid-template-columns:repeat(2,1fr)}
      .stat{border-bottom:1px solid var(--line)}
      .about-grid,.ppdb{grid-template-columns:1fr}
      .feature-grid,.mini-grid{grid-template-columns:repeat(2,1fr)}
      .achievement-grid{grid-template-columns:repeat(2,1fr)}
      .gallery-grid{grid-template-columns:repeat(2,1fr)}
      .gallery-item:first-child{grid-row:auto;height:180px}
      .news-grid{grid-template-columns:1fr}
      .footer-grid{grid-template-columns:1fr 1fr}
      .copyright{flex-direction:column;gap:8px}
    }
    @media(max-width:520px){
      .container{width:min(var(--container), calc(100% - 24px))}
      .section{padding:50px 0}
      .hero-content{padding-top:40px}
      .hero h1{font-size:32px}
      .stats-grid,.feature-grid,.mini-grid,.achievement-grid,.teacher-grid,.footer-grid{grid-template-columns:1fr}
      .gallery-grid{grid-template-columns:1fr 1fr}
      .check-list{grid-template-columns:1fr}
      .ppdb{padding:28px 20px}
      .ppdb-list{grid-template-columns:1fr}
      .brand span{display:none}
      .brand strong{font-size:12.5px}
      .whatsapp{width:50px;height:50px;font-size:22px;right:16px;bottom:16px}
    }
  </style>
</head>
<body>

  <div class="topbar">
    <div class="container topbar-inner">
      <div class="left-info">
        <?php if (!empty($profil->logo)): ?>
        <img 
          src="<?= base_url('upload/profil/' . $profil->logo) ?>" 
          alt="Logo" 
          style="height: 22px; width: 22px; border-radius: 4px; object-fit: cover;"
        >
        <?php endif; ?>
        <span>Selamat datang di <?= html_escape($profil->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></span>
      </div>
      <div class="right">
        <span><i class="bi bi-geo-alt-fill"></i> <?= html_escape($kontak->alamat ?? '-') ?></span>
      </div>
    </div>
  </div>

  <header class="navbar">
    <div class="container nav-inner">
      <a href="#beranda" class="brand">
        <?php if (!empty($profil->logo)): ?>
          <img src="<?= base_url('upload/profil/' . $profil->logo) ?>" alt="Logo" style="width:42px;height:42px;border-radius:12px;object-fit:cover;flex-shrink:0;">
        <?php else: ?>
          <div class="logo">MI</div>
        <?php endif; ?>
        <div>
          <strong><?= html_escape($profil->nama_sekolah ?? 'MI Madrasah Ibtidaiyah') ?></strong>
          <span><?= html_escape($profil->jenjang ?? '') ?></span>
        </div>
      </a>

      <button class="menu-btn" id="menuBtn" aria-label="Buka menu">☰</button>

      <nav class="nav-links" id="navLinks">
        <a href="#beranda">Beranda</a>
        <a href="#profil">Profil</a>
        <a href="#ekstrakurikuler">Ekstrakurikuler</a>
        <a href="#guru">Guru</a>
        <a href="#fasilitas">Fasilitas</a>
        <a href="#galeri">Galeri</a>
        <a href="#berita">Berita</a>
        <a href="#kontak">Kontak</a>
        <!-- Tombol login khusus tampilan mobile (hanya muncul di dalam menu hamburger HP) -->
        <a href="<?= base_url('Auth/login') ?>" class="nav-cta mobile-login-btn" style="margin-top: 10px; justify-content: center; width: 100%;">Login <i class="bi bi-box-arrow-in-right"></i></a>
      </nav>

      <!-- Tombol login khusus tampilan komputer/laptop (hidden di HP) -->
      <a href="<?= base_url('Auth/login') ?>" class="nav-cta desktop-login-btn">Login <i class="bi bi-box-arrow-in-right"></i></a>
    </div>
  </header>

  <main>
    <section class="hero" id="beranda">
      <div class="container">
        <div class="hero-content">
          <small>Mencetak generasi</small>
          <h1>Islami, cerdas<br><span>dan berkarakter</span></h1>
          <p>
            <?= html_escape($profil->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?> hadir untuk memberikan pendidikan berkualitas
            berbasis nilai-nilai Islam dan pembentukan karakter sejak dini.
          </p>
          <div class="hero-buttons">
            <a class="btn-primary" href="<?= base_url('Halaman_ppdb') ?>">Daftar PPDB <i class="bi bi-arrow-right"></i></a>
            <a class="btn-secondary" href="#profil">Lihat profil sekolah</a>
          </div>
        </div>
      </div>
      <?php if (!empty($profil->akreditasi)): ?>
      <div class="accreditation">
        <i class="bi bi-patch-check-fill"></i>
        <small>Akreditasi</small>
        <b><?= html_escape($profil->akreditasi) ?></b>
        <small>Terakreditasi</small>
      </div>
      <?php endif; ?>
    </section>

    <section class="stats">
      <div class="container">
        <div class="stats-grid">
          <div class="stat"><i class="bi bi-mortarboard-fill"></i><b>500+</b><span>Siswa aktif</span></div>
          <div class="stat"><i class="bi bi-person-workspace"></i><b><?= html_escape($jumlah_guru ?? 0) ?></b><span>Guru profesional</span></div>
          <div class="stat"><i class="bi bi-trophy-fill"></i><b><?= html_escape($jumlah_prestasi ?? 0) ?>+</b><span>Prestasi diraih</span></div>
          <div class="stat"><i class="bi bi-award-fill"></i><b><?= html_escape($profil->akreditasi ?? '-') ?></b><span>Akreditasi</span></div>
          <div class="stat"><i class="bi bi-stars"></i><b><?= html_escape($jumlah_ekskul ?? 0) ?></b><span>Ekstrakurikuler</span></div>
        </div>
      </div>
    </section>

    <section class="section" id="profil">
      <div class="container about-grid">
        <div class="about-image">
          <?php if (!empty($profil->foto_sekolah)): ?>
            <img src="<?= base_url('upload/profil/' . $profil->foto_sekolah) ?>" alt="Gedung Madrasah">
          <?php else: ?>
            <img src="assets/sekolah.jpg" alt="Gedung Madrasah Ibtidaiyah">
          <?php endif; ?>
        </div>
        <div class="about-copy">
          <span class="kicker">Tentang kami</span>
          <h2><?= html_escape($profil->nama_sekolah ?? 'Madrasah Ibtidaiyah') ?></h2>
          <p>
            <?= !empty($profil->sejarah) ? nl2br(html_escape(mb_strimwidth($profil->sejarah, 0, 320, '...'))) : 'Lembaga pendidikan dasar yang mengintegrasikan kurikulum nasional dengan nilai-nilai Islam untuk membentuk generasi yang cerdas, berakhlak mulia, mandiri, dan siap menghadapi masa depan.' ?>
          </p>
          <div class="check-list">
            <div>NPSN: <?= html_escape($profil->npsn ?? '-') ?></div>
            <div>Jenjang: <?= html_escape($profil->jenjang ?? '-') ?></div>
            <div>Akreditasi: <?= html_escape($profil->akreditasi ?? '-') ?></div>
            <div>Berdiri: <?= html_escape($profil->tahun_berdiri ?? '-') ?></div>
          </div>
          <a href="<?= base_url('Profil') ?>" class="btn-primary">Selengkapnya tentang kami <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </section>

    <section class="section gray-section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Mengapa kami</span>
          <h2>Keunggulan sekolah</h2>
          <p>Program pendidikan yang dirancang untuk mengembangkan kemampuan akademik dan karakter siswa.</p>
        </div>
        <div class="feature-grid">
          <article class="feature-card"><div class="icon"><i class="bi bi-book-fill"></i></div><h3>Kurikulum Merdeka</h3><p>Pembelajaran sesuai perkembangan dan kebutuhan siswa.</p></article>
          <article class="feature-card"><div class="icon"><i class="bi bi-moon-stars-fill"></i></div><h3>Pembelajaran Islami</h3><p>Nilai-nilai Islam diterapkan dalam kegiatan sehari-hari.</p></article>
          <article class="feature-card"><div class="icon"><i class="bi bi-trophy-fill"></i></div><h3>Prestasi Akademik</h3><p>Mendukung siswa untuk berprestasi di berbagai bidang.</p></article>
          <article class="feature-card"><div class="icon"><i class="bi bi-people-fill"></i></div><h3>Ekstrakurikuler</h3><p>Pilihan kegiatan untuk mengembangkan minat dan bakat.</p></article>
          <article class="feature-card"><div class="icon"><i class="bi bi-heart-fill"></i></div><h3>Karakter Islami</h3><p>Membangun sikap disiplin, santun, dan bertanggung jawab.</p></article>
          <article class="feature-card"><div class="icon"><i class="bi bi-building-fill"></i></div><h3>Fasilitas Lengkap</h3><p>Fasilitas belajar yang mendukung kegiatan siswa.</p></article>
        </div>
      </div>
    </section>

    <section class="section" id="ekstrakurikuler">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Pengembangan bakat</span>
          <h2>Program unggulan &amp; ekstrakurikuler</h2>
          <a class="read-more" href="<?= base_url('ekstrakurikuler') ?>">Lihat semua ekstrakurikuler</a>
        </div>
        <div class="mini-grid">
          <?php if (!empty($ekstrakurikuler)): ?>
            <?php foreach ($ekstrakurikuler as $ek): ?>
            <article class="mini-card">
              <?php if (!empty($ek['foto'])): ?>
                <img class="card-img" src="<?= base_url('upload/foto_ekstra/' . $ek['foto']) ?>" alt="<?= html_escape($ek['nama_ekstrakurikuler']) ?>">
              <?php else: ?>
                <div class="thumb-placeholder"><i class="bi bi-stars"></i></div>
              <?php endif; ?>
              <div class="body">
                <h3><?= html_escape($ek['nama_ekstrakurikuler']) ?></h3>
                <?php if (!empty($ek['pembina'])): ?><div class="jabatan"><?= html_escape($ek['pembina']) ?></div><?php endif; ?>
              </div>
            </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p style="text-align:center;color:var(--muted);grid-column:1/-1">Belum ada data ekstrakurikuler.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="section gray-section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Pencapaian</span>
          <h2>Penghargaan &amp; prestasi</h2>
          <a class="read-more" href="<?= base_url('Prestasi') ?>">Lihat semua prestasi</a>
        </div>
        <div class="achievement-grid">
          <?php if (!empty($prestasi)): ?>
            <?php foreach ($prestasi as $pr): ?>
            <article class="award-card">
              <?php if (!empty($pr['foto'])): ?>
                <img class="card-img" src="<?= base_url('upload/prestasi/' . $pr['foto']) ?>" alt="<?= html_escape($pr['judul_prestasi']) ?>">
              <?php else: ?>
                <div class="card-img"><i class="bi bi-trophy-fill"></i></div>
              <?php endif; ?>
              <h3><?= html_escape($pr['judul_prestasi']) ?></h3>
              <div class="award-tags">
                <?php if (!empty($pr['tingkat'])): ?><span class="award-tag"><?= html_escape($pr['tingkat']) ?></span><?php endif; ?>
                <?php if (!empty($pr['tahun'])): ?><span class="award-tag"><?= html_escape($pr['tahun']) ?></span><?php endif; ?>
              </div>
            </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p style="text-align:center;color:var(--muted);grid-column:1/-1">Belum ada data prestasi.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="section" id="guru">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Tenaga pendidik</span>
          <h2>Profil guru</h2>
          <p>Guru dan tenaga pendidik profesional yang mendampingi siswa dalam proses belajar.</p>
          <a class="read-more" href="<?= base_url('Data_guru') ?>">Lihat semua guru</a>
        </div>
        <div class="teacher-grid">
          <?php if (!empty($guru)): ?>
            <?php foreach ($guru as $g): ?>
            <article class="teacher-card">
              <?php if (!empty($g['foto'])): ?>
                <img src="<?= base_url('upload/foto_guru/' . $g['foto']) ?>" alt="<?= html_escape($g['nama_guru']) ?>">
              <?php else: ?>
                <img src="assets/guru-default.jpg" alt="Foto Guru">
              <?php endif; ?>
              <div class="teacher-body">
                <h3><?= html_escape($g['nama_guru']) ?></h3>
                <p><?= html_escape($g['jabatan']) ?></p>
              </div>
            </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p style="text-align:center;color:var(--muted);grid-column:1/-1">Belum ada data guru.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="section gray-section" id="fasilitas">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Sarana pendidikan</span>
          <h2>Fasilitas sekolah</h2>
          <a class="read-more" href="<?= base_url('Fasilitas') ?>">Lihat semua fasilitas</a>
        </div>
        <div class="mini-grid">
          <?php if (!empty($fasilitas)): ?>
            <?php foreach ($fasilitas as $f): ?>
            <article class="mini-card">
              <?php if (!empty($f['foto'])): ?>
                <img class="card-img" src="<?= base_url('upload/foto_fasilitas/' . $f['foto']) ?>" alt="<?= html_escape($f['nama_fasilitas']) ?>">
              <?php else: ?>
                <div class="thumb-placeholder"><i class="bi bi-building"></i></div>
              <?php endif; ?>
              <div class="body"><h3><?= html_escape($f['nama_fasilitas']) ?></h3></div>
            </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p style="text-align:center;color:var(--muted);grid-column:1/-1">Belum ada data fasilitas.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="section" id="galeri">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Dokumentasi</span>
          <h2>Galeri kegiatan</h2>
          <a class="read-more" href="<?= base_url('Galeri') ?>">Lihat semua galeri</a>
        </div>
        <div class="gallery-grid">
          <?php if (!empty($galeri)): ?>
            <?php foreach ($galeri as $gl): ?>
            <div class="gallery-item">
              <?php if (!empty($gl['foto'])): ?>
                <img src="<?= base_url('upload/galeri/' . $gl['foto']) ?>" alt="<?= html_escape($gl['judul_kegiatan']) ?>">
              <?php else: ?>
                <i class="bi bi-images"></i>
              <?php endif; ?>
            </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p style="text-align:center;color:var(--muted);grid-column:1/-1">Belum ada dokumentasi galeri.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="section" id="berita">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Informasi terkini</span>
          <h2>Berita &amp; pengumuman</h2>
          <a class="read-more" href="<?= base_url('Berita') ?>">Lihat semua berita</a>
        </div>
        <div class="news-grid">
          <?php if (!empty($pengumuman)): ?>
            <?php foreach ($pengumuman as $pg): ?>
            <article class="news-card">
              <?php if (!empty($pg['foto'])): ?>
                <img class="card-img" src="<?= base_url('upload/pengumuman/' . $pg['foto']) ?>" alt="<?= html_escape($pg['judul']) ?>">
              <?php else: ?>
                <div class="card-img"><i class="bi bi-megaphone-fill"></i></div>
              <?php endif; ?>
              <div class="body">
                <span class="date"><?= !empty($pg['tanggal']) ? html_escape(date('d F Y', strtotime($pg['tanggal']))) : '-' ?></span>
                <h3><?= html_escape($pg['judul']) ?></h3>
                <p><?= html_escape(mb_strimwidth($pg['isi'], 0, 100, '...')) ?></p>
              </div>
            </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p style="text-align:center;color:var(--muted)">Belum ada berita/pengumuman.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <?php if (!empty($ppdb)): ?>
    <section class="section" id="ppdb">
      <div class="container">
        <div class="ppdb">
          <div>
            <span class="kicker" style="color:var(--brass-light)"><?= html_escape($ppdb->judul ?? 'Penerimaan Peserta Didik Baru') ?></span>
           <h2>Tahun ajaran <?= html_escape($ppdb->tahun_ajaran ?? '-') ?></h2>
            <p>Bergabunglah bersama kami dan raih masa depan gemilang bersama pendidikan Islam yang berkualitas.</p>
          </div>
          <div class="ppdb-list">
            <div class="ppdb-item"><b>Pendaftaran mudah</b><span>Hubungi <?= html_escape($ppdb->nomor_kordinator ?? '-') ?></span></div>
            <div class="ppdb-item"><b>Kuota terbatas</b><span>Segera daftarkan calon siswa</span></div>
            <div class="ppdb-item"><b>Proses cepat</b><span>Verifikasi data terstruktur</span></div>
            <div class="ppdb-item"><b>Transparan</b><span>Informasi biaya dan jadwal jelas</span></div>
          </div>
          <div class="tumpal"></div>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>

  <footer id="kontak">
    <div class="container">
      <div class="footer-grid">
        <div>
          <div class="brand">
            <?php if (!empty($profil->logo)): ?>
              <img src="<?= base_url('upload/profil/' . $profil->logo) ?>" style="width:48px;height:48px;border-radius:14px;object-fit:cover">
            <?php else: ?>
              <div class="logo">MI</div>
            <?php endif; ?>
            <div><strong style="color:#fff"><?= html_escape($profil->nama_sekolah ?? 'MI Madrasah Ibtidaiyah') ?></strong><span>Islami, cerdas, berkarakter</span></div>
          </div>
          <p style="margin-top:15px"><?= html_escape(mb_strimwidth($profil->visi ?? 'Menyediakan pendidikan dasar berbasis nilai-nilai Islam untuk membentuk generasi cerdas dan berkarakter.', 0, 160, '...')) ?></p>
        </div>
        <div>
          <h3>Menu</h3>
          <div class="footer-links">
            <a href="#beranda">Beranda</a><a href="#profil">Profil</a>
            <a href="#ekstrakurikuler">Ekstrakurikuler</a><a href="#guru">Guru</a><a href="#fasilitas">Fasilitas</a>
          </div>
        </div>
        <div>
          <h3>Informasi kontak</h3>
          <div class="footer-links">
            <span><i class="bi bi-geo-alt-fill"></i> <?= html_escape($kontak->alamat ?? '-') ?></span>
            <span><i class="bi bi-telephone-fill"></i> <?= html_escape($kontak->telepon ?? '-') ?></span>
            <span><i class="bi bi-envelope-fill"></i> <?= html_escape($kontak->email ?? '-') ?></span>
            <span><i class="bi bi-clock-fill"></i> <?= html_escape($kontak->jam_operasional ?? '-') ?></span>
          </div>
        </div>
        <div>
          <h3>Media sosial kami</h3>
          <div class="footer-links">
            <a class="facebook" href="<?= html_escape($kontak->facebook ?? '#') ?>" target="_blank"><i class="bi bi-facebook"></i> Facebook</a>
            <a class="instagram" href="<?= html_escape($kontak->instagram ?? '#') ?>" target="_blank"><i class="bi bi-instagram"></i> Instagram</a>
            <a class="youtube" href="<?= html_escape($kontak->youtube ?? '#') ?>" target="_blank"><i class="bi bi-youtube"></i> YouTube</a>
            <a class="tiktok" href="<?= html_escape($kontak->tiktok ?? '#') ?>" target="_blank"><i class="bi bi-tiktok"></i> TikTok</a>
          </div>
        </div>
      </div>
      <div class="copyright">
        <span>© <?= date('Y') ?> <?= html_escape($profil->nama_sekolah ?? 'MI Madrasah Ibtidaiyah') ?>. Hak cipta dilindungi.</span>
        <span>Kebijakan Privasi &middot; Syarat &amp; Ketentuan</span>
      </div>
    </div>
  </footer>

  <?php if (!empty($kontak->telepon)): ?>
  <a class="whatsapp" href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $kontak->telepon) ?>" target="_blank" aria-label="Hubungi via WhatsApp">
    <i class="bi bi-whatsapp"></i>
  </a>
  <?php endif; ?>

  <script>
    const menuBtn = document.getElementById("menuBtn");
    const navLinks = document.getElementById("navLinks");

    menuBtn.addEventListener("click", () => {
      navLinks.classList.toggle("open");
    });

    document.querySelectorAll(".nav-links a").forEach(link => {
      link.addEventListener("click", () => navLinks.classList.remove("open"));
    });
  </script>
</body>
</html>