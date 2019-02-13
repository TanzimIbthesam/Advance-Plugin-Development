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
if(!class_exists('pluginad')){
  class pluginad{
  public $plugin;

  function __construct(){
    $this->plugin=plugin_basename(__FILE__);
  }



    // function __construct(){
    //    // add_action('init',array( $this, 'custom_post_type') );
    // }
   function register(){
      // add_action('admin_enqueue_scripts',array($this,'enqueue' ) );
      add_action('admin_enqueue_scripts',array($this,'enqueue' ) );
      add_action('admin_menu',array($this,'add_admin_pages'));
      add_filter("plugin_action_links_$this->plugin",array($this,'settings_link'));
    }
    public function settings_link($links){
          //add custom settings link
          $settings_link='<a href="admin.php?page=pluginad_plugin">Settings</a>';
          array_push($links,$settings_link);
          return $links;

    }
    public function add_admin_pages(){
      add_menu_page('pluginad Plugin','pluginad','manage_options','pluginad_plugin',array($this,'admin_index'),'dashicons-store',100);
    }
    public function admin_index(){
      //require template
        require_once plugin_dir_path(__FILE__).'templates/admin.php';

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

    $pluginad=new pluginad();
    $pluginad->register();
  //activation
  require_once plugin_dir_path(__FILE__).'inc/pluginad-plugin-activate.php';
  register_activation_hook(__FILE__,array('pluginadActivate','activate'));

  //deactivate
  require_once plugin_dir_path(__FILE__).'inc/pluginad-plugin-deactivate.php';
  register_deactivation_hook(__FILE__,array('pluginaddeActivate','deactivate'));
}

//uninstall
// register_uninstall_hook(__FILE__,array($plugintad,'uninstall'));
