<?php
$conn = new mysqli("localhost", "root", "", "school");  // Specify the database name here

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from $_POST (assuming these values are always set)
$ID = $_POST["class_id"];
$fullName = $_POST["class_name"];
$capacity = $_POST["class_capacity"];
$year = $_POST["class_year"];

// Use prepared statements to prevent SQL injection
$sql = "UPDATE `class` SET class_name=?, class_capacity=?, class_year=? WHERE class_id=?";
$stmt = $conn->prepare($sql);

// Check if the prepare was successful
if ($stmt !== false) {
    // Bind parameters and execute the statement
    $stmt->bind_param("sssi", $fullName, $capacity, $year, $ID);

    if ($stmt->execute()) {
        echo "Record with Class ID $ID updated successfully";
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
