<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
mysqli_set_charset($conn,"utf8");
date_default_timezone_set("Asia/Colombo");
$msg="";
$error="";


if(isset($_POST['add']))
{

$name=$_POST['name'];
$email=$_POST['email'];
$pwd=md5($_POST['pwd']); 
$repeat_pwd=md5($_POST['repeat_pwd']); 
$uname=$_POST['uname'];
   

  $sqlr=mysqli_query($conn,"INSERT INTO login (name,email,pwd,repeat_pwd,uname) value('$name','$email','$pwd','$repeat_pwd','$uname')");

    if ($sqlr) {
    $msg="Registered Successfully";
  }
  else
    {
      $error="Something went wrong. Please try again";
    }
mysqli_close($conn);
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

    <title>RRMS - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-image:url(img/register.png);">

    <div class="container  col-lg-6 col-md-9" style="float: right;">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            
										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

							<form id="example-form" method="post" name="additems" enctype="multipart/form-data" class="form-horizontal user">
                                <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
								 <input class="form-control form-control-user" id="name" type="text" name="name" placeholder="Enter Name" />
                                 </div>
                                    <div class="col-sm-6">
								 <input class="form-control form-control-user" id="uname" type="text" name="uname" placeholder="Enter Username" />
									
									</div>
                                </div>
                                <div class="form-group">
									<input class="form-control form-control-user" id="email" type="email" name="email" placeholder="Enter Email Addres" />

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
										<input class="form-control form-control-user" id="pwd" type="password" name="pwd" placeholder="Enter Password" />
                                    </div>
                                    <div class="col-sm-6">
										<input class="form-control form-control-user" id="repeat_pwd" type="password" name="repeat_pwd" placeholder="Repeat Password" />
                                    </div>
                                </div>
                                
								<button type="submit" name="add" id="add" class="btn btn-primary btn-user btn-block " onClick="return valid();">REGISTER</button>
                            </form>
                            <hr>
<!--                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
-->                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div style="float: right;">
               <?php
    include('includes/footer.php');
    
    ?>
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