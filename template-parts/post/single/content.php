<?php
   /*
      Template post single

      @package madru-nerd
   */

   $classes = array(
      '',
   );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
   <div class="featured-image">
      <?php the_post_thumbnail( 'medium', madru_data_focus(get_the_id()) ) ?>
   </div>

   <div class="post-content">
      <footer class="post-footer">
         <h2 class="title"><?php the_title(); ?></h2>
         <h3 class="category"><?php the_category(' | '); ?></h3>
      </footer>
   </div>
</article>
