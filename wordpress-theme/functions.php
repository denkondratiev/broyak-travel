<?php 
	
	add_theme_support( 'post-thumbnails' );

	function true_style_frontend() {
 		wp_enqueue_style( 'true_style', get_stylesheet_directory_uri() . '/main.min.css' );
	}
	add_action( 'wp_enqueue_scripts', 'true_style_frontend' );

	function my_scripts_method(){
		wp_enqueue_script( 'newscript', get_template_directory_uri() . '/js/scripts.min.js');
	}
	add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
	

?>