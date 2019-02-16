<?php
/**
 * @package  pluginad
 */
namespace Inc\Pages;
/**
* 
*/


class Admin {

public function register(){

     add_action('admin_menu',array($this,'add_admin_pages') );

   }
   public function add_admin_pages(){
      add_menu_page('pluginad Plugin','pluginad','manage_options','pluginad_plugin',array($this,'admin_index'),'dashicons-store',100);
    }
    public function admin_index(){
      //require template
        require_once PLUGIN_PATH.'templates/admin.php';

    }
}
