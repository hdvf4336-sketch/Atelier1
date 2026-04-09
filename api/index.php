<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mohamed Dal-lal · Développeur Web Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <style>
    :root {
      --ink:    #080810;
      --bg:     #0b0b14;
      --surface:#12121f;
      --card:   #161626;
      --lime:   #b8ff57;
      --violet: #7b5ea7;
      --pink:   #ff4f7b;
      --blue:   #3d9aff;
      --border: rgba(255,255,255,0.08);
      --text:   #e8e8f0;
      --muted:  rgba(232,232,240,.45);
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Mono', monospace;
      overflow-x: hidden;
      cursor: none;
    }

    /* CURSOR */
    #cursor {
      width: 12px; height: 12px;
      background: var(--lime); border-radius: 50%;
      position: fixed; top: 0; left: 0;
      pointer-events: none; z-index: 9999;
      transform: translate(-50%,-50%);
      mix-blend-mode: exclusion;
      transition: width .3s, height .3s;
    }
    #cursor-ring {
      width: 36px; height: 36px;
      border: 1.5px solid rgba(184,255,87,.5); border-radius: 50%;
      position: fixed; top: 0; left: 0;
      pointer-events: none; z-index: 9998;
      transform: translate(-50%,-50%);
      transition: left .1s ease, top .1s ease;
    }

    /* MESH */
    .mesh {
      position: fixed; inset: 0; z-index: 0; pointer-events: none;
      background:
        radial-gradient(ellipse 60% 50% at 10% 20%, rgba(123,94,167,.2) 0%, transparent 70%),
        radial-gradient(ellipse 50% 60% at 85% 75%, rgba(61,154,255,.14) 0%, transparent 70%),
        radial-gradient(ellipse 40% 40% at 50% 50%, rgba(184,255,87,.07) 0%, transparent 70%);
    }

    /* NAV */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 200;
      display: flex; justify-content: space-between; align-items: center;
      padding: 1.1rem 3rem;
      background: rgba(11,11,20,.9);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
    }
    .nav-logo {
      font-family: 'Syne', sans-serif; font-weight: 800;
      font-size: .85rem; letter-spacing: .22em; text-transform: uppercase;
      text-decoration: none; color: var(--lime);
    }
    .nav-links { display: flex; gap: 2rem; list-style: none; align-items: center; }
    .nav-links a {
      font-size: .66rem; letter-spacing: .15em; text-transform: uppercase;
      text-decoration: none; color: var(--muted); transition: color .25s;
    }
    .nav-links a:hover { color: var(--text); }
    .nav-cta {
      padding: .42rem 1.1rem !important;
      background: var(--lime) !important; color: var(--ink) !important;
      font-weight: 700 !important;
    }
    .nav-cta:hover { opacity: .85; color: var(--ink) !important; }

    /* HERO */
    #hero {
      min-height: 100vh;
      display: flex; flex-direction: column; justify-content: center;
      padding: 8rem 3rem 5rem;
      position: relative; z-index: 1;
    }
    .hero-eyebrow {
      display: inline-flex; align-items: center; gap: .6rem;
      font-size: .62rem; letter-spacing: .22em; text-transform: uppercase;
      color: var(--lime); margin-bottom: 2rem;
      animation: slideR .8s .1s both;
    }
    .hero-eyebrow::before {
      content: ''; display: block; width: 30px; height: 1px; background: var(--lime);
    }
    .hero-name {
      font-family: 'Syne', sans-serif; font-weight: 800;
      font-size: clamp(3.5rem, 11vw, 11rem);
      line-height: .88; text-transform: uppercase; letter-spacing: -.03em;
      animation: slideR .8s .2s both;
    }
    .hero-name .outline {
      display: block;
      -webkit-text-stroke: 1.5px rgba(255,255,255,.25); color: transparent;
      transition: color .4s, -webkit-text-stroke .4s;
    }
    .hero-name .outline:hover { color: var(--lime); -webkit-text-stroke: 0px transparent; }
    .hero-desc {
      margin-top: 2.5rem; max-width: 480px;
      font-size: .78rem; line-height: 2.1; color: var(--muted);
      animation: slideR .8s .35s both;
    }
    .hero-desc strong { color: var(--lime); font-weight: 400; }
    .hero-ctas {
      margin-top: 3rem; display: flex; gap: 1rem; flex-wrap: wrap;
      animation: slideR .8s .5s both;
    }
    .btn-lime {
      padding: .85rem 2rem; background: var(--lime); color: var(--ink);
      font-family: 'DM Mono', monospace; font-size: .68rem; letter-spacing: .12em;
      text-transform: uppercase; border: none; text-decoration: none;
      display: inline-flex; align-items: center; gap: .6rem;
      transition: transform .2s, box-shadow .2s;
    }
    .btn-lime:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(184,255,87,.35); color: var(--ink); }
    .btn-ghost {
      padding: .85rem 2rem; background: transparent; color: var(--text);
      font-family: 'DM Mono', monospace; font-size: .68rem; letter-spacing: .12em;
      text-transform: uppercase; border: 1px solid var(--border); text-decoration: none;
      display: inline-flex; align-items: center; gap: .6rem; transition: border-color .2s, background .2s;
    }
    .btn-ghost:hover { border-color: rgba(255,255,255,.35); background: rgba(255,255,255,.05); color: var(--text); }

    /* Hero decorations */
    .deco-ring {
      position: absolute; border-radius: 50%; pointer-events: none;
    }
    .deco-r1 { width: 340px; height: 340px; right: 6%; top: 14%; border: 1px solid rgba(184,255,87,.12); animation: spin 28s linear infinite; }
    .deco-r2 { width: 220px; height: 220px; right: 11%; top: 21%; border: 1px dashed rgba(123,94,167,.25); animation: spin 20s linear infinite reverse; }
    .deco-dot { position: absolute; right: 15%; top: 38%; width: 10px; height: 10px; background: var(--lime); border-radius: 50%; box-shadow: 0 0 24px var(--lime); animation: pulse 2.2s ease-in-out infinite; }
    .deco-plus { position: absolute; right: 22%; top: 23%; font-size: 1.8rem; color: rgba(255,255,255,.08); animation: floaty 6s ease-in-out infinite; }
    .hero-ruler { position: absolute; bottom: 0; left: 3rem; right: 3rem; height: 1px; background: var(--border); }
    .hero-ruler::after { content: ''; position: absolute; left: 0; top: 0; width: 80px; height: 1px; background: var(--lime); animation: scan 4s ease-in-out infinite; }
    @keyframes spin { to { transform: rotate(360deg); } }
    @keyframes pulse { 0%,100%{box-shadow:0 0 10px var(--lime)} 50%{box-shadow:0 0 30px var(--lime), 0 0 60px rgba(184,255,87,.3)} }
    @keyframes floaty { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-16px)} }
    @keyframes scan { 0%,100%{left:0} 50%{left:calc(100% - 80px)} }
    @keyframes slideR { from{opacity:0;transform:translateX(-28px)} to{opacity:1;transform:none} }

    /* MARQUEE */
    .marquee-wrap {
      overflow: hidden; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border);
      padding: .85rem 0; background: rgba(184,255,87,.03); position: relative; z-index: 1;
    }
    .marquee-track { display: flex; gap: 3rem; width: max-content; animation: marq 22s linear infinite; }
    .m-item { white-space: nowrap; font-size: .6rem; letter-spacing: .2em; text-transform: uppercase; color: var(--muted); display: flex; align-items: center; gap: 1rem; }
    .m-item span { color: var(--lime); }
    @keyframes marq { to { transform: translateX(-50%); } }

    /* SECTION COMMONS */
    .sec-eye {
      font-size: .6rem; letter-spacing: .25em; text-transform: uppercase;
      color: var(--lime); display: flex; align-items: center; gap: .7rem; margin-bottom: 3rem;
    }
    .sec-eye::before { content: ''; display: block; width: 22px; height: 1px; background: var(--lime); }

    /* ABOUT */
    #about { padding: 7rem 3rem; border-bottom: 1px solid var(--border); position: relative; z-index: 1; }
    .about-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 6rem; align-items: start; }
    .about-h {
      font-family: 'Syne', sans-serif; font-weight: 800;
      font-size: clamp(2.2rem, 4vw, 3.8rem); line-height: 1.05; text-transform: uppercase;
    }
    .about-h em { font-style: normal; color: var(--lime); }
    .stats-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1rem; margin-top: 3rem; }
    .stat-box {
      padding: 1.5rem 1rem; background: var(--surface); border: 1px solid var(--border);
      text-align: center; transition: border-color .3s;
    }
    .stat-box:hover { border-color: var(--lime); }
    .stat-box .n { font-family:'Syne',sans-serif; font-weight:800; font-size:2.3rem; color:var(--lime); display:block; }
    .stat-box .l { font-size:.56rem; letter-spacing:.15em; text-transform:uppercase; color:var(--muted); margin-top:.3rem; display:block; }
    .timeline { margin-top: 2.8rem; padding-left: 1.4rem; position: relative; }
    .timeline::before { content:''; position:absolute; left:0; top:.4rem; bottom:0; width:1px; background:var(--border); }
    .t-item { margin-bottom: 1.8rem; position: relative; }
    .t-item::before { content:''; position:absolute; left:-1.45rem; top:.35rem; width:8px; height:8px; background:var(--lime); border-radius:50%; }
    .t-yr { font-size:.58rem; letter-spacing:.15em; text-transform:uppercase; color:var(--lime); }
    .t-ti { font-size:.82rem; font-weight:600; margin-top:.2rem; color:var(--text); }
    .t-su { font-size:.7rem; color:var(--muted); margin-top:.1rem; }
    .about-txt { font-size:.79rem; line-height:2.1; color:var(--muted); margin-bottom:1.5rem; }
    .skills-wrap { display:flex; flex-wrap:wrap; gap:.5rem; margin-top:2rem; }
    .sk {
      padding:.3rem .85rem; background:var(--surface); border:1px solid var(--border);
      font-size:.6rem; letter-spacing:.1em; text-transform:uppercase; color:var(--muted);
      transition: all .25s; cursor: default;
    }
    .sk:hover { background:var(--lime); color:var(--ink); border-color:var(--lime); }

    /* PROJECTS */
    #projects { padding: 7rem 3rem; border-bottom: 1px solid var(--border); position: relative; z-index: 1; }
    .proj-title {
      font-family:'Syne',sans-serif; font-weight:800;
      font-size: clamp(2.5rem, 7vw, 6.5rem); text-transform:uppercase; line-height:.92; margin-bottom:4rem;
    }
    .proj-title em { font-style:normal; -webkit-text-stroke:1px rgba(255,255,255,.2); color:transparent; }
    .proj-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(330px,1fr)); gap: 1.5rem; }

    .pcard {
      background: var(--card); border: 1px solid var(--border); overflow: hidden;
      display: flex; flex-direction: column;
      transition: transform .35s, border-color .35s, box-shadow .35s;
    }
    .pcard:hover { transform: translateY(-8px); border-color: var(--lime); box-shadow: 0 24px 60px rgba(0,0,0,.5); }
    .pcard-featured { grid-column: 1 / -1; flex-direction: row; }
    .pcard-featured .pthumb { width: 42%; height: auto; min-height: 240px; flex-shrink: 0; }

    .pthumb { width: 100%; height: 190px; overflow: hidden; position: relative; }
    .pthumb-inner {
      width: 100%; height: 100%;
      display: flex; align-items: center; justify-content: center; font-size: 3rem;
      position: relative; overflow: hidden;
    }
    .pthumb-inner::before {
      content:''; position:absolute; inset:0;
      background-image: linear-gradient(rgba(255,255,255,.025) 1px,transparent 1px), linear-gradient(90deg,rgba(255,255,255,.025) 1px,transparent 1px);
      background-size: 18px 18px;
    }
    .pc1 { background: linear-gradient(135deg,#0f0f20,#1a1a38); }
    .pc2 { background: linear-gradient(135deg,#180a28,#2a1050); }
    .pc3 { background: linear-gradient(135deg,#081828,#0d2840); }
    .pc4 { background: linear-gradient(135deg,#181408,#2a2210); }
    .pc5 { background: linear-gradient(135deg,#081818,#0d2828); }

    .pbody { padding: 1.6rem; flex: 1; display: flex; flex-direction: column; }
    .pnum { font-size:.55rem; letter-spacing:.2em; text-transform:uppercase; color:var(--lime); margin-bottom:.7rem; }
    .ptitle { font-family:'Syne',sans-serif; font-weight:700; font-size:1.1rem; text-transform:uppercase; color:var(--text); margin-bottom:.5rem; }
    .pdesc { font-size:.71rem; line-height:1.95; color:var(--muted); flex:1; margin-bottom:1.2rem; }
    .ptags { display:flex; flex-wrap:wrap; gap:.4rem; margin-bottom:1.3rem; }
    .ptag {
      padding:.18rem .6rem; font-size:.57rem; letter-spacing:.08em; text-transform:uppercase;
      background:rgba(184,255,87,.07); color:var(--lime); border:1px solid rgba(184,255,87,.18);
    }
    .plinks { display:flex; gap:.7rem; }
    .plink {
      display:inline-flex; align-items:center; gap:.4rem;
      padding:.5rem 1rem; font-size:.62rem; letter-spacing:.1em; text-transform:uppercase;
      text-decoration:none; transition:all .25s;
    }
    .plink-gh { background:var(--surface); color:var(--text); border:1px solid var(--border); }
    .plink-gh:hover { border-color:rgba(255,255,255,.3); color:var(--text); background:rgba(255,255,255,.06); }
    .plink-live { background:var(--lime); color:var(--ink); border:1px solid var(--lime); }
    .plink-live:hover { background:#ceff75; color:var(--ink); transform:translateY(-1px); box-shadow:0 6px 20px rgba(184,255,87,.35); }

    /* SERVICES */
    #services { padding: 6rem 3rem; border-bottom: 1px solid var(--border); position: relative; z-index: 1; }
    .svc-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px,1fr)); gap:1px; background:var(--border); border:1px solid var(--border); }
    .svc-item { background:var(--bg); padding:2rem 1.6rem; transition:background .3s; }
    .svc-item:hover { background:var(--surface); }
    .svc-icon { font-size:1.6rem; margin-bottom:1rem; display:block; }
    .svc-title { font-family:'Syne',sans-serif; font-weight:700; font-size:.88rem; text-transform:uppercase; margin-bottom:.6rem; }
    .svc-desc { font-size:.68rem; color:var(--muted); line-height:1.9; }

    /* CONTACT */
    #contact { padding: 7rem 3rem 5rem; position: relative; z-index: 1; }
    .contact-wrap { display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; }
    .contact-big {
      font-family:'Syne',sans-serif; font-weight:800;
      font-size: clamp(2.8rem,7vw,7rem); text-transform:uppercase; line-height:.92; margin-bottom:2.5rem;
    }
    .contact-big em { font-style:normal; -webkit-text-stroke:1px rgba(255,255,255,.22); color:transparent; }
    .cinfo-row {
      display:flex; align-items:center; gap:1rem;
      padding:1.2rem 0; border-bottom:1px solid var(--border);
      text-decoration:none; color:var(--text); transition:color .25s; font-size:.74rem;
    }
    .cinfo-row:hover { color:var(--lime); }
    .cic {
      width:38px; height:38px; background:var(--surface); border:1px solid var(--border);
      display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0;
      transition: all .25s;
    }
    .cinfo-row:hover .cic { background:var(--lime); border-color:var(--lime); color:var(--ink); }
    .flbl { font-size:.57rem; letter-spacing:.15em; text-transform:uppercase; color:var(--muted); margin-bottom:.2rem; }
    .form-lbl { display:block; font-size:.58rem; letter-spacing:.18em; text-transform:uppercase; color:var(--muted); margin-bottom:.45rem; }
    .f-inp {
      width:100%; padding:.82rem 1rem;
      background:var(--surface); border:1px solid var(--border);
      color:var(--text); font-family:'DM Mono',monospace; font-size:.76rem;
      outline:none; transition:border-color .25s; margin-bottom:1.1rem;
    }
    .f-inp:focus { border-color:var(--lime); }
    .f-inp::placeholder { color:rgba(232,232,240,.22); }
    textarea.f-inp { resize:vertical; min-height:120px; }
    .btn-send {
      width:100%; padding:.9rem; background:var(--lime); color:var(--ink);
      font-family:'DM Mono',monospace; font-size:.7rem; letter-spacing:.12em; text-transform:uppercase;
      border:none; cursor:none; transition:transform .2s, box-shadow .2s;
    }
    .btn-send:hover { transform:translateY(-2px); box-shadow:0 10px 30px rgba(184,255,87,.3); }

    /* FOOTER */
    footer {
      padding: 2rem 3rem; border-top: 1px solid var(--border);
      display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem;
      position: relative; z-index: 1;
    }
    .f-copy { font-size:.58rem; letter-spacing:.12em; text-transform:uppercase; color:var(--muted); }
    .f-socs { display:flex; gap:.7rem; }
    .fsoc {
      width:36px; height:36px; border:1px solid var(--border);
      display:flex; align-items:center; justify-content:center;
      color:var(--muted); text-decoration:none; font-size:.95rem; transition:all .25s;
    }
    .fsoc:hover { border-color:var(--lime); color:var(--lime); background:rgba(184,255,87,.07); }

    /* PARTICLES */
    .particle {
      position: fixed; border-radius: 50%; pointer-events: none;
      animation: pfloat linear infinite; opacity: 0;
    }
    @keyframes pfloat {
      0%   { transform: translateY(100vh) scale(0); opacity: 0; }
      10%  { opacity: .8; }
      90%  { opacity: .4; }
      100% { transform: translateY(-10vh) scale(1); opacity: 0; }
    }

    /* REVEAL */
    .reveal { opacity: 0; transform: translateY(32px); transition: opacity .8s ease, transform .8s ease; }
    .reveal.visible { opacity: 1; transform: none; }

    /* RESPONSIVE */
    @media(max-width:992px) {
      .about-grid { grid-template-columns: 1fr; gap:3rem; }
      .contact-wrap { grid-template-columns: 1fr; gap:3rem; }
    }
    @media(max-width:768px) {
      nav { padding:.9rem 1.2rem; }
      #hero,#about,#projects,#services,#contact { padding-left:1.2rem; padding-right:1.2rem; }
      .deco-ring,.deco-dot,.deco-plus { display:none; }
      .pcard-featured { flex-direction:column; }
      .pcard-featured .pthumb { width:100%; height:200px; }
      footer { padding:1.5rem 1.2rem; }
    }
  </style>
</head>
<body>

  <div id="cursor"></div>
  <div id="cursor-ring"></div>
  <div class="mesh"></div>

  <!-- NAV -->
  <nav>
    <a class="nav-logo" href="#">MDL</a>
    <ul class="nav-links">
      <li><a href="#about">À propos</a></li>
      <li><a href="#projects">Projets</a></li>
      <li><a href="">Services</a></li>
      <li><a href="" class="nav-cta">Contact</a></li>
      <li><a href="pag.html" class="nav-cta">Atelier</a></li>

    </ul>
  </nav>

  <!-- HERO -->
  <section id="hero">
    <div class="deco-ring deco-r1"></div>
    <div class="deco-ring deco-r2"></div>
    <div class="deco-dot"></div>
    <div class="deco-plus">✦</div>

    <p class="hero-eyebrow">Disponible pour projets &amp; collaborations · 2025</p>
    <h1 class="hero-name">
      Mohamed<br/>
      <span class="outline">Dal-lal</span>
    </h1>
    <p class="hero-desc">
      Étudiant en <strong>1ère année · Développement Web Digital</strong> en France.<br/>
      Je conçois des interfaces numériques mémorables — du design à la ligne de code.
    </p>
    <div class="hero-ctas">
      <a href="#projects" class="btn-lime"><i class="bi bi-grid-3x3-gap"></i> Voir mes projets</a>
      <a href="#contact" class="btn-ghost"><i class="bi bi-send"></i> Me contacter</a>
    </div>
    <div class="hero-ruler"></div>
  </section>

  <!-- MARQUEE -->
  <div class="marquee-wrap">
    <div class="marquee-track">
      <span class="m-item">HTML5 <span>✦</span></span>
      <span class="m-item">CSS3 <span>✦</span></span>
      <span class="m-item">Bootstrap 5 <span>✦</span></span>
      <span class="m-item">JavaScript <span>✦</span></span>
      <span class="m-item">Responsive Design <span>✦</span></span>
      <span class="m-item">Git &amp; GitHub <span>✦</span></span>
      <span class="m-item">Figma <span>✦</span></span>
      <span class="m-item">UX / UI <span>✦</span></span>
      <span class="m-item">Web Performance <span>✦</span></span>
      <span class="m-item">HTML5 <span>✦</span></span>
      <span class="m-item">CSS3 <span>✦</span></span>
      <span class="m-item">Bootstrap 5 <span>✦</span></span>
      <span class="m-item">JavaScript <span>✦</span></span>
      <span class="m-item">Responsive Design <span>✦</span></span>
      <span class="m-item">Git &amp; GitHub <span>✦</span></span>
      <span class="m-item">Figma <span>✦</span></span>
      <span class="m-item">UX / UI <span>✦</span></span>
      <span class="m-item">Web Performance <span>✦</span></span>
    </div>
  </div>

  <!-- ABOUT -->
  <section id="about">
    <p class="sec-eye reveal">01 — À propos</p>
    <div class="about-grid">
      <div class="reveal">
        <h2 class="about-h">Façonner le<br/>Web de <em>demain</em></h2>
        <div class="stats-grid">
          <div class="stat-box"><span class="n">1ère</span><span class="l">Année</span></div>
          <div class="stat-box"><span class="n">🇫🇷</span><span class="l">France</span></div>
          <div class="stat-box"><span class="n">5+</span><span class="l">Projets</span></div>
        </div>
        <div class="timeline">
          <div class="t-item">
            <div class="t-yr">2024 — Présent</div>
            <div class="t-ti">Formation Web Digital</div>
            <div class="t-su">École en France · Front-End Development</div>
          </div>
          <div class="t-item">
            <div class="t-yr">2024</div>
            <div class="t-ti">Premiers projets web</div>
            <div class="t-su">Portfolio, landing pages, UI components</div>
          </div>
          <div class="t-item">
            <div class="t-yr">2023</div>
            <div class="t-ti">Autodidacte · HTML &amp; CSS</div>
            <div class="t-su">Premiers pas dans le développement web</div>
          </div>
        </div>
      </div>
      <div class="reveal">
        <p class="about-txt">
          Je suis <strong style="color:var(--lime);font-weight:400">Mohamed Dal-lal</strong>, passionné par la création
          d'expériences numériques qui allient esthétique et performance. Chaque projet est
          une opportunité d'apprendre et de repousser mes limites.
        </p>
        <p class="about-txt">
          Mon approche : architecture propre, UI expressive, interactions soignées.
          J'explore les frameworks front-end, le responsive design et les outils modernes.
        </p>
        <div class="skills-wrap">
          <span class="sk">HTML5</span><span class="sk">CSS3</span><span class="sk">Bootstrap 5</span>
          <span class="sk">JavaScript ES6</span><span class="sk">Responsive</span><span class="sk">Git / GitHub</span>
          <span class="sk">Figma</span><span class="sk">UX/UI</span><span class="sk">Sass</span><span class="sk">Accessibilité</span>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECTS -->
  <section id="projects">
    <p class="sec-eye reveal">02 — Projets</p>
    <h2 class="proj-title reveal">Travaux<br/><em>Sélectionnés</em></h2>

    <div class="proj-grid">

      <!-- Featured -->
      <div class="pcard pcard-featured reveal">
        <div class="pthumb" style="width:42%;min-height:240px;flex-shrink:0">
          <div class="pthumb-inner pc1">
            <svg width="90" height="90" viewBox="0 0 90 90" fill="none">
              <rect x="8" y="22" width="74" height="50" rx="3" stroke="#b8ff57" stroke-width="2" fill="none"/>
              <rect x="8" y="22" width="74" height="14" fill="rgba(184,255,87,.08)" stroke="#b8ff57" stroke-width="2"/>
              <circle cx="22" cy="29" r="3.5" fill="#b8ff57"/>
              <circle cx="34" cy="29" r="3.5" fill="rgba(184,255,87,.4)"/>
              <rect x="18" y="44" width="24" height="14" rx="1" fill="rgba(184,255,87,.1)" stroke="#b8ff57" stroke-width="1"/>
              <rect x="48" y="44" width="30" height="5" rx="1" fill="rgba(184,255,87,.25)"/>
              <rect x="48" y="53" width="22" height="5" rx="1" fill="rgba(184,255,87,.15)"/>
              <rect x="18" y="64" width="60" height="3" rx="1" fill="rgba(184,255,87,.08)"/>
            </svg>
          </div>
        </div>
        <div class="pbody">
          <div class="pnum">✦ Projet 001 · Mis en avant</div>
          <div class="ptitle">Portfolio Personnel v2</div>
          <p class="pdesc">Site vitrine moderne présentant mes compétences et projets. Interface sombre avec animations CSS, typographie expressive et design responsive mobile-first. Intégration Bootstrap 5 et CSS custom avancé.</p>
          <div class="ptags">
            <span class="ptag">HTML5</span><span class="ptag">CSS3</span>
            <span class="ptag">Bootstrap 5</span><span class="ptag">Animations CSS</span>
          </div>
          <div class="plinks">
            <a href="https://github.com/mohamed-dallal/portfolio" target="_blank" class="plink plink-gh"><i class="bi bi-github"></i> GitHub</a>
            <a href="https://mohamed-dallal.github.io/portfolio" target="_blank" class="plink plink-live"><i class="bi bi-box-arrow-up-right"></i> Voir le site</a>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="pcard reveal">
        <div class="pthumb">
          <div class="pthumb-inner pc2">
            <svg width="76" height="76" viewBox="0 0 76 76" fill="none">
              <rect x="6" y="14" width="64" height="48" rx="2" stroke="#b8ff57" stroke-width="1.5" fill="none"/>
              <rect x="6" y="14" width="64" height="13" fill="rgba(184,255,87,.08)"/>
              <circle cx="18" cy="20.5" r="3" fill="#b8ff57"/>
              <circle cx="28" cy="20.5" r="3" fill="rgba(184,255,87,.35)"/>
              <rect x="14" y="34" width="15" height="18" rx="1" fill="rgba(184,255,87,.1)" stroke="#b8ff57" stroke-width="1"/>
              <rect x="33" y="34" width="15" height="18" rx="1" fill="rgba(184,255,87,.1)" stroke="#b8ff57" stroke-width="1"/>
              <rect x="52" y="34" width="12" height="18" rx="1" fill="rgba(184,255,87,.1)" stroke="#b8ff57" stroke-width="1"/>
            </svg>
          </div>
        </div>
        <div class="pbody">
          <div class="pnum">✦ Projet 002</div>
          <div class="ptitle">E-Commerce Landing</div>
          <p class="pdesc">Page d'accueil boutique en ligne avec galerie produits, panier animé et formulaire de commande. Mise en page grid responsive.</p>
          <div class="ptags"><span class="ptag">JavaScript</span><span class="ptag">Bootstrap</span><span class="ptag">CSS Grid</span></div>
          <div class="plinks">
            <a href="https://github.com/mohamed-dallal/ecommerce-landing" target="_blank" class="plink plink-gh"><i class="bi bi-github"></i> GitHub</a>
            <a href="https://mohamed-dallal.github.io/ecommerce-landing" target="_blank" class="plink plink-live"><i class="bi bi-box-arrow-up-right"></i> Demo</a>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="pcard reveal">
        <div class="pthumb">
          <div class="pthumb-inner pc3">
            <svg width="76" height="76" viewBox="0 0 76 76" fill="none">
              <rect x="8" y="8" width="26" height="26" rx="2" fill="rgba(184,255,87,.1)" stroke="#b8ff57" stroke-width="1.5"/>
              <rect x="40" y="8" width="28" height="12" rx="2" fill="rgba(61,154,255,.12)" stroke="#3d9aff" stroke-width="1"/>
              <rect x="40" y="24" width="28" height="12" rx="2" fill="rgba(255,79,123,.1)" stroke="#ff4f7b" stroke-width="1"/>
              <rect x="8" y="42" width="60" height="8" rx="1" fill="rgba(184,255,87,.07)" stroke="#b8ff57" stroke-width="1"/>
              <rect x="8" y="54" width="28" height="14" rx="1" fill="rgba(184,255,87,.07)" stroke="#b8ff57" stroke-width="1"/>
              <rect x="40" y="54" width="28" height="14" rx="1" fill="rgba(61,154,255,.1)" stroke="#3d9aff" stroke-width="1"/>
            </svg>
          </div>
        </div>
        <div class="pbody">
          <div class="pnum">✦ Projet 003</div>
          <div class="ptitle">Dashboard Admin UI</div>
          <p class="pdesc">Interface d'administration avec graphiques, cartes statistiques et navigation latérale. Thème sombre avec CSS variables et Bootstrap.</p>
          <div class="ptags"><span class="ptag">HTML5</span><span class="ptag">CSS3</span><span class="ptag">Chart.js</span></div>
          <div class="plinks">
            <a href="https://github.com/mohamed-dallal/dashboard-ui" target="_blank" class="plink plink-gh"><i class="bi bi-github"></i> GitHub</a>
            <a href="https://mohamed-dallal.github.io/dashboard-ui" target="_blank" class="plink plink-live"><i class="bi bi-box-arrow-up-right"></i> Demo</a>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="pcard reveal">
        <div class="pthumb">
          <div class="pthumb-inner pc4">
            <svg width="76" height="76" viewBox="0 0 76 76" fill="none">
              <circle cx="38" cy="30" r="15" stroke="#b8ff57" stroke-width="1.5" fill="none"/>
              <circle cx="38" cy="30" r="7" fill="rgba(184,255,87,.12)" stroke="#b8ff57" stroke-width="1"/>
              <line x1="38" y1="45" x2="38" y2="58" stroke="#b8ff57" stroke-width="1.5"/>
              <line x1="24" y1="58" x2="52" y2="58" stroke="#b8ff57" stroke-width="1.5"/>
              <line x1="30" y1="58" x2="26" y2="68" stroke="#b8ff57" stroke-width="1.5"/>
              <line x1="46" y1="58" x2="50" y2="68" stroke="#b8ff57" stroke-width="1.5"/>
            </svg>
          </div>
        </div>
        <div class="pbody">
          <div class="pnum">✦ Projet 004</div>
          <div class="ptitle">Blog Personnel</div>
          <p class="pdesc">Blog statique avec articles, catégories et mode sombre/clair. Navigation fluide et lecture optimisée pour le confort visuel.</p>
          <div class="ptags"><span class="ptag">HTML</span><span class="ptag">CSS</span><span class="ptag">Dark Mode</span></div>
          <div class="plinks">
            <a href="https://github.com/mohamed-dallal/blog" target="_blank" class="plink plink-gh"><i class="bi bi-github"></i> GitHub</a>
            <a href="https://mohamed-dallal.github.io/blog" target="_blank" class="plink plink-live"><i class="bi bi-box-arrow-up-right"></i> Demo</a>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="pcard reveal">
        <div class="pthumb">
          <div class="pthumb-inner pc5">
            <svg width="76" height="76" viewBox="0 0 76 76" fill="none">
              <rect x="8" y="20" width="60" height="38" rx="3" stroke="#b8ff57" stroke-width="1.5" fill="none"/>
              <path d="M18 48 L28 34 L36 42 L46 30 L58 48 Z" fill="rgba(184,255,87,.1)" stroke="#b8ff57" stroke-width="1.5" stroke-linejoin="round"/>
              <circle cx="28" cy="34" r="2.5" fill="#b8ff57"/>
              <circle cx="46" cy="30" r="2.5" fill="#b8ff57"/>
              <line x1="8" y1="52" x2="68" y2="52" stroke="rgba(184,255,87,.25)" stroke-width="1" stroke-dasharray="3 3"/>
            </svg>
          </div>
        </div>
        <div class="pbody">
          <div class="pnum">✦ Projet 005</div>
          <div class="ptitle">Data Viz Page</div>
          <p class="pdesc">Page de présentation de données avec visualisations SVG animées, graphiques interactifs et mise en page éditoriale moderne.</p>
          <div class="ptags"><span class="ptag">SVG</span><span class="ptag">CSS Animations</span><span class="ptag">JS</span></div>
          <div class="plinks">
            <a href="https://github.com/mohamed-dallal/dataviz" target="_blank" class="plink plink-gh"><i class="bi bi-github"></i> GitHub</a>
            <a href="https://mohamed-dallal.github.io/dataviz" target="_blank" class="plink plink-live"><i class="bi bi-box-arrow-up-right"></i> Demo</a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- SERVICES -->
  <section id="services">
    <p class="sec-eye reveal">03 — Ce que je fais</p>
    <div class="svc-grid reveal">
      <div class="svc-item">
        <span class="svc-icon">⬡</span>
        <div class="svc-title">Design UI/UX</div>
        <p class="svc-desc">Maquettes Figma, wireframes et prototypes interactifs centrés sur l'expérience utilisateur.</p>
      </div>
      <div class="svc-item">
        <span class="svc-icon">◈</span>
        <div class="svc-title">Intégration Web</div>
        <p class="svc-desc">HTML5 sémantique, CSS3 moderne et Bootstrap pour des interfaces pixel-perfect.</p>
      </div>
      <div class="svc-item">
        <span class="svc-icon">⟡</span>
        <div class="svc-title">JavaScript</div>
        <p class="svc-desc">Animations, interactions dynamiques et logique front-end avec JavaScript ES6+.</p>
      </div>
      <div class="svc-item">
        <span class="svc-icon">◎</span>
        <div class="svc-title">Responsive</div>
        <p class="svc-desc">Sites adaptatifs mobile-first compatibles tous écrans et navigateurs modernes.</p>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact">
    <p class="sec-eye reveal">04 — Contact</p>
    <div class="contact-wrap">
      <div class="reveal">
        <h2 class="contact-big">Créons<br/><em>quelque</em><br/>chose.</h2>
        <div style="margin-top:2.5rem">
          <a href="mailto:mohamed.dallal@email.com" class="cinfo-row">
            <div class="cic"><i class="bi bi-envelope"></i></div>
            <div><div class="flbl">Email</div>mohamed.dallal@email.com</div>
          </a>
          <a href="https://linkedin.com/in/mohamed-dallal" target="_blank" class="cinfo-row">
            <div class="cic"><i class="bi bi-linkedin"></i></div>
            <div><div class="flbl">LinkedIn</div>linkedin.com/in/mohamed-dallal</div>
          </a>
          <a href="https://github.com/mohamed-dallal" target="_blank" class="cinfo-row">
            <div class="cic"><i class="bi bi-github"></i></div>
            <div><div class="flbl">GitHub</div>github.com/mohamed-dallal</div>
          </a>
          <div class="cinfo-row" style="cursor:default">
            <div class="cic"><i class="bi bi-geo-alt"></i></div>
            <div><div class="flbl">Localisation</div>France 🇫🇷</div>
          </div>
        </div>
      </div>
      <div class="reveal">
        <label class="form-lbl">Votre nom</label>
        <input type="text" class="f-inp" placeholder="Jean Dupont"/>
        <label class="form-lbl">Email</label>
        <input type="email" class="f-inp" placeholder="jean@exemple.fr"/>
        <label class="form-lbl">Sujet</label>
        <input type="text" class="f-inp" placeholder="Collaboration, projet…"/>
        <label class="form-lbl">Message</label>
        <textarea class="f-inp" placeholder="Dites-moi tout…"></textarea>
        <button class="btn-send"><i class="bi bi-send me-2"></i> Envoyer le message</button>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="f-copy">© 2025 Mohamed Dal-lal — Tous droits réservés</div>
    <div class="f-socs">
      <a href="https://github.com/mohamed-dallal" target="_blank" class="fsoc"><i class="bi bi-github"></i></a>
      <a href="https://linkedin.com/in/mohamed-dallal" target="_blank" class="fsoc"><i class="bi bi-linkedin"></i></a>
      <a href="mailto:mohamed.dallal@email.com" class="fsoc"><i class="bi bi-envelope"></i></a>
    </div>
    <div class="f-copy">🇫🇷 France · Développement Web Digital</div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    /* Cursor */
    const cur = document.getElementById('cursor'), ring = document.getElementById('cursor-ring');
    document.addEventListener('mousemove', e => {
      cur.style.left = e.clientX+'px'; cur.style.top = e.clientY+'px';
      setTimeout(() => { ring.style.left = e.clientX+'px'; ring.style.top = e.clientY+'px'; }, 60);
    });

    /* Particles */
    const colors = ['#b8ff57','#7b5ea7','#3d9aff','#ff4f7b'];
    for (let i = 0; i < 28; i++) {
      const p = document.createElement('div');
      p.className = 'particle';
      const sz = Math.random() * 4 + 1;
      p.style.cssText = `width:${sz}px;height:${sz}px;background:${colors[i%colors.length]};left:${Math.random()*100}%;z-index:0;animation-duration:${Math.random()*18+10}s;animation-delay:${Math.random()*-22}s;`;
      document.body.appendChild(p);
    }

    /* Reveal */
    const io = new IntersectionObserver(entries => {
      entries.forEach((e, i) => { if(e.isIntersecting) setTimeout(() => e.target.classList.add('visible'), i*110); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));

    /* Nav highlight */
    const secs = document.querySelectorAll('section[id]');
    window.addEventListener('scroll', () => {
      const y = window.scrollY + 130;
      secs.forEach(s => {
        if (y >= s.offsetTop && y < s.offsetTop + s.offsetHeight) {
          document.querySelectorAll('.nav-links a:not(.nav-cta)').forEach(a => {
            a.style.color = a.getAttribute('href') === '#'+s.id ? 'var(--lime)' : '';
          });
        }
      });
    });

    /* Send button feedback */
    document.querySelector('.btn-send').addEventListener('click', function() {
      this.innerHTML = '<i class="bi bi-check-lg me-2"></i> Message envoyé !';
      this.style.background = '#7b5ea7';
      setTimeout(() => { this.innerHTML = '<i class="bi bi-send me-2"></i> Envoyer le message'; this.style.background = ''; }, 3000);
    });
  </script>
</body>
</html>