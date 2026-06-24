<?php
/**
 * Sección "Stack": fondo oscuro, timeline vertical.
 * Sin logos ni iconos — solo badges de texto.
 * Sobretítulo, título y etapas desde content.md.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_stack_etapas = array(
	array(
		'num'   => '01',
		'title' => __( 'Descubrimiento y diseño', 'gallegovela-theme' ),
		'desc'  => __( 'Comprendo el problema, defino objetivos y diseño la solución adecuada antes de escribir una sola línea de código. Utilizo IA para acelerar la exploración de alternativas, generación de bocetos y validación temprana.', 'gallegovela-theme' ),
		'tags'  => array( 'Figma', 'Canva', 'UML', 'Workshops', 'ChatGPT', 'Gemini', 'Base44' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'Desarrollo a medida', 'gallegovela-theme' ),
		'desc'  => __( 'Desarrollo aplicaciones y plataformas adaptadas a cada proyecto utilizando asistentes de IA para acelerar la implementación, mejorar la calidad del código y facilitar refactorizaciones complejas.', 'gallegovela-theme' ),
		'tags'  => array( 'Java', 'PHP', 'WordPress', 'Laravel', 'Python', 'Angular', 'React', 'MySQL', 'Oracle Database', 'MongoDB', 'Redis', 'Codex', 'Claude Code' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Plataforma, automatización y cloud', 'gallegovela-theme' ),
		'desc'  => __( 'Diseño y automatizo infraestructuras cloud modernas equilibrando escalabilidad, fiabilidad y eficiencia económica. La IA forma parte del proceso para acelerar la definición de infraestructuras y automatizaciones.', 'gallegovela-theme' ),
		'tags'  => array( 'Azure', 'AWS', 'Google Cloud', 'Docker', 'Kubernetes', 'Helm', 'GitHub', 'GitHub Actions', 'Azure DevOps', 'Terraform', 'ArgoCD', 'GitOps', 'FinOps', 'Capacity Planning', 'Infrastructure Forecasting', 'Codex', 'Claude Code' ),
	),
	array(
		'num'   => '04',
		'title' => __( 'Observabilidad y evolución', 'gallegovela-theme' ),
		'desc'  => __( 'Analizo aplicaciones e infraestructuras para anticipar problemas y evolucionar continuamente los sistemas. Utilizo IA para análisis de errores, correlación de logs y creación de dashboards.', 'gallegovela-theme' ),
		'tags'  => array( 'Prometheus', 'Grafana', 'Datadog', 'Elasticsearch', 'Kibana', 'Azure Monitor', 'Google Cloud Observability', 'ChatGPT', 'Claude' ),
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
		</div>

		<ol class="gv-stack__timeline">
			<?php foreach ( $gv_stack_etapas as $etapa ) : ?>
				<li class="gv-stack__item">
					<span class="gv-stack__num" aria-hidden="true"><?php echo esc_html( $etapa['num'] ); ?></span>
					<h3 class="gv-stack__title"><?php echo esc_html( $etapa['title'] ); ?></h3>
					<p class="gv-stack__desc"><?php echo esc_html( $etapa['desc'] ); ?></p>
					<div class="gv-stack__tags">
						<?php foreach ( $etapa['tags'] as $tag ) : ?>
							<span class="gv-badge"><?php echo esc_html( $tag ); ?></span>
						<?php endforeach; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
