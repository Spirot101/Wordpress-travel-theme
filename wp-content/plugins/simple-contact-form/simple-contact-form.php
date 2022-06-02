<?php
/* 
* Plugin Name: Simple Contact Form
* Description: My own simple contact form
* Author: Erik Berger
* Author URI: http://onepager.ber-ger.one/
* Version: 1.0
* Text Domain: simple-contact-form
*/

// Basic security
if(!defined('ABSPATH')) {
  echo 'What are you trying to do?';
  exit;
}

// My main class
class SimpleContactForm {

  public function __construct()
  {
    // Create custom post type
    add_action('init', array($this, 'create_custom_post_type'));

    // Add assets (js, css, etc)
    add_action('wp_enqueue_scripts', array($this, 'load_assets'));

    // Add shortcode
    add_shortcode('contact-form', array($this, 'load_shortcode'));

    // Load JavaScript
    add_action('wp_footer', array($this, 'load_scripts'));

    // Register REST API
    add_action('rest_api_init', array($this, 'register_rest_api'));
  }

  public function create_custom_post_type() 
  {
    $args = array(
      'public' => true,
      'has_archive' => true,
      'supports' => array('title'),
      'exclude_from_search' => true,
      'publicly_queryable' => false,
      'capability' => 'manage_options',
      'labels' => array(
        'name' => 'Contact Form',
        'singular_name' => 'Contact Form Entry',
      ),
      'menu_icon' => 'dashicons-media-text'
    );

    register_post_type('simple_contact_form', $args);
  }

  // Loading styles
  public function load_assets() 
  {
    wp_enqueue_style(
      'simple-contact-form', 
      plugin_dir_url( __FILE__ ) . 'css/simple-contact-form.css',
      array(),
      1,
      'all'
    );

    wp_enqueue_script( 
      'simple-contact-form',
      plugin_dir_url( __FILE__ ) . 'js/simple-contact-form.js',
      array('jquery'), 
      1, 
      true 
    );
  }

  public function load_shortcode() 
  // One option, Can write HTML with return
  { ?>
    <div class="simple-contact-form">
      <h3>Skicka oss ett Email</h3>
      <p>Vänligen fyll i formuläret nedan</p>

      <form id="simple-contact-form__form">

        <div class="form-group mb-2">
          <input name="name" type="text" placeholder="Namn" class="form-control" required>
        </div>
        
        <div class="form-group mb-2">
          <input name="email" type="email" placeholder="Email" class="form-control" required>
        </div>

        <div class="form-group mb-2">
          <input name="phone" type="tel" placeholder="Mobilnummer" class="form-control">
        </div>

        <div class="form-group mb-2">
          <textarea name="message" rows="5" placeholder="Skriv ditt meddelande"></textarea>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success btn-block">Kontakta oss</button>
        </div>

      </form>
    </div>
  <?php }

  public function load_scripts() 
  {?>
    <script>

      var nonce = '<?php echo wp_create_nonce('wp_rest'); ?>';

      (function($) {

        $('#simple-contact-form__form').submit(function(event) {

          event.preventDefault();

          var form = $(this).serialize();

          $.ajax({

            method:'post',
            url: '<?php echo get_rest_url(null, 'simple-contact-form/v1/send-email');?>',
            headers: {'X-WP-Nonce': nonce},
            data: form

          })

        });

      })(jQuery)
      
    </script>
  <?php }

  public function register_rest_api()
  {
    register_rest_route('simple-contact-form/v1', 'send-email',
      array(
        'methods' => 'POST',
        'callback' => array($this, 'handle_contact_form')
      ));
  }
  

  public function handle_contact_form($data) 
  {
    $headers = $data->get_headers();
    $params = $data->get_params();
    $nonce = $headers['x_wp_nonce'][0];

    if(!wp_verify_nonce($nonce, 'wp_rest')) 
    {
      return new WP_REST_Response('Message not sent', 422);
    }

    $post_id = wp_insert_post([

      'post_type' => 'simple_contact_form',
      'post_title' => 'Contact enquiry',
      'post_status' => 'publish'
    ]);

    if($post_id) 
    {
      return new WP_REST_Response('Thank you for your email', 200);
    }

  }

}

new SimpleContactForm;