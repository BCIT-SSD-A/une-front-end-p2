<?php
class Page {

  private static $config;
  private static $pages = array();

  public $name;
  public $url;
  public $title;

  private function __construct($name) {
    $page = self::$config[$name];

    $this->name  = $name;
    $this->url   = '/' . ($name === 'home' ? '' : $name);
    $this->title = $page['title'];
  }

  function output_content() {
    include Path::CONTENT_DIR . "/$this->name.php";
  }

  static function init() {
    if(!isset(self::$config))
      self::$config = require __DIR__ . '/config.php';
  }
  
  static function get($name = null) {
    $name = isset($name) ? $name : $_SERVER['REQUEST_URI'];
    $name = self::sanitize_name($name);

    if(!isset(self::$pages[$name]))
      self::$pages[$name] = new Page($name);
    
    return self::$pages[$name];
  }
  
  private static function sanitize_name($name) {
    $name = trim($name, " \t\n\r\0\x0B/");
    if(empty($name))
      $name = 'home';
    if(!isset(self::$config[$name]))
      $name = '404';
    return $name;
  }
}

Page::init();