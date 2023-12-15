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

$Teacher_id=$_POST['ID'];
$teacher_contact=$_POST['tTel'];
$teacher_A_salary=$_POST['salary'];
$Teacher_email=$_POST['tEmail'];


$sql= "INSERT INTO `school`.`teacher` (Teacher_id, teacher_contact, teacher_A_salary, Teacher_email) 
VALUES ('$Teacher_id', '$teacher_contact','$teacher_A_salary', '$Teacher_email')";
//echo $sql;

if ($conn->query($sql) == TRUE){
    echo "Teacher Entry is Added Successfully";
}
else{
    echo "ERORR";
}

$conn->close();
?>