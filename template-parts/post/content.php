<?php
   /*
      Template post Normal (default)

      @package madru-nerd
   */

   $classes = array(
      'default-post',
   );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
   <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <?php the_post_thumbnail( 'post-thumbnail', madru_data_focus(get_the_id()) ) ?>
   </a>
   <div class="post-content">
      <h3 class="category"><?php the_category(' | '); ?></h3>
      <a href="<?php the_permalink(); ?>" title="Link para: <?php the_title_attribute(); ?>">
      <h2 class="title"><?php the_title(); ?></h2>
   </div>
</article>
