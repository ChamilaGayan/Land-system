<?php

include("includes/connectiondb.php");
$msg="";
if(isset($_POST["submit"])){
$username=$_POST['uname'];
//$password=md5($_POST['password']);
$password=$_POST['password'];
$sql="SELECT * FROM login WHERE uname='$username' AND pwd='$password'";
$res=mysqli_query($conn,$sql);
$rcount=mysqli_num_rows($res);
if($rcount>0){
	session_start();
	$_SESSION["user"]=$username;
	header('Location: dash.php');
}else{
	$msg="Incorrect Username or Password!";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAND - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image:url(img/1.png);">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class=" col-lg-5 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                            <div class="col-lg-12">
                                <div class="p-5">
                                <center><img src="img/logo.png" width="80" height="110"></center> <br>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">දිස්ත්‍රික් ලේකම් කාර්යාලය මාතලේ</h1>
										
                                   
<form action="" method="post" onSubmit="" class="user">
<div class="form-group">
		
		<input type="text" name="uname" id="uname" size="30" required onfocusout=""  class="form-control form-control-user" placeholder="Enter Username">
	</div>
                                        <div class="form-group">
	
	<input type="password" name="password" id="password" size="30" onfocusout=""  class="form-control form-control-user" placeholder="Enter Password">
	</div>
	
	
	<input type="submit" name="submit" value="Login" class="btn btn-primary btn-user btn-block">
	
<p align="center" style="color:#FF0000;"><?php echo $msg; ?></p>
</form>

                                  <hr>
                                    <!--<div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>-->
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a><br>
										<a class="small" href="forgot-password.php">Forget Password ?</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
				


    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>