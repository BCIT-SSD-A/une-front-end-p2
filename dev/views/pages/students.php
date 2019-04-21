<?php
$students = Student::get_all();
$half = ceil(count($students)/2);

$column_1 = array_slice($students, 0, $half);
$column_2 = array_slice($students, $half);

?>
<h2>Student List</h2>
<div class="student-list columns">
  <?php // For each column
  foreach(array($column_1, $column_2) as $column) : ?>
    <div class="list-group column">
      <?php // For each student in column
      foreach($column as $student) : ?>
        <div class="student list-group-item">
          <div class="student-name"><?php echo $student->full_name; ?></div>
          <div class="student-email">
            <a href="mailto:<?php echo $student->email; ?>"><?php echo $student->email; ?></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>