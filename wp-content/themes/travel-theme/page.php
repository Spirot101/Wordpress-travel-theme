<?php

get_header();

while(have_posts()) {
  the_post(); ?>
  
  <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/travel-hero.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title(); ?></h1>
    <div class="page-banner__intro">
      <p>Håll dig uppdaterad med våra senaste nyheter!</p>
    </div>
  </div>  
</div>

<!-- Call to action btn's -->
<div class="container container--narrow page-section">

  <div class="generic-content">
    <?php the_content(); ?>
  </div>
  
</div>
<hr class="container--narrow">
<?php comments_template(); ?>
  
<?php }

get_footer();

?>