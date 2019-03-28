<?php
require_once __DIR__ . '/load.php';

$page = Page::get();
$page->output();

?>
