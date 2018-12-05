<?php 

	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	function deregister_cf7_scripts() {
		if ( !is_page(178) ) {
		wp_deregister_script('contact-form-7');
		}
	}
add_action('wp_print_scripts', 'deregister_cf7_scripts', 100);
 
	function deregister_cf7_styles() {
		if ( !is_page(178) ) {
		wp_deregister_style('contact-form-7');
		}
	}
add_action('wp_print_styles', 'deregister_cf7_styles', 100);
	
	function true_style_frontend() {
 		wp_enqueue_style( 'true_style', get_stylesheet_directory_uri() . '/main.min.css' );
	}
	add_action( 'wp_enqueue_scripts', 'true_style_frontend' );

	function my_scripts_method(){
		wp_enqueue_script( 'newscript', get_template_directory_uri() . '/js/scripts.min.js');
		wp_enqueue_script( 'mask', get_template_directory_uri() . '/js/jquery.maskedinput.min.js');
	}
	add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
	
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
		'page_title' 	=> 'Головні настройки сайту',
		'menu_title'	=> 'Головні настройки',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'manage_options',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки шапки',
		'menu_title'	=> 'Хедер сайту',
		'menu_slug' 	=> 'header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки головної секції',
		'menu_title'	=> 'Головна секція',
		'menu_slug' 	=> 'main',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки подвала',
		'menu_title'	=> 'Футер сайту',
		'menu_slug' 	=> 'footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	}

	/**
 * Обрезка текста (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
 *
 * @param string/array $args Параметры.
 *
 * @return string HTML
 *
 * @ver 2.6.3
 */
function kama_excerpt( $args = '' ){
	global $post;

	if( is_string($args) )
		parse_str( $args, $args );

	$rg = (object) array_merge( array(
		'maxchar'   => 350,   // Макс. количество символов.
		'text'      => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
							  // Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется все до <!--more--> вместе с HTML.
		'autop'     => true,  // Заменить переносы строк на <p> и <br> или нет?
		'save_tags' => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
		'more_text' => 'Читати далі...', // Текст ссылки `Читать дальше`.
	), $args );

	$rg = apply_filters( 'kama_excerpt_args', $rg );

	if( ! $rg->text )
		$rg->text = $post->post_excerpt ?: $post->post_content;

	$text = $rg->text;
	$text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text ); // убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
	$text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text ); // убираем шоткоды: [singlepic id=3]. Учитывает markdown
	$text = trim( $text );

	// <!--more-->
	if( strpos( $text, '<!--more-->') ){
		preg_match('/(.*)<!--more-->/s', $text, $mm );

		$text = trim( $mm[1] );

		$text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
	}
	// text, excerpt, content
	else {
		$text = trim( strip_tags($text, $rg->save_tags) );

		// Обрезаем
		if( mb_strlen($text) > $rg->maxchar ){
			$text = mb_substr( $text, 0, $rg->maxchar );
			$text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1 ...', $text ); // убираем последнее слово, оно 99% неполное
		}
	}

	// Сохраняем переносы строк. Упрощенный аналог wpautop()
	if( $rg->autop ){
		$text = preg_replace(
			array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
			array('',     '</p><p>',  '<br />', '</p>'),
			$text
		);
	}

	$text = apply_filters( 'kama_excerpt', $text, $rg );

	if( isset($text_append) )
		$text .= $text_append;

	return ( $rg->autop && $text ) ? "<p>$text</p>" : $text;
}

?>