<?php
$hn = 'localhost';
$un = 'root';
$pw = 'mysql';
$db = 'patsbakery';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error in Config.");