<?php
session_start();
require_once('Config.php');

if (isset($_POST[])){

    $stmt = $conn->prepare();
    $stmt->bind_param();
    $stmt->execute();
    $result = $stmt->get_result();
    
}