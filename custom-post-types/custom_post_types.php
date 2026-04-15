<?php


function university_post_types() {
  //Portfolio
  register_post_type('portfolio', array(
    
    'show_in_rest'=>true,
    'supports'=>array('title'),
    'rewrite' => array('slug' => 'portfolio'),
    'public' => true,
    'labels' => array(
       'add_new'            => _x('Add New', 'Portfolio item'),
       'name' => 'Portfolio',
       'add_new_item' => 'Add Portfolio item',
       'edit_item' => 'Edit Portfolio items',
       'all_items' => 'All Portfolio items',
       'singular_name' => 'Portfolio item'
    ),
    'menu_icon' => 'dashicons-portfolio'
  ));
 
  //certifications
  register_post_type('certifications', array(
    'show_in_rest'=>true,
    'supports'=>array('title'),
    'rewrite' => array('slug' => 'certifications'),
    'public' => true,
    'labels' => array(
       'add_new'            => _x('Add New', 'position'),
       'name' => 'Certifications',
       'add_new_item' => 'Add Certifications',
       'edit_item' => 'Edit Certifications',
       'all_items' => 'All Certifications',
       'singular_name' => 'Certifications'
    ),
    'menu_icon' => 'dashicons-awards'
  ));
   // Personal infor
   register_post_type('personalInformation', array(
   
     'show_in_rest' => true,
     'supports' => array('title'),
     'rewrite' => array('slug' => 'personalInformation'),
     'has_archive' => true,
     'public' => true,
     'labels' => array(
       'add_new'            => _x('Add New', 'position'),
       'name' => 'Personal Informations',
       'add_new_item' => 'Add Personal Information',
       'edit_item' => 'Edit Personal Information',
       'all_items' => 'All Personal Informations',
       'singular_name' => 'Personal Information'
     ),
     'menu_icon' => 'dashicons-portfolio'
   ));
  // Work experience
  register_post_type('WorkExperience', array(
  
    'show_in_rest' => true,
    'taxonomies' => array('category'),
    'supports' => array('title'),
    'rewrite' => array('slug' => 'workexperience'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'add_new'            => _x('Add New', 'position'),
      'name' => 'Work Experience',
      'add_new_item' => 'Add Work Experience',
      'edit_item' => 'Edit Work Experience',
      'all_items' => 'All Work Experiences',
      'singular_name' => 'Work Experience'
    ),
    'menu_icon' => 'dashicons-portfolio'
  ));
  // Education and Training
  register_post_type('EducationAndTraining', array(
    
     'show_in_rest' => true,
     'supports' => array('title'),
     'rewrite' => array('slug' => 'educationandtraining'),
     'has_archive' => true,
     'public' => true,
     'labels' => array(
       'add_new'            => _x('Add New', 'position'),
       'name' => 'Education And Training',
       'add_new_item' => 'Add Education',
       'edit_item' => 'Edit Education',
       'all_items' => 'All Education and Training',
       'singular_name' => 'Education'
     ),
     'menu_icon' => 'dashicons-welcome-learn-more'
   ));
   // Language Skills
   register_post_type('languages', array(
    
     'show_in_rest' => true,     
     'supports' => array('title'),
     'rewrite' => array('slug' => 'languages'),
     'has_archive' => true,
     'public' => true,
     'labels' => array(
       'add_new'            => _x('Add New', 'position'),
       'name' => 'Languages',
       'add_new_item' => 'Add Language',
       'edit_item' => 'Edit Language',
       'all_items' => 'All Languages',
       'singular_name' => 'Language'
     ),
     'menu_icon' => 'dashicons-flag'
   ));
   // Skills post type
   register_post_type('skills', array(
    
     'show_in_rest' => true,
     'supports' => array('title'),
     'rewrite' => array('slug' => 'skills'),
     'has_archive' => true,
     'public' => true,
     'labels' => array(
       'add_new'            => _x('Add New', 'position'),
       'name' => 'Skills',
       'add_new_item' => 'Add Skill',
       'edit_item' => 'Edit Skill',
       'all_items' => 'All Skills',
       'singular_name' => 'Skill'
     ),
     'menu_icon' => 'dashicons-admin-tools'
   ));
   // Driving Licence post type
   register_post_type('drivinglicence', array(
    
     'show_in_rest' => true,
     'supports' => array(''),
     'rewrite' => array('slug' => 'drivinglicence'),
     'has_archive' => true,
     'public' => true,
     'labels' => array(
       'add_new'            => _x('Add New', 'position'),
       'name' => 'Driving licence',
       'add_new_item' => 'Add Driving licence',
       'edit_item' => 'Edit Driving licence',
       'all_items' => 'All Driving licences',
       'singular_name' => 'Driving licence'
     ),
     'menu_icon' => 'dashicons-admin-network'
   ));
 
}

add_action('init', 'university_post_types');