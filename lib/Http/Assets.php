<?php

namespace [namespace]\Http;

/**
 * Theme Assets
 *
 * This file is for registering your theme stylesheets and scripts.
 * In here you should also deregister all unwanted assets which
 * can be shiped with various third-parity plugins.
 *
 * @package [vendor_name]\Http
 * @since   [initial_version]
 */
class Assets {

	/**
	 * Base URL for public assets.
	 *
	 * @since [initial_version]
	 * @var   string
	 */
	private $base_uri;

	/**
	 * List of CSS assets to cache in localStorage.
	 *
	 * @since [initial_version]
	 * @var   array
	 */
	private $cached_styles;

	/**
	 * Constructor.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function __construct() {
		$this->base_uri      = \get_stylesheet_directory_uri() . '/public/';
		$this->cached_styles = array(
			'fonts' => $this->base_uri . 'fonts.css?version=' . THEME_VERSION,
		);
	}

	/**
	 * Setup hooks.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function ready() {
		\add_action( 'login_enqueue_scripts', [ $this, 'login_logo' ] );
		\add_filter( 'login_headerurl', [ $this, 'login_logo_url' ] );
		\add_action( 'wp_head', [ $this, 'favicons' ] );
		\add_action( 'login_head', [ $this, 'favicons' ] );
		\add_action( 'admin_head', [ $this, 'favicons' ] );
		\add_action( 'admin_init', [ $this, 'register_editor_style' ] );
		\add_action( 'wp_enqueue_scripts', [ $this, 'register_stylesheets' ] );
		\add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
		\add_action( 'wp_head', [ $this, 'register_inline_fonts' ] );
	}

	/**
	 * Replace login page logo.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function login_logo() {
		printf(
			'<style type="text/css">
				#login h1 a,
				.login h1 a {
					background-image: url( %s );
					background-size: contain;
					background-repeat: no-repeat;
					height: auto;
					width: 250px;
				}
			</style>',
			esc_url( $this->base_uri . 'images/logo.svg' )
		);
	}

	/**
	 * Replace login page logo link.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function login_logo_url() {
		return \get_home_url();
	}

	/**
	 * Include the theme favicons.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function favicons() {
		printf( '<link rel="shortcut icon" href="%s">', \esc_url( $this->base_uri . 'favicon.ico' ) );
	}

	/**
	 * Registers editor stylesheet files.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function register_editor_style() {
		\add_editor_style( 'editor-style.css' );
		\add_editor_style( 'public/fonts.css' );
	}

	/**
	 * Registers theme stylesheet files.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function register_stylesheets() {
		\wp_enqueue_style( '[theme_slug]', \get_stylesheet_uri() );
	}

	/**
	 * Registers theme script files.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function register_scripts() {

		\wp_enqueue_script(
			'[theme_slug]-infrastructure',
			$this->base_uri . 'infrastructure.js',
			array( 'jquery' ),
			THEME_VERSION,
			true
		);

		\wp_enqueue_script(
			'[theme_slug]-app',
			$this->base_uri . 'app.js',
			array( '[theme_slug]-infrastructure' ),
			THEME_VERSION,
			true
		);
	}

	/**
	 * Include deferred font loading script in the header.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public function register_inline_fonts() {
		// @codingStandardsIgnoreStart
		?>
		<!--noptimize-->
		<script type="text/javascript">
			var cachedStyles = <?php echo \wp_json_encode( $this->cached_styles ); ?>;
			<?php include dirname( dirname( __DIR__ ) ) . '/public/inline.js'; ?>
		</script>
		<noscript>
			<?php foreach ( $this->cached_styles as $href ) { ?>
				<link rel="stylesheet" type="text/css" media="all" href="<?php echo \esc_url( $href ); ?>">
			<?php } ?>
		</noscript>
		<!--/noptimize-->
		<?php
		// @codingStandardsIgnoreEnd
	}

	/**
	 * Include the theme SVG sprite.
	 *
	 * @since  [initial_version]
	 * @return void
	 */
	public static function get_svg_sprite() {

		$svg_sprite_file = \get_stylesheet_directory() . '/public/images/sprite.svg';
		if ( ! file_exists( $svg_sprite_file ) ) {
			return;
		}

		// @codingStandardsIgnoreStart
		echo file_get_contents( $svg_sprite_file );
		// @codingStandardsIgnoreEnd
	}
}
