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
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
  public $settings;
  public $callbacks;
  public $pages=array();
  public $subpages=array();

  
 
  

public function register(){

    //  add_action('admin_menu',array($this,'add_admin_pages') );
    $this->settings=new SettingsApi();
    $this->callbacks= new AdminCallbacks();
    $this->setPages();
    $this->setSubpages();
    $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    // $this->settings->addPages($this->pages)->register();

   }
   public function setPages(){
    $this->pages=array(
      array( 
        
      'page_title'=>'Plugin Ad Plugin',
      'menu_title'=>'PluginAd',
      'capability'=>'manage_options',
      'menu_slug'=>'pluginad_plugin',
      'callback'=>array($this->callbacks,'adminDashboard'),
      'icon_url'=>'dashicons-store',
      'position'=>100
      // array($this,'admin_index'),'dashicons-store',100
    )
         );

   }
   public function setSubpages(){
    $this->subpages=array(
      array(
       'parent_slug'=>'pluginad_plugin',
       'page_title'=>'Custom Post Types',
       'menu_title'=>'CPT',
       'capability'=>'manage_options',
       'menu_slug'=>'pluginad_custompost',
      //  'callback'=>function(){
      //    echo '<h1>CPT Manager</h1>';}
      'callback'=>array($this->callbacks,'adminCpt')
       
      ),
      
       array(
        'parent_slug'=>'pluginad_plugin',
        'page_title'=>'Custom Taxanomies',
        'menu_title'=>'Taxanomies',
        'capability'=>'manage_options',
        'menu_slug'=>'pluginad_cpt',
        // 'callback'=>function(){
        //   echo '<h1>Taxanomies Manager</h1>';}
        'callback'=>array($this->callbacks,'adminTaxanomy')
        
       ),
       
         array(
          'parent_slug'=>'pluginad_plugin',
          'page_title'=>'Custom Widgets',
          'menu_title'=>'Widgets',
          'capability'=>'manage_options',
          'menu_slug'=>'pluginad_taxanomies',
          // 'callback'=>function(){
          //   echo '<h1>CPT Manager</h1>';}
          'callback'=>array($this->callbacks,'adminWidget')
          
         )
         );
   }
  }
  
