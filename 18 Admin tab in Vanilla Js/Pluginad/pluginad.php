<?php
/**
* @package PluginadPlugin

*/


/*
Plugin Name:Pluginad

Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Tanzim Ibthesam
Version: 1.0

*/
// if(!defined('ABSPATH')){
//   die;
// }

defined('ABSPATH') or die('Hey you cant access this file');
if (file_exists(dirname(__FILE__).'/vendor/autoload.php')){
   require_once dirname(__FILE__).'/vendor/autoload.php';
}

function activate_pluginad_plugin(){
 Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__,'activate_pluginad_plugin');


 function deactivate_pluginad_plugin(){
  Inc\Base\Activate::activate();
 }
 register_deactivation_hook(__FILE__,'deactivate_pluginad_plugin');
 
if(class_exists('Inc\\Init')){
Inc\Init::register_services();
}




   