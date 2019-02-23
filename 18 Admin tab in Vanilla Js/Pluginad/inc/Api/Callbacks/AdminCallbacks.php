<?php 
/**
*@package pluginad
*/
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallBacks extends BaseController
{
 public function adminDashboard()
 {
    return require_once("$this->plugin_path/templates/admin.php");
 }
 public function adminCpt()
 {
    return require_once("$this->plugin_path/templates/cpt.php");
 }
 public function adminTaxanomy()
 {
    return require_once("$this->plugin_path/templates/taxanomy.php");
 }
 public function adminWidget()
 {
    return require_once("$this->plugin_path/templates/widget.php");
 }
 public function pluginad_options_group($input)
 { 
    return $input;
 }
 public function pluginadAdminsection(){
    echo 'It is an awesome section';
 }
 
 public function plugintextExample(){
   
   $value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
   
 }
 public function pluginfirstName(){
   echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Enter your First Name">';
 }
              
}

