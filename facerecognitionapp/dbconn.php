<?php
$servername = "localhost";
$username = "root";
$password = "Fjj@9229";
$dbname = "winlab";

$q = $_REQUEST["q"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT phone FROM winlab where name = '$q'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo " ph: ". $row["phone"]. "<br>";
     }
} else {
     echo "0 results";
}

$conn->close();
?>  
