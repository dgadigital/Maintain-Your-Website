<?php



function maintain_enqueue_styles() {
    $theme_uri = get_template_directory_uri();

    // Enqueue your compiled CSS from src/styles/
    wp_enqueue_style(
        'main-style',
        $theme_uri . '/src/styles/main.min.css',
        [],
        filemtime(get_template_directory() . '/src/styles/main.min.css'),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'maintain_enqueue_styles');

function maintain_enqueue_scripts_manual() {
    $theme_uri = get_template_directory_uri();
    $theme_dir = get_template_directory();

    // Load jQuery from WordPress core
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'base',
        $theme_uri . '/src/scripts/core/base.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/core/base.js'),
        true
    );
    wp_enqueue_script(
        'theme-module',
        $theme_uri . '/src/scripts/modules/theme-module.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/modules/theme-module.js'),
        true
    );

    // Scripts: vendors → core → modules
    wp_enqueue_script(
        'bootstrap',
        $theme_uri . '/src/scripts/vendors/bootstrap.min.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/vendors/bootstrap.min.js'),
        true
    );

    wp_enqueue_script(
        'popper',
        $theme_uri . '/src/scripts/vendors/popper.min.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/vendors/popper.min.js'),
        true
    );

    wp_enqueue_script(
        'slick',
        $theme_uri . '/src/scripts/vendors/slick.min.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/vendors/slick.min.js'),
        true
    );

    wp_enqueue_script(
        'swiper',
        $theme_uri . '/src/scripts/vendors/swiper.min.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/vendors/swiper.min.js'),
        true
    );

    wp_enqueue_script(
        'non-responsive',
        $theme_uri . '/src/scripts/non-responsive.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/non-responsive.js'),
        true
    );

    wp_enqueue_script(
        'bootstrapper',
        $theme_uri . '/src/scripts/bootstrapper.js',
        ['jquery'],
        filemtime($theme_dir . '/src/scripts/bootstrapper.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'maintain_enqueue_scripts_manual');




add_theme_support('post-thumbnails');
add_theme_support('custom-logo', [
  'height'      => 100,
  'width'       => 400,
  'flex-height' => true,
  'flex-width'  => true,
]);




function custom_excerpt_chars($text, $max = 100) {
  $text = wp_strip_all_tags($text);
  return mb_strlen($text) > $max ? mb_substr($text, 0, $max) . '...' : $text;
}

register_nav_menu('primary_menu', __('Primary Menu'));
require get_template_directory() . '/includes/class-custom-walker-nav.php';


register_nav_menus([
  'footer_menu_1' => 'Footer Menu 1',
  'footer_menu_2' => 'Footer Solutions Submenu',
  'footer_menu_3' => 'Footer Platform Submenu',
]);

class Walker_Nav_Flat extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = []) {
    // No submenus
  }

  function end_lvl(&$output, $depth = 0, $args = []) {
    // No submenus
  }

  function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
    $classes = !empty($item->classes) ? implode(' ', array_filter($item->classes)) : '';
    $title = apply_filters('the_title', $item->title, $item->ID);
    $url = $item->url;
    $output .= '<a href="' . esc_url($url) . '" class="' . esc_attr($classes) . '">' . esc_html($title) . '</a>';
  }

  function end_el(&$output, $item, $depth = 0, $args = []) {
    // No closing tags needed
  }
}

add_action('init', function () {
  global $wp_post_types;

  if (isset($wp_post_types['testimonials'])) {
    $wp_post_types['testimonials']->rewrite['with_front'] = true;
    $wp_post_types['testimonials']->rewrite['slug'] = 'testimonials';
    $wp_post_types['testimonials']->has_archive = true;
  }
});


add_action('init', function () {
  global $wp_post_types;

  if (isset($wp_post_types['blogs'])) {
    $wp_post_types['blogs']->rewrite['with_front'] = true;
    $wp_post_types['blogs']->rewrite['slug'] = 'blogs';
    $wp_post_types['blogs']->has_archive = true;
  }
});

add_filter('wpcf7_autop_or_not', '__return_false');

 /////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////////////////////






?>