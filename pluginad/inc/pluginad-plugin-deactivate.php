<?php
/**
* @package pluginad

*/
class pluginaddeActivate
{
  public static function deactivate(){
    flush_rewrite_rules();
  }
}
