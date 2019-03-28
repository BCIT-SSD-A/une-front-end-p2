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
    ?>
    <nav class="menu <?php echo $this->name; ?>-menu">
      <ul>
        <?php foreach($this->get_items() as $key => $item):
          $page = Page::get($key); ?>
          <li>
            <a class="item" href="<?php echo $page->url; ?>">
              <?php echo $item['label']; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <?php
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