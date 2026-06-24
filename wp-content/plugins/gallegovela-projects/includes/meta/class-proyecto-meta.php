<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gallegovela_Proyecto_Meta {

	const META_GALERIA   = '_gv_proyecto_galeria';
	const META_CLIENTE    = '_gv_proyecto_cliente';
	const META_FECHA      = '_gv_proyecto_fecha';
	const META_URL        = '_gv_proyecto_url';
	const META_DESTACADO  = '_gv_proyecto_destacado';

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'init', array( $this, 'register_meta' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post_' . Gallegovela_CPT_Proyecto::POST_TYPE, array( $this, 'save' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
	}

	public function register_meta() {
		$post_type = Gallegovela_CPT_Proyecto::POST_TYPE;

		register_post_meta( $post_type, self::META_GALERIA, array(
			'type'          => 'array',
			'single'        => true,
			'show_in_rest'  => array(
				'schema' => array(
					'type'  => 'array',
					'items' => array( 'type' => 'integer' ),
				),
			),
			'auth_callback' => array( $this, 'auth_callback' ),
		) );

		register_post_meta( $post_type, self::META_CLIENTE, array(
			'type'          => 'string',
			'single'        => true,
			'show_in_rest'  => true,
			'auth_callback' => array( $this, 'auth_callback' ),
		) );

		register_post_meta( $post_type, self::META_FECHA, array(
			'type'          => 'string',
			'single'        => true,
			'show_in_rest'  => true,
			'auth_callback' => array( $this, 'auth_callback' ),
		) );

		register_post_meta( $post_type, self::META_URL, array(
			'type'          => 'string',
			'single'        => true,
			'show_in_rest'  => true,
			'auth_callback' => array( $this, 'auth_callback' ),
		) );

		register_post_meta( $post_type, self::META_DESTACADO, array(
			'type'          => 'boolean',
			'single'        => true,
			'show_in_rest'  => true,
			'auth_callback' => array( $this, 'auth_callback' ),
		) );
	}

	public function auth_callback() {
		return current_user_can( 'edit_posts' );
	}

	public function add_meta_box() {
		add_meta_box(
			'gallegovela_proyecto_detalles',
			__( 'Detalles del proyecto', 'gallegovela-projects' ),
			array( $this, 'render_meta_box' ),
			Gallegovela_CPT_Proyecto::POST_TYPE,
			'normal',
			'high'
		);
	}

	public function enqueue_admin_assets( $hook ) {
		global $post_type;

		if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) || Gallegovela_CPT_Proyecto::POST_TYPE !== $post_type ) {
			return;
		}

		wp_enqueue_media();
		wp_enqueue_script(
			'gallegovela-proyecto-admin',
			GV_PROJECTS_URL . 'assets/js/admin-proyecto.js',
			array( 'jquery' ),
			GV_PROJECTS_VERSION,
			true
		);
		wp_localize_script( 'gallegovela-proyecto-admin', 'gvProyectoAdmin', array(
			'title'      => __( 'Seleccionar imágenes de la galería', 'gallegovela-projects' ),
			'buttonText' => __( 'Usar estas imágenes', 'gallegovela-projects' ),
		) );
	}

	public function render_meta_box( $post ) {
		wp_nonce_field( 'gallegovela_proyecto_meta', 'gallegovela_proyecto_meta_nonce' );

		$cliente   = get_post_meta( $post->ID, self::META_CLIENTE, true );
		$fecha     = get_post_meta( $post->ID, self::META_FECHA, true );
		$url       = get_post_meta( $post->ID, self::META_URL, true );
		$destacado = get_post_meta( $post->ID, self::META_DESTACADO, true );
		$galeria   = (array) get_post_meta( $post->ID, self::META_GALERIA, true );
		?>
		<p>
			<label for="gv_proyecto_cliente"><strong><?php esc_html_e( 'Cliente', 'gallegovela-projects' ); ?></strong></label><br>
			<input type="text" id="gv_proyecto_cliente" name="gv_proyecto_cliente" class="widefat" value="<?php echo esc_attr( $cliente ); ?>">
		</p>
		<p>
			<label for="gv_proyecto_fecha"><strong><?php esc_html_e( 'Fecha', 'gallegovela-projects' ); ?></strong></label><br>
			<input type="date" id="gv_proyecto_fecha" name="gv_proyecto_fecha" value="<?php echo esc_attr( $fecha ); ?>">
		</p>
		<p>
			<label for="gv_proyecto_url"><strong><?php esc_html_e( 'URL', 'gallegovela-projects' ); ?></strong></label><br>
			<input type="url" id="gv_proyecto_url" name="gv_proyecto_url" class="widefat" value="<?php echo esc_attr( $url ); ?>">
		</p>
		<p>
			<label>
				<input type="checkbox" name="gv_proyecto_destacado" value="1" <?php checked( $destacado, '1' ); ?>>
				<strong><?php esc_html_e( 'Proyecto destacado', 'gallegovela-projects' ); ?></strong>
			</label>
		</p>
		<p>
			<strong><?php esc_html_e( 'Galería', 'gallegovela-projects' ); ?></strong><br>
			<input type="hidden" id="gv_proyecto_galeria" name="gv_proyecto_galeria" value="<?php echo esc_attr( implode( ',', $galeria ) ); ?>">
			<button type="button" class="button" id="gv_proyecto_galeria_seleccionar"><?php esc_html_e( 'Seleccionar imágenes', 'gallegovela-projects' ); ?></button>
			<div id="gv_proyecto_galeria_preview" style="margin-top:8px;display:flex;gap:8px;flex-wrap:wrap;">
				<?php foreach ( $galeria as $attachment_id ) : ?>
					<?php echo wp_get_attachment_image( $attachment_id, array( 60, 60 ) ); ?>
				<?php endforeach; ?>
			</div>
		</p>
		<?php
		echo '<p class="description">' . esc_html__( 'El "Orden manual" se gestiona desde el panel Atributos de página (campo Orden).', 'gallegovela-projects' ) . '</p>';
	}

	public function save( $post_id ) {
		if ( ! isset( $_POST['gallegovela_proyecto_meta_nonce'] ) ||
			! wp_verify_nonce( $_POST['gallegovela_proyecto_meta_nonce'], 'gallegovela_proyecto_meta' ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['gv_proyecto_cliente'] ) ) {
			update_post_meta( $post_id, self::META_CLIENTE, sanitize_text_field( wp_unslash( $_POST['gv_proyecto_cliente'] ) ) );
		}

		if ( isset( $_POST['gv_proyecto_fecha'] ) ) {
			update_post_meta( $post_id, self::META_FECHA, sanitize_text_field( wp_unslash( $_POST['gv_proyecto_fecha'] ) ) );
		}

		if ( isset( $_POST['gv_proyecto_url'] ) ) {
			update_post_meta( $post_id, self::META_URL, sanitize_url( wp_unslash( $_POST['gv_proyecto_url'] ) ) );
		}

		update_post_meta( $post_id, self::META_DESTACADO, isset( $_POST['gv_proyecto_destacado'] ) ? '1' : '0' );

		if ( isset( $_POST['gv_proyecto_galeria'] ) ) {
			$ids = array_filter( array_map( 'absint', explode( ',', wp_unslash( $_POST['gv_proyecto_galeria'] ) ) ) );
			update_post_meta( $post_id, self::META_GALERIA, array_values( $ids ) );
		}
	}
}
