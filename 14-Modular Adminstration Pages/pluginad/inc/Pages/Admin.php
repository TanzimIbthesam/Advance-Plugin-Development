<?php
/**
 * @package  pluginad
 */
namespace Inc\Pages;
/**
* 
*/
use Inc\Base\BaseController;
use Inc\Api\SettingsApi;

class Admin extends BaseController
{
  public $settings;
  public $pages=array();
public function __construct(){
  $this->settings=new SettingsApi();
  $this->pages=array(
    array( 
    'page_title'=>'Pluginad Plugin',
    'menu_title'=>'pluginad',
    'capability'=>'manage_options',
    'menu_slug'=>'pluginad_plugin',
    'callback'=>function(){
      echo '<h1>Pluginad </h1>';
    },
    'icon_url'=>'dashicons-store',
    'position'=>100
    // array($this,'admin_index'),'dashicons-store',100
  ), 
  array(
    'page_title'=>'Test',
    'menu_title'=>'Test',
    'capability'=>'manage_options',
    'menu_slug'=>'test_plugin',
    'callback'=>function(){
      echo '<h1>Test Plugin </h1>';
    },
    'icon_url'=>'dashicons-external',
    'position'=>9
    // array($this,'admin_index'),'dashicons-store',100
  )
  );
}
public function register(){

    //  add_action('admin_menu',array($this,'add_admin_pages') );
    
    $this->settings->addPages($this->pages)->register();
    // $this->settings->addPages($this->pages)->register();

   }
  //  public function add_admin_pages(){
  //     add_menu_page('pluginad Plugin','pluginad','manage_options','pluginad_plugin',array($this,'admin_index'),'dashicons-store',100);
  //   }
  //   public function admin_index(){
  //     //require template
  //       // require_once PLUGIN_PATH.'templates/admin.php';
  //       require_once $this->plugin_path.'templates/admin.php';

  //   }
}
