<?php
/**
 * @package  PluginadPlugin

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

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    // $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    // $this->settings->addPages($this->pages)->register();
    $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();

   }
   public function setPages(){
    $this->pages=array(
      array( 
        
      'page_title'=>'PluginAd Plugin',
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
        
        'callback'=>array($this->callbacks,'adminTaxanomy')
        
       ),
       
         array(
          'parent_slug'=>'pluginad_plugin',
          'page_title'=>'Custom Widgets',
          'menu_title'=>'Widgets',
          'capability'=>'manage_options',
          'menu_slug'=>'pluginad_widgets',
          'callback'=>array($this->callbacks,'adminWidget')
          
         )
         );
   }
   public function setSettings()
   {
     $args=array(
         array(
           'option_group'=>'pluginad_options_group',
           'option_name'=>'text_example',
           'callback'=>array($this->callbacks,'pluginadOptionsGroup'),

         )
     );
     $this->settings->setSettings($args);
   }
   public function setSections()
   {
    $args=array(
        array(
          'id'=>'pluginad_admin_index',
          'title'=>'Settings',
          'callback'=>array($this->callbacks,'pluginadAdminsection'),
          'page'=>'pluginad_plugin'

        )
    );
    $this->settings->setSections($args);
  }
    public function setFields()
    {
      $args=array(
          array(
            'id'=>'text_example',
            'title'=>'Text Example',
            'callback'=>array($this->callbacks,'plugintextExample'),
            'page'=>'pluginad_plugin',
            'section'=>'pluginad_admin_index',
            'args'=>array(
              'label_for'=>'text_example',
              'class'=>'example-class'
            )

  
          ),
          array(
            'id'=>'first_name',
            'title'=>'First Name',
            'callback'=>array($this->callbacks,'pluginfirstName'),
            'page'=>'pluginad_plugin',
            'section'=>'pluginad_admin_index',
            'args'=>array(
              'label_for'=>'first_name',
              'class'=>'example-class'
            )

  
          )
      );
      $this->settings->setFields($args);
  }
  }
  
