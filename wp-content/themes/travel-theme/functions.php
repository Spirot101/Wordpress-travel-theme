<?php

// Imports
function travel_files () {
  wp_enqueue_script('main-travel-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
  wp_enqueue_style('travel_main_styles', get_theme_file_uri('/style.css'));
  wp_enqueue_style('travel_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'travel_files');

function travel_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('imagePostSize', 480, 650, true);
}

add_action('after_setup_theme', 'travel_features');
 
  // Custom Post Types
  function travel_post_types() {
    // wcm_travel Post Type
    register_post_type('wcm_travel', array(
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
      'rewrite' => array('slug' => 'wcm-travel'),
      'has_archive' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Resor',
        'add_new_item' => 'Add New Resor',
        'edit_item' => 'Edit Resor',
        'all_items' => 'All Resor',
        'singular_name' => 'Resor'
      ),
      'menu_icon' => 'dashicons-saved'
    ));

    // travel_matches Post Type
    register_post_type('travel_matches', array(
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
      'rewrite' => array('slug' => 'travel-matches'),
      'has_archive' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Träningsresor',
        'add_new_item' => 'Add New Träningsresor',
        'edit_item' => 'Edit Träningsresor',
        'all_items' => 'All Träningsresor',
        'singular_name' => 'Träningsresor'
      ),
      'menu_icon' => 'dashicons-saved'
    ));

    // travel_cup Post Type
    register_post_type('travel_cup', array(
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
      'rewrite' => array('slug' => 'travel-cup'),
      'has_archive' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Cuper',
        'add_new_item' => 'Add New Cuper',
        'edit_item' => 'Edit Cuper',
        'all_items' => 'All Cuper',
        'singular_name' => 'Cuper'
      ),
      'menu_icon' => 'dashicons-saved'
    ));

    // travel_camp Post Type
    register_post_type('travel_camp', array(
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
      'rewrite' => array('slug' => 'travel-camp'),
      'has_archive' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Sportsresor',
        'add_new_item' => 'Add New Sportsresor',
        'edit_item' => 'Edit Sportsresor',
        'all_items' => 'All Sportsresor',
        'singular_name' => 'Sportsresor'
      ),
      'menu_icon' => 'dashicons-saved'
    ));

    // travel_soccer Post Type
    register_post_type('travel_soccer', array(
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
      'rewrite' => array('slug' => 'travel-soccer'),
      'has_archive' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Fotbollsresor',
        'add_new_item' => 'Add New Fotbollsresor',
        'edit_item' => 'Edit Fotbollsresor',
        'all_items' => 'All Fotbollsresor',
        'singular_name' => 'Fotbollsresor'
      ),
      'menu_icon' => 'dashicons-saved'
    ));

    // netr_team Post Type
    register_post_type('netr_team', array(
      'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
      'rewrite' => array('slug' => 'netr-team'),
      'has_archive' => true,
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'netr_teams',
        'add_new_item' => 'Add New netr_team',
        'edit_item' => 'Edit netr_team',
        'all_items' => 'All netr_teams',
        'singular_name' => 'netr_team'
      ),
      'menu_icon' => 'dashicons-saved'
    ));
  }

  add_action('init', 'travel_post_types');
 
//create a custom taxonomy name it subjects for your posts
function travel_taxonomy() {
  // travel_age Taxonomy
  $travel_age = array(
    'name' => _x( 'travel_ages', 'taxonomy general name' ),
    'singular_name' => _x( 'travel_age', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search travel_ages' ),
    'all_items' => __( 'All travel_ages' ),
    'parent_item' => __( 'Parent travel_age' ),
    'parent_item_colon' => __( 'Parent travel_age:' ),
    'edit_item' => __( 'Edit travel_age' ), 
    'update_item' => __( 'Update travel_age' ),
    'add_new_item' => __( 'Add New travel_age' ),
    'new_item_name' => __( 'New travel_age Name' ),
    'menu_name' => __( 'travel_ages' ),
  );
 
  register_taxonomy('travel_age',array('wcm_travel', 'travel_camp', 'travel_cup', 'page'), array(
    'hierarchical' => true,
    'labels' => $travel_age,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'travel_age' ),
  ));

  // travel_country Taxonomy
  $travel_country = array(
    'name' => _x( 'travel_countrys', 'taxonomy general name' ),
    'singular_name' => _x( 'travel_country', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search travel_countrys' ),
    'all_items' => __( 'All travel_countrys' ),
    'parent_item' => __( 'Parent travel_country' ),
    'parent_item_colon' => __( 'Parent travel_country:' ),
    'edit_item' => __( 'Edit travel_country' ), 
    'update_item' => __( 'Update travel_country' ),
    'add_new_item' => __( 'Add New travel_country' ),
    'new_item_name' => __( 'New travel_country Name' ),
    'menu_name' => __( 'travel_countrys' ),
  );
 
  register_taxonomy('travel_country',array('wcm_travel', 'travel_camp', 'travel_cup', 'travel_soccer', 'page'), array(
    'hierarchical' => true,
    'labels' => $travel_country,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'travel_country' ),
  ));

  // travel_sport_league Taxonomy
  $travel_sport_league = array(
    'name' => _x( 'travel_sport_leagues', 'taxonomy general name' ),
    'singular_name' => _x( 'travel_sport_league', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search travel_sport_leagues' ),
    'all_items' => __( 'All travel_sport_leagues' ),
    'parent_item' => __( 'Parent travel_sport_league' ),
    'parent_item_colon' => __( 'Parent travel_sport_league:' ),
    'edit_item' => __( 'Edit travel_sport_league' ), 
    'update_item' => __( 'Update travel_sport_league' ),
    'add_new_item' => __( 'Add New travel_sport_league' ),
    'new_item_name' => __( 'New travel_sport_league Name' ),
    'menu_name' => __( 'travel_sport_leagues' ),
  );
 
  register_taxonomy('travel_sport_league',array('wcm_travel', 'travel_soccer', 'travel_matches', 'page'), array(
    'hierarchical' => true,
    'labels' => $travel_sport_league,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'travel_sport_league' ),
  ));

  // travel_sport_type Taxonomy
  $travel_sport_type = array(
    'name' => _x( 'travel_sport_types', 'taxonomy general name' ),
    'singular_name' => _x( 'travel_sport_type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search travel_sport_types' ),
    'all_items' => __( 'All travel_sport_types' ),
    'parent_item' => __( 'Parent travel_sport_type' ),
    'parent_item_colon' => __( 'Parent travel_sport_type:' ),
    'edit_item' => __( 'Edit travel_sport_type' ), 
    'update_item' => __( 'Update travel_sport_type' ),
    'add_new_item' => __( 'Add New travel_sport_type' ),
    'new_item_name' => __( 'New travel_sport_type Name' ),
    'menu_name' => __( 'travel_sport_types' ),
  );
 
  register_taxonomy('travel_sport_type',array('wcm_travel', 'travel_camp', 'travel_cup', 'travel_soccer', 'page'), array(
    'hierarchical' => true,
    'labels' => $travel_sport_type,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'travel_sport_type' ),
  ));

  // travel_type Taxonomy
  $travel_type = array(
    'name' => _x( 'travel_types', 'taxonomy general name' ),
    'singular_name' => _x( 'travel_type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search travel_types' ),
    'all_items' => __( 'All travel_types' ),
    'parent_item' => __( 'Parent travel_type' ),
    'parent_item_colon' => __( 'Parent travel_type:' ),
    'edit_item' => __( 'Edit travel_type' ), 
    'update_item' => __( 'Update travel_type' ),
    'add_new_item' => __( 'Add New travel_type' ),
    'new_item_name' => __( 'New travel_type Name' ),
    'menu_name' => __( 'travel_types' ),
  );
 
  register_taxonomy('travel_type',array('wcm_travel', 'travel_camp', 'travel_cup', 'travel_matches', 'page'), array(
    'hierarchical' => true,
    'labels' => $travel_type,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'travel_type' ),
  ));
}

add_action( 'init', 'travel_taxonomy', 0 );