<?php
require_once('connect.php');
if(isset($_GET) & !empty($_GET)){
	//$Number = $_GET['Number'];

$id =  mysqli_escape_string($connection,$_GET['Number']);
echo $sql = "DELETE FROM `request` where Number=$id";
if(mysqli_query($connection, $sql)){
    header('location: invoicetransfer.php?id=jxad2asd');
}else{
  header('location: invoicetransfer.php?id=0');
}

}

?>
