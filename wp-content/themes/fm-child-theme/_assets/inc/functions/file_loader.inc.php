<?php
// == Enqueue Site Styles ==================================================
	function cb_enqueue_site_styles()
	{
		// Register main site stylesheet
		wp_register_style('fm-site-styles', get_stylesheet_directory_uri(). '/_assets/css/site.css', array(), null, 'all');

		// Register custom site stylesheet
		// wp_register_style('fm-custom-site-styles', get_stylesheet_directory_uri(). '/_assets/css/custom.css', array('fm-site-styles'), null, 'all');

		// Enqueue StyleSheets
		wp_enqueue_style('fm-site-styles');
		// wp_enqueue_style('fm-custom-site-styles');
	} // cb_enqueue_site_styles()
	add_action('wp_enqueue_scripts', 'cb_enqueue_site_styles');


// == Enqueue Site Scripts =================================================
	function cb_enqueue_site_scripts()
	{
		// Unregister and re-register jQuery
		// wp_deregister_script('jquery');
		// wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js',null, '1.8.2', true);

		// Register site main script
		// wp_register_script('fm-site-script', get_stylesheet_directory_uri(). '/_assets/js/site.js', array('jquery'), null, true);

		// Register site coffee script
		wp_register_script('fm-coffee-script', get_stylesheet_directory_uri(). '/_assets/js/coffee/coffee.js', array('jquery'), null, true);

		// Register Pikaday
		// $('.datepicker').pikaday({ firstDay: 1 });
		// Uncomment/Compile pikaday.less in site.less
		// wp_register_script('fm-pikaday-js',get_stylesheet_directory_uri(). '/_assets/js/libs/pikaday.jquery.min.js', array('jquery'), true);

		// Register TimeAgo
		/* http://timeago.yarp.com/
			title="ISO 8601 time stamp"
			<abbr class="timeago" title="2008-07-17T09:24:17Z">July 17, 2008</abbr>
			jQuery("abbr.timeago").timeago();  */
		// wp_register_script('fm-timeago-js', get_stylesheet_directory_uri(). '/wp-content/themes/fm-child-theme/_assets/js/libs/jquery.timeago.js', array('jquery'), true);

		// Register Retina.js
		// Uncomment/Compile retina.less in site.less
		// wp_register_script('fm-retina-js', get_stylesheet_directory_uri(). '/wp-content/themes/fm-child-theme/_assets/js/libs/retina.js', null, true);

		// Register Prefix-Free
		// wp_register_script('fm-prefix-free', get_stylesheet_directory_uri(). '/_assets/js/libs/prefixfree.min.js', null, false);

		// Enqueue Scripts
		// wp_enqueue_script('jquery');
		// wp_enqueue_script('fm-site-script');
		wp_enqueue_script('fm-coffee-script');
		// wp_enqueue_script('fm-retina-js');
		// wp_enqueue_script('fm-prefix-free');
		// wp_enqueue_script('fm-timeago-js');
		wp_enqueue_script('fm-pikaday-js');

	} // cb_enqueue_site_scripts()
	add_action('wp_enqueue_scripts', 'cb_enqueue_site_scripts');


// == Add Favicon .ico =====================================================
	function cb_add_favicon()
	{
		echo '<link rel="shortcut icon" href="'.get_stylesheet_directory_uri().'/_assets/img/icons/favicon.ico" />';
	} // cb_add_favicon()
	// Add to all front end pages
	add_action('wp_head', 'cb_add_favicon');
	// Add to login
	add_action('login_head', 'cb_add_favicon');


// == HTML 5 Shim ===========================================================
	function cb_add_ie_html5_shim () {
		global $is_IE;
		if ($is_IE)
	   	echo '<!--[if lt IE 9]>';
	    	echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
	    	echo '<![endif]-->';
	}
	add_action('wp_head', 'cb_add_ie_html5_shim');


// == jQuery in Footer ======================================================
	function cb_print_jquery_in_footer($scripts) {
		if (!is_admin()) $scripts->add_data( 'jquery', 'group', 1 );
	} // cb_print_jquery_in_footer(&$scripts)
	// add_action( 'wp_default_scripts', 'cb_print_jquery_in_footer' );


// == Admin StyleSheet ================================================
	function cb_add_admin_stylesheet()
	{
		wp_register_style('fm-admin-styles', get_stylesheet_directory_uri() . '/_assets/css/admin.css');
		wp_enqueue_style('fm-admin-styles');
	} // cb_add_admin_stylesheet()


