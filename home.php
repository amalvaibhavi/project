<?php 
include "config.php";
session_start();

if (isset($_SESSION['emailid']) && isset($_SESSION['cpass'])) {

 ?>
 <h1 style="text-align: center;">Hello, <?php echo $_SESSION['firstname'];?>   <?php echo $_SESSION['lastname'] ; ?></h1>
 <?php
     $imm=$_SESSION['emailid'];
     $records1='';    
     $records1 = mysqli_query($conn,"select *from formentry where emailid='$imm'"); 
     while($data1 = mysqli_fetch_array($records1))
      {
     ?>
     <div class="container"><img class="imgc" src="uploads/<?php echo $data1['image']; ?>" width="130" height="130" ><br><br><br><br><br><br>
      <h1 style="text-align: right;"><?php echo $_SESSION['firstname'];?>   <?php echo $_SESSION['lastname'] ; ?></h1>
    </div>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
<div class="test" style="float: center">   
     
     <table border="2">
  <tr>
    <td>Name</td>
    <td>emailid</td>
    <td>contact no</td>
    <td>age</td>
    <td>image</td>
  </tr>
  <?php

// Using database connection file here

$records = mysqli_query($conn,"select *from formentry"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['firstname']; ?><?php echo $data['lastname']; ?></td>
    <td><?php echo $data['emailid']; ?></td>
    <td><?php echo $data['contactno']; ?></td>
    <td><?php echo $data['age']; ?></td>
    <td><img src="uploads/<?php echo $data['image']; ?>" width="150" height="150"></td>
  </tr>	
<?php
}
?>

</table>



     <a href="logout.php">Logout</a>
</div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>




