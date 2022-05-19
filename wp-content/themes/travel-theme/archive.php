<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/travel-hero.jpg') ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_archive_title(); ?></h1>
    <div class="page-banner__intro">
      <h3 class="headline headline--small">Det finns något för alla! Ta en titt runt.</h3>
    </div>
    <a href="<?php echo site_url('/kontakt') ?>" class="btn btn--large btn--blue">Boka Din Resa!</a>
  </div>  
</div>

<div class="container container--narrow page-section">
<?php
  while(have_posts()) {
    the_post(); 
    get_template_part('template-parts/content-archive');
  }
    echo paginate_links();
?>


</div>


<?php get_footer(); ?>