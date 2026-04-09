<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mohamed Dal-lal · Digital Developer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Clash+Display:wght@400;600;700&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <style>
    :root {
      --ink:    #0d0d0d;
      --paper:  #f5f0e8;
      --acid:   #c8ff00;
      --rust:   #e85d26;
      --mist:   #c4cfc4;
      --grid:   rgba(13,13,13,0.07);
    }
 
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
 
    html { scroll-behavior: smooth; }
 
    body {
      background: var(--paper);
      color: var(--ink);
      font-family: 'Space Mono', monospace;
      overflow-x: hidden;
    }
 
    /* ── Grid background ── */
    body::before {
      content: '';
      position: fixed; inset: 0;
      background-image:
        linear-gradient(var(--grid) 1px, transparent 1px),
        linear-gradient(90deg, var(--grid) 1px, transparent 1px);
      background-size: 40px 40px;
      pointer-events: none;
      z-index: 0;
    }
 
    /* ── NAV ── */
    nav {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      display: flex; justify-content: space-between; align-items: center;
      padding: 1rem 2.5rem;
      border-bottom: 2px solid var(--ink);
      background: var(--paper);
      backdrop-filter: blur(4px);
    }
    .nav-logo {
      font-family: 'Space Mono', monospace;
      font-weight: 700;
      font-size: .78rem;
      letter-spacing: .14em;
      text-transform: uppercase;
      text-decoration: none;
      color: var(--ink);
    }
    .nav-links { display: flex; gap: 2rem; list-style: none; }
    .nav-links a {
      font-size: .72rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      text-decoration: none;
      color: var(--ink);
      transition: color .2s;
    }
    .nav-links a:hover { color: var(--rust); }
 
    /* ── HERO ── */
    #hero {
      min-height: 100vh;
      display: flex; flex-direction: column; justify-content: flex-end;
      padding: 7rem 2.5rem 3rem;
      position: relative;
      border-bottom: 2px solid var(--ink);
    }
    .hero-tag {
      font-size: .7rem;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: var(--rust);
      margin-bottom: 1.2rem;
      animation: fadeUp .8s .1s both;
    }
    .hero-name {
      font-family: 'Clash Display', sans-serif;
      font-weight: 700;
      font-size: clamp(3.2rem, 9vw, 9rem);
      line-height: .95;
      text-transform: uppercase;
      letter-spacing: -.02em;
      animation: fadeUp .8s .2s both;
    }
    .hero-name span { color: var(--rust); }
    .hero-sub {
      margin-top: 2rem;
      font-size: .78rem;
      letter-spacing: .1em;
      text-transform: uppercase;
      max-width: 440px;
      line-height: 1.9;
      animation: fadeUp .8s .35s both;
    }
    .hero-badge {
      position: absolute;
      top: 8.5rem; right: 2.5rem;
      width: 130px; height: 130px;
      background: var(--acid);
      border: 2px solid var(--ink);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      text-align: center;
      font-size: .62rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      line-height: 1.5;
      animation: spin 18s linear infinite;
    }
    .hero-scroll {
      position: absolute;
      bottom: 2.5rem; right: 2.5rem;
      font-size: .65rem;
      letter-spacing: .14em;
      text-transform: uppercase;
      writing-mode: vertical-rl;
      display: flex; align-items: center; gap: .5rem;
      opacity: .5;
      animation: fadeUp .8s .5s both;
    }
    .hero-scroll::after {
      content: '';
      display: block;
      width: 1px; height: 40px;
      background: var(--ink);
    }
 
    /* ── ABOUT ── */
    #about {
      padding: 6rem 2.5rem;
      border-bottom: 2px solid var(--ink);
      position: relative; z-index: 1;
    }
    .section-label {
      font-size: .65rem;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: var(--rust);
      margin-bottom: 3rem;
    }
    .about-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: start;
    }
    .about-heading {
      font-family: 'Clash Display', sans-serif;
      font-weight: 600;
      font-size: clamp(2rem, 4vw, 3.5rem);
      line-height: 1.1;
      text-transform: uppercase;
    }
    .about-text {
      font-size: .82rem;
      line-height: 2;
      opacity: .75;
      margin-bottom: 2rem;
    }
    .stat-row {
      display: flex; gap: 2.5rem; flex-wrap: wrap;
      margin-top: 2rem;
    }
    .stat-item { }
    .stat-num {
      font-family: 'Clash Display', sans-serif;
      font-size: 2.8rem;
      font-weight: 700;
      line-height: 1;
      color: var(--rust);
    }
    .stat-label {
      font-size: .62rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      opacity: .6;
      margin-top: .3rem;
    }
    .skills-list {
      display: flex; flex-wrap: wrap; gap: .6rem;
      margin-top: 2.5rem;
    }
    .skill-tag {
      padding: .35rem .85rem;
      border: 1.5px solid var(--ink);
      font-size: .65rem;
      letter-spacing: .1em;
      text-transform: uppercase;
      transition: background .2s, color .2s;
    }
    .skill-tag:hover { background: var(--ink); color: var(--paper); }
 
    /* ── PROJECTS ── */
    #projects {
      padding: 6rem 2.5rem;
      border-bottom: 2px solid var(--ink);
      position: relative; z-index: 1;
    }
    .projects-header {
      display: flex; justify-content: space-between; align-items: flex-end;
      margin-bottom: 4rem;
    }
    .projects-heading {
      font-family: 'Clash Display', sans-serif;
      font-weight: 700;
      font-size: clamp(2.5rem, 6vw, 5rem);
      text-transform: uppercase;
      line-height: 1;
    }
    .projects-heading em {
      font-style: normal;
      -webkit-text-stroke: 2px var(--ink);
      color: transparent;
    }
    .projects-count {
      font-size: .65rem;
      letter-spacing: .15em;
      text-transform: uppercase;
      opacity: .5;
    }
    .project-card {
      display: grid;
      grid-template-columns: 80px 1fr auto;
      align-items: center;
      gap: 2rem;
      padding: 2rem 0;
      border-top: 1.5px solid var(--ink);
      cursor: pointer;
      transition: background .2s;
      position: relative;
    }
    .project-card:last-child { border-bottom: 1.5px solid var(--ink); }
    .project-card:hover { background: var(--acid); padding-left: 1rem; padding-right: 1rem; margin-left: -1rem; margin-right: -1rem; }
    .project-num {
      font-size: .65rem;
      letter-spacing: .15em;
      opacity: .4;
    }
    .project-info { }
    .project-title {
      font-family: 'Clash Display', sans-serif;
      font-weight: 600;
      font-size: clamp(1.1rem, 2.5vw, 1.8rem);
      text-transform: uppercase;
      line-height: 1.2;
    }
    .project-meta {
      font-size: .65rem;
      letter-spacing: .1em;
      text-transform: uppercase;
      opacity: .5;
      margin-top: .4rem;
    }
    .project-tags { display: flex; gap: .5rem; flex-wrap: wrap; margin-top: .6rem; }
    .ptag {
      font-size: .6rem;
      letter-spacing: .08em;
      text-transform: uppercase;
      background: var(--ink);
      color: var(--paper);
      padding: .2rem .6rem;
    }
    .project-arrow {
      font-size: 1.4rem;
      opacity: .3;
      transition: opacity .2s, transform .2s;
    }
    .project-card:hover .project-arrow { opacity: 1; transform: translate(4px,-4px); }
 
    /* ── CONTACT ── */
    #contact {
      padding: 6rem 2.5rem 4rem;
      position: relative; z-index: 1;
    }
    .contact-big {
      font-family: 'Clash Display', sans-serif;
      font-weight: 700;
      font-size: clamp(3rem, 8vw, 8rem);
      text-transform: uppercase;
      line-height: .95;
      margin: 2rem 0 3rem;
    }
    .contact-big span {
      -webkit-text-stroke: 2px var(--ink);
      color: transparent;
    }
    .contact-links {
      display: flex; gap: 1.5rem; flex-wrap: wrap;
      margin-bottom: 5rem;
    }
    .contact-link {
      display: inline-flex; align-items: center; gap: .5rem;
      padding: .75rem 1.6rem;
      border: 2px solid var(--ink);
      font-size: .7rem;
      letter-spacing: .14em;
      text-transform: uppercase;
      text-decoration: none;
      color: var(--ink);
      transition: background .2s, color .2s;
    }
    .contact-link:hover, .contact-link.primary { background: var(--ink); color: var(--paper); }
    .contact-link.primary:hover { background: var(--rust); border-color: var(--rust); }
    footer {
      padding-top: 2rem;
      border-top: 1.5px solid var(--ink);
      display: flex; justify-content: space-between; align-items: center;
      flex-wrap: wrap; gap: 1rem;
    }
    .footer-copy {
      font-size: .62rem;
      letter-spacing: .1em;
      text-transform: uppercase;
      opacity: .45;
    }
    .footer-flag {
      font-size: .72rem;
      letter-spacing: .1em;
      text-transform: uppercase;
      opacity: .45;
    }
 
    /* ── Animations ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes spin {
      to { transform: rotate(360deg); }
    }
 
    /* ── Reveal ── */
    .reveal {
      opacity: 0;
      transform: translateY(32px);
      transition: opacity .7s ease, transform .7s ease;
    }
    .reveal.visible {
      opacity: 1;
      transform: none;
    }
 
    /* ── Responsive ── */
    @media (max-width: 768px) {
      nav { padding: 1rem 1.2rem; }
      .nav-links { gap: 1.2rem; }
      #hero { padding: 6.5rem 1.2rem 2.5rem; }
      .hero-badge { width: 90px; height: 90px; font-size: .52rem; top: 7rem; right: 1.2rem; }
      #about, #projects, #contact { padding: 4rem 1.2rem; }
      .about-grid { grid-template-columns: 1fr; gap: 2.5rem; }
      .project-card { grid-template-columns: 50px 1fr auto; gap: 1rem; }
      .contact-big { font-size: clamp(2.2rem, 12vw, 5rem); }
    }
  </style>
</head>
<body>
 
  <!-- NAV -->
  <nav>
    <a class="nav-logo" href="#">MDL</a>
    <ul class="nav-links">
      <li><a href="#about">About</a></li>
      <li><a href="">Projects</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="pag.html">Atelire</a></li>

    </ul>
  </nav>
 
  <!-- HERO -->
  <section id="hero">
    <p class="hero-tag">✦ Digital Developer · France · 2024–2025</p>
    <h1 class="hero-name">
      Mohamed<br/><span>Dal-lal</span>
    </h1>
    <p class="hero-sub">
      1ère année · Développement Web Digital<br/>
      Building interfaces that speak for themselves.
    </p>
    <div class="hero-badge">
      1st Year<br/>Dev<br/>Digital<br/>🇫🇷 France
    </div>
    <div class="hero-scroll">Scroll</div>
  </section>
 
  <!-- ABOUT -->
  <section id="about">
    <p class="section-label reveal">✦ 01 — About</p>
    <div class="about-grid">
      <div class="reveal">
        <h2 class="about-heading">Crafting the<br/>Digital <span style="color:var(--rust)">Future</span></h2>
        <div class="stat-row">
          <div class="stat-item">
            <div class="stat-num">1st</div>
            <div class="stat-label">Year</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">FR</div>
            <div class="stat-label">Based</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">∞</div>
            <div class="stat-label">Ideas</div>
          </div>
        </div>
      </div>
      <div class="reveal">
        <p class="about-text">
          Je suis Mohamed Dal-lal, étudiant en première année de développement web digital en France.
          Passionné par la création d'expériences numériques mémorables — du design à la ligne de code,
          chaque projet est une opportunité d'apprendre et de repousser les limites.
        </p>
        <p class="about-text">
          My focus: clean architecture, expressive UI, and purposeful interaction.
          Currently exploring front-end frameworks, responsive design, and modern tooling.
        </p>
        <div class="skills-list">
          <span class="skill-tag">HTML5</span>
          <span class="skill-tag">CSS3</span>
          <span class="skill-tag">Bootstrap</span>
          <span class="skill-tag">JavaScript</span>
          <span class="skill-tag">Responsive</span>
          <span class="skill-tag">Git</span>
          <span class="skill-tag">Figma</span>
          <span class="skill-tag">UX/UI</span>
        </div>
      </div>
    </div>
  </section>
 
  <!-- PROJECTS -->
  <section id="projects">
    <div class="projects-header reveal">
      <div>
        <p class="section-label">✦ 02 — Projects</p>
        <h2 class="projects-heading">Selected<br/><em>Work</em></h2>
      </div>
      <span class="projects-count">03 Projects</span>
    </div>
 
    <div class="project-card reveal">
      <span class="project-num">001</span>
      <div class="project-info">
        <div class="project-title">Portfolio Personnel</div>
        <div class="project-meta">Web Design · 2025</div>
        <div class="project-tags">
          <span class="ptag">HTML</span>
          <span class="ptag">CSS</span>
          <span class="ptag">Bootstrap</span>
        </div>
      </div>
      <span class="project-arrow">↗</span>
    </div>
 
    <div class="project-card reveal">
      <span class="project-num">002</span>
      <div class="project-info">
        <div class="project-title">E-Commerce Landing</div>
        <div class="project-meta">Front-End · 2025</div>
        <div class="project-tags">
          <span class="ptag">JavaScript</span>
          <span class="ptag">Bootstrap</span>
          <span class="ptag">CSS Grid</span>
        </div>
      </div>
      <span class="project-arrow">↗</span>
    </div>
 
    <div class="project-card reveal">
      <span class="project-num">003</span>
      <div class="project-info">
        <div class="project-title">Dashboard UI</div>
        <div class="project-meta">Interface Design · 2025</div>
        <div class="project-tags">
          <span class="ptag">HTML5</span>
          <span class="ptag">CSS3</span>
          <span class="ptag">JS</span>
        </div>
      </div>
      <span class="project-arrow">↗</span>
    </div>
  </section>
 
  <!-- CONTACT -->
  <section id="contact">
    <p class="section-label reveal">✦ 03 — Contact</p>
    <h2 class="contact-big reveal">
      Let's<br/><span>Build</span><br/>Together.
    </h2>
    <div class="contact-links reveal">
      <a href="mailto:mohamed.dallal@email.com" class="contact-link primary">
        <i class="bi bi-envelope"></i> Email Me
      </a>
      <a href="https://linkedin.com" target="_blank" class="contact-link">
        <i class="bi bi-linkedin"></i> LinkedIn
      </a>
      <a href="https://github.com" target="_blank" class="contact-link">
        <i class="bi bi-github"></i> GitHub
      </a>
    </div>
    <footer>
      <span class="footer-copy">© 2025 Mohamed Dal-lal — All rights reserved</span>
      <span class="footer-flag">🇫🇷 France · Développement Web Digital</span>
    </footer>
  </section>
 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Scroll reveal
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((e, i) => {
        if (e.isIntersecting) {
          setTimeout(() => e.target.classList.add('visible'), i * 80);
        }
      });
    }, { threshold: 0.15 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
 
    // Project card click ripple
    document.querySelectorAll('.project-card').forEach(card => {
      card.addEventListener('click', () => {
        card.style.background = 'var(--acid)';
        setTimeout(() => card.style.background = '', 400);
      });
    });
  </script>
</body>
</html>