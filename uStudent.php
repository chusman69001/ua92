<?php
$conn = new mysqli("localhost", "root", "", "school");  // Specify the database name here

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from $_POST (assuming these values are always set)
$ID = $_POST["student_id"];
$fullName = $_POST["student_name"];
$studentAddress = $_POST["student_address"];
$medicalInfo = $_POST["student_medical_record"];

// Use prepared statements to prevent SQL injection
$sql = "UPDATE `student` SET student_name=?, student_address=?, student_medical_record=? WHERE student_id=?";
$stmt = $conn->prepare($sql);

// Check if the prepare was successful
if ($stmt !== false) {
    // Bind parameters and execute the statement
    $stmt->bind_param("sssi", $fullName, $studentAddress, $medicalInfo, $ID);

    if ($stmt->execute()) {
        echo "Record with Student ID $ID updated successfully";
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
