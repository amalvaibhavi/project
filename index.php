
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
    <link rel="stylesheet" type="text/css" href="css/logincss.css">
</head>
<body>
     
     <div class="container ">
<div class="row">


   <div class="col-lg-3"></div>
    <div class="col-lg-6">
             <div id="ui">

            <form class="form-group text-center" action="login.php" method="post">
               <h2>LOGIN</h2>
                <div class="row">
     	<br>
     	<label>Email Id</label>
     	<input type="text" name="uname" class="form-control" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" class="form-control" placeholder="Password"><br><br>

     	<button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
     </div>
     <p>
        If not member <a href="register.php">register</a>
    </p>
     </form>
</div>
</div>
</body>
</html>
