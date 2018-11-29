<?php
/*
 * Template Name: Шаблон - Головна
 */

get_header();
?>

	<?php 
    $menuParameters = array(
      'menu'=> 'mymenu',
      'container'       => false,
      'echo'            => false,
      'items_wrap'      => '%3$s',
      'depth'           => 0,
    );
    echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
             ?>
<br>
<br>
<br>
<br>
	Головна
<br>
<br>
<br>
<br>

	


<?php get_footer(); ?>
