<?php
require_once('connect.php');
if(isset($_GET) & !empty($_GET)){
	//$Number = $_GET['Number'];

  		 $id =  mysqli_escape_string($connection,$_GET['Number']);
  		 $sql = "UPDATE `request` SET Verifikasi=1 where Number=$id";
  		 $redd = mysqli_query($connection,$sql);

echo $sql = "DELETE FROM `request` where Verifikasi=1";

  if(mysqli_query($connection, $sql)){
      header('location: verifikasitransfer.php?id=jxad2asd');
  }else{
    header('location: verifikasitransfer.php?id=0');
  }


}

?>
