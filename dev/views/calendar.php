<?php
$last_month = '';
?>
<div class="calendar">
  <?php
  while($this->has_next()) :
    $item = $this->next();

    $month   = $item['date']->format('F');
    $weekday = $item['date']->format('l');
    $date    = $item['date']->format('F j, Y');

    $course     = $item['course']     ?? $item['holiday'];
    $instructor = $item['instructor'] ?? null;
    $room       = $item['room']       ?? null;
    
    $is_holiday = isset($item['holiday']);

    // If new month
    if($month !== $last_month) :
      // End previous
      if($last_month) {
        echo '</section>';
      }
      // Start new month
      echo '<section class="month">';
      echo "<h2 class=\"month-title\">$month</h2>";

      $last_month = $month;
    endif;

    // Item ?>
    <div class="calendar-item<?php echo $is_holiday ? ' holiday' : ''; ?>">
      <div class="item-day">
        <?php echo $weekday; ?>
      </div>
      <div class="item-date">
        <?php echo $date; ?>
      </div>
      <div class="item-course">
        <?php echo $course; ?>
      </div>
      <?php if(isset($instructor)) { ?>
        <div class="item-instructor">
          <?php echo $instructor; ?>
        </div>
      <?php } ?>
      <?php if(isset($room)) { ?>
        <div class="item-room">
          Room <?php echo $room; ?>
        </div>
      <?php } ?>
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
