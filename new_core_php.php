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
    
    // Insert Data (if post method found insert_data key its mean this section execute)
    if($_POST['insert_data']){
        $sql = "INSERT INTO userdata (firstname, lastname, noshoes,  email, phone, mydate)
            VALUES ('".$_POST['myFirstname']."', '".$_POST['myLastname']."',
            '".$_POST['mynoShoes']."', '".$_POST['myEmail']."','".$_POST['myPhone']."','".$_POST['myDate']."')";

        if (mysqli_query($conn,$sql)) {
            $data = array("success" => true, "message" => "You Data added successfully");
            echo json_encode($data);
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $data = array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error );
            echo json_encode($data);
        }
    }

    // Fetch Data (if post method found fetch_data key its mean this section execute)
    if($_POST['fetch_data']){
        $sql = "SELECT * FROM userdata"; //(*) estark mean All columns
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) { //check if Data Found
            // output data of each row
            $userData = mysqli_fetch_assoc($result);
            
            // Format data
            $data = array("message" => "Fetch Data successfully", "data"=>$userData );
            
            echo json_encode($data);
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            $data = array("success" => false, "message" => "No data found", "data"=>array() );
            echo json_encode($data);
        }
    }

?>
