<?php

require get_theme_file_path('/route/workExperience-route.php');
require get_theme_file_path('/route/portfolio-route.php');
require get_theme_file_path('/custom-post-types/custom_post_types.php');

function register_skills_taxonomy() {
    register_taxonomy('skill_category', 'skills', array(
        'label'        => 'Skill Categories',
        'rewrite'      => array('slug' => 'skill-category'),
        'hierarchical' => true, // Set to true to act like standard categories
        'show_in_rest' => true, // Enables Gutenberg support
    ));
}
add_action('init', 'register_skills_taxonomy');
function resumeCV_files() {
  
  // css style
  wp_enqueue_style('main-resumeCV-styles', get_theme_file_uri('/src/css/header.css'));
  wp_enqueue_style('workExperience-resumeCV-styles', get_theme_file_uri('/src/css/workExperience.css'));
  wp_enqueue_style('portfolio-resumeCV-styles', get_theme_file_uri('/src/css/portfolio.css'));
  wp_enqueue_style('bottom-menu-resumeCV-styles', get_theme_file_uri('/src/css/bottom-menu.css'));
  
  //js file 
  wp_enqueue_script('main-resumeCV-js', get_theme_file_uri('/src/js/index.js'), array('jquery'), '1.0', true);

  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  
  wp_localize_script('main-resumeCV-js', 'resumeCVData', array(
    'root_url' => esc_url(home_url()),
    'nonce' => wp_create_nonce('wp_rest')
  ));
 

}
add_action('wp_enqueue_scripts', 'resumeCV_files');

// makes index.js a module
function add_module_attribute($tag, $handle, $src) {
 
  if ('main-resumeCV-js' === $handle) {
      $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
  }
  return $tag;
}
add_filter('script_loader_tag', 'add_module_attribute', 10, 3);


// Display custom columns to the work experience post type in the admin dashboard
function addCostumFields($columns){
  $columns['location'] = __( 'Location','custom-plugin');
  $columns['company_name'] = __( 'Company','custom-plugin');
  return $columns;
}
add_filter('manage_edit-workexperience_columns','addCostumFields');

function showCustomColumn_workexperience($column){
  switch($column){
      case 'location':
          echo get_field('location');
          break;
      case 'company_name':
          echo get_field('company_name');
          break;       
  }
}
add_action('manage_workexperience_posts_custom_column','showCustomColumn_workexperience');

function add_custom_columns_educationandtraining($columns) {
  $columns['institution_title'] = __('Institution Title');
  $columns['city__country'] = __('City / Country');
  return $columns;
}
add_filter('manage_educationandtraining_posts_columns', 'add_custom_columns_educationandtraining');

function showCustomColumn_educationandtraining($column){
  switch($column){
      case 'institution_title':
          echo get_field('institution_title');
          break;
      case 'city__country':
          echo get_field('city__country');
          break;       
  }
}
add_action('manage_educationandtraining_posts_custom_column','showCustomColumn_educationandtraining');


function add_custom_columns_driving_licence($columns) {
  
  $columns['driving_licence'] = __('Driving Licence level');
  return $columns;
}
add_filter('manage_drivinglicence_posts_columns', 'add_custom_columns_driving_licence');

function showCustomColumn_drivinglicence($column){
  switch($column){
      case 'driving_licence':
          echo get_field('driving_licence');
          break;
     
  }
}
add_action('manage_drivinglicence_posts_custom_column','showCustomColumn_drivinglicence');

function custom_enter_title_here( $title ){
  $screen = get_current_screen();
  if ( 'workexperience' == $screen->post_type ) {
      $title = 'Position / Role title';
      return $title;
  }
  if ( 'educationandtraining' == $screen->post_type ) {
    $title = 'Degree title';
    return $title;
  }
  if ( 'languages' == $screen->post_type ) {
    $title = 'Language';
    return $title;
  }
  if ( 'skills' == $screen->post_type ) {
    $title = 'Skill';
    return $title;
  }
  if ( 'personalinformation' == $screen->post_type ) {
    $title = 'Full name';
    return $title;
  }
 
}
add_filter('enter_title_here', 'custom_enter_title_here');


// remove title column from driving licence post type
function remove_title_column( $columns ) {
    unset( $columns['title'] );
    return $columns;
}
add_filter( 'manage_drivinglicence_posts_columns', 'remove_title_column' );


function restrict_personalInformaiton_creation($post_data) {
  
  if ($post_data['post_type'] == 'personalinformation') {
      $query = new WP_Query(array(
          'post_type'      => 'personalinformation',
          'post_status'    => 'any',
          'posts_per_page' => 1,
      ));
      
      if ($query->found_posts >= 2 && $post_data['post_status'] != 'trash' && !is_edit_action()) {
        wp_die(__('You can only create one Single Instance post.', 'textdomain'));
      }
  }
 
  return $post_data;
}
add_filter('wp_insert_post_data', 'restrict_personalInformaiton_creation');

function resume_features() {
  add_theme_support('post-thumbnails');
  add_image_size('Portrait', 600, 800, true);
  
}
add_action('after_setup_theme', 'resume_features');

function is_edit_action() {
  
  if (isset($_GET['action']) && $_GET['action'] === 'edit') {
      return true;
  }
  return false;
}


