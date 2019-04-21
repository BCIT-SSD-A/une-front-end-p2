<?php
$last_month = '';
?>
<div class="calendar <?php echo $this->view; ?>">
  <?php
  while($this->has_next()) :
    $item = $this->next();

    $month    = $item['date']->format('F');
    $weekday  = $item['date']->format('l');
    $date     = $item['date']->format('F j, Y');
    $date_iso = $item['date']->format('Y-m-d');

    $course     = $item['course']     ?? $item['holiday'];
    $instructor = $item['instructor'] ?? null;
    $room       = $item['room']       ?? null;
    
    $is_holiday = isset($item['holiday']);
    $is_today   = $date_iso === date('Y-m-d');

    $weekday = array(
      'pre' => substr($weekday, 0, 3),
      'suf' => substr($weekday, 3)
    );

    // If new month
    if($month !== $last_month) :
      // End previous
      if($last_month) {
        echo '</section>';
      }
      // Start new month
      echo '<section class="month">';
      // Title
      echo "<h2 class=\"month-title\">$month</h2>";
      ?>
      <div class="calendar-header grid-header">
        <span class="header-item">Mon</span>
        <span class="header-item">Tue</span>
        <span class="header-item">Wed</span>
        <span class="header-item">Thu</span>
        <span class="header-item">Fri</span>
      </div>
      <div class="calendar-header list-header">
        <span class="header-item-day">Day</span>
        <span class="header-item-date">Date</span>
        <span class="header-item-course">Course</span>
        <span class="header-item-instructor">Instructor</span>
        <span class="header-item-room">Room</span>
      </div>
      <?php

      // Pad calendar grid with empty days at start of month
      $pad_count = intval($item['date']->format('N')) - 1;
      if($pad_count) {
        echo "<span class=\"grid-pad grid-pad-$pad_count\"></span>";
      }

      $last_month = $month;
    endif;
    // End if new month

    // Item ?>
    <div class="calendar-item<?php
      echo $is_holiday ? ' holiday' : '';
      echo $is_today   ? ' today'   : '';
    ?>">
      <div class="item-day">
        <?php echo $weekday['pre'];
        ?><span class="full"><?php
          echo $weekday['suf'];
        ?></span>
      </div>
      <div class="item-date">
        <time datetime="<?php echo $date_iso; ?>"><?php echo $date; ?></time>
      </div>
      <div class="item-course">
        <?php echo $course; ?>
      </div>
      <div class="item-instructor">
        <?php echo $instructor; ?>
      </div>
      <div class="item-room">
        <?php if(isset($room)) { ?>
          <span class="full">Room</span>
          <?php echo $room;
        } ?>
      </div>
    </div>
    <?php // End item

  endwhile;

  // End of final month
  if($item) {
    echo '</section>';
  }
  ?>
</div>
<?php

$this->reset_parser();
