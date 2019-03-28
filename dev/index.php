<?php
require_once __DIR__ . '/load.php';

$page = Page::get();
$header_menu = Menu::get('header');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $page->title; ?></title>
</head>
<body>
  <div class="page-wrapper">
    <header>
      <?php echo $header_menu->output(); ?>
    </header>
    <main>
      <h1 class="page-title">
        <?php echo $page->title; ?>
      </h1>
      <?php $page->output_content(); ?>
    </main>
    <footer>
    </footer>
  </div>
</body>
</html>