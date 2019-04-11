<?php
class Calendar {

  private static $config;
 
  private $courses;
  private $schedule;
  private $dates;

  // State variables (when parsing through dates)
  private $index;
  private $item;
  private $end_date; // End date of repeated item, e.g. March break

  function __construct() {
    $this->courses  = self::$config["courses"];
    $this->schedule = self::$config["schedule"];
    $this->index = -1;
    $this->dates = array_keys($this->get_schedule());
  }
  
  function get_courses() {
    return $this->courses;
  }
  function get_schedule() {
    return $this->schedule;
  }

  function output() {
    // Will parse through the calendar
    include Path::VIEWS_DIR . '/calendar.php';
  }

  static function init() {
    if(!isset(self::$config))
      self::$config = require Path::DATA_DIR . '/calendar.php';
  }
  
  static function get_class() {
    return get_class();
  }


  // Returns whether next calendar item exists (true/false),
  // for when parsing through output
  private function has_next() {
    // If in middle of repeated item, return true
    if($this->index >= 0 && $this->item['date'] < $this->end_date)
      return true;
    
    // If subsequent items exist
    return isset($this->dates[$this->index + 1]);
  }

  // Returns next calendar item, for when parsing through output
  private function next() {

    // If in middle of repeated item
    if($this->index >= 0 && $this->item['date'] < $this->end_date) {
      // If Friday
      if($this->item['date']->format('N') == '5')
        $this->item['date']->modify('+3 days'); // Add 3 days
      // If not Friday
      else
        $this->item['date']->modify('+1 day'); // Add 1 day
    }
    // Otherwise switch to next item
    else {
      // Increment index
      $this->index++;
      // Get date
      $date = $this->dates[$this->index];
      // Get scheduled item
      $this->item = $this->schedule[$date];
      // Get end date
      $this->end_date = new DateTime($this->item['end_date'] ?? $date);
      unset($this->item['end_date']);

      // Prepare extra info to return

      $this->item['date'] = new DateTime($date); // Date
      if(isset($this->item['course'])) {
        $course = $this->courses[$this->item['course']];
        $this->item['course']     = $course['label']      ?? null; // Course
        $this->item['instructor'] = $course['instructor'] ?? null; // Instructor
      }
    }

    return $this->item;
  }

  // Resets parser
  private function reset_parser() {
    $this->index = -1;
    $this->item = null;
    $this->end_date = null;
  }
}

return Calendar::get_class();