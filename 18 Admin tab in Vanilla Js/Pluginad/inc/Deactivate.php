<?php
/**
* @package  PluginadPlugin


*/
namespace Inc\Deactivate;
class Deactivate
{
  public static function deactivate(){
    flush_rewrite_rules();
  }
}
