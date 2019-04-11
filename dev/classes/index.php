<?php
// Loads all files in current dir
call_user_func(function() {
  $files = scandir(__DIR__);
  if($files !== false) {

    $needs_init = array();
    
    foreach($files as $file) {
      if($file === 'index.php' || $file === '.' || $file === '..')
        continue;

      $file = __DIR__ . '/' . $file;
      if(is_file($file)) {
        $class = require_once $file;
        if(is_string($class) && method_exists($class, 'init'))
          array_push($needs_init, $class);
      }
    }

    foreach($needs_init as $class)
      call_user_func($class . '::init');
  }
});