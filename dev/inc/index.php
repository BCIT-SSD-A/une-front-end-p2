<?php
// Loads all files in current dir
call_user_func(function() {
  $files = scandir(__DIR__);
  if($files !== false) {
    foreach($files as $file) {
      if($file === 'index.php' || $file === '.' || $file === '..')
        continue;
      $file = __DIR__ . '/' . $file;
      if(is_file($file))
        require_once $file;
      else if(is_file($file . '/index.php'))
        require_once $file . '/index.php';
    }
  }
});