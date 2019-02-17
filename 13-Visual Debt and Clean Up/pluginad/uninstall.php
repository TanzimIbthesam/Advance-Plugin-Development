<?php

/**
Trigger this plugin on plugin uninstall
*/
if( ! undefined('WP_UNINSTALL_PLUGIN')){
  die;

}
//Clear database stored data
//Both methods

//First methods

// $books=get_posts(array('post_type'=>'book','numberposts'=>-1));
// foreach($books as $book){
//   wp_delete_post($book->ID,false);
// }
//Access the database via sql
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type='book'");
$wpdb->query("DELETE FROM wp_postmeta  WHERE post_id NOT IN ("SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN ("SELECT id FROM wp_posts)");
