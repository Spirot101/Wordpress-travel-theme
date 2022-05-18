<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content ="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="container">
    <h1 class="school-logo-text float-left">
      <a href="<?php echo site_url() ?>"><strong>OLKA Sportresor</strong></a>
    </h1>
    <a href="<?php echo esc_url(site_url('/sok')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
    <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
    <div class="site-header__menu group">
      <nav class="main-navigation">
        <ul>
          <li><a href="<?php echo site_url() ?>">Hem</a></li>
          <li><a href="<?php echo site_url('travel-matches') ?>">Träningsresor</a></li>
          <li><a href="<?php echo site_url('travel-cup') ?>">Cuper</a></li>
          <li><a href="<?php echo site_url('travel-soccer') ?>">Fotbollsresor</a></li>
          <li><a href="<?php echo site_url('travel-camp') ?>">Sportsresor</a></li>
        </ul>
      </nav>
      <div class="site-header__util">
        <a href="<?php echo site_url('/kontakt') ?>" class="btn btn--small btn--orange float-left push-right">Boka Resa</a>
        <a href="<?php echo esc_url(site_url('/sok')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</header>