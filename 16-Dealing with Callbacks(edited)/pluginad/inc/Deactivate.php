<?php
/**
* @package pluginad

*/
namespace Inc\Deactivate;
class Deactivate
{
  public static function deactivate(){
    flush_rewrite_rules();
  }
}
