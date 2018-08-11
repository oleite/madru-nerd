<?php
   /*
      Template post single

      @package madru-nerd
   */

   $classes = array(
      'post-single',
   );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
   <div class="featured-image responsify-min800">
      <?php the_post_thumbnail( 'large', madru_data_focus(get_the_id()) ) ?>
   </div>

   <div class="post-main">
      <div class="post-header">
         <h3 class="category"><?php the_category(' | '); ?></h3>
         <h1 class="title"><?php the_title(); ?></h1>

         <div class="post-signature">
            <p class="author">por <?php the_author(); ?></p>
            <p class="date">Publicado em <?php the_time('j \d\e F \d\e Y'); ?></p>
         </div>
      </div>

      <div class="post-content">
         <?php the_content(); ?>
      </div>

      <footer class="post-footer">

      </footer>
   </div>


</article>
