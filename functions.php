<?php
/**
 * The WordPress Theme Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress themes that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   Theme_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2013 Your Name or Company Name
 *
 * @wordpress-theme
 * Theme Name:			@TODO
 * Theme URI:			@TODO
 * Description:			@TODO
 * Version:				1.0.0
 * Author:				@TODO
 * Author URI:			@TODO
 * Text Domain:			theme-name-locale
 * License:				GPL-2.0+
 * License URI:			http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:			/languages
 * GitHub Theme URI:	https://github.com/<owner>/<repo>
 *
 * @TODO: Rename this class to a proper name for your theme.
 *
 * @package Theme_Name
 * @author  Your Name <email@example.com>
 */
class Theme_Name {

	/**
	 * Theme version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 * @TODO - Rename "theme-name" to the name your your theme
	 *
	 * Unique identifier for your theme.
	 *
	 *
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * theme file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $theme_slug = 'theme-name';

	/**
	 * What type of script and stylesheet to show.  (min)ified or (dev)elopment.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $script_type = 'min';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the theme by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Set script type
		if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
			$script_type = 'dev';
		}

		// Load theme text domain
		add_action( 'init', array( $this, 'load_theme_textdomain' ) );

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Call on theme activation
		add_action( 'after_switch_theme', array( $this, 'activate' ) );

		// Call on theme deactivation
		add_action( 'switch_theme', array( $this, 'deactivate' ) );

		/* Define custom functionality.
		 * Refer To http://codex.wordpress.org/Theme_API#Hooks.2C_Actions_and_Filters
		 */
		add_action( '@TODO', array( $this, 'action_method_name' ) );
		add_filter( '@TODO', array( $this, 'filter_method_name' ) );

	}

	/**
	 * Return the theme slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Theme slug variable.
	 */
	public function get_theme_slug() {
		return $this->theme_slug;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the theme is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $theme_switching_from    Name of theme previously activated
	 */
	public static function activate( $theme_switching_from ) {
	    // Your theme is being activated
	}
	
	/**
	 * Fired when the theme is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $theme_switching_to		Name of theme newly activated
	 */
	public static function deactivate( $theme_switching_to ) {
	    // Your theme is being deactivated
	}

	/**
	 * Load the theme text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_theme_textdomain() {

		$domain = $this->theme_slug;
		$locale = apply_filters( 'theme_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );

	}

	/**
	 * Register and enqueue style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->theme_slug . '-theme-styles', get_template_directory_uri() . '/css/styles.' . $this->script_type . '.css', array(), self::VERSION );
	}

	/**
	 * Register and enqueues JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->theme_slug . '-theme-script', get_template_directory_uri() . '/js/scripts.' . $this->script_type . '.js', array( 'jquery' ), self::VERSION, true );
	}

	/**
	 * NOTE:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 *
	 *        Actions:    http://codex.wordpress.org/Theme_API#Actions
	 *        Reference:  http://codex.wordpress.org/Theme_API/Action_Reference
	 *
	 * @since    1.0.0
	 */
	public function action_method_name() {
		// @TODO: Define your action hook callback here
	}

	/**
	 * NOTE:  Filters are points of execution in which WordPress modifies data
	 *        before saving it or sending it to the browser.
	 *
	 *        Filters: http://codex.wordpress.org/Theme_API#Filters
	 *        Reference:  http://codex.wordpress.org/Theme_API/Filter_Reference
	 *
	 * @since    1.0.0
	 */
	public function filter_method_name() {
		// @TODO: Define your filter hook callback here
	}

}
// Initialize the theme class
if ( ! isset( $Theme_Name ) && function_exists( 'add_action' ) ) {
	$Theme_Name = Theme_Name::get_instance();
}