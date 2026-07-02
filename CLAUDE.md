# GallegoVela.es

## Objetivo

Construir una web profesional para un ingeniero de software especializado en:

- Desarrollo de software
- Cloud Engineering
- DevOps
- Observabilidad
- Inteligencia Artificial aplicada

La web debe transmitir:

- Profesionalidad
- Cercanía
- Claridad
- Capacidad técnica
- Enfoque end-to-end

No debe parecer:

- Una consultora corporativa
- Una startup IA genérica
- Una software factory

Debe parecer:

"El espacio digital de un ingeniero que acompaña proyectos desde la idea hasta la operación."

---

# Stack técnico

Generar:

## Theme

Leer fichero specs/theme.md

## Plugins

Leer fichero specs/plugins.md

## Páginas

Leer ficheros *.md dentro de spec/pages


# Requisitos WordPress

- WordPress 6+
- PHP 8.3+
- Compatible con WPBakery
- Compatible con RankMath
- Compatible con Yoast
- Traducciones preparadas
- Mobile first
- SEO friendly
- Lighthouse > 90

---

# Referencias visuales

Todas las imágenes están disponibles en:

/design

---

## logo.png

Imagen logo de la página web, utilizada en la cabecera.

---

## logo-footer.png

Imagen logo para el footer de la página web.

---

## home-final.png

Es la referencia visual principal.

Define:

- Composición general
- Espaciados
- Jerarquía visual
- Estética general

Debe seguirse lo más fielmente posible.

---

## hero-reference.png

Referencia para:

- Navbar
- Hero
- Tipografía
- CTA

---

## hero-background.png

Utilizar como fondo del Hero.

Requisitos:

background-size: cover

background-position: center

Overlay:

rgba(255,255,255,0.7)

---

## home

Contiene los iconos utilizados en la seccion home.

Deben utilizarse exactamente esos iconos.

---

### publicidad

Contiene los logos que deben aparecer en la sección Publicidad del footer.







## Footer



---

# Proyectos

Crear CPT:

proyecto

Slug:

proyectos

---

Campos:

- Título
- Descripción corta
- Descripción completa
- Imagen principal
- Galería
- Cliente
- Fecha
- URL
- Proyecto destacado
- Orden manual

---

Taxonomías

## Tipo

- Desarrollo
- Cloud
- DevOps
- Observabilidad
- IA

---

## Tecnologías

Taxonomía libre.

Ejemplos:

- Kubernetes
- Terraform
- Azure
- Laravel
- WordPress

---

# Tipografía

Títulos (`h1`-`h4`, incluida `.gv-section-title`): **Nunito**.

Párrafos y texto de cuerpo: **Open Sans**.

Cargadas vía Google Fonts en `inc/enqueue.php` (`gallegovela-google-fonts`,
pesos 100/200/400/700/800 para Nunito y 100/200/400/600 para Open Sans). Disponibles
como variables CSS `--gv-font-heading` y `--gv-font-body` en `base/tokens.css`,
aplicadas en `base/typography.css`.

---

# Notas técnicas

Cada fichero de `assets/css/` se encola por separado en `inc/enqueue.php`
(`wp_enqueue_style()` por fichero, con `filemtime()` propio en `?ver=`).
No usar `@import` entre partials de CSS: con un único `main.css` importando
al resto, solo `main.css` cambiaba de versión al editar un partial, así que
el navegador podía servir una copia cacheada antigua de ese partial aunque
el servidor ya tuviera el cambio correcto.

`wp-content/themes/gallegovela-theme/inc/customizer.php` registra el control
del Customizer `gallegovela_hero_background` (theme_mod, attachment ID de la
Media Library). `gallegovela_get_hero_background_url()` devuelve esa imagen
o, si no hay ninguna configurada, cae al asset por defecto del theme
(`assets/images/hero-background.png`). `template-parts/hero.php` la pinta
como `style="background-image:..."` inline en la sección, no por CSS.

`wp-content/themes/gallegovela-theme/inc/setup.php` desactiva `wpautop` en
`the_content` solo para Páginas (`is_page()`), vía el hook `wp`. Las páginas
interiores (Sobre mí, Contacto, legales...) llevan HTML pegado directamente
en el editor (ver `specs/pages/html/`), y `wpautop` inserta `<p>` vacíos
entre bloques separados por líneas en blanco, rompiendo layouts de
grid/flex de varias columnas. Las entradas del blog no se ven afectadas
(mantienen `wpautop`).

---

# Flujo de trabajo esperado

NO generar código inmediatamente.

Primero:

1. Analizar referencias visuales.
2. Proponer arquitectura completa.
3. Mostrar árbol de directorios.
4. Explicar decisiones.

Esperar validación.

Después:

1. Generar plugin.
2. Generar theme.
3. Generar home.
4. Generar plantillas.
5. Generar estilos.

Mantener siempre una arquitectura limpia y mantenible.