<!-- Home Page -->
<?php get_header(); ?>

<div class="page-banner">
<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/travel-hero.jpg') ?>);"></div>
<div class="page-banner__content container t-center c-white">
  <h1 class="headline headline--large">Välkommen!</h1>
  <h2 class="headline headline--medium">Vi tror du kommer gilla det här.</h2>
  <h3 class="headline headline--small">Varför kollar du inte in några <strong>resor</strong> du är intresserad av?</h3>
  <a href="<?php echo site_url('/kontakt') ?>" class="btn btn--large btn--blue">Boka Din Resa!</a>
</div>
</div>

<!-- split group one -->
<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Inkommande Resor!</h2>

      <?php 
        $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
          'posts_per_page' => 3,
          'post_type' => 'wcm_travel',
          'meta_key' => 'travel_date',
          'orderby' => 'meta_value_num',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'travel_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
          )
        ));

        while($homepageEvents->have_posts()) {
          $homepageEvents->the_post(); ?>
          <div class="event-summary">
            <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
              <span class="event-summary__month"><?php
                $eventDate = new DateTime(get_field('travel_date'));
                echo $eventDate->format('M')
              ?></span>
              <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>  
            </a>
            <div class="event-summary__content">
              <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p><?php if (has_excerpt()) {
                  echo get_the_excerpt();
                } else {
                  echo wp_trim_words(get_the_content(), 18);
                  } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs mer &raquo;</a></p>
            </div>
          </div>
        <?php }
      ?>
      <p class="t-center no-margin"><a href="<?php echo site_url('wcm-travel') ?>" class="btn btn--blue">Alla Resor</a></p>
    </div>
  </div>

  <!-- split group two -->
<div class="full-width-split__two">
  <div class="full-width-split__inner">
    <h2 class="headline headline--small-plus t-center">Nya Resor!</h2>
    
    <?php
      $today = date('Ymd');
      $homepagePosts = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'wcm_travel',
        'meta_key' => 'travel_date',
        'meta_query' => array(
          array(
            'key' => 'travel_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
          )
        )
      ));

      while ($homepagePosts->have_posts()) {
        $homepagePosts->the_post(); ?>
        <div class="event-summary">
          <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
          <span class="event-summary__month"><?php 
            $eventDate = new DateTime(get_field('travel_date'));
            echo $eventDate->format('M')
              ?></span>
            <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php if (has_excerpt()) {
                echo get_the_excerpt();
              } else {
                echo wp_trim_words(get_the_content(), 18);
                } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Läs mer &raquo;</a></p>
          </div>
        </div>
      <?php } wp_reset_postdata();
    ?>
    <p class="t-center no-margin"><a href="<?php echo site_url('wcm-travel') ?>" class="btn btn--yellow">Alla Resor</a></p>
  </div>
</div>

</div>

<!-- Alternativ -->
<div class="page-banner">
<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>);"></div>
<div class="page-banner__content container t-center c-white">
  <h2 class="headline headline--medium">Finn Dina Alternativ!</h2>
  <h3 class="headline headline--small">Kolla in alla våra alternativ till <strong>resor</strong>.</h3>
  <a href="<?php echo site_url('travel-matches') ?>" class="btn btn--large btn--blue">Träningsresor</a>
  <a href="<?php echo site_url('travel-cup') ?>" class="btn btn--large btn--yellow">Cuper</a>
  <a href="<?php echo site_url('travel-soccer') ?>" class="btn btn--large btn--blue">Fotbollsresor</a>
  <a href="<?php echo site_url('travel-camp') ?>" class="btn btn--large btn--yellow">Sportsresor</a>
</div>
</div>

<!-- Newsletter -->
<?php get_template_part('template-parts/content-newsletter'); ?>


<!-- Image Slideshow -->
<div class="hero-slider">
<div data-glide-el="track" class="glide__track">
  <div class="glide__slides">

    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg') ?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline headline--medium t-center">Transport</h2>
          <p class="t-center">Vi fixar transport till sportsevenemanget.</p>
          <p class="t-center no-margin"><a href="#" class="btn btn--blue">Läs Mer Här</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg') ?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline headline--medium t-center">Gratis Frukt</h2>
          <p class="t-center">Så mycket frukt som du orkar äta.</p>
          <p class="t-center no-margin"><a href="#" class="btn btn--blue">Läs Mer Här</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg') ?>);">
      <div class="hero-slider__interior container">
        <div class="hero-slider__overlay">
          <h2 class="headline headline--medium t-center">Löser Lunch</h2>
          <p class="t-center">Lunch med går till priset.</p>
          <p class="t-center no-margin"><a href="#" class="btn btn--blue">Läs Mer Här</a></p>
        </div>
      </div>
    </div>
    
  </div>
  <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
</div>
</div>

<?php get_footer(); ?>