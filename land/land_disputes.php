<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
include_once('sms/ESMSWS.php');
include_once('sms/pass.php');
mysqli_set_charset($conn,"utf8");
date_default_timezone_set("Asia/Colombo");
$msg="";
$error="";
//Add record details
if(isset($_POST['add']))
{ 

$name=$_POST['name'];
$addr=$_POST['addr'];
$nic=$_POST['nic'];
$tpno=$_POST['tpno'];
$ds=$_POST['ds'];
$gnd=$_POST['gnd'];
$req=$_POST['req'];
  

  $sqlr=mysqli_query($conn,"INSERT INTO land_disputes(applicant_name,addres,nic,contact,ds,gnd,requirement) 
  value('$name','$addr','$nic','$tpno','$ds','$gnd','$req')");
  $affected = $conn -> affected_rows;


if($affected == 1){
    $sms="ඔබගේ ඉඩම් ගැටලුව සම්බන්ධ ඉල්ලීම් ලිපිය දිස්ත්‍රික් ලේකම් කාර්‍යාලය වෙත ලැබී ඇත.";
    $phone=$tpno;
    $smsuser;
    
    ////$st= serviceTest("","esmsusr_13tn","Wim@l#413","");
    ////print_r($st);
    ////$ali='GA Matale';
    function sendsms($sms,$phone,$smsuser,$smspwd){
        $session=createSession('',$smsuser,$smspwd,'');
    $sts=sendMessagesMultiLang($session,'GA MATALE',$sms,array($phone),0); // 1 for promotional messages, 0 for normal message
        
    closeSession($session);
    }
    
    sendsms($sms,$phone,$smsuser,$smspwd);
}else{
    $error="වැරැද්දක් සිදු වී ඇත නැවත උත්සහ කරන්න";
}

    if ($sqlr) {
  
        $msg="නිවැරදිව තොරතුරු ඇතුලත් කලා";
  }
  else
    {
      $error="වැරැද්දක් සිදු වී ඇත නැවත උත්සහ කරන්න";
    }
//header('Location:add_records.php');
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

    <title>LAND - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function(){

            $("#ds").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getuser.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#gnd").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var name = response[i]['name'];

                            $("#gnd").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                });
            });

        });
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

         <?php include('includes/sidebar.php');?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

 <?php include('includes/header.php');?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="btn-group" role="group" aria-label="Basic example">
                      
                    <?php echo "<a href='tree_cut.php' class='btn btn-secondary'>දැව හෙලීම්</a>"; ?>
                    <?php echo "<a href='dmg_elephant.php' class='btn btn-success'>වන අලි හානි</a>"; ?>    
                      <?php echo "<a href='land_disputes.php' class='btn btn-secondary'>ඉඩම් ගැටලු</a>"; ?>  
                  </div><br><br>

					                       <div class="col-xl-12 col-lg-7">

										<?php if($error){?>
										<div class="errorWrap btn-sm btn btn-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                						else if($msg){?>
										<div class="succWrap btn-sm btn btn-success"><strong>SUCCESS </strong>:<?php echo htmlentities($msg); ?> </div><?php }?>



                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ඉඩම් ගැටලු</h6>
									
                                </div>
                                <div class="card-body">
                                    <!--<form action=""  id="form" method="post" name="additems" enctype="multipart/form-data" class="form-horizontal">-->
				<!---->						
				

									  <form required id="example-form" method="post" name="myForm" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validateForm()" >
                                            <div class="form-row">
												 <div class="col-md-6">
													<div class="form-group"><label class="small mb-1" for="record_room_no">අයදුම්කරුගේ නම :</label>
													<input class="form-control" id="record_room_no" required type="text" name="name" placeholder="අයදුම්කරුගේ නම" />
													</div>
											 	 </div>
												 <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="other">ලිපිනය :</label>
													<input required class="form-control" id="other" name="addr" type="text" placeholder="ලිපිනය"  />
													</div>
                                                </div>
												 <div class="col-md-3">
                                                    <div class="form-group"><label class="small mb-1" for="shelf_no">ජාතික හැඳුනුම්පත් අංකය :</label>
													<input  required class="form-control" id="shelf_no" name="nic" type="text" placeholder="ජා.හැ. අංකය"  />
													</div>
                                                </div>
												<div class="col-md-3">
                                                    <div class="form-group"><label class="small mb-1" for="file_no">දුරකථන අංකය :</label>
													<input required class="form-control" id="file_no" name="tpno" type="text" placeholder="දුරකථන අංකය"  />
													</div>
                                                </div>
												<div class="input-field col-md-3">
												   <div class="form-group"><label class="small mb-1" for="section">ප්‍රා. ලේ. කාර්යාලය</label><br>
                                                   <select id="ds" name="ds" class="form-control" required="required" oninvalid="this.setCustomValidity('කරුණාකර තෝරන්න')"oninput="setCustomValidity('')">
   <option value="">තෝරන්න</option>
   <?php 
   // Fetch Department
   $sql_department = "SELECT * FROM div_sec";
   $department_data = mysqli_query($conn,$sql_department);
   while($row = mysqli_fetch_assoc($department_data) ){
      $departid = $row['divno'];
      $depart_name = $row['divna'];
      
      // Option
      echo "<option value='".$departid."' >".$depart_name."</option>";
   }
   ?>
</select>
												    </div>
                                                </div>
												
												
												
												
											
											<div class="col-md-3">
                                                    <div class="form-group"><label class="small mb-1" for="file_name">ග්‍රාම නිලධාරි වසම :</label>
                                                    <select id="gnd" name="gnd" class="form-control">
                      <option value="">තෝරන්න</option>
                      </select>													</div>
                                                </div>
												
											<div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="duration">ගැටලුව :</label>
													<input required class="form-control py-4" id="duration" name="req" type="text" placeholder="ගැටලුව"  />
													</div>
                                                </div>
											<!--	<div class="col-md-3">
                                                    <div class="form-group"><label class="small mb-1" for="date_destroy">විනාශ කල යුතු දිනය :</label>
													<input required class="form-control py-4" id="date_destroy" name="date_destroy" type="date" placeholder="විනාශ කල යුතු දිනය"  />
													</div>
                                                </div>
												<div class="col-md-12">
                                                    <div class="form-group"><label class="small mb-1" for="other">ලිපිනය :</label>
													<input required class="form-control py-4" id="other" name="other" type="text" placeholder="වෙනත්"  />
													</div>
                                                </div>-->
											</div>
                                          <hr>
											<div class="form-group mt-4 mb-0">
											<!--<button type="submit" name="add" onClick="return valid();" id="add" class="btn btn-sm btn-primary">ADD</button>-->
											 <button type="submit" name="add" id="add" class="btn btn-primary " onClick="return valid();">ADD</button>
                                                    <button type="reset" class="btn btn-dark" >RESET</button>

											
											</div>
											</form>
										<!--	</form>-->
                                    
                                </div>
                            </div>

                       
                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<?php
    include('includes/footer.php');
    
    ?>

  <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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