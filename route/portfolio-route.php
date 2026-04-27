<?php
function register_portfolio_taxonomy() {
    register_taxonomy('portfolio_type', 'portfolio', array(
        'label' => 'Portfolio Categories',
        'rewrite' => array('slug' => 'portfolio-type'),
        'hierarchical' => true, 
        'show_admin_column' => true,
    ));
}
add_action('init', 'register_portfolio_taxonomy');

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/portfolio', array(
        'methods' => 'GET',
        'callback' => 'get_portfolio_items',
    ));
});

function get_portfolio_items($data) {
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
    );

    if (isset($data['category']) && $data['category'] !== 'All') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_type',
                'field'    => 'slug',
                'terms'    => $data['category'],
            ),
        );
    }

    $posts = get_posts($args);
    $results = [];

    foreach ($posts as $post) {
        $results[] = [
            'id'          => $post->ID,
            'title'       => get_the_title($post->ID),
            'description' => get_field('description', $post->ID),
            'img_url'     => get_the_post_thumbnail_url($post->ID, 'medium_large'),
            'github'      => get_field('github', $post->ID),
            'live_url'    => get_field('live_view', $post->ID),
        ];
    }
    return $results;
}