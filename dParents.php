<?php

$conn = new mysqli("localhost","root", "");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $ID =$_POST["parent_id"];

    $sql = "DELETE FROM `school`.`parents` WHERE parent_id =$ID ";
    $stmt = $conn->prepare($sql);

 
    if ($stmt->execute()) {
        echo "Record with Parents ID $ID deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>