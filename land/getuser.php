<?php 

include("includes/connectiondb.php");
$departid = 0;

if(isset($_POST['depart'])){
   $departid = mysqli_real_escape_string($conn,$_POST['depart']); // department id
}

$users_arr = array();

if($departid > 0){
   $sql = "SELECT gncode,gnname FROM gntable WHERE divsec=".$departid;
 
   $result = mysqli_query($conn,$sql);

   while( $row = mysqli_fetch_array($result) ){
      $userid = $row['gncode'];
      $name = $row['gnname'];

      $users_arr[] = array("id" => $userid, "name" => $name);
   }
}
// encoding array to json format
echo json_encode($users_arr);