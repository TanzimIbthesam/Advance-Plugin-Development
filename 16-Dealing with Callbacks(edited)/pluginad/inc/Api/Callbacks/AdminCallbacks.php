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
 
}

