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

<div class="generic-content">
  <form class="search-form sok" method="get" action="<?php echo esc_url(site_url('/')); ?>">
    <label class="headline headline--medium" for="s">Utför en ny sökning:</label>
    <div class="search-form-row">
      <input placeholder="Vad leter du efter?" class="s" id="s" type="search" name="s">
      <input class="search-submit" type="submit" value="Sök">
    </div>
  </form>
</div>
  
<?php }

get_footer();

?>