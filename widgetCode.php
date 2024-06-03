<?php 
add_filter( 'widget_text_content', 'disable_wpautop_in_widgets' );
function disable_wpautop_in_widgets( $content ) {
remove_filter( 'widget_text_content', 'wpautop' );
return $content;s
}

// Enable shortcode execution in widgets
add_filter( 'widget_text_content', 'do_shortcode_in_widgets' );
function do_shortcode_in_widgets( $content ) {
return do_shortcode( $content );
}

// Register custom shortcodes
add_action( 'init', 'register_custom_shortcodes' );
function register_custom_shortcodes() {
add_shortcode( 'classified_widget', 'render_classified_widget' );
}

// Render the classified widget
function render_classified_widget( $atts ) {
ob_start();
get_template_part( 'classifiedWidget' );
return ob_get_clean();
}

?>