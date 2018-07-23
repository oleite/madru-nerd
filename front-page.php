<?php

/*
   Front page

   @package madru-nerd
*/


get_header(); ?>


<div class="featured-posts-container">

   <?php
      //
      //    POSTS EM DESTAQUE
      //

      //Arg para posts com valor madru_featured = primary
      $argsPrimary = array(
         'posts_per_page' => -1,
         'meta_query' => array(
            array(
               'key' => 'madru_featured',
               'value' => 'primary'
            ),
         ),
      );

      $queryPrimary = new WP_Query($argsPrimary);

      if ( $queryPrimary->have_posts() ) :
            while ( $queryPrimary->have_posts() ) :
                  $queryPrimary->the_post();

                  get_template_part( 'template-parts/post/content-featured-primary', get_post_format() );

            endwhile;
      endif; ?>


   <div class="featured-secondary-posts-container">

      <?php
         //Arg para posts com valor madru_featured = secondary
         $argsSecondary = array(
            'posts_per_page' => -1,
            'meta_query' => array(
               array(
                  'key' => 'madru_featured',
                  'value' => 'secondary'
               ),
            ),
         );

         $querySecondary = new WP_Query($argsSecondary);

         if ( $querySecondary->have_posts() ) :
               while ( $querySecondary->have_posts() ) :
                     $querySecondary->the_post();

                     get_template_part( 'template-parts/post/content-featured-secondary', get_post_format() );

               endwhile;
         endif; ?>

   </div> <!-- .featured-secondary-posts-container -->

</div> <!-- .featured-posts-container -->





   <div class="row-container">
      <div class="row-title">Últimos vídeos</div>
      <div class="row-content">

         <div class="slider">
            <div class="slider-scroll">
               <div class="slider-content">
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
                  <div class="slider-item">
                     <div class="slider-item-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/media/stand-by.png" />
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>












<?php

   //
   //    POSTS NORMAIS (DEFAULT)
   //

   //Arg para todos os posts que não possuem valor madru_featured
   $argsDefault = array(
      'posts_per_page' => -1,
      'meta_query' => array(
         'relation' => 'OR',
         array(
            'key' => 'madru_featured',
            'compare' => 'NOT EXISTS',
            'value' => ''
         ),
         array(
            'key' => 'madru_featured',
            'value' => 'none'
         ),
      ),
   );

   //Query custom
   $queryDefault = new WP_Query($argsDefault);

   if ( $queryDefault->have_posts() ) :
         while ( $queryDefault->have_posts() ) :
               $queryDefault->the_post();

               get_template_part( 'template-parts/post/content', get_post_format() );

         endwhile;
   endif; ?>







<?php get_footer(); ?>
