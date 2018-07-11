<?php get_header(); ?>

<!--<div class="featured-post">
   <a href="#" class="post-content">
      <span class="category">Cinema</span>
      <h2 class="title">Estréia Star Wars os ùltimos Jedi</h2>
   </a>
</div>-->




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
   ?>

                  <div class="featured-primary">
                     <div class="post-content">
                        <span class="category"><?php the_category(' | '); ?></span>
                        <h2 class="title">
                           <a href="<?php the_permalink(); ?>" title="Link para: <?php the_title_attribute(); ?>">
                              <?php the_title(); ?>
                           </a>
                           |-> <?php echo get_post_meta( get_the_id(), 'madru_featured', true); ?>
                        </h2>
                     </div>
                  </div>

      <?php endwhile; endif; ?>


   <div class="featured-secondary-posts-container">

      <?php
         //
         // madru_featured = SECONDARY
         //

         //Arg para posts com valor madru_featured = secondary
         $argsSecondary = array(
            'posts_per_page' => -2,
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
      ?>

                     <div class="featured-secondary">
                        <div class="post-content">
                           <span class="category"><?php the_category(' | '); ?></span>
                           <h2 class="title">
                              <a href="<?php the_permalink(); ?>" title="Link para: <?php the_title_attribute(); ?>">
                                 <?php the_title(); ?>
                              </a>
                              |-> <?php echo get_post_meta( get_the_id(), 'madru_featured', true); ?>
                           </h2>
                        </div>
                     </div>

         <?php endwhile; endif; ?>

   </div> <!-- .featured-secondary-posts-container -->

</div> <!-- .featured-posts-container -->


<?php

   //
   //    POSTS NORMAIS
   //

   //Arg para todos os posts que não possuem valor madru_featured
   $argsNormal = array(
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
   $queryNormal = new WP_Query($argsNormal);

   if ( $queryNormal->have_posts() ) :
         while ( $queryNormal->have_posts() ) :
               $queryNormal->the_post();
?>

               <div class="normal-post">
                  <div class="post-content">
                     <span class="category"><?php the_category(' | '); ?></span>
                     <h2 class="title">
                        <a href="<?php the_permalink(); ?>" title="Link para: <?php the_title_attribute(); ?>">
                           <?php the_title(); ?>
                        </a>
                        |-> <?php echo get_post_meta( get_the_id(), 'madru_featured', true); ?>
                     </h2>
                  </div>
               </div>

   <?php endwhile; endif; ?>







<?php get_footer(); ?>
