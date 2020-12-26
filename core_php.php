<?php 
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "user";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $sql = "INSERT INTO userdata (firstname, lastname, noshoes,  email, phone, mydate)
        VALUES ('".$_POST['myFirstname']."', '".$_POST['myLastname']."',
        '".$_POST['mynoShoes']."', '".$_POST['myEmail']."','".$_POST['myPhone']."','".$_POST['myDate']."')";
    if (mysqli_query($conn,$sql)) {
    $data = array("data" => "You Data added successfully");
        echo json_encode($data);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>