<?php
class Student {

  private static $config;
  private static $students;

  private $first_name;
  private $last_name;
  private $full_name;
  private $email;

  private function __construct($fname, $lname, $email) {
    $this->first_name = $fname;
    $this->last_name  = $lname;
    $this->email      = $email;
    $this->full_name  = $fname . ' ' . $lname;
  }

  public function __get($key) {
    if (property_exists($this, $key)) {
      return $this->{$key};
    } else {
      return null;
    }
  }
  public function __set($key, $value) {
    return; // or throw an exception
  }

  static function get_all() {
    if(!isset(self::$students)) {
      self::$students = array();
      foreach(self::$config as $email => $student) {
        self::$students[$email] = new Student(
          $student['first_name'],
          $student['last_name'],
          $student['email']
        );
      }
    }
    return self::$students;
  }

  static function init() {
    if(!isset(self::$config))
      self::$config = require Path::DATA_DIR . '/student.php';
  }

  static function get_class() {
    return get_class();
  }
}

return Student::get_class();