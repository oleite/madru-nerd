<?php
   /*
      Template post Em Destaque Secundário

      @package madru-nerd
   */

   $classes = array(
      'featured-post',
      'featured-secondary'
   );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
   <div class="post-content">
      <a class="featured-image responsify" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
         <?php the_post_thumbnail( 'post-thumbnail', madru_data_focus(get_the_id()) ) ?>
      </a>
      <footer class="post-footer">
         <h3 class="category"><?php the_category(' | '); ?></h3>
         <h2 class="title"><?php the_title(); ?></h2>
      </footer>
   </div>
</article>
