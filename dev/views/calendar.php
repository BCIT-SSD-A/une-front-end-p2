<?php
$last_month = '';
?>
<div class="calendar <?php echo $this->view; ?>">
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
      echo "<h2 class=\"month-title\">$month</h2>";

      $last_month = $month;
    endif;

    // Item ?>
    <div class="calendar-item<?php echo $is_holiday ? ' holiday' : ''; ?>">
      <div class="item-day">
        <?php echo $weekday['pre'];
        ?><span class="full"><?php
          echo $weekday['suf'];
        ?></span>
      </div>
      <div class="item-date">
        <?php echo $date; ?>
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
