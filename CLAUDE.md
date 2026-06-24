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

Nombre:

gallegovela-theme

Responsabilidades:

- Presentación
- Layout
- Templates
- CSS
- Navegación
- Responsive

---

## Plugin

Nombre:

gallegovela-projects

Responsabilidades:

- Custom Post Type Proyecto
- Taxonomías
- Metadatos
- Shortcodes
- API de consulta

Toda la lógica de negocio relacionada con proyectos debe vivir en el plugin.

---

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

rgba(255,255,255,0.6)

---

## home

Contiene los iconos utilizados en la seccion home.

Deben utilizarse exactamente esos iconos.

---

# Estructura de la Home

Cada sección debe mostrar como título el campo Titulo:  Como sobretítulo, el mismo texto que figura en `content.md`
para esa sección (el encabezado `#` correspondiente: "Qué hago", "Stack",
"Proyectos", "Blog"...). No inventar variantes ni reescribir ningún texto. 

El título se presenta como h3 y estilo "home-section-overtitle".  
El título se presenta como h2 y lleva el estilo "home-section-title".  
El sobretítulo va encima del título, y ambos no deben superar el 50% de ancho de la sección.
En caso de haber Texto en la sección, se presenta en la parte derecha, a la altura del título. Alineación derecha y no debe superar el 50% del ancho de la sección.
En caso de existir un enlace, se presenta en la parte derecha de la sección, como enlace y a la altura del título. Alineación derecha.  Ancho máximo: 50% de la sección.

## Hero

Fondo:

hero-background.png

Overlay blanco semitransparente.

La capa de overlay es un `<div class="gv-hero__overlay">` colgando directamente
de `<section class="gv-hero">` (no un `::before`), para que sea un elemento
real y customizable. Envuelve al `.gv-container.gv-hero__inner` (texto +
visual) sin alterar su layout ni su posición: el color/opacidad del overlay
se controla con la variable CSS `--gv-hero-overlay` (definida en
`base/tokens.css`), no hace falta tocar la plantilla para ajustarlo.

Layout:

Dos columnas.

Tamaño:

Pantalla completa (100vh), en escritorio y en móvil.

Navbar:

Fija (sticky) en la parte superior al hacer scroll.

Imagen de fondo:

Se gestiona como imagen de la Media Library de WordPress (no como asset
fijo del theme), configurable desde el Customizer (Apariencia > Personalizar
> Hero (Home) > Imagen de fondo del Hero).

---

Botones:

- Sobre mí
- Proyectos

---

## Qué hago

Título: Diseño y construcción de soluciones software que generan impacto
Texto: Combino arquitectura, automatización e inteligencia artificial para crear sistemas escalables, eficientes y preparados para el futuro.

Fondo claro.

Diseño mosaico 2x2.

Cuatro tarjetas:

- Título: Desarrollo de software. 
  Texto: Soluciones adaptadas a las necesidades de cada organización: desde páginas web corporativas hasta aplicaciones de gestión y plataformas de negocio.
  Icono: gallegovela_quehago_software.png
- Título: DevOps y automatización. 
  Texto: Infraestructuras escalables, seguras y resilientes, utilizando tecnologías cloud modernas que faciliten la expansión de tu negocio.
  Icono: gallegovela_quehago_automatizaciones.png
- Título: Arquitectura cloud. 
  Texto: Infraestructuras escalables, seguras y resilientes, utilizando tecnologías cloud modernas que faciliten la expansión de tu negocio. 
  Icono: gallegovela_quehago_cloud.png
- Inteligencia artificial aplicada.
  Texto: La integración de la IA generativa y el uso de modelos avanzados en productos, procesos y flujos de trabajo reales aceleran y optimizan el trabajo diario.
  Icono: gallegovela_quehago_ia.png

Los iconos corresponden a las imagenes que hay en /design/home.  Cada tarjeta se presenta con el icono en tamaño 320x320 en la parte izquierda.  A su derecha el título como h3.  El texto de la tarjeta va en una siguiente línea, a tamaño completo de la tarjeta.

---

## Stack

Título: Tecnologías que utilizo para construir soluciones robustas.

Fondo oscuro.

Timeline vertical.

NO utilizar logos.

NO utilizar iconos de herramientas.

Las tecnologías deben representarse mediante badges o tags.

Cada etapa contiene:

- Título
- Descripción
- Tags

Cada etapa se presenta con borde de 1px, radius de 20px y color rgba(255,255,255,0.08).  En el mouseover sobre la sección, el border cambia a color principal azul.

---

## Proyectos destacados

Título: Algunos proyectos en los que he trabajado
Enlace: Ver Todos ( href: /proyectos )

Fondo claro.

Mostrar automáticamente los 3 proyectos destacados.

Origen:

Custom Post Type Proyecto.

---

## Blog

Título: Últimos posts
Enlace: Ver Todos ( href: /blog )

Fondo claro.

Mostrar automáticamente las 4 últimas entradas.

Origen:

Posts estándar WordPress.

---

## Footer

Fondo oscuro.

Texto blanco.

Mantener estilo del mockup.

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