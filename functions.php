<?php
function pineal_theme_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'pineal_theme_setup');

function pineal_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwindcss', 'https://cdn.tailwindcss.com', array(), '1.0.0');
    
    // Enqueue Lucide Icons
    wp_enqueue_style('lucide-icons', 'https://resource.trickle.so/vendor_lib/unpkg/lucide-static@0.516.0/font/lucide.css', array(), '1.0.0');
    
    // Enqueue theme stylesheet
    wp_enqueue_style('pineal-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue React
    wp_enqueue_script('react', 'https://resource.trickle.so/vendor_lib/unpkg/react@18/umd/react.production.min.js', array(), '18.0.0', true);
    wp_enqueue_script('react-dom', 'https://resource.trickle.so/vendor_lib/unpkg/react-dom@18/umd/react-dom.production.min.js', array('react'), '18.0.0', true);
    wp_enqueue_script('babel', 'https://resource.trickle.so/vendor_lib/unpkg/@babel/standalone/babel.min.js', array(), '7.0.0', true);
    
    // Enqueue theme JavaScript
    wp_enqueue_script('pineal-script', get_template_directory_uri() . '/js/theme.js', array('react', 'react-dom', 'babel'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'pineal_scripts');

// Remove admin bar for better landing page experience
add_filter('show_admin_bar', '__return_false');
?>