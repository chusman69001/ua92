<?php 
$server="localhost";
$username="root";
$password="";

$conn= mysqli_connect($server, $username, $password);

//Check Connection
if(!$conn)
{
    die("Connection failed!");
}
else
{
    echo"Success Connection";
}

$student_id=$_POST['ID'];
$student_name=$_POST['name'];
$student_address=$_POST['address'];
$student_medical_record=$_POST['medicalInfo'];

$sql= "INSERT INTO `school`.`student` (student_id, student_name, student_address, student_medical_record) 
VALUES ('$student_id', '$student_name','$student_address', '$student_medical_record')";
//echo $sql;

if ($conn->query($sql) == TRUE){
    echo "Student Entry is Added Successfully";
}
else{
    echo "ERORR";
}

$conn->close();
?>