<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/connectiondb.php');
mysqli_set_charset($conn,"utf8");
date_default_timezone_set("Asia/Colombo");
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
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
         
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            


          <form required id="example-form" method="post" name="myForm" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validateForm()" >
          <h1 class="h3 mb-0 text-gray-800">වාර්තා </h1><br>
          <div class="btn-group" role="group" aria-label="Basic example">
                      
                      <?php echo "<a href='manage_records.php?type=1' class='btn btn-secondary'>දැව හෙලීම්</a>"; ?> 
                      <?php echo "<a href='manage_records.php?type=3' class='btn btn-success'>වන අලි හානි</a>"; ?>  
 
                      <?php echo "<a href='manage_records.php?type=2' class='btn btn-secondary'>ඉඩම් ගැටලු</a>"; ?>  
                  </div>
                    
          </form>


<?php 

$type=$_GET['type'];


if($type=='1')
{

?>


          </div>
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">දැව හෙලීම්</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                       
                            <tr>
                                
                                <th>හැඳුනුම්පත් අංකය</th>
                                <th>නම</th>
                                <th>ලිපිනය</th>
                                <th>ප්‍රා.ලේ.කාර්‍යාලය</th>
                                <th>ග්‍රා.නි.වසම</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = $conn->query("SELECT * FROM tree_cut");
if($query->num_rows>0)
{
while($row=$query->fetch_assoc()){
  $nds= $row["ds"];
  $ngnd= $row["gnd"];
  $nic= $row["nic"];
  $id= $row["id"];
  $name= $row["applicant_name"];
  $addres= $row["addres"];
  $ga_status=$row["ga_status"];

      $q1 = $conn->query("SELECT * FROM div_sec WHERE divno=$nds");
      if($q1->num_rows>0)
      {
        while($row=$q1->fetch_assoc()){
  
         $divna = $row["divna"];
      }
      }
  
  
      $q2 = $conn->query("SELECT * FROM gntable WHERE gncode=$ngnd");
      if($q2->num_rows>0)
      {
        while($row=$q2->fetch_assoc()){
  
         $gnname = $row["gnname"];
      }
      }


echo" <tr>
<td > <a href='status.php?id=$id&&type=$type'> <span style=color:green> $nic </span></a></td>";
echo "<td>$name</td>
<td>$addres</td>
<td> $divna </td>
<td> $gnname </td>
";

if($ga_status == 0)
{
  echo "<td><span class='badge badge-primary'>New</span></td>";
}

else if($ga_status == 1)
{
  echo "<td><span class='badge badge-success'>Approved</span></td>";
}

else if($ga_status == 2)
{
  echo "<td><span class='badge badge-danger'>Rejected</span></td>";
}

}
}

?>
                      </tr>
                    </tbody>
                  </table>


<?php } else if($type=='2')
{ ?>



</div>
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">ඉඩම් ගැටලු</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                       
                            <tr>
                            <th>හැඳුනුම්පත් අංකය</th>
                                <th>නම</th>
                                <th>ලිපිනය</th>
                                <th>ප්‍රා.ලේ.කාර්‍යාලය</th>
                                <th>ග්‍රා.නි.වසම</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = $conn->query("SELECT * FROM land_disputes");
if($query->num_rows>0)
{
while($row=$query->fetch_assoc()){
  $nds= $row["ds"];
  $ngnd= $row["gnd"];
  $nic= $row["nic"];
  $id= $row["id"];
  $name= $row["applicant_name"];
  $addres= $row["addres"];
$ds_sent=$row["ds_sent"];

      $q1 = $conn->query("SELECT * FROM div_sec WHERE divno=$nds");
      if($q1->num_rows>0)
      {
        while($row=$q1->fetch_assoc()){
  
         $divna = $row["divna"];
      }
      }
  
  
      $q2 = $conn->query("SELECT * FROM gntable WHERE gncode=$ngnd");
      if($q2->num_rows>0)
      {
        while($row=$q2->fetch_assoc()){
  
         $gnname = $row["gnname"];
      }
      }


echo" <tr>
<td > <a href='status.php?id=$id&&type=$type'> <span style=color:green> $nic </span></a></td>";
echo "<td>$name</td>
<td>$addres</td>
<td> $divna </td>
<td> $gnname </td>
";

if($ds_sent == 0)
{
  echo "<td><span class='badge badge-danger'>New</span></td>";
}

else
{
  echo "<td><span class='badge badge-primary'>Old</span></td>";
}

}
}

?>
                      </tr>
                    </tbody>
                  </table>


<?php } else if($type=='3')
{ ?>


</div>
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">වන අලි හානි සදහා වන්දි ගෙවීම</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                       
                            <tr>
                            <th>හැඳුනුම්පත් අංකය</th>
                                <th>නම</th>
                                <th>ලිපිනය</th>
                                 <th>ප්‍රා.ලේ.කාර්‍යාලය</th>
                                <th>ග්‍රා.නි.වසම</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = $conn->query("SELECT * FROM dmg_elephant");
if($query->num_rows>0)
{
while($row=$query->fetch_assoc()){
  $nds= $row["ds"];
  $ngnd= $row["gnd"];
  $nic= $row["nic"];
  $id= $row["id"];
  $name= $row["applicant_name"];
  $addres= $row["addres"];
  $c_comitt=$row["c_comitt"];

      $q1 = $conn->query("SELECT * FROM div_sec WHERE divno=$nds");
      if($q1->num_rows>0)
      {
        while($row=$q1->fetch_assoc()){
  
         $divna = $row["divna"];
      }
      }
  

      $q2 = $conn->query("SELECT * FROM gntable WHERE gncode=$ngnd");
      if($q2->num_rows>0)
      {
        while($row=$q2->fetch_assoc()){
  
         $gnname = $row["gnname"];
      }
      }

echo" <tr>
<td > <a href='status.php?id=$id&&type=$type'> <span style=color:green> $nic </span></a></td>";
echo "<td>$name</td>
<td>$addres</td>
<td> $divna </td>
<td> $gnname </td>
";

if($c_comitt == 0)
{
  echo "<td><span class='badge badge-primary'>New</span></td>";
}

else if($c_comitt== 1)
{
  echo "<td><span class='badge badge-success'>Approved</span></td>";
}

else if($c_comitt== 2)
{
  echo "<td><span class='badge badge-danger'>Rejected</span></td>";
}

}
}

?>
                      </tr>
                    </tbody>
                  </table>


<?php }?>



                </div>
              </div>
            </div>
          <div class="text-center">
          </div>
          </div>
        </div>
        <!---Container Fluid-->
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
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>

</html>