<?php 
add_action('init', 'testimonial_register');

function testimonial_register() {
	$args = array(
    	
    	'labels' => array(
			'name' => __( 'Testimonials' ),
			'singular_name' => __( 'Testimonial' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Testimonial' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Testimonial' ),
			'new_item' => __( 'New Testimonial' ),
			'view' => __( 'View Testimonial' ),
			'view_item' => __( 'View Testimonial' ),
			'search_items' => __( 'Search Testimonials' ),
			'not_found' => __( 'No testimonials found' ),
			'not_found_in_trash' => __( 'No testimonials found in Trash' ),
			'parent' => __( 'Parent Testimonial' ),
		),
    	'public' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'rewrite' => array( 'slug' => 'testimonial' ),
    	'register_meta_box_cb' => 'init_metaboxes_properties',
    	'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
    );

	register_post_type( 'testimonials' , $args );
}




/* add custom testimonial taxonomy */
	

add_action('init', 'testimonial_type_register');

function testimonial_type_register() {

	$args = array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Testimonial Types' ),
			'singular_name' => __( 'Testimonial Type' ),
			'search_items' => __( 'Search Testimonial Types' ),
			'popular_items' => __( 'Popular Testimonial Types' ),
			'all_items' => __( 'All Testimonial Types' ),
			'parent_item' => __( 'Parent Testimonial Type' ),
			'edit_item' => __( 'Edit Testimonial Type' ),
			'update_item' => __( 'Edit Testimonial Type' ),
			'add_new_item' => __( 'Add New Testimonial Type' ),
			'new_item_name' => __( 'New Testimonial Type Name' ),
		),
		'rewrite' => true
	);
	
	register_taxonomy("testimonial-type", "testimonials", $args );

}

function t_excerptlength_teaser($length) {
    return 20;
}
function t_excerptlength_index($length) {
    return 15;
}
function t_excerptmore($more) {
    return '...';
}

function t_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    //$output = '<p>'.$output.'</p>';
    echo $output;
}




add_filter( 'manage_testimonials_posts_columns', 'ilc_cpt_columns' );
add_action('manage_testimonials_posts_custom_column', 'ilc_cpt_custom_column', 10, 2);

function ilc_cpt_columns($defaults) {
	$defaults['title'] = _x('Testimonial Title', 'column name');
    $defaults['testimonial-type'] = 'Testimonial Type';
    $defaults['date'] = _x('Date', 'column name');
    return $defaults;
}
function ilc_cpt_custom_column($column_name, $post_id) {
    $taxonomy = $column_name;
    $post_type = get_post_type($post_id);
    $terms = get_the_terms($post_id, $taxonomy);
 
    if ( !empty($terms) ) {
        foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
        echo join( ', ', $post_terms );
    }
    else echo '<i>No terms.</i>';
}
	

?>
