<?php
// familia_rol.php — Árbol Genealógico de Rol | Uso Privado
// Requiere: PHP 7+, acceso a Hostinger
// No conecta a BD, es archivo standalone de visualización personal

$familia = [
    [
        'id'         => 'tio_reality',
        'nombre'     => 'Tío Reality',
        'edad'       => 26,
        'rol'        => 'Padre de Rol / Fundador',
        'estado'     => 'Soltero',
        'genero'     => 'M',
        'emoji'      => '👑',
        'color'      => '#7C3AED',
        'vinculos'   => ['Claire (hija de rol)', 'Artemis (ex / madre de Claire)'],
        'rasgos'     => ['Responsable', 'Visionario', 'Protector', 'Directo', 'Creativo'],
        'historia'   => 'Fundador de la familia de rol. Figura paterna de Claire, con quien construyó un vínculo afectivo padre-hija. Comparte la crianza de rol con Artemis.',
        'reality_id' => '86832be6',
        'reality_url'=> 'https://reality.app/profile/86832be6',
        'generacion' => 1,
    ],
    [
        'id'         => 'artemis',
        'nombre'     => 'Artemis',
        'edad'       => null,
        'rol'        => 'Madre de Claire / Ex pareja de Tío Reality',
        'estado'     => 'En pareja',
        'genero'     => 'F',
        'emoji'      => '🌙',
        'color'      => '#DB2777',
        'vinculos'   => ['Claire (hija)', 'Tío Reality (ex / co-padre de rol)'],
        'rasgos'     => ['Independiente', 'Maternal', 'Determinada'],
        'historia'   => 'Madre de Claire dentro del universo de rol. Tuvo una relación con Tío Reality. Actualmente tiene otra pareja.',
        'reality_id' => '22107384',
        'reality_url'=> 'https://reality.app/profile/22107384',
        'generacion' => 1,
    ],
    [
        'id'         => 'claire',
        'nombre'     => 'Claire',
        'edad'       => 16,
        'rol'        => 'Hija de Rol',
        'estado'     => 'Soltera',
        'genero'     => 'F',
        'emoji'      => '✨',
        'color'      => '#0EA5E9',
        'vinculos'   => ['Tío Reality (padre de rol)', 'Artemis (madre)'],
        'rasgos'     => ['Joven', 'Espontánea', 'Afectuosa'],
        'historia'   => 'Hija de rol de Tío Reality y Claire biológica de Artemis. Vínculo afectivo padre-hija con Tío Reality construido desde el cariño mutuo, no por sangre.',
        'reality_id' => '5c234356',
        'reality_url'=> 'https://reality.app/profile/5c234356',
        'generacion' => 2,
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>🌳 Familia de Rol — Tío Reality</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #0a0a14;
    --bg2: #0f0f1e;
    --card: #13132a;
    --border: rgba(255,255,255,0.08);
    --text: #e8e8f0;
    --muted: #7878a0;
    --gold: #f0c040;
    --glow: rgba(124,58,237,0.3);
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    background: var(--bg);
    color: var(--text);
    font-family: 'Nunito', sans-serif;
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* ── Fondo animado ── */
  body::before {
    content: '';
    position: fixed; inset: 0;
    background:
      radial-gradient(ellipse 60% 40% at 20% 20%, rgba(124,58,237,0.12) 0%, transparent 60%),
      radial-gradient(ellipse 50% 50% at 80% 80%, rgba(219,39,119,0.08) 0%, transparent 60%),
      radial-gradient(ellipse 40% 30% at 50% 50%, rgba(14,165,233,0.05) 0%, transparent 60%);
    pointer-events: none; z-index: 0;
    animation: bgPulse 8s ease-in-out infinite alternate;
  }

  @keyframes bgPulse {
    from { opacity: 0.7; }
    to   { opacity: 1; }
  }

  /* ── Header ── */
  header {
    position: relative; z-index: 1;
    text-align: center;
    padding: 3rem 1rem 1.5rem;
  }

  header h1 {
    font-family: 'Cinzel Decorative', serif;
    font-size: clamp(1.4rem, 4vw, 2.2rem);
    color: var(--gold);
    text-shadow: 0 0 30px rgba(240,192,64,0.4);
    letter-spacing: 0.05em;
    margin-bottom: 0.4rem;
  }

  header p {
    color: var(--muted);
    font-size: 0.9rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
  }

  /* ── Árbol SVG connector area ── */
  .tree-wrapper {
    position: relative; z-index: 1;
    max-width: 1100px;
    margin: 0 auto;
    padding: 1rem 1.5rem 0;
  }

  /* ── Generaciones ── */
  .gen-label {
    text-align: center;
    font-size: 0.72rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 0.8rem;
  }

  .gen-row {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
  }

  .gen-row + .connector-area {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 0.3rem 0;
  }

  /* Línea del árbol */
  .tree-lines {
    width: 100%;
    max-width: 400px;
    height: 60px;
    overflow: visible;
  }

  /* ── Tarjeta ── */
  .card {
    position: relative;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 1.5rem 1.3rem 1.2rem;
    width: 280px;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    overflow: hidden;
  }

  .card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: var(--accent);
    border-radius: 20px 20px 0 0;
  }

  .card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.5), 0 0 30px var(--glow-color);
    border-color: var(--accent);
  }

  .card-emoji {
    font-size: 2.2rem;
    margin-bottom: 0.5rem;
    display: block;
  }

  .card-name {
    font-family: 'Cinzel Decorative', serif;
    font-size: 0.95rem;
    color: var(--gold);
    margin-bottom: 0.2rem;
  }

  .card-rol {
    font-size: 0.75rem;
    color: var(--accent);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 0.8rem;
    font-weight: 700;
  }

  .card-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 0.3rem;
    margin-bottom: 0.9rem;
  }

  .badge {
    font-size: 0.67rem;
    padding: 2px 8px;
    border-radius: 20px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--muted);
  }

  .card-info {
    font-size: 0.8rem;
    color: var(--muted);
    line-height: 1.5;
    margin-bottom: 1rem;
  }

  .card-info strong { color: var(--text); }

  .card-links {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
  }

  .btn-profile {
    flex: 1;
    padding: 0.5rem 0.8rem;
    border: none;
    border-radius: 10px;
    font-family: 'Nunito', sans-serif;
    font-size: 0.78rem;
    font-weight: 700;
    cursor: pointer;
    transition: opacity 0.2s, transform 0.15s;
    letter-spacing: 0.05em;
  }

  .btn-profile:hover { opacity: 0.85; transform: scale(0.97); }

  .btn-reality {
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.15);
  }

  .btn-info {
    background: rgba(255,255,255,0.06);
    color: var(--muted);
    border: 1px solid rgba(255,255,255,0.08);
  }

  /* Etiqueta de vínculo especial */
  .tag-rol {
    display: inline-block;
    margin-top: 0.5rem;
    font-size: 0.68rem;
    padding: 3px 10px;
    border-radius: 20px;
    background: rgba(240,192,64,0.1);
    border: 1px solid rgba(240,192,64,0.3);
    color: var(--gold);
    letter-spacing: 0.1em;
  }

  /* ── Modal ── */
  .modal-overlay {
    display: none;
    position: fixed; inset: 0;
    background: rgba(0,0,0,0.85);
    z-index: 1000;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    backdrop-filter: blur(6px);
  }

  .modal-overlay.active { display: flex; }

  .modal-box {
    background: var(--bg2);
    border: 1px solid var(--border);
    border-radius: 20px;
    width: 100%;
    max-width: 520px;
    max-height: 90vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 30px 80px rgba(0,0,0,0.7);
    animation: modalIn 0.3s cubic-bezier(0.34,1.56,0.64,1);
  }

  @keyframes modalIn {
    from { transform: scale(0.85) translateY(20px); opacity: 0; }
    to   { transform: scale(1) translateY(0); opacity: 1; }
  }

  .modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1.3rem;
    border-bottom: 1px solid var(--border);
    flex-shrink: 0;
  }

  .modal-title {
    font-family: 'Cinzel Decorative', serif;
    font-size: 0.9rem;
    color: var(--gold);
  }

  .modal-close {
    background: rgba(255,255,255,0.06);
    border: 1px solid var(--border);
    color: var(--muted);
    width: 32px; height: 32px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 1rem;
    display: flex; align-items: center; justify-content: center;
    transition: background 0.2s, color 0.2s;
  }

  .modal-close:hover { background: rgba(255,80,80,0.2); color: #ff8080; }

  .modal-iframe-wrap {
    flex: 1;
    position: relative;
    min-height: 500px;
  }

  .modal-iframe-wrap iframe {
    width: 100%; height: 100%;
    min-height: 500px;
    border: none;
    background: #fff;
  }

  .modal-loading {
    position: absolute; inset: 0;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    background: var(--bg2);
    gap: 0.8rem;
    color: var(--muted);
    font-size: 0.85rem;
  }

  .spinner {
    width: 36px; height: 36px;
    border: 3px solid rgba(255,255,255,0.1);
    border-top-color: var(--gold);
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
  }

  @keyframes spin { to { transform: rotate(360deg); } }

  /* ── Info expandible ── */
  .info-panel {
    display: none;
    background: rgba(255,255,255,0.03);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 1rem;
    margin-top: 0.5rem;
    font-size: 0.8rem;
    line-height: 1.7;
    color: var(--muted);
    animation: fadeIn 0.2s ease;
  }

  .info-panel.open { display: block; }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .info-panel h4 {
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: var(--text);
    margin-bottom: 0.3rem;
    margin-top: 0.6rem;
  }

  .info-panel h4:first-child { margin-top: 0; }

  /* ── Footer ── */
  footer {
    text-align: center;
    padding: 3rem 1rem 2rem;
    color: var(--muted);
    font-size: 0.75rem;
    letter-spacing: 0.1em;
    position: relative; z-index: 1;
  }

  /* ── Responsive ── */
  @media (max-width: 640px) {
    .gen-row { gap: 1rem; }
    .card { width: 100%; max-width: 320px; }
  }
</style>
</head>
<body>

<header>
  <h1>🌳 Familia de Rol</h1>
  <p>Árbol Genealógico — Tío Reality · Uso Privado</p>
</header>

<div class="tree-wrapper">

  <!-- GENERACIÓN 1 -->
  <p class="gen-label">⬡ Generación I — Padres</p>
  <div class="gen-row" id="gen1">
    <?php
    $gen1 = array_filter($familia, fn($p) => $p['generacion'] === 1);
    foreach ($gen1 as $p):
        $accentRGB = ltrim($p['color'], '#');
        $r = hexdec(substr($accentRGB,0,2));
        $g = hexdec(substr($accentRGB,2,2));
        $b = hexdec(substr($accentRGB,4,2));
    ?>
    <div class="card"
         style="--accent:<?= $p['color'] ?>; --glow-color: rgba(<?= $r ?>,<?= $g ?>,<?= $b ?>,0.25);"
         id="card-<?= $p['id'] ?>">
      <span class="card-emoji"><?= $p['emoji'] ?></span>
      <div class="card-name"><?= htmlspecialchars($p['nombre']) ?></div>
      <div class="card-rol" style="color:<?= $p['color'] ?>"><?= htmlspecialchars($p['rol']) ?></div>

      <div class="card-badges">
        <?php if ($p['edad']): ?><span class="badge">📅 <?= $p['edad'] ?> años</span><?php endif; ?>
        <span class="badge">💍 <?= htmlspecialchars($p['estado']) ?></span>
        <span class="badge"><?= $p['genero'] === 'M' ? '♂' : '♀' ?></span>
      </div>

      <div class="card-info">
        <strong>Vínculos:</strong> <?= implode(', ', array_map('htmlspecialchars', $p['vinculos'])) ?>
      </div>

      <?php if ($p['id'] === 'claire'): ?>
        <span class="tag-rol">💛 Vínculo Afectivo · No Biológico</span><br><br>
      <?php endif; ?>

      <div class="card-links">
        <button class="btn-profile btn-reality"
                onclick="abrirPerfil('<?= $p['reality_url'] ?>', '<?= htmlspecialchars($p['nombre']) ?>')">
          🔗 Ver en Reality
        </button>
        <button class="btn-profile btn-info"
                onclick="toggleInfo('info-<?= $p['id'] ?>')">
          📋 Ver perfil
        </button>
      </div>

      <div class="info-panel" id="info-<?= $p['id'] ?>">
        <h4>Historia</h4>
        <?= htmlspecialchars($p['historia']) ?>
        <h4>Rasgos</h4>
        <?= implode(' · ', array_map('htmlspecialchars', $p['rasgos'])) ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Conector visual árbol -->
  <div class="connector-area">
    <svg class="tree-lines" viewBox="0 0 400 60" fill="none" xmlns="http://www.w3.org/2000/svg">
      <!-- Línea de Tío Reality hacia abajo -->
      <line x1="100" y1="0" x2="100" y2="30" stroke="rgba(124,58,237,0.5)" stroke-width="2" stroke-dasharray="4,3"/>
      <!-- Línea de Artemis hacia abajo -->
      <line x1="300" y1="0" x2="300" y2="30" stroke="rgba(219,39,119,0.5)" stroke-width="2" stroke-dasharray="4,3"/>
      <!-- Línea horizontal uniendo -->
      <line x1="100" y1="30" x2="300" y2="30" stroke="rgba(14,165,233,0.3)" stroke-width="1.5" stroke-dasharray="4,3"/>
      <!-- Baja al centro hacia Claire -->
      <line x1="200" y1="30" x2="200" y2="60" stroke="rgba(14,165,233,0.5)" stroke-width="2" stroke-dasharray="4,3"/>
      <!-- Nodo central -->
      <circle cx="200" cy="30" r="4" fill="rgba(14,165,233,0.6)"/>
      <!-- Nota: línea punteada desde Tío Reality = vínculo de rol, no sangre -->
    </svg>
  </div>

  <!-- GENERACIÓN 2 -->
  <p class="gen-label">⬡ Generación II — Hijos</p>
  <div class="gen-row" id="gen2">
    <?php
    $gen2 = array_filter($familia, fn($p) => $p['generacion'] === 2);
    foreach ($gen2 as $p):
        $accentRGB = ltrim($p['color'], '#');
        $r = hexdec(substr($accentRGB,0,2));
        $g = hexdec(substr($accentRGB,2,2));
        $b = hexdec(substr($accentRGB,4,2));
    ?>
    <div class="card"
         style="--accent:<?= $p['color'] ?>; --glow-color: rgba(<?= $r ?>,<?= $g ?>,<?= $b ?>,0.25);"
         id="card-<?= $p['id'] ?>">
      <span class="card-emoji"><?= $p['emoji'] ?></span>
      <div class="card-name"><?= htmlspecialchars($p['nombre']) ?></div>
      <div class="card-rol" style="color:<?= $p['color'] ?>"><?= htmlspecialchars($p['rol']) ?></div>

      <div class="card-badges">
        <?php if ($p['edad']): ?><span class="badge">📅 <?= $p['edad'] ?> años</span><?php endif; ?>
        <span class="badge">💍 <?= htmlspecialchars($p['estado']) ?></span>
        <span class="badge"><?= $p['genero'] === 'M' ? '♂' : '♀' ?></span>
      </div>

      <div class="card-info">
        <strong>Vínculos:</strong> <?= implode(', ', array_map('htmlspecialchars', $p['vinculos'])) ?>
      </div>

      <span class="tag-rol">💛 Vínculo Afectivo · No Biológico con Tío Reality</span><br><br>

      <div class="card-links">
        <button class="btn-profile btn-reality"
                onclick="abrirPerfil('<?= $p['reality_url'] ?>', '<?= htmlspecialchars($p['nombre']) ?>')">
          🔗 Ver en Reality
        </button>
        <button class="btn-profile btn-info"
                onclick="toggleInfo('info-<?= $p['id'] ?>')">
          📋 Ver perfil
        </button>
      </div>

      <div class="info-panel" id="info-<?= $p['id'] ?>">
        <h4>Historia</h4>
        <?= htmlspecialchars($p['historia']) ?>
        <h4>Rasgos</h4>
        <?= implode(' · ', array_map('htmlspecialchars', $p['rasgos'])) ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

</div><!-- /tree-wrapper -->

<!-- ── MODAL IFRAME ── -->
<div class="modal-overlay" id="modalOverlay" onclick="cerrarModal(event)">
  <div class="modal-box">
    <div class="modal-header">
      <span class="modal-title" id="modalTitle">Perfil</span>
      <button class="modal-close" onclick="cerrarModalDirecto()">✕</button>
    </div>
    <div class="modal-iframe-wrap">
      <div class="modal-loading" id="modalLoading">
        <div class="spinner"></div>
        <span>Cargando perfil...</span>
      </div>
      <iframe id="modalIframe"
              src=""
              title="Perfil Reality"
              sandbox="allow-scripts allow-same-origin allow-popups allow-forms"
              onload="ocultarLoading()">
      </iframe>
    </div>
  </div>
</div>

<footer>
  🔒 Uso personal privado · Árbol Genealógico de Rol · Estelar Oficial<br>
  <span style="opacity:0.4">familia_rol.php · <?= date('Y') ?></span>
</footer>

<script>
function abrirPerfil(url, nombre) {
  document.getElementById('modalTitle').textContent = '👤 ' + nombre;
  document.getElementById('modalLoading').style.display = 'flex';
  document.getElementById('modalIframe').src = url;
  document.getElementById('modalOverlay').classList.add('active');
  document.body.style.overflow = 'hidden';
}

function cerrarModal(e) {
  if (e.target === document.getElementById('modalOverlay')) {
    cerrarModalDirecto();
  }
}

function cerrarModalDirecto() {
  document.getElementById('modalOverlay').classList.remove('active');
  document.getElementById('modalIframe').src = '';
  document.body.style.overflow = '';
}

function ocultarLoading() {
  document.getElementById('modalLoading').style.display = 'none';
}

function toggleInfo(id) {
  const panel = document.getElementById(id);
  panel.classList.toggle('open');
}

// Cerrar con Escape
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') cerrarModalDirecto();
});
</script>

</body>
</html>
