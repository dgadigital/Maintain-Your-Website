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


register_nav_menus([
  'primary' => __('Primary Menu', 'yourtheme')
]);

















?>