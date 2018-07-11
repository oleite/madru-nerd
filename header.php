<?php
   /*
      Este é o template para o header (cabeçalho)

      @package madru-nerd
   */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
         <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>">
      <?php endif; ?>
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>

      <div class="header">
         <h1 class="site-title">
            <a href="<?php home_url(); ?>">
               <span class="mdn-logo"><?php // echo file_get_contents( get_stylesheet_directory_uri() . '/media/logo_mdn_prov.min.svg' ); ?></span>
               <span style="display: none"><?php bloginfo( 'name' ); ?></span>
            </a>
         </h1>

         <a href="#" class="menu-button">
            Menu
            <?xml version="1.0"?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 41.999 41.999" style="enable-background:new 0 0 41.999 41.999;" xml:space="preserve" width="9px" height="9px"><g transform="matrix(-0.989901 0 0 0.989901 41.7869 0.212074)"><path d="M36.068,20.176l-29-20C6.761-0.035,6.363-0.057,6.035,0.114C5.706,0.287,5.5,0.627,5.5,0.999v40  c0,0.372,0.206,0.713,0.535,0.886c0.146,0.076,0.306,0.114,0.465,0.114c0.199,0,0.397-0.06,0.568-0.177l29-20  c0.271-0.187,0.432-0.494,0.432-0.823S36.338,20.363,36.068,20.176z" data-original="#eee" class="active-path" fill="#eee"/></g></svg>
         </a>
      </div>

      <div class="wrapper">

         <div class="content">
