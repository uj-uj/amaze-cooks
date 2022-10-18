<?php
include('database.php');

$name = $_POST['name'];
$password = $_POST['password'];
$mobile = $_POST['user-mobile'];
$email = $_POST['vendor-email'];
$city = $_POST['vendor-city'];


$sql = 'insert into users (name,password, mobile, address, city) values("'.$name.'","'.$password.'","'.$mobile.'","'.$address.'","'.$city.'");';

echo("sql is".$sql);

if ($conn->query($sql) === TRUE) {
    echo "Saved successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


?>