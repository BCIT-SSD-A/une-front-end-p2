<?php
$students = Student::get_all();
?>
<div class="student-list table">
  <?php foreach($students as $student) : ?>
    <div class="student">
      <div class="full-name"><?php echo $student->full_name; ?></div>
      <div class="email"><?php echo $student->email; ?></div>
    </div>
  <?php endforeach; ?>
</div>