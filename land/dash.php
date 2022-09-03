<?php

include("includes/connectiondb.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAND - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    
    <!-- Sidebar -->
    <?php include('includes/sidebar.php');?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include('includes/header.php');?>
     

        <main class="bg-gradient-login" style="background-size: cover ;background-image: url('img/1.jpg') ; background-repeat: no-repeat;background-attachment: fixed">

        
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">දැව හෙලීම්</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
$sql="SELECT * FROM tree_cut";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d Record\n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

?>
                      </div>
                      
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-tree fa-2x text-success"></i>
                  </a>
                    </div>
                  </div>
                  

                </div>
              </div>
            </div>


     <!-- Earnings (Annual) Card Example -->
     <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">ඉඩම් ගැටලු</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
$sql="SELECT * FROM land_disputes";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d Record\n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

?>
                      </div>
                      
                    </div>
                    <div class="col-auto">
                   
                    <i class="fas fa-home fa-2x text-warning"></i>
                  </a>
                    </div>
                  </div>
                 

                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">වන අලි හානි සදහා වන්දි ගෙවීම</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      <?php
$sql="SELECT * FROM dmg_elephant";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf(" %d Record\n",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

?>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-hippo fa-2x text-dark"></i>
                  </a>
                    </div>
                  </div>
                  

             
                

                </div>
              </div>
            </div>
    </div>
    </div>
      </div>

      <div class="card-body">
                <div class="p-3 mb-2 bg-gradient text-secondary" role="alert">
                    <h4 class="alert-heading">Welcome!</h4>
                    <p>
                    Have a great day! We cannot solve problems with the kind of thinking we employed when we came up with them.
                    </p>
                    <hr><marquee direction="up" scrolldelay="800">
                    <p class="mb-0">
                    අද දිනය : <label for='inputEmail3' class='col-sm-9 col-form-label'><span id="datetime"></span><script>var dt = new Date();
                    document.getElementById("datetime").innerHTML=dt.toLocaleString();</script> </label>
                    </p></marquee>
                  </div>
                </div>
 <!-- Additional Content -->

 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
      <!-- Footer -->
      <?php
    include('includes/footer.php');
    
    ?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>