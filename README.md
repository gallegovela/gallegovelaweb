# gallegovela.es

Repositorio de la web profesional de **Manuel Gallego Vela**, ingeniero de software especializado en Desarrollo, Cloud Engineering, DevOps, Observabilidad e Inteligencia Artificial aplicada.

🌐 Web en producción: **[https://gallegovela.es](https://gallegovela.es)**

## 🤖 Construida íntegramente con IA

Este proyecto es un experimento de desarrollo **100% asistido por IA**, de principio a fin: diseño de arquitectura, generación del theme y el plugin de WordPress, maquetación, estilos y contenidos.

Las herramientas utilizadas han sido:

- **[Claude Code](https://claude.com/claude-code)** — motor principal de generación de código: theme, plugin, CSS, plantillas y refactorizaciones, trabajando directamente sobre el repositorio.
- **ChatGPT** — apoyo en definición de especificaciones, redacción de contenidos y resolución de dudas puntuales.
- **Gemini** — apoyo en la generación y tratamiento de referencias visuales/imágenes.

**No ha habido intervención manual de código.** Toda la construcción parte de documentos de especificación (`specs/`) que describen theme, plugin y páginas, y es la IA quien traduce esas specs en código. La única intervención humana ha sido la imprescindible: configuración del entorno (Docker, credenciales, `.env`), validación visual de resultados, y tareas de administración de WordPress que no tiene sentido automatizar (subir contenido real, gestionar usuarios, etc.).

## Metodología: Spec-Driven Development

El flujo de trabajo seguido en todo el proyecto es:

1. **Especificar** — se documenta en Markdown, dentro de `specs/`, el comportamiento esperado de cada pieza (theme, plugin, cada página) antes de escribir una sola línea de código.
2. **Analizar referencias visuales** — se parte de las imágenes de diseño en `/design` (logo, hero, iconos, mockup de home) como fuente de verdad visual.
3. **Proponer arquitectura** — antes de generar código, se propone y valida el árbol de directorios y las decisiones técnicas.
4. **Generar** — con la spec y el diseño validados, la IA genera plugin, theme, plantillas y estilos.
5. **Iterar** — cualquier cambio de comportamiento se refleja primero en la spec correspondiente, y después en el código.

Esto convierte a `specs/` en la documentación viva y autoritativa del proyecto, no solo en un artefacto inicial.

## Estructura del repositorio

```
web/
├── specs/                      # Especificaciones (fuente de verdad del proyecto)
│   ├── theme.md                 # Spec del theme: cabecera, footer, menús, tipografía...
│   ├── plugins.md                # Spec del plugin: CPT, taxonomías, shortcodes...
│   └── pages/                    # Spec de cada página
│       ├── home.md
│       ├── about.md
│       ├── contact.md
│       ├── blog.md
│       ├── blogpost.md
│       ├── proyectos.md
│       ├── project.md
│       ├── legales.md
│       └── html/                 # HTML final pegado en páginas (sobre-mi, contacto)
│
├── design/                      # Referencias visuales (logo, hero, iconos, mockups)
│
├── wp-content/
│   ├── themes/gallegovela-theme/     # Theme a medida (presentación, layout, CSS)
│   │   ├── inc/                       # Customizer, enqueue, setup, AJAX, template-tags
│   │   ├── template-parts/            # Hero, footer, cards, mosaico "sobre mí", timeline stack...
│   │   └── assets/css/                # base/ layout/ components/ pages/ (un archivo = un enqueue)
│   │
│   └── plugins/gallegovela-projects/  # Plugin a medida (lógica de negocio)
│       └── includes/
│           ├── cpt/                    # CPT "proyecto"
│           ├── taxonomies/             # Tipo, Tecnologías
│           ├── meta/                   # Campos del proyecto
│           ├── shortcodes/             # [gv_proyectos_destacados], [gv_blog_destacados]
│           └── rest/                   # API REST de proyectos
│
├── prompts/                     # Prompts de trabajo usados durante la construcción
├── docker/ · Dockerfile · docker-compose.yml   # Entorno local WordPress + MySQL
├── composer.json                # Dependencias vía WPackagist (plugins de terceros)
└── CLAUDE.md                    # Instrucciones de proyecto para Claude Code
```

## Stack técnico

- **WordPress 6+** / **PHP 8.3+**
- Theme propio: `gallegovela-theme`
- Plugin propio: `gallegovela-projects` (CPT `proyecto`, taxonomías `Tipo` y `Tecnologías`)
- Compatible con **WPBakery**, **RankMath**, **Yoast**
- Tipografía: **Nunito** (títulos) + **Open Sans** (cuerpo), vía Google Fonts
- Mobile first, SEO friendly, objetivo Lighthouse > 90
- Plugins de terceros gestionados por Composer/WPackagist: Google Site Kit, Contact Form 7, WP Mail SMTP, Yoast SEO, Classic Editor, Polylang, Duplicate Page, Complianz GDPR

## Entorno local

El entorno de desarrollo se levanta con Docker:

```bash
docker compose up -d
```

WordPress queda disponible en `http://localhost:8080`. La base de datos (MySQL 8) y las credenciales se configuran vía `.env` (ver `.env.example`).

## Secciones del sitio

- **Home** — hero, "qué hago", stack tecnológico, proyectos destacados, últimas entradas de blog.
- **Sobre mí** — mosaico de trayectoria y perfil profesional.
- **Proyectos** — listado (CPT `proyecto`) filtrable por tipo y tecnología, con ficha individual.
- **Blog** — entradas estándar de WordPress, con tarjetas compartidas visualmente con "Proyectos".
- **Contacto** — formulario vía Contact Form 7.
- **Páginas legales** — Aviso legal, Política de privacidad, Política de cookies, Accesibilidad.
