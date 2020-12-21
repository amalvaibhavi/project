<?php
include("config.php");
?>
<?php


function filterFirstName($field){                                                                                     // Functions to filter user inputs
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);                                                  // Sanitize user name
     if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){      // Validate user name
        return $field;
    } else{
        return FALSE;
    }
} 
function filterLastName($field){                                                                                     // Functions to filter user inputs
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);                                                  // Sanitize user name
     if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){      // Validate user name
        return $field;
    } else{
        return FALSE;
    }

}  
function filterAge($field){
 $field = filter_var(trim($field), FILTER_SANITIZE_NUMBER_INT);
  $min=18;
  $max=60 ;
   if (filter_var($field, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
 return FALSE;
} else{
    return $field;
}

} 
function filterEmail($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);                                                   // Sanitize e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){                                                              // Validate e-mail address
        return $field;
    } else{
        return FALSE;
    }
}

function validating($field){
   $field = filter_var($field, FILTER_SANITIZE_NUMBER_INT); 
if(preg_match('/^[0-9]{10}+$/', $field)) {
return $field;
}else{
return FALSE;
}
}

$firstnameErr = $lastnameErr =$ageErr = $emailErr = $phoneErr= $pErr=$pcErr=$imgErr= "";
$firstname = $lastname = $age = $email= $phone= $password = $cpassword = $img="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate first name
    if(empty($_POST["fname"])){
        $firstnameErr = "Please enter your first name.";
    } else{
        $firstname = filterFirstName($_POST["fname"]);
        if($firstname == FALSE){
            $firstnameErr = "Please enter a valid name.";
        }
    }
    if(empty($_POST["lname"])){
        $lastnameErr = "Please enter your last name.";
    } else{
        $lastname = filterLastName($_POST["lname"]);
        if($lastname == FALSE){
            $lastnameErr = "Please enter a valid name.";
        }
    }

    //validate age
    if(empty($_POST["age"])){
        $ageErr = "Please enter your age.";
    }else{
        $age=filterAge($_POST["age"]);
         if($age == FALSE){
            $ageErr = "Please enter a valid age.";
        }
    }

    if(empty($_POST["email"])){
        $emailErr = "Please enter your email address.";     
    } 
       else{ $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = "Please enter a valid email address.";
        }
    
       else{     $s="select * from formentry where emailid= '$email'";
    $res=mysqli_query($conn,$s);
    $num=mysqli_num_rows($res);
    if($num==1){
       $emailErr="email already exist"; 
    }
}
}

    
    if(empty($_POST["phone"])){
        $phoneErr = "Please enter 10 digit phone number.";     
    } else{
        $phone = validating($_POST["phone"]);
        if($phone == FALSE){
            $phoneErr = "Please enter a valid phone number.";
        }
    }

    if(empty($_POST["password"])){
        $pErr= "please enter password";
    } else{
        $password =$_POST['password'];
    }
    if(empty($_POST["cpassword"])){
        $pcErr= "please enter password";
    } else{
        $cpassword =$_POST['cpassword'];
    }
    if($password != $cpassword){
$pErr="enter valid password";
}    
}
?>
    }  


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
    <link rel="stylesheet" type="text/css" href="css/global1.css">
</head>
<body>

<div class="container ">
<div class="row">
   <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div id="ui">
            <form class="form-group text-center" method="post" enctype="multipart/form-data">
                <h3>sign up</h3>
                <div class="row">
                    <div class="col-lg-6">
            <label>First Name</label>
             <input type="text" name="fname" class="form-control input-sm" id="inputsm" placeholder="enter First Name" value="<?php echo $firstname; ?>"><span class="error"><?php echo $firstnameErr; ?></span></div>
             <div class="col-lg-6">
            <label>Last Name</label>
             <input type="text" name="lname" class="form-control" placeholder="enter Last Name" value="<?php echo $lastname; ?>"><span class="error"><?php echo $lastnameErr; ?></span></div>

    </div>
    <label class="label">Email</label>
    <input type="email" name="email" placeholder="enter Email" class="form-control" value="<?php echo $email; ?>"><span class="error"><?php echo $emailErr; ?></span>
    <br>
    <div class="row">
        <div class="col-lg-6">
    <label >Contact Number</label>
    <input type="tel" id="phone" name="phone" class="form-control" placeholder="number should be within 10 digit" value="<?php echo $phone; ?>"><span class="error"><?php echo $phoneErr; ?></span><br></div>
    <div class="col-lg-6">
    <label>Age</label>
    <input type="text" name="age" placeholder="enter age" class="form-control" value="<?php echo $age; ?>"><span class="error"><?php echo $ageErr; ?></span></div>
    </div>
    <br>
    <div class="row">
                    <div class="col-lg-6">
            <label>Password</label>
             <input type="password" name="password" class="form-control" placeholder="enter password" value="<?php echo $password; ?>"><span class="error"><?php echo $pErr; ?></span></div>

             <div class="col-lg-6">
            <label>Re-enter password</label>
             <input type="password" name="cpassword" class="form-control" placeholder="re-enter password" value="<?php echo $password; ?>"><span class="error"><?php echo $pcErr; ?></span></div>

    </div>
    <br>
    <label for="formFileLg" class="form-label">Image File</label>
<input class="form-control form-control" name="img" id="formFileLg" value="<?php echo $img; ?>"  type="file" required/><span class="error"><?php echo $imgErr; ?></span><br>


    <input type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-lg">
<p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>
    
</div>
</div>
</body>
</html>
<?php
$showAlert = false;  
$showError = false; 
if(isset($_POST['submit'])) {  
    $password_1 = md5($password);
    //$img =$_POST['img'];

$filename = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];
       $folder = "uploads/".$filename;
move_uploaded_file($tempname,$folder);

    if($firstnameErr == "" && $lastnameErr == "" && $emailErr == "" && $phoneErr == "" && $pErr == "" && $pcErr == "" && $ageErr == "") { 
       
        //echo"<h3><b>you registered successfully</b></h3>"; 
        $showAlert = true;
         $query= "INSERT INTO formentry(firstname,lastname,emailid,contactno,age,pass,cpass,image) VALUES('$firstname','$lastname','$email','$phone','$age','$password_1','$cpassword','$filename') ";
        $data = mysqli_query($conn,$query);

        /*if($data)
        {
            echo "success";
        }
        else{
            echo"failed";
        }*/
        
        $firstname = $lastname = $age = $email= $phone= $password = $cpassword = $img="";

         } else {  
        //echo"<h3><b>you didn't filled up the form correctly</b></h3>";
            $showError = "you didn't filled up the form correctly";  
    }  
}
    ?>

    <?php
    if($showAlert) { 
    
        echo ' <div class="alert alert-success  
            alert-dismissible fade show" role="alert"> 
    
            <h2><strong>Success!</strong> Your account is  
            now created and you can login.</h2>  
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close">  
                <span aria-hidden="true">×</span>  
            </button>  
        </div> ';  
    } 
    
    if($showError) { 
    
        echo ' <div class="alert alert-danger  
            alert-dismissible fade show" role="alert">  
       <h2> <strong>Error!</strong> '. $showError.'</h2>
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close"> 
            <span aria-hidden="true">×</span>  
       </button>  
     </div> ';  
   } 
        ?>
    


