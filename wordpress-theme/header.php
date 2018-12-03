<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Broyak-travel</title>

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon-180x180.png">
   
    <meta name="theme-color" content="#000">
    
    <?php wp_head(); ?>
    
</head>

<body <?php body_class(); ?> style="background-color: <?php the_field('site_main_color', 'option'); ?>" >

    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
    </div>
    
<header class="page-main-head">
  <div class="main-header">
    <div class="contacts">
      <div class="contact-item contact-tel">
       <!-- <i class="fa fa-phone" aria-hidden="true"></i>-->
        <i class="icon-phone-life"></i>
        <div class="bio"><?php the_field('phone_life', 'option'); ?></div>
      </div>
      <div class="contact-item contact-tel">
        <!--<i class="fa fa-phone" aria-hidden="true"></i>-->
        <i class="icon-phone-kvs"></i>
        <div class="bio"><?php the_field('phone_kyivstar', 'option'); ?></div>
      </div>
      <div class="contact-item contact-tel">
       <!-- <i class="fa fa-phone" aria-hidden="true"></i>-->
       <i class="icon-phone-mts"></i>
        <div class="bio"><?php the_field('phone_mtc', 'option'); ?></div>
      </div>
    </div>
    <div class="logo">
      <a href="<?php echo home_url( '/' ); ?>"><img src="<?php the_field('site_logo', 'option'); ?>"></a>
    </div>
    <div class="social">
      <a href="<?php the_field('facebook_link', 'option'); ?>" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href="<?php the_field('instagram_link', 'option'); ?>" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      <a href="mailto:<?php the_field('email_link', 'option'); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
    </div>
  </div>
  
  <div class="main-menu">
    <div id="nav-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
    
    <ul class="menu">
      <?php 
        $menuParameters = array(
          'menu'=> 'mymenu',
          'container'       => false,
          'echo'            => false,
          'before'     => '',
          'items_wrap'      => '%3$s',
          'depth'           => 0,
        );
        echo str_replace('<a', '<a class="menu-link"', wp_nav_menu($menuParameters) );     
      ?>
    </ul>
  </div>
</header><!-- End header-->
  


