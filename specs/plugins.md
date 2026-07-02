# Plugin

## Nombre:

gallegovela-custom

## Responsabilidades:

- Custom Post Type Proyecto
- Taxonomías
- Metadatos
- Shortcodes
- API de consulta

Toda la lógica de negocio relacionada con proyectos debe vivir en el plugin.

---

## Tarjetas de blog (`includes/blog-helpers.php`)

Aunque el blog usa los posts estándar de WordPress (no un CPT del plugin),
la tarjeta de entrada de blog vive en el plugin para que comparta
exactamente el mismo diseño visual que la tarjeta de "Proyectos
destacados", con un añadido propio del blog: Imagen → Etiquetas (tags) →
Fecha → Título → Extracto — clases `.gv-card`/`.gv-post-card__*`, ya
compartidas con `.gv-project-card__*` en `assets/css/components/cards.css`
del theme. Las etiquetas son los `post_tag` de la entrada (no la
categoría). La fecha se formatea en español con
`gallegovela_format_date_es()` (`inc/template-tags.php` del theme,
p. ej. "1 de julio de 2026"), sin depender del locale de WordPress.

- `gallegovela_get_latest_posts( $limit = 3 )`: últimas entradas publicadas.
- `gallegovela_render_blog_card( $post )`: pinta una tarjeta.
- Shortcode `[gv_blog_destacados limite="3"]`: grid de tarjetas, para
  embeber en cualquier página (paralelo a `[gv_proyectos_destacados]`).

El theme (`template-parts/blog-latest.php`, `template-blog.php`,
`inc/ajax.php`) usa `gallegovela_render_blog_card()` si el plugin está
activo, con fallback a `gallegovela_render_post_card()` (theme) si no lo está.

---