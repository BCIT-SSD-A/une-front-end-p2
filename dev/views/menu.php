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