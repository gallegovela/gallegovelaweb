# Página: Sobre mí

Slug

/sobre-mi

## Objetivo

Esta página tiene un doble propósito:

1. Presentar mi perfil profesional para empresas, reclutadores y equipos técnicos.
2. Explicar a potenciales clientes cómo trabajo y cómo puedo acompañar el desarrollo completo de una solución software.

No debe parecer un currículum tradicional ni una landing comercial.

Debe mantener exactamente el mismo lenguaje visual que la Home.

---

## Referencia visual

design/about-page.png

Esta imagen define completamente el diseño de la página.

Implementación: `specs/pages/html/sobre-mi.html` (HTML autocontenido, pegado como
contenido de la Página de WordPress "Sobre mí", slug `sobre-mi`). El CSS se
carga automáticamente cuando el slug de la página es `sobre-mi`
(`assets/css/pages/sobre-mi.css`, ver `inc/enqueue.php`).

---

## Secciones

### Hero

Heredar de hero interno (ver `specs/theme.md`). Imagen: `hero-about.png`.

- Eyebrow: / Sobre mí
- Título: "Ingeniería de software, cloud y automatización con
  **visión de producto y operación**." — la frase final resaltada con
  `<span class="gv-text-accent">`.
- Descripción: "Trabajo en la intersección entre desarrollo, arquitectura
  cloud, DevOps e inteligencia artificial aplicada. Me gusta convertir
  necesidades reales en soluciones robustas, escalables y mantenibles,
  acompañando el proceso desde la idea inicial hasta la puesta en
  producción y su evolución."
- Botones:
  - Ver perfil profesional → ( Principal, ancla a `#perfil-profesional` )
  - Cómo puedo ayudarte → ( Standard, ancla a `#como-trabajo` )

---

### Información rápida (`.gv-sm-quickinfo`)

Cuatro tarjetas con icono + etiqueta + dos líneas de valor:

- Ubicación — Don Benito, Badajoz, España / Trabajo en remoto
- Formación — Ingeniería Informática / Universidad de Sevilla, 2007
- Especialidad — Software, Cloud, DevOps / e IA aplicada
- Actualmente — Ingeniero DevOps Xebia (2022) / Freelance (2019)

---

### Tarjetas de navegación (`.gv-sm-navcards`)

Título (h2): Estoy aquí porque...

Dos tarjetas grandes, cada una con icono, título, descripción y enlace:

- "Quiero conocer tu perfil profesional" — Descubre mi experiencia,
  trayectoria, stack tecnológico y cómo puedo aportar valor en equipos y
  organizaciones. Enlace: Ver perfil profesional → (`#perfil-profesional`)
- "Busco a alguien para un proyecto" — Conoce cómo trabajo, qué tipo de
  soluciones desarrollo y cómo puedo ayudarte a llevar tu proyecto del
  concepto a la operación. Enlace: Ver cómo trabajo contigo → (`#como-trabajo`)

Los enlaces hacen scroll interno a las secciones correspondientes.

---

### Perfil profesional (`#perfil-profesional .gv-sm-profile`)

Dos columnas.

**Columna izquierda** (`.gv-sm-profile__left`):

- Eyebrow: / Perfil profesional
- Título (h2): Trayectoria y experiencia
- Intro: "Más de 15 años acompañando a empresas y equipos en la creación
  de soluciones digitales robustas, escalables y sostenibles."
- Cuatro métricas con icono + valor + descripción:
  - 15+ años — De experiencia en desarrollo y arquitectura de software
  - 100+ proyectos — Entregados con éxito en diferentes industrias
  - Equipos multidisciplinares — Trabajo colaborativo, comunicación clara
    y foco en resultados
  - Aprendizaje continuo — Me mantengo al día e integro nuevas
    tecnologías de forma constante

**Columna derecha** (`.gv-sm-profile__right`, fondo oscuro vía CSS):

Timeline de cuatro especialidades numeradas 01-04. Todas se ven iguales
por defecto; el resalte (borde/fondo accent + número en accent) se
aplica solo en `:hover`, ninguna queda destacada de forma fija:

1. Desarrollo de software y aplicaciones — Inicios centrados en
   desarrollo de aplicaciones web y backend con Java, PHP y bases de
   datos relacionales. Construcción de soluciones sólidas y orientadas
   a negocio.
2. Automatización y DevOps — Evolución hacia la automatización de
   procesos, integración y entrega continua, infraestructura como
   código y entornos cloud.
3. Cloud, plataforma y arquitectura — Especialización en
   arquitecturas cloud escalables, contenedores, orquestación y
   plataformas modernas con foco en fiabilidad y eficiencia.
4. IA aplicada y mejora continua — Incorporación de inteligencia
   artificial generativa y análisis avanzado para acelerar entregas,
   optimizar procesos y tomar mejores decisiones basadas en datos.

---

### Stack tecnológico (`.gv-sm-stack`)

Título (h2): Stack tecnológico

Stack ampliado mediante badges de texto (`.gv-badge`), sin logos de
tecnologías. Tabla de filas por categoría (`.gv-sm-stack__row`), cada una
con una etiqueta y sus badges. Todas las filas se ven igual por defecto;
el resalte en accent (borde izquierdo + etiqueta en color) se aplica solo
en `:hover`, ninguna fila queda destacada de forma fija:

- Lenguajes y frameworks — Java, PHP, Python, JavaScript,
  TypeScript, Angular, React, Laravel, WordPress
- Cloud & Contenedores — Azure, AWS, Google Cloud, Docker, Kubernetes, Helm
- DevOps & Automatización — GitHub, GitHub Actions, Azure DevOps,
  Terraform, Jenkins, ArgoCD, GitOps
- Datos & Almacenamiento — MySQL, PostgreSQL, Oracle Database, MongoDB, Redis
- Observabilidad — Prometheus, Grafana, Datadog, Elastic Stack, Azure
  Monitor, Google Cloud Observability
- IA y herramientas — ChatGPT, Claude, GitHub Copilot, Codex, Gemini, Base44

---

### Cómo trabajo con clientes (`#como-trabajo .gv-sm-process`)

- Eyebrow: / Soluciones y acompañamiento
- Título (h2): Cómo trabajo con clientes
- Explicación: "Un enfoque end-to-end para construir soluciones que
  generan impacto real."

Proceso completo en cuatro pasos numerados 01-04, cada uno con icono,
título y descripción:

1. Entender el problema — Escucho, analizo y comprendo el contexto y los
   objetivos de negocio para definir el camino correcto.
2. Diseñar la solución — Propongo arquitecturas y tecnologías adecuadas,
   equilibrando valor, tiempo y presupuesto.
3. Construir y automatizar — Desarrollo, automatizo y pruebo con
   calidad, integrando buenas prácticas DevOps desde el inicio.
4. Operar y evolucionar — Monitorizo, optimizo y evoluciono la solución
   para que siga aportando valor en el tiempo.

---

### Formas de colaboración (`.gv-sm-collab`)

Título (h2): Formas de colaboración

Cuatro tarjetas con icono, título y descripción:

- Proyecto cerrado — Ideal para necesidades concretas con alcance
  definido y entregables claros.
- Acompañamiento técnico — Colaboración continua para evolucionar
  productos, plataformas o equipos de desarrollo.
- Refuerzo puntual — Apoyo experto en áreas específicas para acelerar
  proyectos o resolver bloqueos técnicos.
- Consultoría y auditoría — Revisión y mejora de arquitecturas, costes
  cloud, DevOps, seguridad y observabilidad.

---

## Responsive

Debe mantenerse exactamente la filosofía de la Home (mobile-first).

Desktop:

Dos columnas donde aplique (Hero, Perfil profesional).

Tablet:

Adaptación progresiva.

Mobile:

Una sola columna.
