<?php
include('database.php');

$name = $_GET['name'];
$mobile = $_GET['vendor-mobile'];
$email = $_GET['vendor-email'];
$city = $_GET['vendor-city'];
$location = $_GET['vendor-location'];
$address = $_GET['vendor-address'];
$pin = $_GET['vendor-pin'];
$category =$_GET['category'];
$nc="";
foreach ($category as $key => $value) {
    $nc=$nc.' '.$value;
    
}

$sql = 'insert into caters (name, mobile, address, city, zip_code, email, category, location) values
                               ("'.$name.'","'.$mobile.'","'.$address.'","'.$city.'","'.$pin.'","'.$email.'","'.$nc.'","'.$location.'");';

echo("sql is".$sql);

if ($conn->query($sql) === TRUE) {
    echo "Saved successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


?>