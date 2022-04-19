<?php
session_start();
require_once('Config.php');

// if (isset($_POST[])){

//     $stmt = $conn->prepare();
//     $stmt->bind_param();
//     $stmt->execute();
//     $result = $stmt->get_result();
 
    
// Defining variables and set to empty values
$EmpFirstNameErr = $EmpLastNameErr = $EmpEmailErr = $EmpPhoneErr = "";
$EmpFirstName = $EmpLastName = $EmpEmail = $EmpPhoneErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["EmpFirstName"])) {
        $EmpFirstNameErr = "First name is required";
    }
    else {
        $EmpFirstName = test_input($_POST["EmpFirstName"]);
            // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$EmpFirstName)) {
            $EmpFirstNameErr = "Only letters allowed";
            }
        }
    
    if (empty($_POST["EmpLastName"])) {
        $EmpLastNameErr = "Last name is required";
            }
    else {
        $EmpLastName = test_input($_POST["EmpLastName"]);
        // check if name only contains letters
            if (!preg_match("/^[a-zA-Z]*$/",$EmpLastName)) {
            $EmpLastNameErr = "Only letters allowed";
            }
    }

    if (empty($_POST["EmpEmail"])) {
        $EmpEmailErr = "Email is required";
        } 
    else {
        $EmpEmail = test_input($_POST["EmpEmail"]);
        // check if e-mail address is valid
            if (!filter_var($EmpEmail, FILTER_VALIDATE_EMAIL)) {
            $EmpEmailErr = "Invalid email format";
            }
    }
        
    if (empty($_POST["EmpPhone"])) {
        $EmpPhone = "";
        } 
    else {
        $EmpPhone = test_input($_POST["EmpPhone"]);
        // check if phone number is valid
            if (!preg_match('/^[0-9]{11}+$/', $EmpPhone)) {
            $EmpPhoneErr = "Invalid phone number";
            }
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
}
//}
?>