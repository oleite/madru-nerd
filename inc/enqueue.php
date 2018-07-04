<?php

/*
   @package madru-nerd

   =====================
      ADMIN ENQUEUE FUNCTIONS
      Funções de enfileiramento para o Painel de Administração
   =====================
*/




/*
   =====================
      FRONT-END ENQUEUE FUNCTIONS
      Funções de enfileiramento para Front-End
   =====================
*/

function madru_load_scripts() {
   wp_enqueue_script( 'jquery' );
   wp_enqueue_style( 'madru-style', get_template_directory_uri() . '/css/madru.css', array(), '0.1', $media = 'all' );
}
add_action( 'wp_enqueue_scripts', 'madru_load_scripts');

function madru_add_google_fonts() {
   wp_enqueue_style( 'madru-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,400i,500,600,700,800,900', false);
}
add_action( 'madru_add_google_fonts', 'madru_load_scripts');
