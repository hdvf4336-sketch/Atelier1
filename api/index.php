<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mohamed DAL-LAL — Développeur Digital</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

  :root {
    --bg: #080b0f;
    --surface: #0e1318;
    --border: #1a2230;
    --accent: #00e5ff;
    --text: #e8edf2;
    --muted: #5a6a7e;
    --card: #111720;
  }

  html { scroll-behavior: smooth; }

  body {
    background: var(--bg);
    color: var(--text);
    font-family: 'DM Mono', monospace;
    overflow-x: hidden;
    cursor: none;
  }


  .cursor {
    width: 10px; height: 10px;
    background: var(--accent);
    border-radius: 50%;
    position: fixed; top: 0; left: 0;
    pointer-events: none; z-index: 9999;
    mix-blend-mode: difference;
  }
  .cursor-ring {
    width: 36px; height: 36px;
    border: 1px solid var(--accent);
    border-radius: 50%;
    position: fixed; top: 0; left: 0;
    pointer-events: none; z-index: 9998;
    opacity: 0.5;
    transition: width 0.2s, height 0.2s, opacity 0.2s;
  }

 
  body::before {
    content: '';
    position: fixed; inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
    pointer-events: none; z-index: 9997; opacity: 0.4;
  }

  
  .grid-bg {
    position: fixed; inset: 0;
    background-image:
      linear-gradient(var(--border) 1px, transparent 1px),
      linear-gradient(90deg, var(--border) 1px, transparent 1px);
    background-size: 60px 60px;
    opacity: 0.3;
    pointer-events: none; z-index: 0;
  }

 
  nav {
    position: fixed; top: 0; left: 0; right: 0;
    padding: 1.5rem 3rem;
    display: flex; justify-content: space-between; align-items: center;
    z-index: 100;
    backdrop-filter: blur(20px);
    background: rgba(8,11,15,0.85);
    border-bottom: 1px solid var(--border);
  }
  .logo {
    font-family: 'Syne', sans-serif;
    font-weight: 800; font-size: 1.1rem;
    letter-spacing: 0.05em;
  }
  .logo span { color: var(--accent); }

  .nav-links { display: flex; gap: 2.5rem; }
  .nav-links a {
    color: var(--muted);
    text-decoration: none;
    font-size: 0.75rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    transition: color 0.3s;
  }
  .nav-links a:hover { color: var(--accent); }

  
  header {
    min-height: 100vh;
    display: flex; flex-direction: column; justify-content: flex-end;
    padding: 8rem 3rem 5rem;
    position: relative; z-index: 1;
  }

  .status-badge {
    display: inline-flex; align-items: center; gap: 0.5rem;
    background: rgba(0,229,255,0.06);
    border: 1px solid rgba(0,229,255,0.2);
    padding: 0.4rem 1rem; border-radius: 100px;
    font-size: 0.7rem; letter-spacing: 0.15em;
    color: var(--accent); margin-bottom: 2.5rem;
    width: fit-content;
    animation: fadeUp 0.8s ease both;
  }
  .status-dot {
    width: 6px; height: 6px;
    background: var(--accent); border-radius: 50%;
    animation: pulse 2s infinite;
  }
  @keyframes pulse {
    0%,100% { opacity:1; transform:scale(1); }
    50% { opacity:0.4; transform:scale(0.8); }
  }

  header h1 {
    font-family: 'Syne', sans-serif;
    font-size: clamp(3.5rem, 8vw, 7rem);
    font-weight: 800; line-height: 0.95;
    letter-spacing: -0.03em;
    margin-bottom: 1.5rem;
    animation: fadeUp 0.8s 0.1s ease both;
  }
  header h1 .stroke {
    display: block;
    -webkit-text-stroke: 1px var(--accent);
    color: transparent;
  }

  header p {
    font-size: 0.85rem;
    color: var(--muted);
    line-height: 1.8; max-width: 440px;
    margin-bottom: 3rem;
    animation: fadeUp 0.8s 0.2s ease both;
  }

  /* SECTION */
  .container {
    padding: 7rem 3rem;
    position: relative; z-index: 1;
    max-width: 1200px; margin: 0 auto;
  }

  .section-label {
    font-size: 0.65rem; letter-spacing: 0.3em;
    text-transform: uppercase; color: var(--accent);
    margin-bottom: 1rem;
    display: flex; align-items: center; gap: 1rem;
  }
  .section-label::after {
    content: ''; flex: 1; max-width: 60px;
    height: 1px; background: var(--accent); opacity: 0.4;
  }

  .container h2 {
    font-family: 'Syne', sans-serif;
    font-size: clamp(2rem, 4vw, 3.5rem);
    font-weight: 800; letter-spacing: -0.02em;
    margin-bottom: 3.5rem; line-height: 1.1;
  }

  /* PROJECTS GRID */
  .projects {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
  }

  .card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s, border-color 0.3s, box-shadow 0.3s;
  }
  .card:hover {
    transform: translateY(-6px);
    border-color: rgba(0,229,255,0.3);
    box-shadow: 0 20px 60px rgba(0,229,255,0.07);
  }

  .card-visual {
    height: 180px;
    background: linear-gradient(135deg, #0e1318, #111720);
    display: flex; align-items: center; justify-content: center;
    font-size: 3.5rem;
    border-bottom: 1px solid var(--border);
    position: relative; overflow: hidden;
  }
  .card-visual::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(circle at 50% 50%, rgba(0,229,255,0.07), transparent 70%);
  }

  .card-body { padding: 1.8rem; }

  .card-tag {
    font-size: 0.62rem; letter-spacing: 0.2em;
    text-transform: uppercase; color: var(--accent);
    margin-bottom: 0.6rem; display: block;
  }

  .card h3 {
    font-family: 'Syne', sans-serif;
    font-size: 1.2rem; font-weight: 700;
    margin-bottom: 0.6rem; margin-top: 0;
    color: var(--text);
  }

  .card p {
    font-size: 0.78rem; color: var(--muted);
    line-height: 1.7; margin-bottom: 1.5rem;
  }

  .btn {
    display: inline-flex; align-items: center; gap: 0.5rem;
    background: transparent;
    border: 1px solid var(--border);
    color: var(--text);
    padding: 0.65rem 1.2rem;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.7rem;
    font-family: 'DM Mono', monospace;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    transition: border-color 0.2s, color 0.2s, box-shadow 0.2s;
  }
  .btn:hover {
    border-color: var(--accent);
    color: var(--accent);
    box-shadow: 0 4px 20px rgba(0,229,255,0.1);
  }
  .btn::after { content: ' →'; }

  /* DIVIDER */
  .divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--border), transparent);
    position: relative; z-index: 1;
  }


  footer {
    border-top: 1px solid var(--border);
    padding: 2rem 3rem;
    display: flex; justify-content: space-between; align-items: center;
    position: relative; z-index: 1;
    font-size: 0.7rem; color: var(--muted);
  }

  /* ANIMATIONS */
  @keyframes fadeUp {
    from { opacity:0; transform:translateY(24px); }
    to { opacity:1; transform:none; }
  }
  .reveal {
    opacity: 0; transform: translateY(28px);
    transition: opacity 0.7s ease, transform 0.7s ease;
  }
  .reveal.vis { opacity:1; transform:none; }

  @media (max-width: 768px) {
    nav { padding: 1.2rem 1.5rem; }
    .nav-links { display: none; }
    header, .container { padding-left: 1.5rem; padding-right: 1.5rem; }
    footer { flex-direction: column; gap: 1rem; text-align: center; }
  }
</style>
</head>
<body>

<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="ring"></div>
<div class="grid-bg"></div>


<nav>
  <div class="logo">M<span>.</span>DAL-LAL</div>
  <div class="nav-links">
    
  </div>
</nav>


<header>
  <div class="status-badge">
    <span class="status-dot"></span>
    Étudiant en Développement Digital
  </div>

  <h1>
    Mohamed
    <span class="stroke">DAL-LAL</span>
  </h1>

  <p>Passionné par la programmation et la création d'expériences web modernes. Chaque projet est une opportunité d'apprendre et de progresser.</p>
</header>

<div class="divider"></div>


<div class="container" id="projects">
  <div class="section-label">Mes réalisations</div>
  <h2>Mes Projets</h2>

  <div class="projects">

    <div class="card reveal">
      
      <div class="card-body">
        <span class="card-tag">php</span>
        <h3> atelire1</h3>
        <p></p>
        <a href="/At1.pdf" class="btn" target="_blank">Voir le pdf</a>
      </div>
    </div>

    <div class="card reveal">
      <div class="card-body">
        <span class="card-tag">php</span>
        <h3></h3>
        <p>Atelire2</p>
        <a href="/At2.pdf" class="btn" target="_blank">Voir le pdf</a>
        <a href="atelire2.php" class="btn" target="_blank">projet </a>
      </div>
    </div>

    <div class="card reveal">
      
      <div class="card-body">
        <span class="card-tag">php</span>
        <h3></h3>
        <p>Atelire3</p>
        <a href="/At3.pdf" class="btn" target="_blank">pdf</a>
        <a href="https://github.com/hdvf4336-sketch/atl3.git" class="btn" target="_blank">githa</a>
      </div>
    </div>

  </div>
</div>



<div class="container" id="projects">
  <div class="section-label">Mes réalisations</div>
  <h2>Mes Projets</h2>

  <div class="projects">

    <div class="card reveal">
      
      <div class="card-body">
        <span class="card-tag">php</span>
        <h3> atelire4</h3>
        <p></p>
        <a href="/At4.pdf" class="btn" target="_blank">Voir le pdf</a>
        <a href="https://github.com/hdvf4336-sketch/AT4.git" class="btn" target="_blank">githab</a>
      </div>
    </div>

    <div class="card reveal">
      <div class="card-body">
        <span class="card-tag">php</span>
        <h3></h3>
        <p>Atelire5</p>
        <a href="/At5.pdf" class="btn" target="_blank">Voir le pdf</a>
        <a href="" class="btn" target="_blank">githab</a>
      </div>
    </div>

    <div class="card reveal">
      
      <div class="card-body">
        <span class="card-tag">php</span>
        <h3></h3>
        <p>Atelire6</p>
        <a href="/At3.pdf" class="btn" target="_blank">pdf</a>
        <a href="" class="btn" target="_blank">githa</a>
      </div>
    </div>

  </div>
</div>

<div class="divider"></div>


<footer>
  <span>© 2026 Mohamed DAL-LAL</span>
  <span style="color:var(--accent);">Développement Digital</span>
</footer>

<script>
  const cursor = document.getElementById('cursor');
  const ring = document.getElementById('ring');
  let mx=0,my=0,rx=0,ry=0;
  document.addEventListener('mousemove', e => {
    mx=e.clientX; my=e.clientY;
    cursor.style.transform=`translate(${mx-5}px,${my-5}px)`;
  });
  (function animate(){
    rx+=(mx-rx)*0.12; ry+=(my-ry)*0.12;
    ring.style.transform=`translate(${rx-18}px,${ry-18}px)`;
    requestAnimationFrame(animate);
  })();
  document.querySelectorAll('a').forEach(el=>{
    el.addEventListener('mouseenter',()=>{ring.style.width='60px';ring.style.height='60px';ring.style.opacity='0.8';});
    el.addEventListener('mouseleave',()=>{ring.style.width='36px';ring.style.height='36px';ring.style.opacity='0.5';});
  });

  const obs = new IntersectionObserver(entries=>{
    entries.forEach((e,i)=>{
      if(e.isIntersecting){
        setTimeout(()=>e.target.classList.add('vis'),i*120);
        obs.unobserve(e.target);
      }
    });
  },{threshold:0.1});
  document.querySelectorAll('.reveal').forEach(el=>obs.observe(el));
</script>
</body>
</html>
