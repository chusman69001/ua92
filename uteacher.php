<?php
$conn = new mysqli("localhost", "root", "", "school");  // Specify the database name here

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from $_POST (assuming these values are always set)
$ID = $_POST["Teacher_id"];
$fullName = $_POST["teacher_contact"];
$studentAddress = $_POST["teacher_A_salary"];
$medicalInfo = $_POST["Teacher_email"];

// Use prepared statements to prevent SQL injection
$sql = "UPDATE `teacher` SET teacher_contact=?, teacher_A_salary=?, Teacher_email=? WHERE Teacher_id=?";
$stmt = $conn->prepare($sql);

// Check if the prepare was successful
if ($stmt !== false) {
    // Bind parameters and execute the statement
    $stmt->bind_param("sssi", $fullName, $studentAddress, $medicalInfo, $ID);

    if ($stmt->execute()) {
        echo "Record with Teacher ID $ID updated successfully";
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
