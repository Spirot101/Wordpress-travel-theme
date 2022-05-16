<?php
  
get_header();

while(have_posts()) {
  the_post(); ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/travel-hero.jpg') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>Det finns något för alla! Ta en titt runt.</p>
      </div>
    </div>  
  </div>

  <!-- Call to action btn's -->
  <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">

      <a class="metabox__archive-home-link" href="<?php echo site_url('travel-matches') ?>"><i class="fa fa-dumbbell" aria-hidden="true"></i> Träningsresor</a>
    </div>

    <!-- content and image -->
    <div class="generic-content">
      <div class="row group">
        <div class="one-third">
          <?php the_post_thumbnail('imagePostSize'); ?>
        </div>
        <div class="two-thirds">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

  </div>

  
  <!-- split group one -->
<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <h2 class="headline headline--small-plus t-center">Inkommande Träningsresor!</h2>

      <?php 
        $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
          'posts_per_page' => 3,
          'post_type' => 'travel_matches',
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
      <p class="t-center no-margin"><a href="<?php echo site_url('travel-matches') ?>" class="btn btn--blue">Alla Träningsresor</a></p>
    </div>
  </div>

  <!-- split group two -->
<div class="full-width-split__two">
  <div class="full-width-split__inner">
    <h2 class="headline headline--small-plus t-center">Nya Träningsresor!</h2>
    
    <?php
      $today = date('Ymd');
      $homepagePosts = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'travel_matches',
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
    <p class="t-center no-margin"><a href="<?php echo site_url('travel-matches') ?>" class="btn btn--yellow">Alla Träningsresor</a></p>
  </div>
</div>

</div>

<!-- Newsletter -->
<?php get_template_part('template-parts/content-newsletter'); ?>

<?php }

get_footer(); ?>