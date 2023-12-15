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

$parent_id=$_POST['id'];
$parent_address=$_POST['address'];
$parent_medical_record=$_POST['relation'];
$parent_student=$_POST['studentname'];


$sql= "INSERT INTO `school`.`parents` (parent_id, parent_address, parent_medical_record, parent_student) 
VALUES ('$parent_id','$parent_address', '$parent_medical_record','$parent_student')";
//echo $sql;

if ($conn->query($sql) == TRUE){
    echo "Parent Entry is Added Successfully";
}
else{
    echo "ERORR";
}

$conn->close();
?>