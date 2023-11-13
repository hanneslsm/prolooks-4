<?php
/**
 * prolooks functions and definitions
 * 
 * @package prolooks
 * @since 1.0
 */


// Setup
require get_template_directory() . '/inc/setup.php';

// Enqueue files
require get_template_directory() . '/inc/enqueuing.php';




// Enqueue css assets
function enqueue_prolooks_styles() {
    $directory = get_template_directory() . '/assets/styles/';
    $styles = glob($directory . '*.css');

    foreach ($styles as $style) {
        $file = basename($style);
        wp_enqueue_style($file, get_template_directory_uri() . '/assets/styles/' . $file);
    }
}

function enqueue_editor_styles() {
    $directory = get_template_directory() . '/assets/styles/';
    $styles = glob($directory . '*.css');

    foreach ($styles as $style) {
        $file = basename($style);
        add_editor_style(get_template_directory_uri() . '/assets/styles/' . $file);
    }
}

add_action('wp_enqueue_scripts', 'enqueue_prolooks_styles'); // For frontend
add_action('enqueue_block_editor_assets', 'enqueue_editor_styles'); // For block editor
