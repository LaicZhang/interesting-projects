<?php
/**
 * @package   Options_Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2014 WP Theming
 */

class Options_Framework_Admin {

    protected $options_screen = null;

    public function init() {

    	$options = & Options_Framework::_optionsframework_options();

    	if ( $options ) {

			add_action( 'admin_menu', array( $this, 'add_custom_options_page' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

			add_action( 'admin_init', array( $this, 'settings_init' ) );

			add_action( 'wp_before_admin_bar_render', array( $this, 'optionsframework_admin_bar' ) );

		}

    }

    function settings_init() {

        $optionsframework_settings = get_option( 'optionsframework' );

		register_setting( 'optionsframework', $optionsframework_settings['id'],  array ( $this, 'validate_options' ) );

		add_action( 'optionsframework_after_validate', array( $this, 'save_options_notice' ) );

    }

	static function menu_settings() {

		$menu = array(

			// Modes: submenu, menu
            'mode' => 'submenu',

            // Submenu default settings
            'page_title' => __( 'Begin主题选项', 'textdomain'),
			'menu_title' => '<span class="menu-icon"> '. __('主题选项', 'textdomain'). '</span> ',
			'capability' => 'edit_theme_options',
			'menu_slug' => 'begin-options',
            'parent_slug' => 'themes.php',

            // Menu default settings
            'icon_url' => 'dashicons-admin-generic',
            'position' => '61'

		);

		return apply_filters( 'optionsframework_menu', $menu );
	}


	function add_custom_options_page() {

		$menu = $this->menu_settings();

		$this->options_screen = add_theme_page(
            	$menu['page_title'],
            	$menu['menu_title'],
            	$menu['capability'],
            	$menu['menu_slug'],
            	array( $this, 'options_page' )
        );

	}

	function enqueue_admin_styles( $hook ) {

		if ( $this->options_screen != $hook )
	        return;

		// wp_enqueue_style( 'optionsframework', OPTIONS_FRAMEWORK_DIRECTORY . 'css/optionsframework.css', array(),  Options_Framework::VERSION );
		wp_enqueue_style( 'wp-color-picker' );
	}

	function enqueue_admin_scripts( $hook ) {

		if ( $this->options_screen != $hook )
	        return;

		wp_enqueue_script( 'options-custom', OPTIONS_FRAMEWORK_DIRECTORY . 'js/options-custom.js', array( 'jquery','wp-color-picker' ), Options_Framework::VERSION );

		add_action( 'admin_head', array( $this, 'of_admin_head' ) );
	}

	function of_admin_head() {
		do_action( 'optionsframework_custom_scripts' );
	}

	 function options_page() { ?>

		<div id="optionsframework-wrap" class="wrap">
		<?php $menu = $this->menu_settings(); ?>
		<h2 class="themes-name"><i class="cx cx-begin"></i><?php echo esc_html( $menu['page_title'] ); ?></h2>
	    <h2 class="nav-tab-wrapper">
	        <?php echo Options_Framework_Interface::optionsframework_tabs(); ?>
	    </h2>

	    <?php settings_errors( 'begin-options' ); ?>

	    <div id="optionsframework-metabox" class="metabox-holder">
		    <div id="optionsframework" class="postbox">
				<form action="options.php" method="post">
				<?php settings_fields( 'optionsframework' ); ?>
				<?php Options_Framework_Interface::optionsframework_fields(); /* Settings */ ?>
				<div id="optionsframework-submit">
					<input type="submit" class="button-primary" name="update" value="<?php esc_attr_e( '保存设置', 'textdomain' ); ?>" />
					<input type="submit" class="reset-button button-secondary" name="reset" value="<?php esc_attr_e( '恢复默认', 'textdomain' ); ?>" onclick="return confirm( '<?php print esc_js( __( '提示：点击确定，之前所有设置修改都将丢失！', 'textdomain' ) ); ?>' );" />
					<div class="clear"></div>
				</div>
				<div id="facility-submit">
					<input type="submit" class="button-primary" name="update" value="保存设置" />
				</div>
				</form>
			</div> <!-- / #container -->
		</div>
			<?php do_action( 'optionsframework_after' ); ?>
			<div class="options-caid"><span class="dashicons dashicons-editor-ol" title="打开分类ID对照"></span></div>
			<div class="catid-list"><?php show_id();?></div>
		</div> <!-- / .wrap -->

	<?php
	}

	function validate_options( $input ) {

		if ( isset( $_POST['reset'] ) ) {
			add_settings_error( 'options-framework', 'restore_defaults', __( '已恢复默认设置', 'textdomain' ), 'updated fade' );
			return $this->get_default_values();
		}

		$clean = array();
		$options = & Options_Framework::_optionsframework_options();
		foreach ( $options as $option ) {

			if ( ! isset( $option['id'] ) ) {
				continue;
			}

			if ( ! isset( $option['type'] ) ) {
				continue;
			}

			$id = preg_replace( '/[^a-zA-Z0-9._\-]/', '', strtolower( $option['id'] ) );

			if ( 'checkbox' == $option['type'] && ! isset( $input[$id] ) ) {
				$input[$id] = false;
			}

			if ( 'multicheck' == $option['type'] && ! isset( $input[$id] ) ) {
				foreach ( $option['options'] as $key => $value ) {
					$input[$id][$key] = false;
				}
			}

			if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
				$clean[$id] = apply_filters( 'of_sanitize_' . $option['type'], $input[$id], $option );
			}
		}

		do_action( 'optionsframework_after_validate', $clean );

		return $clean;
	}

	function save_options_notice() {
		add_settings_error( 'options-framework', 'save_options', __( '设置已保存', 'textdomain' ), 'updated fade' );
		flush_rewrite_rules();
	}

	function get_default_values() {
		$output = array();
		$config = & Options_Framework::_optionsframework_options();
		foreach ( (array) $config as $option ) {
			if ( ! isset( $option['id'] ) ) {
				continue;
			}
			if ( ! isset( $option['std'] ) ) {
				continue;
			}
			if ( ! isset( $option['type'] ) ) {
				continue;
			}
			if ( has_filter( 'of_sanitize_' . $option['type'] ) ) {
				$output[$option['id']] = apply_filters( 'of_sanitize_' . $option['type'], $option['std'], $option );
			}
		}
		return $output;
	}

	/**
	 * Add options menu item to admin bar
	 */

	function optionsframework_admin_bar() {

		$menu = $this->menu_settings();

		global $wp_admin_bar;

		if ( 'menu' == $menu['mode'] ) {
			$href = admin_url( 'admin.php?page=' . $menu['menu_slug'] );
		} else {
			$href = admin_url( 'themes.php?page=' . $menu['menu_slug'] );
		}

		$args = array(
			'parent' => 'appearance',
			'id' => 'of_theme_options',
			'title' => $menu['menu_title'],
			'href' => $href
		);

		$wp_admin_bar->add_menu( apply_filters( 'optionsframework_admin_bar', $args ) );
	}

}
