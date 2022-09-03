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
$id = $_GET['id'];
$type=$_GET['type'];


$q1 = $conn->query("SELECT * from tree_cut WHERE id = $id");
if($q1 !== false && $q1->num_rows > 0){
while($row=$q1->fetch_assoc()){

$applicant_name=$row['applicant_name'];
$addres=$row['addres'];
$nic=$row['nic'];
$contact=$row['contact'];
$ds=$row['ds'];
$gnd=$row['gnd'];
$requirement=$row['requirement'];
$tree=$row['tree'];
$qty=$row['qty'];
$ga_status=$row['ga_status'];
$ds_status=$row['ds_status'];
$reject_reason=$row['reject_reason'];

$q1 = $conn->query("SELECT * FROM div_sec WHERE divno=$ds");
if($q1->num_rows>0)
{
  while($row=$q1->fetch_assoc()){

   $divna1 = $row["divna"];
}
}


$q2 = $conn->query("SELECT * FROM gntable WHERE gncode=$gnd");
if($q2->num_rows>0)
{
  while($row=$q2->fetch_assoc()){

   $gnname1 = $row["gnname"];
}
}

}
}


$q2 = $conn->query("SELECT * from land_disputes WHERE id = $id");
if($q2 !== false && $q2->num_rows > 0){
while($row=$q2->fetch_assoc()){

$applicant_name1=$row['applicant_name'];
$addres1=$row['addres'];
$nic1=$row['nic'];
$contact1=$row['contact'];
$ds1=$row['ds'];
$gnd1=$row['gnd'];
$requirement1=$row['requirement'];
$ds_sent=$row['ds_sent'];
$ds_reply=$row['ds_reply'];


$q1 = $conn->query("SELECT * FROM div_sec WHERE divno=$ds1");
if($q1->num_rows>0)
{
  while($row=$q1->fetch_assoc()){

   $divna2 = $row["divna"];
}
}


$q2 = $conn->query("SELECT * FROM gntable WHERE gncode=$gnd1");
if($q2->num_rows>0)
{
  while($row=$q2->fetch_assoc()){

   $gnname2 = $row["gnname"];
}
}
}
}



$q3 = $conn->query("SELECT * from dmg_elephant WHERE id = $id");
if($q3 !== false && $q3->num_rows > 0){
while($row=$q3->fetch_assoc()){

$applicant_name2=$row['applicant_name'];
$addres2=$row['addres'];
$nic2=$row['nic'];
$contact2=$row['contact'];
$ds2=$row['ds'];
$gnd2=$row['gnd'];
$requirement2=$row['requirement'];
$c_comitt=$row['c_comitt'];
$reject_reason2=$row['reject_reason'];

$q1 = $conn->query("SELECT * FROM div_sec WHERE divno=$ds2");
if($q1->num_rows>0)
{
  while($row=$q1->fetch_assoc()){

   $divna3 = $row["divna"];
}
}


$q2 = $conn->query("SELECT * FROM gntable WHERE gncode=$gnd2");
if($q2->num_rows>0)
{
  while($row=$q2->fetch_assoc()){

   $gnname3 = $row["gnname"];
}
}
}
}





if(isset($_POST['submit1'])) 
{

  $ga=$_POST['ga'];
  $rej1=$_POST['rej1'];

  $sql1 = "update tree_cut set ga_status='$ga',reject_reason='$rej1' WHERE id='$id'";
  $insert = $conn->query($sql1);

  
if($ga == 1){
  $sms="ඔබගේ දැව අයදුම්පත දිස්ත්‍රික් ලේකම් තුමා විසින් අනුමැතිය ලබා දී ඇත.";
  $phone=$contact;
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
}else if($ga== 2){

  $sms="ඔබගේ දැව අයදුම්පත දිස්ත්‍රික් ලේකම් තුමා විසින් ප්‍රතික්ෂේප කර ඇත.";
  $phone=$contact;
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
}
echo "<script type='text/javascript'>location.href = 'status.php?id=$id&&type=$type';</script>";


}



if(isset($_POST['submit11'])) 
{
$ds=$_POST['ds'];
$sql11 = "update tree_cut set ds_status='$ds' WHERE id='$id'";
$insert = $conn->query($sql11);

if($ds == 1){
  $sms="අනුමැතිය ලද ඔබගේ අයදුම්පත ප්‍රාදේශීය ලේකම් කාර්‍යාලය වෙත යොමු කර ඇත.";
  $phone=$contact;
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
}
echo "<script type='text/javascript'>location.href = 'status.php?id=$id&&type=$type';</script>";

}





if(isset($_POST['submit2']))
{

  $dssent=$_POST['dssent'];

  $sql2 = "update land_disputes set ds_sent='$dssent' WHERE id='$id'";
  $insert = $conn->query($sql2);

  
if($dssent == 1){
  $sms="ඔබගේ ඉල්ලීම ප්‍රාදේශීය ලේකම් කාර්‍යාලය වෙත යොමුකර ඇත.";
  $phone=$contact1;
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
}
echo "<script type='text/javascript'>location.href = 'status.php?id=$id&&type=$type';</script>";

}


if(isset($_POST['submit22'])) 
{
$dsrply=$_POST['dsrply'];
$sql22 = "update land_disputes set ds_reply='$dsrply' WHERE id='$id'";
$insert = $conn->query($sql22);

if($dsrply == 1){
  $sms="ඔබගේ ඉල්ලීමට ප්‍රාදේශීය ලේකම් කාර්‍යාලයෙන් පිලිතුරු ලැබී ඇත.";
  $phone=$contact1;
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
}
echo "<script type='text/javascript'>location.href = 'status.php?id=$id&&type=$type';</script>";

}





if(isset($_POST['submit3']))
{

  $cc=$_POST['cc'];
  $rej3=$_POST['rej3'];

  $sql3 = "update dmg_elephant set c_comitt='$cc',reject_reason='$rej3' WHERE id='$id'";
  $insert = $conn->query($sql3);

  
if($cc == 1){
  $sms="ඔබගේ ඉල්ලීම අනුව අදාල වන්දි ගෙවීම මාතලේ දිස්ත්‍රික් වන අලි හානි වන්දි කමිටුවෙන් අනුමත කර ඇත.";
  $phone=$contact2;
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
}else if($cc == 2){
  $sms="ඔබගේ ඉල්ලීම අනුව අදාල වන්දි ගෙවීම මාතලේ දිස්ත්‍රික් වන අලි හානි වන්දි කමිටුවෙන් ප්‍රතික්ෂේප කර ඇත.";
  $phone=$contact2;
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
}

echo "<script type='text/javascript'>location.href = 'status.php?id=$id&&type=$type';</script>";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
					                       <div class="col-xl-12 col-lg-7">
                            <!-- Area Chart -->
                            
                                    
	<?php 
    if($type=='1')
    {

    ?>

<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">දැව හෙලීම්</h6>
									
                                </div>
                                <div class="card-body">

<div class="card shadow mb-4">
                          <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">අයදුම්කරුගේ විස්තර</h6>
									
                          </div>
                          <div class="card-body">
                          <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">අයදුම්කරුගේ නම :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$applicant_name</label>"; ?>
													</div>
											 	 </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="other">ලිපිනය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$addres</label>"; ?>
													</div>
                                                </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="shelf_no">ජා.හැ.අංකය :</label>
                        <?php echo "<label for='inputEmail3' class='small mb-1'>$nic</label>"; ?>													</div>
                                                </div>
												<div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="file_no">දුරකථන අංකය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$contact</label>"; ?>
													</div>
                        </div>
												</div>
												
                        <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">ප්‍රා.ලේ.කාර්යාලය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$divna1</label>"; ?>
													</div>
											 	 </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="other">ග්‍රා.නි.වසම :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$gnname1</label>"; ?>
													</div>
                                                </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="shelf_no">ගස් වර්ගය :</label>
                        <?php echo "<label for='inputEmail3' class='small mb-1'>$tree</label>"; ?>													</div>
                                                </div>
												<div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="file_no">සංඛ්‍යාව :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$qty</label>"; ?>
													</div>
                        </div>
												</div>

                        <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">අවශ්‍යතාවය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$requirement</label>"; ?>
													</div>
											 	 </div>
												</div>

												</div>
											</div>


<form required id="example-form" method="post" name="myForm1" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validateForm()" >

<div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     </div>
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                            
                             
                             <th>GA Approve</th>
                             <th>Reject</th>
                             <th>DS Sent</th>
                           </tr>
                         </thead>
    <tbody>


     <tr>
      

       <td>
      
       <?php if($ga_status == '1')
{
  echo " <span class='badge badge-success'>Approved</span>";  
}
else if($ga_status == '2')
{
echo " <span class='badge badge-danger'> Reject</span>";  
} 

else if($ga_status == '0')
{
  echo '

                                                
  <div class="col-md-12">
                                                 
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select class="form-control" name="ga" id="ga">
  <option value="">Select</option>
  <option value="1">Approve</option>
  <option value="2">Reject</option> 
</select><input type="submit" name="submit1" value="Update" class="btn btn-primary">
</div>
<div class="input-group">
</div>
 </div>';
}

?>



     
      </td>

      <td>
        <?php 
        if($ga_status == '2')
        {
          echo $reject_reason;  
        } 

        else if($ga_status == '0')
        {
          echo '<input type="text" class="form-control" name="rej1" placeholder="Reason">';  
        } 
        
        
         ?>
      </td>
      <td>
      
      
      <?php 
      
      if($ga_status == '1')
      {
      if($ds_status == '1')
{
 echo " <span class='badge badge-success'>Sent</span>";  
}
else if($ds_status == '0')
{
 echo '

                                                
<div class="col-md-12">
                                                 
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><select class="form-control" name="ds" id="ds">
 <option value="">Select</option>
 <option value="1">Sent</option> 
</select>
<input type="submit" name="submit11" value="Update" class="btn btn-primary">
</div>
<div class="input-group">
</div>
</div>';
} 
}
else if($ga_status == '0')
{
  echo " <span class='badge badge-warning'>Pending</span>";  

}

else if($ga_status == '2')
{
  echo " <span class='badge badge-danger'>N/A</span>";  

}

?>
     
</td>
     </tr>
    
   </tbody>
</table>

</div>
</div>
</form>

<br>
                          
											

<?php } elseif ($type=='2'){ ?>

  <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">ඉඩම් ගැටලු</h6>
									
                                </div>
                                <div class="card-body">

  <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">අයදුම්කරුගේ විස්තර</h6>
									
                                </div>
                                <div class="card-body">
                          <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">අයදුම්කරුගේ නම :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$applicant_name1</label>"; ?>
													</div>
											 	 </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="other">ලිපිනය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$addres1</label>"; ?>
													</div>
                                                </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="shelf_no">ජා.හැ.අංකය :</label>
                        <?php echo "<label for='inputEmail3' class='small mb-1'>$nic1</label>"; ?>													</div>
                                                </div>
												<div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="file_no">දුරකථන අංකය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$contact1</label>"; ?>
													</div>
                        </div>
												</div>
												
											
                        <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">ප්‍රා.ලේ.කාර්යාලය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$divna2</label>"; ?>
													</div>
											 	 </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="other">ග්‍රා.නි.වසම :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$gnname2</label>"; ?>
													</div>
                                                </div>
												</div>

                        <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">ගැටලුව:</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$requirement1</label>"; ?>
													</div>
											 	 </div>
												</div>

												</div>
											</div>


    <form required id="example-form" method="post" name="myForm2" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validateForm()" >

    <div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     </div>
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>DS Sent</th>
                             <th>DS Repply</th>
                            
                            
                           </tr>
                         </thead>
    <tbody>
     <tr>
       <td>
      
       <?php if($ds_sent == '1')
{
  echo " <span class='badge badge-success'> Sent</span>";   
}
else if($ds_sent == '0')
{
 echo '
 <div class="col-md-12">
                                                 
                           <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                           <select class="form-control" name="dssent" id="dssent">
 <option value="">Select</option>
 <option value="1">Sent</option> 
</select>
<input type="submit" name="submit2" value="Update" class="btn btn-primary">
</div>
                                                     <div class="input-group">
                                                     </div>
                                                </div>  
';
} ?>
       
       </td>

       <td>
      
      <?php 
      

      if($ds_sent == '1'){

if($ds_reply == '1')
{
  echo " <span class='badge badge-success'>Received</span>";  
}
else if($ds_reply == '0')

{
  echo '<div class="col-md-12">
                                                 
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select class="form-control" name="dsrply" id="dsrply">
  <option value="">Select</option>
  <option value="1">Received</option>
  
</select>
<input type="submit" name="submit22" value="Update" class="btn btn-primary">
</div>
                                                     <div class="input-group">
                                                     </div>
                                                </div>  
';
}
}

else if($ds_sent == '0'){
  echo " <span class='badge badge-warning'>Pending</span>";  
}

?>
      
      </td>


     </tr>
   </tbody>
</table>
</div>
</div>
    </form>

<br>

                                





<?php } elseif ($type=='3') {?>

  <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">වන අලි හානි සදහා වන්දි ගෙවීම</h6>
									
                                </div>
                                <div class="card-body">

  <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">අයදුම්කරුගේ විස්තර</h6>
									
                          </div>
                          <div class="card-body">
                          <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">අයදුම්කරුගේ නම :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$applicant_name2</label>"; ?>
													</div>
											 	 </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="other">ලිපිනය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$addres2</label>"; ?>
													</div>
                                                </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="shelf_no">ජා.හැ.අංකය :</label>
                        <?php echo "<label for='inputEmail3' class='small mb-1'>$nic2</label>"; ?>													</div>
                                                </div>
												<div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="file_no">දුරකථන අංකය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$contact2</label>"; ?>
													</div>
                        </div>
												</div>
												
											
                        <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">ප්‍රා.ලේ.කාර්යාලය :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$divna3</label>"; ?>
													</div>
											 	 </div>
                          <div class="col-md-0">
													
											 	 </div>
												 <div class="col-md-3">
                        <div class="form-group"><label class="small mb-1" for="other">ග්‍රා.නි.වසම :</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$gnname3</label>"; ?>
													</div>
                                                </div>
												</div>

                        <div class="form-row">
												 <div class="col-md-3">
													<div class="form-group"><label class="small mb-1" for="record_room_no">හානියේ ස්වාභාවය:</label>
                          <?php echo "<label for='inputEmail3' class='small mb-1'>$requirement2</label>"; ?>
													</div>
											 	 </div>
												</div>

												</div>
											</div>


    <form required id="example-form" method="post" name="myForm3" enctype="multipart/form-data" class="form-horizontal" onSubmit="return validateForm()" >


    <div class="card">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     </div>
                     <div class="table-responsive">
                       <table class="table align-items-center table-flush">
                         <thead class="thead-light">
                           <tr>
                             <th>Compensation Committee</th>
                             
                             <th>Reject</th>
                          
                            
                           </tr>
                         </thead>
    <tbody>
  
     <tr>

       <td>
      
      <?php if($c_comitt == '1')
{
  echo " <span class='badge badge-success'>Approved</span>";  
}
else if($c_comitt == '2')
{
echo " <span class='badge badge-danger'> Reject</span>";  
} 

else if($c_comitt == '0')
{
echo '
<div class="col-md-12">
                                                 
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<select class="form-control" name="cc" id="cc">
<option value="">Select</option>
<option value="1">Approved</option>
<option value="2">Reject</option> 
</select>
<input type="submit" name="submit3" value="Update" class="btn btn-primary">

</div>
                                                     <div class="input-group">
                                                     </div>
                                                </div>  
';  
} 
?>
      
      </td>

      <td>
        <?php 
        
        if($c_comitt == '2')
{
  echo $reject_reason2;  
} 

else if($c_comitt == '0')
{
  echo'<input type="text" class="form-control" name="rej3" placeholder="Reason">';
}

         ?>
      </td>

     </tr>
   </tbody>
</table>

</div>
</div>
    </form>

    
    <?php } ?>
 

                                    
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