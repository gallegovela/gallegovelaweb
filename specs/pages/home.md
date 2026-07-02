# Estructura de la Home

Cada sección debe mostrar como título el campo Titulo precedido de una barra /.  Como sobretítulo, el mismo texto que figura en `content.md`
para esa sección (el encabezado `#` correspondiente: "Qué hago", "Stack",
"Proyectos", "Blog"...). No inventar variantes ni reescribir ningún texto. 

El sobretítulo se presenta como h3 y estilo "home-section-overtitle".  Siempre irá precedido de "/". Color: Accent
El título se presenta como h2 y lleva el estilo "home-section-title".  
El sobretítulo va encima del título, y ambos no deben superar el 50% de ancho de la sección.
En caso de haber Texto en la sección, se presenta en la parte derecha, a la altura del título. Alineación derecha y no debe superar el 50% del ancho de la sección.
En caso de existir un enlace, se presenta en la parte derecha de la sección, como enlace y a la altura del título. Alineación derecha.  Ancho máximo: 50% de la sección.
Si hay enlace y texto, en primer lugar va el enlace y debajo el texto.  En caso de existir sólo texto, tiene que tener un margin superior que haga que el texto se muestre a la misma altura del título, salvando el hueco del overtitle.

# Estructura de secciones (Home)

Cada sección de la Home debe llevar siempre estos tres campos:

- Sobretítulo (eyebrow)
- Título
- Explicación (texto breve bajo el título)

---

# Secciones 

## Hero

### Eyebrow

/ Ingeniero Informático
Color: Accent. Font-size: 1.5rem

### Título

INGENIERÍA DEL SOFTWARE
DEVOPS & CLOUD
INTELIGENCIA ARTIFICIAL

### Descripción

Diseño y construcción de plataformas escalables, automatización de sistemas complejos, integración de inteligencia artificial en entornos reales.
Color: 

### Botones

- Sobre mí: Principal
- Proyectos: Standard

### Highlights

- Enfoque end-to-end
- Cloud & DevOps
- IA aplicada
- Resultados reales

### Fondo:

Imagen:

hero-background.png

La capa de overlay es un `<div class="gv-hero__overlay">` colgando directamente
de `<section class="gv-hero">` (no un `::before`), para que sea un elemento
real y customizable. Envuelve al `.gv-container.gv-hero__inner` (texto +
visual) sin alterar su layout ni su posición: el color/opacidad del overlay
se controla con la variable CSS `--gv-hero-overlay` (definida en
`base/tokens.css`), no hace falta tocar la plantilla para ajustarlo.

### Layout:

Dos columnas. Monitor: 70% - 30%. Tablet o inferior: 100% - 0%
Tamaño:

Pantalla completa (100vh), en escritorio y en móvil.

Navbar:

Fija (sticky) en la parte superior al hacer scroll.

Imagen de fondo:

Se gestiona como imágenes de la Media Library de WordPress (no como asset fijo del theme), configurable desde el Customizer (Apariencia > Personalizar > Hero (Home) > Imagen de fondo del Hero).


---

## Qué hago

Nota: esta sección (las 4 tarjetas) vive en la Home (`id="que-hago"`) y no
tiene entrada propia en el menú. El enlace "Sobre mí" del menú apunta a la
página independiente /sobre-mi (bio), no a esta sección.

Título: Diseño y construcción de soluciones software que generan impacto
Texto: Combino arquitectura, automatización e inteligencia artificial para crear sistemas escalables, eficientes y preparados para el futuro.
Enlace: Sobre Mí ( href: /sobre-mi )

Fondo: BG.

### Layout 

Diseño mosaico 2x2.  Para formato de pantalla móvil deberá ser de 4x1.

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

Los iconos se gestionan como imágenes del Media Library de WordPress, configurables desde el Customizer (Apariencia > Personalizar > Home > Qué hago). Theme_mods: `gallegovela_quehago_software`, `gallegovela_quehago_automatizaciones`, `gallegovela_quehago_cloud`, `gallegovela_quehago_ia`. Al activar el tema, los cuatro iconos (`assets/images/gallegovela_quehago_*.png`) se importan automáticamente al Media Library y se vinculan a su theme_mod correspondiente. El template los recupera con `wp_get_attachment_image_url()` desde el theme_mod; si el theme_mod no está configurado, cae al asset del tema como fallback.

Cada tarjeta se presenta con el icono en relación 1:1 en la parte izquierda.  A su derecha el título como h3.  La relación entre ambos debe ser del 50% del ancho de la tarjeta.
El texto de la tarjeta va en una siguiente línea, a tamaño completo de la tarjeta.

Implementación del layout de tarjeta:
- Grid interno: `grid-template-columns: minmax(0, 1fr) minmax(0, 1fr)` a partir de 700px. Sin anchos fijos en píxeles para evitar desbordamiento del contenedor.
- Icono: `width: 100%; aspect-ratio: 1/1; object-fit: contain` — se adapta proporcionalmente al 50% del ancho de la tarjeta.
- En móvil (< 700px): icono fijo de 80px, título a la derecha.

---

## STACK

Título: Tecnologías que utilizo para construir soluciones robustas.
Enlace: Sobre mí (/sobre-mi)

Fondo: 

### Layout
Sección de la home con fondo oscuro que presenta el proceso/stack tecnológico
en forma de timeline vertical de 4 etapas, con un punto/nodo sobre una línea
vertical, tarjeta por etapa, bloque destacado de "IA en esta etapa" y badges
de texto (tags) para las herramientas. Sin logos ni iconos.

### Ubicación y convenciones
- Archivo PHP: `template-parts/section-stack.php` (o ruta equivalente del tema).
- Archivo CSS: añadir al stylesheet del tema (p. ej. `assets/css/sections/_stack.css`
  o el fichero donde vivan el resto de secciones `gv-`).
- Guard de seguridad obligatorio al inicio del PHP:
```php
  if ( ! defined( 'ABSPATH' ) ) { exit; }
```
- Prefijo de clases CSS: `gv-` (namespace del tema `gallegovela-theme`).
- Todo el texto visible pasa por `__()` / `esc_html_e()` / `esc_html()` con
  text-domain `gallegovela-theme`.
- Colores y espaciados de la cabecera de sección usan variables del tema
  (`--gv-color-dark-alt`, `--gv-color-text-on-dark`, `--gv-space-4`); el resto
  de colores del componente (azul `#2f80ed`, blancos translúcidos) son fijos,
  tal como están en el CSS de referencia.

### Estructura de datos
Array `$gv_stack_etapas`, cada etapa es un array asociativo con:

| Clave      | Tipo     | Descripción                                                 |
|------------|----------|---------------------------------------------------------------|
| `eyebrow`  | string   | Título corto de la etapa (h3).  
| `title`    | string   | Título corto de la etapa (h3).                                |
| `subtitle` | string   | Frase breve bajo el título.                                   |
| `desc`     | string   | Párrafo descriptivo de la etapa.                              |
| `ai_text`  | string   | Texto del bloque "IA EN ESTA ETAPA".                          |
| `tags`     | string[] | Lista de tecnologías/herramientas de la etapa.                |

Actualmente hay 4 etapas fijas: Descubrimiento y diseño, Desarrollo a medida,
Plataforma/automatización/cloud, Observabilidad y evolución.

### Markup (estructura HTML/PHP)
```
<section id="stack" class="gv-stack">
  <div class="gv-container">
    <div class="gv-section-header gv-section-header--dark">
      <div class="gv-section-header__left">
        <h3 class="home-section-overtitle">{Sobretítulo}</h3>
        <h2 class="home-section-title">{Título de sección}</h2>
      </div>
    </div>

    <div class="gv-process">
      <!-- foreach etapa -->
      <div class="gv-step">
        <div class="gv-stack__item">
          <div class="gv-step-number">{nombre de la etapa en mayúsculas}</div>
          <h3>{title}</h3>
          <div class="subtitle">{subtitle}</div>
          <p>{desc}</p>

          <div class="gv-ai">
            <div class="gv-ai-title">IA EN ESTA ETAPA</div>
            <p>{ai_text}</p>
          </div>

          <div class="gv-groups">
            <div>
              <div class="gv-group-title">Herramientas</div>
              <div class="gv-tags">
                <!-- foreach tag -->
                <span class="gv-tag">{tag}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /foreach -->
    </div>
  </div>
</section>
```

### Reglas de generación (PHP)
1. `gv-step-number` coge el valor de `{Nombre de la estapa en mayúsculas}`,
   nunca un texto fijo copiado de la primera etapa. Es el overtitle de la etapa.
2. `title`, `subtitle` y `ai_text` deben leerse del array de la etapa actual en cada
   iteración del `foreach`, no estar hardcodeados fuera del array.
3. Los `tags` se renderizan con `esc_html()` dentro de `<span class="gv-tag">`.
4. Mantener el orden de bloques: número/título → subtitle → desc → bloque IA → tags.
5. No añadir iconos ni logos: solo texto/badges, según el diseño original.

### CSS asociado
```css
.gv-stack {
    background: var(--gv-color-dark-alt);
    color: var(--gv-color-text-on-dark);
    padding: var(--gv-space-4) 0;
}

.gv-process {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
    padding: 40px 0;
}

.gv-process::before {
    content: "";
    position: absolute;
    left: 30px;
    top: 50px;
    bottom: 50px;
    width: 2px;
    background: rgba(255,255,255,0.12);
}

.gv-step {
    position: relative;
    margin-bottom: 50px;
    padding-left: 90px;
}

.gv-step:last-child {
    margin-bottom: 0;
}

.gv-step::before {
    content: "";
    position: absolute;
    left: 18px;
    top: 18px;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #111;
    border: 2px solid #2f80ed;
    z-index: 2;
}

.gv-step:hover::before {
    width: 30px;
    height: 30px;
    left: 15px;
    top: 15px;
    background: #2f80ed;
    box-shadow: 0 0 20px rgba(47,128,237,0.5);
}

.gv-stack__item {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    padding: 35px;
    transition: all 0.3s ease;
}

.gv-stack__item:hover {
    transform: translateY(-4px);
    border-color: rgba(47,128,237,0.4);
}

.gv-step-number {
    display: inline-block;
    color: #2f80ed;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 10px;
}

.gv-stack__item h3 {
    color: #fff;
    font-size: 28px;
    margin-bottom: 10px;
}

.gv-stack__item .subtitle {
    color: #fff;
    font-weight: 600;
    margin-bottom: 15px;
}

.gv-stack__item p {
    color: rgba(255,255,255,0.75);
    line-height: 1.7;
    margin-bottom: 25px;
}

.gv-ai {
    background: rgba(47,128,237,0.08);
    border-left: 3px solid #2f80ed;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 25px;
}

.gv-ai-title {
    color: #2f80ed;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 10px;
}

.gv-ai p {
    margin: 0;
}

.gv-groups {
    display: grid;
    gap: 20px;
}

.gv-group-title {
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.gv-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.gv-tag {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    color: rgba(255,255,255,0.85);
    padding: 8px 14px;
    border-radius: 999px;
    font-size: 14px;
}

@media (max-width: 768px) {
    .gv-process::before {
        left: 18px;
    }

    .gv-step {
        padding-left: 60px;
    }

    .gv-step::before {
        left: 6px;
    }

    .gv-step:hover::before {
        left: 3px;
    }

    .gv-stack__item {
        padding: 25px;
    }

    .gv-stack__item h3 {
        font-size: 24px;
    }
}
```


### Contenido

#### 01 - Descubrimiento y Diseño

title: Entender antes de construir
subtitle: Comprender el problema y definir la solución adecuada.
desc: Comprendo el problema, defino objetivos y diseño la solución adecuada antes de escribir una sola línea de código.
ai_text: Utilizo ChatGPT, Gemini y Base44 para explorar alternativas, generar bocetos y prototipos rápidos, estructurar ideas y facilitar la validación temprana con el cliente.
tags:
- Figma
- Canva
- ChatGPT
- Gemini
- Base44

---

#### 02 - Desarrollo a medida

title: Transformar necesidades en soluciones reales
subtitle: Construir software robusto y mantenible.
desc: Desarrollo aplicaciones y plataformas adaptadas a cada proyecto, priorizando mantenibilidad, escalabilidad y alineación con los objetivos del negocio.
ai_text: Utilizo Codex y Claude Code para acelerar la implementación, mejorar la calidad del código y facilitar refactorizaciones complejas.
tags:
- Java
- PHP
- WordPress
- Laravel
- Python
- Angular
- React
- MySQL
- Oracle Database
- MongoDB
- Redis
- Codex
- Claude Code

---

#### 03 - Plataforma, automatización y cloud

title: Construir plataformas preparadas para crecer
subtitle: Escalabilidad, automatización y eficiencia económica.
desc:
```
Diseño y automatización de infraestructuras cloud modernas, equilibrando escalabilidad, fiabilidad y eficiencia económica para que cada plataforma evolucione de forma sostenible.
La utilización de técnicas DevOps, al igual que la aplicación de metodologías como GitOps, contribuyen a un mejor diseño de los procesos de despliegue y automatización de tareas, reduciendo el margen de error y optimizando la implantación de la solución final.
```
ai_text: El uso de herramientas como Codex, Claude Code y Github Copilot aceleran la definición de infraestructuras, generación de pipelines CI/CD y automatización operativa.
tags:
- Azure
- AWS
- Google Cloud
- Docker
- Kubernetes
- Helm
- Jenkins
- GitHub
- GitHub Actions
- Azure DevOps
- Terraform
- ArgoCD
- GitOps
- FinOps
- Capacity Planning
- Infrastructure Forecasting
- Codex
- Claude Code
- Github Copilot

---

#### 04 - OBSERVABILIDAD Y EVOLUCIÓN

title: Monitorizar, aprender y mejorar
subtitle: Detectar incidencias y evolucionar continuamente.
desc:
```
El análisis del comportamiento de aplicaciones e infraestructuras es parte fundamental para anticipar problemas y garantizar una mejora continua de los sistemas.
```
ai_text: El uso de ChatGPT, Claude y Github Copilot es fundamental para análisis de errores, interpretación de logs y asistencia en la creación de dashboards en Grafana y Kibana.
tags:
- Prometheus
- Grafana
- Datadog
- Elasticsearch
- Kibana
- Azure Monitor
- Google Cloud Observability
- ChatGPT
- Claude
- Github Copilot

---

## Proyectos destacados

Título: Algunos proyectos en los que he trabajado
Enlace: Ver Todos ( href: /proyectos )

Fondo claro.

Mostrar automáticamente los 3 proyectos destacados.

Origen:

Custom Post Type Proyecto.

Orden:

- Destacado primero
- Fecha descendente

---

# Blog

Título: Últimos posts
Enlace: Ver Todos ( href: /blog )

Fondo claro.

Mostrar automáticamente las 3 últimas entradas.

Origen:

Posts estándar WordPress.

Mostrar:

- 3 últimas entradas

---