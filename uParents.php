<?php
$conn = new mysqli("localhost", "root", "", "school");  // Specify the database name here

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from $_POST (assuming these values are always set)
$ID = $_POST["parent_id"];
$fullName = $_POST["parent_address"];
$capacity = $_POST["parent_medical_record"];
$year = $_POST["parent_student"];

// Use prepared statements to prevent SQL injection
$sql = "UPDATE `parents` SET parent_address=?, parent_medical_record=?, parent_student=? WHERE parent_id=?";
$stmt = $conn->prepare($sql);

// Check if the prepare was successful
if ($stmt !== false) {
    // Bind parameters and execute the statement
    $stmt->bind_param("sssi", $fullName, $capacity, $year, $ID);

    if ($stmt->execute()) {
        echo "Record with Parent ID $ID updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close the connection
$conn->close();
?>
