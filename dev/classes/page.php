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
    $this->url   = BASE_URL . ($name === 'home' ? '' : $name) . '/';
    $this->title = $page['title'];
  }

  function output() {
    include Path::VIEWS_DIR . '/page.php';
  }
  function output_content() {
    include Path::PAGES_DIR . "/$this->name.php";
  }
  function is_404() {
    return $this->name == '404';
  }

  static function init() {
    if(!isset(self::$config))
      self::$config = require Path::DATA_DIR . '/page.php';
  }

  static function get_class() {
    return get_class();
  }
  
  static function get($name = null) {
    $name = self::sanitize_name($name);

    if(!isset(self::$pages[$name]))
      self::$pages[$name] = new Page($name);
    
    return self::$pages[$name];
  }
  
  private static function sanitize_name($name) {
    // If no name, get from request URI
    if(!isset($name)) {
      $name = $_SERVER['REQUEST_URI'];
      if(stripos($name, BASE_URL) == 0)
        $name = substr($name, strlen(BASE_URL));
    }
    
    $name = trim($name, " \t\n\r\0\x0B/");
    if(empty($name))
      $name = 'home';
    if(!isset(self::$config[$name]))
      $name = '404';
    return $name;
  }
}

return Page::get_class();