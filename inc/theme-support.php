<?php

/*
   @package madru-nerd

   =====================
      THEME SUPPORT
   =====================
*/


// Ativar menu de navegação
function madru_register_nav_menu() {
   register_nav_menu( 'primario', 'Menu de navegação primária' );
}
add_action('after_setup_theme', 'madru_register_nav_menu');


//Post Thumbnails
add_theme_support( 'post-thumbnails' );



/*
   =====================
      THEME CUSTOM POST TYPES
   =====================
*/
