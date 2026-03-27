/**
 * ╔══════════════════════════════════════════════════════╗
 * ║         FAMILIA DE ROL — DATOS DE MIEMBROS          ║
 * ║  Edita este archivo para modificar el árbol          ║
 * ╚══════════════════════════════════════════════════════╝
 *
 * Campos disponibles por miembro:
 *  id        → identificador único (sin espacios)
 *  gen       → generación: 1, 2, 3, 4 o "X"
 *  nombre    → nombre / nick
 *  rol       → rol en la familia
 *  color     → color acento en hex
 *  emoji     → emoji de respaldo si no hay foto
 *  foto      → URL imagen (CDN de Reality u otra)
 *  link      → URL perfil Reality
 *  edad      → ej: "26 años"
 *  estado    → "Soltero", "En pareja", "Casado/a" o ""
 *  genero    → "♂", "♀", "⚧" o ""
 *  pais      → país / ubicación
 *  vinculos  → texto de vínculos
 *  nota      → tag especial (vínculo afectivo, etc.)
 *  historia  → texto de historia
 *  rasgos    → texto de rasgos de personalidad
 */

const FAMILIA = [

  /* ══════════════════════════════════
     GENERACIÓN I — PADRES
  ══════════════════════════════════ */
  {
    id:       'tio-reality',
    gen:      1,
    nombre:   'Tío Reality',
    rol:      'Padre de Rol / Fundador',
    color:    '#7C3AED',
    emoji:    '👑',
    foto:     'https://image-api.reality.wrightflyer.net/api/v1/image/profile-icon-slot/5nmmdv8bsaarmhdr0tn2g8dv6u/24ec8966-f201-4eda-b0c3-3067e52c0a05/t/1767659056894',
    link:     'https://reality.app/profile/86832be6',
    edad:     '26 años',
    estado:   'Soltero',
    genero:   '♂',
    pais:     'Ecuador',
    vinculos: 'Claire (hija de rol), Artemis (ex / madre de Claire)',
    nota:     '',
    historia: 'Fundador de la familia de rol. Figura paterna de Claire, con quien construyó un vínculo afectivo padre-hija. Comparte la crianza de rol con Artemis.',
    rasgos:   'Responsable · Visionario · Protector · Directo · Creativo',
  },

  {
    id:       'artemis',
    gen:      1,
    nombre:   'Artemis',
    rol:      'Madre de Claire / Ex pareja',
    color:    '#DB2777',
    emoji:    '🌙',
    foto:     '', // ← pega aquí la URL del CDN de Reality
    link:     'https://reality.app/profile/22107384',
    edad:     '',
    estado:   'En pareja',
    genero:   '♀',
    pais:     '',
    vinculos: 'Claire (hija), Tío Reality (ex / co-padre de rol)',
    nota:     '',
    historia: 'Madre de Claire dentro del universo de rol. Tuvo una relación con Tío Reality. Actualmente tiene otra pareja.',
    rasgos:   'Independiente · Maternal · Determinada',
  },

  /* ══════════════════════════════════
     GENERACIÓN II — HIJOS
  ══════════════════════════════════ */
  {
    id:       'claire',
    gen:      2,
    nombre:   'Claire',
    rol:      'Hija de Rol',
    color:    '#0EA5E9',
    emoji:    '✨',
    foto:     '', // ← pega aquí la URL del CDN de Reality
    link:     'https://reality.app/profile/5c234356',
    edad:     '16 años',
    estado:   'Soltera',
    genero:   '♀',
    pais:     'México',
    vinculos: 'Tío Reality (padre de rol), Artemis (madre)',
    nota:     '💛 Vínculo Afectivo · No Biológico con Tío Reality',
    historia: 'Hija de rol de Tío Reality y hija biológica de Artemis. Vínculo afectivo padre-hija con Tío Reality construido desde el cariño mutuo, no por sangre.',
    rasgos:   'Joven · Espontánea · Afectuosa',
  },

  /* ══════════════════════════════════
     GENERACIÓN III — NIETOS
     (agrega aquí más miembros)
  ══════════════════════════════════ */
  // {
  //   id:       'ejemplo',
  //   gen:      3,
  //   nombre:   'Nombre',
  //   rol:      'Rol',
  //   color:    '#10B981',
  //   emoji:    '🌿',
  //   foto:     '',
  //   link:     '',
  //   edad:     '',
  //   estado:   '',
  //   genero:   '',
  //   pais:     '',
  //   vinculos: '',
  //   nota:     '',
  //   historia: '',
  //   rasgos:   '',
  // },

];
