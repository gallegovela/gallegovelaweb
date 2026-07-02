<?php
/**
 * Sección "Stack": fondo oscuro, timeline vertical.
 * Sin logos ni iconos — solo badges de texto.
 * Sobretítulo, título y etapas desde specs/pages/home.md.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$gv_stack_etapas = array(
    array(
        'eyebrow'  => __( 'Descubrimiento y diseño', 'gallegovela-theme' ),
        'title'    => __( 'Entender antes de construir', 'gallegovela-theme' ),
        'subtitle' => __( 'Comprender el problema y definir la solución adecuada.', 'gallegovela-theme' ),
        'desc'     => array(
            __( 'Comprendo el problema, defino objetivos y diseño la solución adecuada antes de escribir una sola línea de código.', 'gallegovela-theme' ),
        ),
        'ai_text'  => __( 'Utilizo ChatGPT, Gemini y Base44 para explorar alternativas, generar bocetos y prototipos rápidos, estructurar ideas y facilitar la validación temprana con el cliente.', 'gallegovela-theme' ),
        'tags'     => array( 'Figma', 'Canva', 'ChatGPT', 'Gemini', 'Base44' ),
    ),
    array(
        'eyebrow'  => __( 'Desarrollo a medida', 'gallegovela-theme' ),
        'title'    => __( 'Transformar necesidades en soluciones reales', 'gallegovela-theme' ),
        'subtitle' => __( 'Construir software robusto y mantenible.', 'gallegovela-theme' ),
        'desc'     => array(
            __( 'Desarrollo aplicaciones y plataformas adaptadas a cada proyecto, priorizando mantenibilidad, escalabilidad y alineación con los objetivos del negocio.', 'gallegovela-theme' ),
        ),
        'ai_text'  => __( 'Utilizo Codex y Claude Code para acelerar la implementación, mejorar la calidad del código y facilitar refactorizaciones complejas.', 'gallegovela-theme' ),
        'tags'     => array( 'Java', 'PHP', 'WordPress', 'Laravel', 'Python', 'Angular', 'React', 'MySQL', 'Oracle Database', 'MongoDB', 'Redis', 'Codex', 'Claude Code' ),
    ),
    array(
        'eyebrow'  => __( 'Plataforma, automatización y cloud', 'gallegovela-theme' ),
        'title'    => __( 'Construir plataformas preparadas para crecer', 'gallegovela-theme' ),
        'subtitle' => __( 'Escalabilidad, automatización y eficiencia económica.', 'gallegovela-theme' ),
        'desc'     => array(
            __( 'Diseño y automatización de infraestructuras cloud modernas, equilibrando escalabilidad, fiabilidad y eficiencia económica para que cada plataforma evolucione de forma sostenible.', 'gallegovela-theme' ),
            __( 'La utilización de técnicas DevOps, al igual que la aplicación de metodologías como GitOps, contribuyen a un mejor diseño de los procesos de despliegue y automatización de tareas, reduciendo el margen de error y optimizando la implantación de la solución final.', 'gallegovela-theme' ),
        ),
        'ai_text'  => __( 'El uso de herramientas como Codex, Claude Code y Github Copilot aceleran la definición de infraestructuras, generación de pipelines CI/CD y automatización operativa.', 'gallegovela-theme' ),
        'tags'     => array( 'Azure', 'AWS', 'Google Cloud', 'Docker', 'Kubernetes', 'Helm', 'Jenkins', 'GitHub', 'GitHub Actions', 'Azure DevOps', 'Terraform', 'ArgoCD', 'GitOps', 'FinOps', 'Capacity Planning', 'Infrastructure Forecasting', 'Codex', 'Claude Code', 'Github Copilot' ),
    ),
    array(
        'eyebrow'  => __( 'Observabilidad y evolución', 'gallegovela-theme' ),
        'title'    => __( 'Monitorizar, aprender y mejorar', 'gallegovela-theme' ),
        'subtitle' => __( 'Detectar incidencias y evolucionar continuamente.', 'gallegovela-theme' ),
        'desc'     => array(
            __( 'El análisis del comportamiento de aplicaciones e infraestructuras es parte fundamental para anticipar problemas y garantizar una mejora continua de los sistemas.', 'gallegovela-theme' ),
        ),
        'ai_text'  => __( 'El uso de ChatGPT, Claude y Github Copilot es fundamental para análisis de errores, interpretación de logs y asistencia en la creación de dashboards en Grafana y Kibana.', 'gallegovela-theme' ),
        'tags'     => array( 'Prometheus', 'Grafana', 'Datadog', 'Elasticsearch', 'Kibana', 'Azure Monitor', 'Google Cloud Observability', 'ChatGPT', 'Claude', 'Github Copilot' ),
    ),
);
?>
<section id="stack" class="gv-stack">
    <div class="gv-container">
        <div class="gv-section-header gv-section-header--dark">
            <div class="gv-section-header__left">
                <h3 class="home-section-overtitle"><?php esc_html_e( 'Stack', 'gallegovela-theme' ); ?></h3>
                <h2 class="home-section-title"><?php esc_html_e( 'Tecnologías que utilizo para construir soluciones robustas.', 'gallegovela-theme' ); ?></h2>
            </div>
            <div class="gv-section-header__right">
                <a class="gv-section-header__link" href="<?php echo esc_url( home_url( '/sobre-mi' ) ); ?>"><?php esc_html_e( 'Sobre mí', 'gallegovela-theme' ); ?></a>
            </div>
        </div>

        <div class="gv-process">
            <?php foreach ( $gv_stack_etapas as $etapa ) : ?>
            <div class="gv-step">

                <div class="gv-stack__item">

                    <div class="gv-step-number"><?php echo esc_html( mb_strtoupper( $etapa['eyebrow'] ) ); ?></div>

                    <h3><?php echo esc_html( $etapa['title'] ); ?></h3>

                    <div class="subtitle">
                        <?php echo esc_html( $etapa['subtitle'] ); ?>
                    </div>

                    <?php foreach ( $etapa['desc'] as $gv_desc_parrafo ) : ?>
                        <p><?php echo esc_html( $gv_desc_parrafo ); ?></p>
                    <?php endforeach; ?>

                    <div class="gv-ai">
                        <div class="gv-ai-title">IA EN ESTA ETAPA</div>

                        <p>
                            <?php echo esc_html( $etapa['ai_text'] ); ?>
                        </p>
                    </div>

                    <div class="gv-groups">

                        <div>
                            <div class="gv-group-title">Herramientas</div>

                            <div class="gv-tags">
                                <?php foreach ( $etapa['tags'] as $tag ) : ?>
                                    <span class="gv-tag"><?php echo esc_html( $tag ); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
