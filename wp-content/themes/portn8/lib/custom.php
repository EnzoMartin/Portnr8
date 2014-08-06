<?php

function admin(){
    wp_enqueue_script('admin', get_template_directory_uri() . '/assets/js/admin/admin.js', array('jquery'), null, true);
}

add_action('admin_enqueue_scripts', 'admin');


function afn_customize_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'afn_customize_excerpt_more');

function addStyles(){
    add_editor_style( 'assets/css/styles.min.css' );
}
add_action( 'init', 'addStyles', 0 );

function adminStyles(){
    wp_enqueue_style('customadmin', get_template_directory_uri() . '/assets/css/admin.min.css');
}

add_action('admin_head', 'adminStyles');


// Options Page Functions

function themeoptions_admin_menu()
{
    // here's where we add our theme options page link to the dashboard sidebar
    add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}

function themeoptions_update()
{
    $_POST = array_map('stripslashes_deep', $_POST);

    // this is where validation would go
    foreach($_POST as $name => $value) {
        update_option('portnr8_'.$name, $value);
    }
}

// [info_btn url="http://google.com/"]Order Now[/info_btn]
function thumbBox( $atts, $content = false) {
    $values = shortcode_atts( array(
        'title' => false,
        'link' => false
    ), $atts );


	if($content){
		$title = '';
		if($content && $values['link']){
			$title = '<a href="' . $values['url'] . '">' . $title . '</a>';
		}
	}

    return $content . ($values['title'])? '<h6 class="script">' . $values['title'] . '</h6>' : '';
}
add_shortcode( 'image', 'thumbBox' );

add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
function fb_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter('mce_css', 'editor_style');
function editor_style($url) {
    if ( !empty($url) )
        $url .= ',';

    //$url .= get_bloginfo('template_directory') . '/assets/css/admin.css';
	$url .= get_bloginfo('template_directory') . '/assets/css/styles.min.css';
	return $url;
}



function portnr8_styles( $init_array ) {
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Heading 1',
			'items' => array(
				array(
					'title' => 'Normal',
					'selector' => 'h1',
					'classes' => ''
				),
				array(
					'title' => 'Cursive',
					'selector' => 'h1',
					'classes' => 'script'
				)
			)
		),
		array(
			'title' => 'Heading 2',
			'items' => array(
				array(
					'title' => 'Normal',
					'selector' => 'h2',
					'classes' => ''
				),
				array(
					'title' => 'Cursive',
					'selector' => 'h2',
					'classes' => 'script'
				)
			)
		),
		array(
			'title' => 'Heading 3',
			'items' => array(
				array(
					'title' => 'Normal',
					'selector' => 'h3',
					'classes' => ''
				),
				array(
					'title' => 'Cursive',
					'selector' => 'h3',
					'classes' => 'script'
				)
			)
		),
		array(
			'title' => 'Heading 4',
			'items' => array(
				array(
					'title' => 'Normal',
					'selector' => 'h4',
					'classes' => ''
				),
				array(
					'title' => 'Cursive',
					'selector' => 'h4',
					'classes' => 'script'
				)
			)
		),
		array(
			'title' => 'Heading 5',
			'items' => array(
				array(
					'title' => 'Normal',
					'selector' => 'h5',
					'classes' => ''
				),
				array(
					'title' => 'Cursive',
					'selector' => 'h5',
					'classes' => 'script'
				)
			)
		),
		array(
			'title' => 'Heading 6',
			'items' => array(
				array(
					'title' => 'Normal',
					'selector' => 'h6',
					'classes' => ''
				),
				array(
					'title' => 'Cursive',
					'selector' => 'h6',
					'classes' => 'script'
				)
			)
		),
	);

	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;
}

add_filter( 'tiny_mce_before_init', 'portnr8_styles' );

function themeoptions_page()
{
    if ($_POST && $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }
    // here's the main function that will generate our options page
    ?>
    <div class="wrap">
        <div id="icon-themes" class="icon32"><br /></div>
        <h2>Theme Options</h2>
        <form id="custom-options" method="POST" action="">
            <input type="hidden" name="update_themeoptions" value="true" />
            <h3>General</h3>
            <p><input type="text" name="contactemail" id="contactemail" value="<?php echo get_option('portnr8_contactemail'); ?>"/> Contact email (used for sending emails from contact form)</p>
            <p><input type="text" name="bannerlocation" id="bannerlocation" value="<?php echo get_option('portnr8_bannerlocation'); ?>"/> URL to link the "Our Location" button to</p>
            <p><input type="text" name="bannercontactus" id="bannercontactus" value="<?php echo get_option('portnr8_bannercontactus'); ?>"/> URL to link the "Contact Us" button to</p>
            <p><input type="text" name="headerfacebook" id="headerfacebook" value="<?php echo get_option('portnr8_headerfacebook'); ?>"/> URL to link the header "Facebook" button to</p>
            <p><input type="text" name="headergoogleplus" id="headergoogleplus" value="<?php echo get_option('portnr8_headergoogleplus'); ?>"/> URL to link the header "Google+" button to</p>
            <h3>Sidebar</h3>
            <p><input type="text" name="sidebargooglemaps" id="sidebargooglemaps" value="<?php echo get_option('portnr8_sidebargooglemaps'); ?>"/> URL to link the Location image to</p>
	        <p><input type="submit" name="search" value="Update Options" class="button" /></p>
        </form>
    </div>
<?php
}



add_action('admin_menu', 'themeoptions_admin_menu');