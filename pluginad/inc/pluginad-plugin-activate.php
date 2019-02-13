<?php
/**
* @package pluginad

*/
class pluginadActivate
{
  public static function activate(){
    flush_rewrite_rules();
  }
}
