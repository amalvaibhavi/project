<?php
$sname = "localhost"; 
$uname = "root";
$dbname = "login";
$password = "";

// Create connection
$conn = mysqli_connect($sname, $uname, $password,$dbname);
// Check connection
/*if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";*/
/*$sql = "CREATE DATABASE login";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
*/
/*$sql1 = "CREATE TABLE formentry ( 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
emailid VARCHAR(50),
contactno VARCHAR(255) NOT NULL,
age INT NOT NULL,
pass VARCHAR(30) NOT NULL,
cpass VARCHAR(30) NOT NULL,
image VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql1)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

*/

?>
