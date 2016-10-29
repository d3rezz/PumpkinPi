<?php
    header('location: index.php');

    require 'db_connection.php';
    
    //show errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_POST['Status'])) {
        $status = $_POST['Status'];
    } else {
        exit(1);
    }

    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        exit(1);
    }

    $stmt = $conn->prepare("UPDATE Pumpkin SET Status=? WHERE ID=1");
    
    $off = 'Off';  //For passing by reference
    $on = 'On';
    
    if ($status=='On') {
        $stmt->bind_param('s', $off);
    } else {
        $stmt->bind_param('s', $on);
    }
   
    $stmt->execute();

    $stmt->close();
?>
