<?php
if($this->is_404()) {
  header("HTTP/1.0 404 Not Found");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <base href="<?php echo BASE_URL; ?>">
  <title><?php echo $this->title; ?></title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles<?php echo ENV_PRODUCTION ? '.min' : '' ?>.css">
</head>
<body>
  <div class="page-wrapper">
    <header class="page-header navbar navbar-light">
      <div class="header-inner container">
        <div class="header-mobile">
          <a class="navbar-brand" href="./">
            <img src="res/images/bcit-ssd-logo.png" alt="BCIT SSD Logo">
          </a>
          <button class="navbar-toggler" id="header-menu-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <?php
        $header_menu = Menu::get('header');
        echo $header_menu->output(); ?>
      </div>
    </header>
    <main class="page-content">
      <div class="page-title">
        <h1 class="container">
          <?php echo $this->title; ?>
        </h1>
      </div>
      <div class="page-content-inner container">
        <?php $this->output_content(); ?>
      </div>
    </main>
    <footer class="page-footer">
      <div class="container">
        <p>&copy; 2019 Une Simonsen</p>
      </div>
    </footer>
  </div>
  <script src="js/script.js"></script>
</body>
</html>