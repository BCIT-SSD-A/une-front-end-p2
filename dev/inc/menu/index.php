<?php
class Menu {

  private static $config;
  private static $menus = array();

  public $name;

  private function __construct($name) {
    $this->name = $name;
  }

  function get_items() {
    return self::$config[$this->name];
  }
  
  function output() {
    include Path::VIEWS_DIR . '/menu.php';
  }

  static function init() {
    if(!isset(self::$config))
      self::$config = require __DIR__ . '/config.php';
  }
  

  // Get a menu instance. E.g. get('header') for header menu
  static function get($name) {
    if(!isset(self::$config[$name]))
      return;

    if(!isset(self::$menus[$name]))
      self::$menus[$name] = new Menu($name);
    
    return self::$menus[$name];
  }
}

Menu::init();