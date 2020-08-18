<?php
// Register Custom Prospects
function custom_post_prospect() {
  $labels = array(
    'name'               => _x( 'Prospects', 'post type general name' ),
    'singular_name'      => _x( 'Prospect', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'prospect' ),
    'add_new_item'       => __( 'Add New Prospect' ),
    'edit_item'          => __( 'Edit Prospect' ),
    'new_item'           => __( 'New Prospect' ),
    'all_items'          => __( 'All Prospects' ),
    'view_item'          => __( 'View Prospect' ),
    'search_items'       => __( 'Search Prospects' ),
    'not_found'          => __( 'No Prospects found' ),
    'not_found_in_trash' => __( 'No Prospects found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Prospects'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Prospects and Prospect specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'thumbnail', 'author' ),
    'has_archive'   => true,
    'map_meta_cap' => true,
    'show_in_rest' => true,
    'capability_type' => 'prospect',
    'capabilities' => [
        'edit_post'          => 'edit_prospect', 
        'read_post'          => 'read_prospect', 
        'delete_post'        => 'delete_prospect', 
        'edit_posts'         => 'edit_prospects', 
        'edit_others_posts'   => 'edit_others_prospects', 
        'publish_posts'      => 'publish_prospects',       
        'read_private_posts'  => 'read_private_prospects',
        'create_posts'       => 'edit_prospects'
    ],
  );
  register_post_type( 'prospect', $args ); 
}
add_action( 'init', 'custom_post_prospect' );

// Migue Code
function prospect_code_enqueue() {
  if ( is_post_type_archive( 'prospect' ) ) {
    wp_register_script('prospect_code', get_theme_file_uri('/js/prospects.js'));
    wp_enqueue_script('prospect_code', get_theme_file_uri('/js/prospects.js'), array(), false, true);
    wp_localize_script('prospect_code', 'prospect', array(
      "nonce" => wp_create_nonce("wp_rest"),
      "current" => get_current_user_id(),
      "local"  => get_home_url()
    ));
  }
}
add_action( 'wp_enqueue_scripts', 'prospect_code_enqueue' );