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
// else
// {
//     echo"Success Connection";
// }

$class_id=$_POST['id'];
$class_name=$_POST['name'];
$class_capacity=$_POST['capacity'];
$class_year=$_POST['year'];

$sql= "INSERT INTO `school`.`class` (class_id, class_capacity, class_name, class_year) 
VALUES ('$class_id', '$class_capacity','$class_name', '$class_year')";
//echo $sql;

if ($conn->query($sql) == TRUE){
    echo "Class has been Added Successfully";
}
else{
    echo "ERORR";
}

$conn->close();
?>