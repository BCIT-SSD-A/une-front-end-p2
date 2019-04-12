<nav class="collapse navbar-collapse" id="<?php echo $this->name; ?>-menu">
  <ul class="navbar-nav">
    <?php foreach($this->get_items() as $key => $item):
      $page = Page::get($key); ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $page->url; ?>">
          <?php echo $item['label']; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>