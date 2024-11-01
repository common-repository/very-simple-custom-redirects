<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add admin options page
function vscr_menu_page() {
	add_options_page( esc_attr__( 'Redirects', 'very-simple-custom-redirects' ), esc_attr__( 'Redirects', 'very-simple-custom-redirects' ), 'manage_options', 'vscr', 'vscr_options_page' );
}
add_action( 'admin_menu', 'vscr_menu_page' );

// add admin settings and such
function vscr_admin_init() {
	// general section
	add_settings_section( 'vscr-section-1', esc_attr__( 'General', 'very-simple-custom-redirects' ), 'vscr_section_callback_1', 'vscr' );

	add_settings_field( 'vscr-field-13', esc_attr__( 'Uninstall', 'very-simple-custom-redirects' ), 'vscr_field_callback_13', 'vscr', 'vscr-section-1' );
	register_setting( 'vscr-options', 'vscr-setting-13', array('sanitize_callback' => 'sanitize_key') );

	// login section
	add_settings_section( 'vscr-section-2', esc_attr__( 'Login', 'very-simple-custom-redirects' ), 'vscr_section_callback_2', 'vscr' );

	add_settings_field( 'vscr-field-1', esc_attr__( 'Administrator', 'very-simple-custom-redirects' ), 'vscr_field_callback_1', 'vscr', 'vscr-section-2' );
	register_setting( 'vscr-options', 'vscr-setting-1', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-2', esc_attr__( 'Editor', 'very-simple-custom-redirects' ), 'vscr_field_callback_2', 'vscr', 'vscr-section-2' );
	register_setting( 'vscr-options', 'vscr-setting-2', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-3', esc_attr__( 'Author', 'very-simple-custom-redirects' ), 'vscr_field_callback_3', 'vscr', 'vscr-section-2' );
	register_setting( 'vscr-options', 'vscr-setting-3', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-4', esc_attr__( 'Contributor', 'very-simple-custom-redirects' ), 'vscr_field_callback_4', 'vscr', 'vscr-section-2' );
	register_setting( 'vscr-options', 'vscr-setting-4', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-5', esc_attr__( 'Subscriber', 'very-simple-custom-redirects' ), 'vscr_field_callback_5', 'vscr', 'vscr-section-2' );
	register_setting( 'vscr-options', 'vscr-setting-5', array('sanitize_callback' => 'sanitize_text_field') );

	// logout section
	add_settings_section( 'vscr-section-3', esc_attr__( 'Logout', 'very-simple-custom-redirects' ), 'vscr_section_callback_3', 'vscr' );

	add_settings_field( 'vscr-field-6', esc_attr__( 'Administrator', 'very-simple-custom-redirects' ), 'vscr_field_callback_6', 'vscr', 'vscr-section-3' );
	register_setting( 'vscr-options', 'vscr-setting-6', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-7', esc_attr__( 'Editor', 'very-simple-custom-redirects' ), 'vscr_field_callback_7', 'vscr', 'vscr-section-3' );
	register_setting( 'vscr-options', 'vscr-setting-7', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-8', esc_attr__( 'Author', 'very-simple-custom-redirects' ), 'vscr_field_callback_8', 'vscr', 'vscr-section-3' );
	register_setting( 'vscr-options', 'vscr-setting-8', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-9', esc_attr__( 'Contributor', 'very-simple-custom-redirects' ), 'vscr_field_callback_9', 'vscr', 'vscr-section-3' );
	register_setting( 'vscr-options', 'vscr-setting-9', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vscr-field-10', esc_attr__( 'Subscriber', 'very-simple-custom-redirects' ), 'vscr_field_callback_10', 'vscr', 'vscr-section-3' );
	register_setting( 'vscr-options', 'vscr-setting-10', array('sanitize_callback' => 'sanitize_text_field') );

	// lost password section
	add_settings_section( 'vscr-section-4', esc_attr__( 'Lost Password', 'very-simple-custom-redirects' ), 'vscr_section_callback_4', 'vscr' );

	add_settings_field( 'vscr-field-11', esc_attr__( 'Page', 'very-simple-custom-redirects' ), 'vscr_field_callback_11', 'vscr', 'vscr-section-4' );
	register_setting( 'vscr-options', 'vscr-setting-11', array('sanitize_callback' => 'sanitize_text_field') );

	// register section
	add_settings_section( 'vscr-section-5', esc_attr__( 'Register', 'very-simple-custom-redirects' ), 'vscr_section_callback_5', 'vscr' );

	add_settings_field( 'vscr-field-12', esc_attr__( 'Page', 'very-simple-custom-redirects' ), 'vscr_field_callback_12', 'vscr', 'vscr-section-5' );
	register_setting( 'vscr-options', 'vscr-setting-12', array('sanitize_callback' => 'sanitize_text_field') );
}
add_action( 'admin_init', 'vscr_admin_init' );

// section callbacks
function vscr_section_callback_1() {
	?>
	<p><?php esc_attr_e( 'Do not use this plugin simultaneously with redirect features in other plugins. This may cause a conflict.', 'very-simple-custom-redirects' ); ?></p>
	<p><?php esc_attr_e( 'Enter page ID (not full URL, page name or page slug).', 'very-simple-custom-redirects' ); ?></p>
	<p><?php esc_attr_e( 'When leaving a field empty, the default redirect behavior of WordPress applies.', 'very-simple-custom-redirects' ); ?></p>
	<?php
}

function vscr_section_callback_2() {
	$home_page = '<code>home</code>';
	?>
	<p><?php esc_attr_e( 'Redirect to this page after login. Default is to dashboard.', 'very-simple-custom-redirects' ); ?></p>
	<p><?php printf( esc_attr__( 'Enter %s if you want to redirect to homepage.', 'very-simple-custom-redirects' ), $home_page ); ?></p>
	<?php
}

function vscr_section_callback_3() {
	$home_page = '<code>home</code>';
	?>
	<p><?php esc_attr_e( 'Redirect to this page after logout. Default is to login page.', 'very-simple-custom-redirects' ); ?></p>
	<p><?php printf( esc_attr__( 'Enter %s if you want to redirect to homepage.', 'very-simple-custom-redirects' ), $home_page ); ?></p>
	<?php
}

function vscr_section_callback_4() {
	?>
	<p><?php esc_attr_e( 'Redirect to this page if lost password link is clicked. Default is to lost password page.', 'very-simple-custom-redirects' ); ?></p>
	<?php
}

function vscr_section_callback_5() {
	?>
	<p><?php esc_attr_e( 'Redirect to this page if register link is clicked. Default is to register page.', 'very-simple-custom-redirects' ); ?></p>
	<?php
}

// general section - field callbacks
function vscr_field_callback_13() {
	$value = get_option( 'vscr-setting-13' );
	?>
	<input type='hidden' name='vscr-setting-13' value='no'>
	<label><input type='checkbox' name='vscr-setting-13' <?php checked( esc_attr($value), 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Do not delete settings when uninstalling plugin.', 'very-simple-custom-redirects' ); ?></label>
	<?php
}

// login section - field callbacks
function vscr_field_callback_1() {
	$value = get_option( 'vscr-setting-1' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-1' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_2() {
	$value = get_option( 'vscr-setting-2' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-2' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_3() {
	$value = get_option( 'vscr-setting-3' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-3' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_4() {
	$value = get_option( 'vscr-setting-4' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-4' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_5() {
	$value = get_option( 'vscr-setting-5' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-5' value='<?php echo esc_attr($value); ?>' />
	<?php
}

// logout section - field callbacks
function vscr_field_callback_6() {
	$value = get_option( 'vscr-setting-6' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-6' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_7() {
	$value = get_option( 'vscr-setting-7' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-7' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_8() {
	$value = get_option( 'vscr-setting-8' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-8' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_9() {
	$value = get_option( 'vscr-setting-9' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-9' value='<?php echo esc_attr($value); ?>' />
	<?php
}

function vscr_field_callback_10() {
	$value = get_option( 'vscr-setting-10' );
	?>
	<input type='text' size='12' maxlength='10' name='vscr-setting-10' value='<?php echo esc_attr($value); ?>' />
	<?php
}

// lost password section - field callbacks
function vscr_field_callback_11() {
	$value = get_option( 'vscr-setting-11' );
	?>
	<input type='number' size='12' name='vscr-setting-11' value='<?php echo esc_attr($value); ?>' />
	<?php
}

// register section - field callbacks
function vscr_field_callback_12() {
	$value = get_option( 'vscr-setting-12' );
	?>
	<input type='number' size='12' name='vscr-setting-12' value='<?php echo esc_attr($value); ?>' />
	<?php
}

// display admin options page
function vscr_options_page() {
?>
<div class="wrap">
	<h1><?php esc_attr_e( 'VS Custom Redirects', 'very-simple-custom-redirects' ); ?></h1>
	<?php $redirect_values = array(
		get_option( 'vscr-setting-1' ),
		get_option( 'vscr-setting-2' ),
		get_option( 'vscr-setting-3' ),
		get_option( 'vscr-setting-4' ),
		get_option( 'vscr-setting-5' ),
		get_option( 'vscr-setting-6' ),
		get_option( 'vscr-setting-7' ),
		get_option( 'vscr-setting-8' ),
		get_option( 'vscr-setting-9' ),
		get_option( 'vscr-setting-10' ),
		get_option( 'vscr-setting-11' ),
		get_option( 'vscr-setting-12' )
	);
	$redirect = false;
	foreach ($redirect_values as $redirect_value) {
		if (!empty($redirect_value)) {
			$redirect = true;
		}
	}
	if ($redirect == true) { ?>
		<p style="padding:5px 10px;border-bottom:5px solid #008000;background:#00a32a;color:#fff;font-size:1.2em;"><?php esc_attr_e( 'Redirect is active.', 'very-simple-custom-redirects' ); ?></p>
	<?php } ?>
	<form action="options.php" method="POST">
	<?php settings_fields( 'vscr-options' );
	do_settings_sections( 'vscr' );
	submit_button(); ?>
	</form>
</div>
<?php
}
