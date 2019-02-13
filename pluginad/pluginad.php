<?php
/**
* @package pluginad

*/


/*
Plugin Name:pluginad

Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Tanzim Ibthesam
Version: 1.0

*/
// if(!defined('ABSPATH')){
//   die;
// }

defined('ABSPATH') or die('Hey you cant access this file');
//
// if(! function_exists('add_action')){
//   echo "Hence you cant access this method";
//   exit();
// }

class pluginad{




  function __construct(){
     // add_action('init',array( $this, 'custom_post_type') );
  }
public static function register(){
    // add_action('admin_enqueue_scripts',array($this,'enqueue' ) );
    add_action('admin_enqueue_scripts',array('pluginad','enqueue' ) );
  }
  protected function create_post_type(){
    add_action('init',array($this,'custom_post_type'));
  }
  //methods
private function activate(){
  flush_rewrite_rules();
    $this->custom_post_type();
 //Generate a custom post type
 //flush rewrite rules
  }
function deactivate(){
    flush_rewrite_rules();
  //flush rewrite rules

  }
  function uninstall(){
  //delete a CPT
  //deleteall plugin from the database
  }
  function custom_post_type(){
    register_post_type('book',['public'=>true,'label'=>'BOOK']);
  }

  static function enqueue(){
    //enqueue scripts
    wp_enqueue_style('mypluginstyle',plugins_url('/assets/style.css',__FILE__));
    wp_enqueue_script('mypluginstyle',plugins_url('/assets/script.js',__FILE__));
  }

  }
  class SecondClass extends pluginad
  {
    function register_post_type(){
      $this->create_post_type();
    }
  }
  if(class_exists('pluginad') ){
    // $pluginadv= new pluginad;
    // $pluginadv->register();
    pluginad::register();
  }
  $secondclass=new SecondClass();
  $secondclass->register_post_type();
//activation
require_once plugin_dir_path(__FILE__).'inc/pluginad-plugin-activate.php';
register_activation_hook(__FILE__,array('pluginadActivate','activate'));

//deactivate
require_once plugin_dir_path(__FILE__).'inc/pluginad-plugin-deactivate.php';
register_deactivation_hook(__FILE__,array('pluginaddeActivate','deactivate'));
//uninstall
// register_uninstall_hook(__FILE__,array($plugintad,'uninstall'));
