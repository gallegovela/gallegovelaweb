# Descripción General
Nombre: 

gallegovela-theme

Responsabilidades:

- Presentación
- Layout
- Templates
- CSS
- Navegación
- Responsive

# Cabecera

La cabecera será una banda fijada al borde superior, dividida en dos partes. En la parte izquiera irá el logo, y en la derecha el menú.

## Logo

El logo es una imagen gestionada como Media Library de WordPress, configurable desde el Customizer (Apariencia > Personalizar > Cabecera > Logo). Theme_mod: `gallegovela_header_logo`.

El archivo por defecto debe colocarse en `assets/images/logo.png`. Al cargar WordPress, si el theme_mod no está configurado y el archivo existe, se importa automáticamente al Media Library y se vincula al theme_mod. Si el archivo no existe, el header muestra el nombre del sitio como texto de reserva.

## Menú de cabecera

Hay dos menús distintos según la página, elegidos automáticamente según
`is_front_page()` (no es una elección manual del usuario):

### Menú Home

Se muestra solo en la Home (`/`). Enlaces por defecto, en este orden:

- Qué hago → /#que-hago
- Stack → /#stack
- Proyectos → /#proyectos-destacados
- Blog → /#ultimas-entradas
- Contacto → /contacto

Ubicación (nav menu location): `primary`.

### Menú páginas interiores

Se muestra en el resto de páginas (Sobre mí, Proyectos, Blog, Contacto,
legales...). A diferencia del menú Home, enlaza siempre a páginas
completas, nunca a anclas de sección. Enlaces por defecto, en este orden:

- Inicio → /
- Sobre Mí → /sobre-mi
- Proyectos → /proyectos
- Blog → /blog
- Contacto → /contacto

Ubicación (nav menu location): `interior`.

### Común a ambos menús

Para formato móvil, menu sandwich.
Formato: Letra Nunito, font-weigth: 600

---

# Footer

## Principal

Fondo oscuro.
Texto blanco.
Mantener estilo del mockup.

Columnas:

- Branding
  - Logo: imagen gestionada como Media Library de WordPress, configurable desde el Customizer (Apariencia > Personalizar > Pie > Logo). Theme_mod: `gallegovela_footer_logo`. El archivo por defecto debe colocarse en `assets/images/logo-footer.png`; se importa automáticamente al Media Library si el theme_mod no está configurado y el archivo existe. Si no existe, se muestra el nombre del sitio como texto de reserva.
  - Redes Sociales: LinkedIn, X y GitHub. Links configurables desde Customizer (Apariencia > Personalizar > Pie > RRSS).
- Navegación
  - Servicios y CV: /sobre-mi
  - Proyectos: /proyectos
  - Blog: /blog
- Enlaces de interés (todos los enlaces se abren en nueva pestaña: target="_blank" rel="noopener noreferrer")
  - Aviso Legal: /aviso-legal
  - Política de Privacidad: /politica-privacidad
  - Política de Cookies: /politica-cookies
  - Accesibilidad: /accesibilidad
- Contacto.  Botón: { Texto: Hablemos, Tipo: Principal }

## Publicidad

Esta sección se muestra al final del todo, con fondo blanco. Se puede habilitar y desactivar desde el Customizer (Apariencia > Personalizar > Pie > Publicidad).

Muestra los logos en línea si es posible, o en mosaico en caso de desbordamiento.

Los logos se gestionan como imágenes del Media Library de WordPress (no como assets del tema), para poder sustituirlos desde el panel de administración. Al activar el tema, los logos por defecto (design/publicidad/) se importan automáticamente al Media Library y sus IDs se guardan en la opción `gallegovela_publicidad_logo_ids`. El footer los recupera desde esa opción mediante `wp_get_attachment_image_url()`.

--- 

# Estilos & Componentes

## Colores
- Accent. #2f80ed
- Accent-intense: #085bff
- Accent-contrast: #ffffff
- Text: #1a1d23
- Text-muted: #5b6270
- Text-on-dark: #f2f3f5
- Text-muted-on-dark: #a7adba
- BG: #fff
- BG-alt: #f7f8fa
- Dark: #11141c
- Dark-alt: #1b1f2a

## Tamaños
- Container: 1200px
- Container-padding: clamp(1.25rem, 4vw, 2.5rem)

## Fuentes
- Nunito
- Open-sans

## Texto por defecto

Salvo que un tipo de texto tenga ya especificadas sus propias características
(tipografía, tamaño o peso), el texto por defecto de todo el theme debe ser:

- Font-family: Open Sans
- Font-size: 15px
- Font-weight: 100

## Botones

- Principal:  Normal { Borde: Accent, Fondo: Accent, Texto: Accent-contrast}, Hover { Fondo: Accent-intense, Texto: {Accent-contrast, Bold} }
- Standard: Normal { Borde: Accent, Fondo: Accent-contrast, Texto: Accent }, Hover { Fondo: Accent-intense, Texto: {Accent-contrast, Bold} }

En caso de no especificar el tipo de botón en la sección correspondiente, se usara el Standard.

## Hero interno

Componente reutilizable para la cabecera de páginas interiores (Proyectos,
Blog, Sobre mí, Contacto...). Mismo lenguaje visual que el Hero de la Home,
pero de menor tamaño y sin fondo a pantalla completa.

Layout: dos columnas.

- Izquierda: Eyebrow (`.gv-section-eyebrow`) + Título (h1) + Descripción
  (opcional) + Botones (opcional, si la página los especifica).
- Derecha: imagen decorativa (`hero-<slug>.png`, una por página, ver
  `/design`). Oculta en móvil/tablet, visible a partir de 900px.

Cada página interior "hereda" de este componente: su spec solo declara
`Eyebrow`, `Título` y, si aplica, `Descripción`/`Botones`; el resto del
comportamiento (layout, responsive, tipografía) lo define el componente.

Implementación:

- Páginas con plantilla PHP propia (Proyectos, Blog): usar
  `get_template_part( 'template-parts/hero-interno', null, $args )`, con
  `$args = ['eyebrow', 'title', 'description', 'buttons', 'image']`.
- Páginas de contenido pegado como HTML (Sobre mí, Contacto): usar
  directamente el marcado con las clases `.gv-page-hero`,
  `.gv-page-hero__inner`, `.gv-page-hero__content`, `.gv-page-hero__title`,
  `.gv-page-hero__desc`, `.gv-page-hero__actions`, `.gv-page-hero__visual`
  (ver `specs/pages/html/sobre-mi.html` como referencia).

CSS: `assets/css/components/hero-interno.css` (cargado siempre, no
condicional, porque lo usan tanto páginas PHP como páginas de contenido
pegado que no pasan por `enqueue.php` de forma condicional por slug).

## Plantillas de detalle (Proyecto / Blog Post)

Ver `specs/pages/project.md` y `specs/pages/blogpost.md`. Ambas comparten
estructura — Eyebrow, Título (h1), [Fecha en español, solo Blog Post],
Cuerpo, Tags — con espacio entre cada sección
(`assets/css/components/single.css`, cargado siempre).

- `single-proyecto.php`: Eyebrow = primer término de la taxonomía
  `tipo_proyecto`; Tags = taxonomía `tecnologia`
  (`gallegovela_tecnologia_badges()`). Mantiene además el bloque de
  metadatos (Cliente/Fecha/URL) y la galería de imágenes, que no forman
  parte del spec pero ya existían.
- `single.php`: Eyebrow = primera categoría de la entrada; Fecha con
  `gallegovela_format_date_es()`; Tags = `post_tag` de la entrada.

## Customizer — Secciones y paneles

| Ruta en el Customizer | Theme_mod(s) | Tipo |
|---|---|---|
| Cabecera > Logo | `gallegovela_header_logo` | Media (imagen) |
| Hero (Home) > Imagen de fondo | `gallegovela_hero_background` | Media (imagen) |
| Pie de página > Logo | `gallegovela_footer_logo` | Media (imagen) |
| Pie de página > URL LinkedIn | `gallegovela_footer_linkedin` | URL |
| Pie de página > URL X (Twitter) | `gallegovela_footer_x` | URL |
| Pie de página > URL GitHub | `gallegovela_footer_github` | URL |
| Pie de página > Mostrar Publicidad | `gallegovela_footer_publicidad_enabled` | Checkbox |
| Home > Qué hago > Icono: Desarrollo de software | `gallegovela_quehago_software` | Media (imagen) |
| Home > Qué hago > Icono: DevOps y automatización | `gallegovela_quehago_automatizaciones` | Media (imagen) |
| Home > Qué hago > Icono: Arquitectura cloud | `gallegovela_quehago_cloud` | Media (imagen) |
| Home > Qué hago > Icono: Inteligencia artificial | `gallegovela_quehago_ia` | Media (imagen) |

---

## Tags / Badges

Los tags y badges son elementos de etiqueta de texto en píldora (border-radius alto).
Se usan en el Hero (`.gv-badge`) y en la sección Stack (`.gv-tag`).

Hover: { Fondo: Accent, Texto: Accent-contrast }