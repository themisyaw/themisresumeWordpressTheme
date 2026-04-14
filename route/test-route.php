<?php
add_action('rest_api_init', 'register_custom_route');

function register_custom_route() {
    register_rest_route('custom/v1', '/posts', array(
        'methods'  => 'GET',
        'callback' => 'workExperince_by_category',
        'permission_callback' => '__return_true' 
    ));
}

function workExperince_by_category(WP_REST_Request $request) {
    $category = $request->get_param('category'); 
    
    $args = array(
        'post_type'      => 'workexperience',
        'posts_per_page' => -1,
        'meta_key'       => 'from',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
    );

    // FIX: Use strcasecmp for a safer "All" check
    if (!empty($category) && strcasecmp($category, 'all') !== 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category', 
                'field'    => 'name',        
                'terms'    => $category,     
            ),
        );
    }

    $query = new WP_Query($args);
    $posts_data = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $posts_data[] = array(
                'title'       => get_the_title(),
                'company'     => get_field('company'),
                'location'    => get_field('location'),
                'description' => get_field('description'),
                'from'        => get_field('from'),
                'to'          => get_field('to')
            );
        }
        wp_reset_postdata();
    }
    return rest_ensure_response($posts_data);
}