<?php
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );
// define('FS_METHOD','direct');
define( 'WHITE_LABEL', false );
define( 'STATIC_IN_CHILD', false );
function long_content($text){
  if(strlen($text) >=110){
    $cut= substr($text,0, 110);
    return substr($cut,0, strrpos($cut," ")).'...';
  }else return $text;
}
function long_content3 ($text, $number){
  if(strlen($text) >=$number){
    $cut= substr($text,0, $number);
    return substr($cut,0, strrpos($cut," ")).'...';
  }else return $text;
}
add_action( 'wp_enqueue_scripts', 'mfnch_enqueue_stylesmb');
function mfnch_enqueue_stylesmb() {
	if(!is_admin() && (is_home() || is_front_page())) {
		wp_enqueue_style( 'basehomecssmb', CHILD_THEME_URI . '/assets/basehome.css', '',false,'all');
	}else {
		wp_enqueue_style( 'basecssmb', CHILD_THEME_URI . '/assets/base.css', '',false,'all');
	}
	wp_enqueue_style( 'shortcodescssmb', CHILD_THEME_URI . '/assets/shortcodes.css', '',false,'all');
	if((is_home() || is_front_page())) {
		wp_enqueue_style( 'layoutcsshomemb', CHILD_THEME_URI . '/assets/layouthome.css', '',false,'all');
		wp_enqueue_style( 'responsivehomemb', CHILD_THEME_URI . '/assets/responsivehome.css', '',false,'all');
	}else {
		wp_enqueue_style( 'layoutcssmb', CHILD_THEME_URI . '/assets/layout.css', '',false,'all');	
	}
}
add_action( 'wp_enqueue_scripts', 'mfnch_enqueue_styles', 101 );
function mfnch_enqueue_styles() {
	// Enqueue the parent stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'mfn-rtl', CHILD_THEME_URI . '/rtl.css' );
	}
	// Enqueue the child stylesheet
	wp_dequeue_style('mfn-animations');
	wp_dequeue_style('mfn-jquery-ui');
	wp_dequeue_style('mfn-jplayer');
	wp_dequeue_style('mfn-base');
	wp_dequeue_style('style');
	wp_enqueue_script( 'customjsgb', CHILD_THEME_URI . '/assets/js/custom.js', array('jquery'),false,false);
	wp_enqueue_style('globalcssmb', CHILD_THEME_URI . '/assets/global.css' ,'', false,'all');
	if((is_home() || is_front_page())) {
		wp_dequeue_style('toc-screen');
		wp_dequeue_style('mfn-shortcodes');
		wp_dequeue_style('mfn-layout');
		wp_dequeue_style('mfn-responsive');
		wp_enqueue_style('stylehomemb', CHILD_THEME_URI . '/assets/stylehome.css' );
		wp_enqueue_style('homecssmb', CHILD_THEME_URI . '/assets/home.css' ,'', false,'all');
		// wp dequeue script
		wp_dequeue_script('jquery-animations');
		wp_dequeue_script('jquery-plugins');
		wp_dequeue_script('jquery-jplayer');
		wp_dequeue_script('toc-front');
		wp_dequeue_script('jquery-mfn-parallax');
		wp_dequeue_script('jquery-smoothscroll');
		wp_dequeue_script('jquery-scripts');
		wp_deregister_script('jquery-ui-widget');
		wp_deregister_script('wp-embed');
		wp_enqueue_script( 'scriptsjshome', CHILD_THEME_URI . '/assets/js/scripts.js', array('jquery-mfn-menu'),false,false );
		// Remove emoji
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
		include_once ('functions/post.php');
		// Load More
		wp_register_script( 'loadmorehome', CHILD_THEME_URI . '/assets/js/myloadmore.js', array('jquery') );
		wp_localize_script( 'loadmorehome', 'lionel_loadmore_params', array(
		        'ajaxurl' => admin_url('admin-ajax.php'),
		        'currentpaged' => get_query_var( 'page' ) ? get_query_var('page') : 1
		    ) 
		);
		wp_enqueue_script( 'loadmorehome' );
	}else {
		wp_enqueue_style('stylemb', CHILD_THEME_URI . '/assets/style.css' );
	}
	if(is_single()) {
		wp_enqueue_style('slidercssmb', CHILD_THEME_URI . '/assets/slider/slider.css' ,'', false,'all');
		wp_enqueue_script('sliderjsmb', CHILD_THEME_URI . '/assets/slider/slider.js' ,array('jquery'), false);
		wp_enqueue_style( 'lifontawesome', get_theme_file_uri( '/fontawesome/css/font-awesome.css' ), '', '4.7.0' );
	}
}
include_once ('functions/loadmore.php');
add_action( 'after_setup_theme', 'mfnch_textdomain' );
function mfnch_textdomain() {
    load_child_theme_textdomain( 'betheme',  get_stylesheet_directory() . '/languages' );
    load_child_theme_textdomain( 'mfn-opts', get_stylesheet_directory() . '/languages' );
}
if ( ! function_exists( 'disable_gutenberg' ) ) {
	function disable_gutenberg() {

		 global $wp_filter;

		 $callbacks_array = $wp_filter['init']->callbacks;

		 foreach( $wp_filter as $tag => $priorities ) {
			 foreach( $priorities->callbacks as $priority => $callback_data ) {
				 foreach( $callback_data as $callback_function_name => $callback_function_data ) {

					if ( strpos( $callback_function_name, 'disable_gutenberg' ) !== false ){
						continue;
					}

					// Gutenberg disabler
					if ( strpos( $callback_function_name, 'gutenberg' ) !== false || strpos( $callback_function_name, 'block_editor' ) ){

						remove_filter( $tag, $callback_function_name, $priority );

					}

				 }
			 }
		 }

		 $wp_filter['init']->callbacks = $callbacks_array;

		 add_filter( 'use_block_editor_for_post_type', '__return_false' );
	}
}
add_action( 'admin_init', 'disable_gutenberg' );