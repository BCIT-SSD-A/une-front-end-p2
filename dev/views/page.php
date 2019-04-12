<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $this->title; ?></title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles<?php echo ENV_PRODUCTION ? '.min' : '' ?>.css">
</head>
<body>
  <div class="page-wrapper">
    <header class="container navbar">
      <?php
      $header_menu = Menu::get('header');
      echo $header_menu->output(); ?>
    </header>
    <main class="container">
      <h1 class="page-title">
        <?php echo $this->title; ?>
      </h1>
      <?php $this->output_content(); ?>
    </main>
    <footer class="container">
      <p>&copy; 2019 Une Simonsen</p>
    </footer>
  </div>
</body>
</html>