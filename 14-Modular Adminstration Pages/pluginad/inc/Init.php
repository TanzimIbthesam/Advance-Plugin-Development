<?php
/**
* @package pluginad

*/
//store all classes inside an array
//return array full of classes
namespace Inc;

final class init
{
  public static function get_services()
  {
    return [
      Pages\Admin::class,
      Base\Enqueue::class,
      Base\SettingsLinks::class

    ];
  }
  //Loop through the classes,initialize them
  //call the register method if it exists
  //return [type][description]
  public static function register_services()
  {
 foreach(self::get_services() as $class){
   $service=self::instantiate($class);
   if(method_exists($service,'register')){
     $service->register();
   }
 }

  }
  /*
  //@param Initialize the class $class class from services array
  //@return class instance new instance of the class

*/
  private static function instantiate($class){
    // $service= new Pages\Admin::class;
    $service=new $class();
    return $service;

  }
}
//final class init-Php wont be able to extends the class/**
