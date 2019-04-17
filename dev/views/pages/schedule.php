<button class="btn btn-primary calendar-view-toggle">
    List View
</button>
<?php

//Output calendar
$calendar = new Calendar(Calendar::GRID_VIEW);
$calendar->output();