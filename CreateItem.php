<?php
session_start();
require_once('Config.php');

// if (isset($_POST[])){

//     $stmt = $conn->prepare();
//     $stmt->bind_param();
//     $stmt->execute();
//     $result = $stmt->get_result();
 
    
// Defining variables and set to empty values
$ItemNameErr = $ItemDescriptionErr = $ItemWholesaleCostErr = $ItemPriceErr = "";
$ItemName = $ItemDescription = $ItemWholesaleCost = $ItemPrice = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["ItemName"])) {
        $ItemNameErr = "Item name is required";
    }
    else {
        $ItemName = test_input($_POST["ItemName"]);
            // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$ItemName)) {
            $ItemNameErr = "Only letters allowed";
            }
        }
    
    if (empty($_POST["ItemDescription"])) {
        $ItemDescriptionErr = "Item description is required";
            }
    }

    if (empty($_POST["ItemWholesaleCost"])) {
        $ItemWholesaleCostErr = "Item wholesale cost is required";
        } 
    else {
        $ItemWholesaleCost = test_input($_POST["ItemWholesaleCost"]);
        // check if wholesale price is valid
            if (!preg_match('/^[0-9]*(\.[0-9]{0,2})?$/', $ItemWholesaleCost)) {
            $ItemWholesaleCostErr = "Invalid wholesale cost";
            }
    }
        
    if (empty($_POST["ItemPrice"])) {
        $ItemPriceErr = "Item price is required";
        } 
    else {
        $ItemPrice = test_input($_POST["ItemPrice"]);
        // check if item price is valid
            if (!preg_match('/^[0-9]*(\.[0-9]{0,2})?$/', $ItemPrice)) {
            $ItemPriceErr = "Invalid item price";
            }
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

//}
?>