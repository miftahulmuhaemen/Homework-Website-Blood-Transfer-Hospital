<?php
require_once('connect.php');
if(isset($_GET) & !empty($_GET)){
	//$no_urutsm = $_GET['Number'];

		 $id =  mysqli_escape_string($connection,$_GET['Number']);
		 $sql = "UPDATE `request` SET Verifikasi=1 where Number=$id";
		 $redd = mysqli_query($connection,$sql);

	$held = $_GET['Nama'];
	$sql = "SELECT * FROM `request`  where Verifikasi=1 AND Requested='$held'";
	$rem = mysqli_query($connection,$sql);
	$m = mysqli_fetch_assoc($rem);

	$sql = "SELECT * FROM `datastok`  where Nama='$held'";
	$rom = mysqli_query($connection,$sql);
	$o = mysqli_fetch_assoc($rom);

	$a1 = mysqli_escape_string($connection,$m['A1']);
	$a2 = mysqli_escape_string($connection,$m['A2']);
	$b1 = mysqli_escape_string($connection,$m['B1']);
	$b2 = mysqli_escape_string($connection,$m['B2']);
	$ab1 = mysqli_escape_string($connection,$m['AB1']);
	$ab2 = mysqli_escape_string($connection,$m['AB2']);
	$o1 = mysqli_escape_string($connection,$m['O1']);
	$o2 = mysqli_escape_string($connection,$m['O2']);

	$a1P = mysqli_escape_string($connection,$o['A1']);
	$a2P = mysqli_escape_string($connection,$o['A2']);
	$b1P = mysqli_escape_string($connection,$o['B1']);
	$b2P = mysqli_escape_string($connection,$o['B2']);
	$ab1P = mysqli_escape_string($connection,$o['AB1']);
	$ab2P = mysqli_escape_string($connection,$o['AB2']);
	$o1P = mysqli_escape_string($connection,$o['O1']);
	$o2P = mysqli_escape_string($connection,$o['O2']);

	 $a1 = $a1P - $a1;
	 $a2 = $a2P - $a2;
	 $b1 = $b1P - $b1;
	 $b2 = $b2P - $b2;
	 $ab1 = $ab1P - $ab1;
	 $ab2 = $ab2P - $ab2;
	 $o1 = $o1P - $o1;
	 $o2 = $o2P - $o2;

		 if(min($a1,$a2,$b1,$b2,$ab1,$ab2,$o1,$o2)>=-1){
			 $sql = "UPDATE `datastok` SET a1='$a1', a2='$a2', b1='$b1', b2='$b2', ab1='$ab1', ab2='$ab2', o1='$o1', o2='$o2' where Nama='$held'";
			 mysqli_query($connection,$sql);
			 echo $sql = "DELETE FROM `request` where Verifikasi=1";
			 if(mysqli_query($connection, $sql)){
		       header('location: verifikasitransfer.php?id=13sadxcd');
		   }else{
		     header('location: verifikasitransfer.php?id=0');
		   }

		 } else {
				header('location: verifikasitransfer.php?id=1');
		 }

	//$host = $m['']
}


?>
