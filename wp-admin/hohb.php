<?php
// example on admin init, control about register_activation_hook() 
add_action( 'admin_init', 'fb_activate_plugins' );
// the exmple function
function fb_activate_plugins() {
	
	if ( ! current_user_can('activate_plugins') )
		wp_die(__('You do not have sufficient permissions to activate plugins for this site.'));
	$plugins = FALSE;
	$plugins = get_option('active_plugins'); // get active plugins
	
	if ( $plugins ) {
		// plugins to active
		$pugins_to_active = array(
			'admin-menu-editor/menu-editor.php',
			'advanced-access-manager/aam.php',
			'black-studio-tinymce-widget/black-studio-tinymce-widget.php',
			'easy-bootstrap-shortcodes/osc_bootstrap_shortcode.php',
			'hohb-options/hohb-options.php',
			'seo-image/seo-friendly-images.php',
			'visual-form-builder-pro/visual-form-builder-pro.php',
			'w3-total-cache/w3-total-cache.php',
			'wordpress-seo/index.php',
			
		);
		
		foreach ( $pugins_to_active as $plugin ) {
			if ( ! in_array( $plugin, $plugins ) ) {
				array_push( $plugins, $plugin );
				update_option( 'active_plugins', $plugins );
			}
		}
		
	} // end if $plugins

}
?>