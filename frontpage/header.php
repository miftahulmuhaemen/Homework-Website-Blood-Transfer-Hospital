

<!--<!DOCTYPE html> -->
<html>
<head>
	<title>Data Stok Rumah Sakit</title>
	<link rel="stylesheet" type="text/css" href="styles/global.css" />
</head>

<body>

<div id="header">
	<div class="logo"><a href="#">APLIKASI<span> MONITORING STOK  DARAH RUMAH SAKIT </span></a></div>
	<div class="keluar"><a href="http://localhost/logout.php">Keluar</a></div>
</div>

<?php

$check = $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

session_start();
if(isset($_SESSION) & !empty($_SESSION)){
	if($_SESSION['valid'] == 0)
			$cros3 = $cros4 = $cros5 = $cros8 = 'hide';
	if($_SESSION['valid'] == 1)
		$cros2 = $cros7 = 'hide';

	if(strpos($url,'inputotoritasrs.php') !== false){
		//if($cros3 != 'hide')
		$cros2 = 'selected';
	}
	elseif(strpos($url,'otoritasmanajemen.php') !== false){
		//if($cros4 != 'hide')
		$cros7 = 'selected';
	}
	elseif(strpos($url,'datauptodate.php') !== false){
		//if($cros4 != 'hide')
		$cros3 = 'selected';
	}
	elseif(strpos($url,'request.php') !== false){
		//if($cros5 != 'hide')
		$cros4 = 'selected';
	}
	elseif(strpos($url,'verifikasitransfer.php') !== false){
		//if($cros6 != 'hide')
		$cros5 = 'selected';
	}
	elseif(strpos($url,'datastokdarah.php') !== false){
		//if($cros7 != 'hide')
		$cros6 = 'selected';
	}
	elseif(strpos($url,'invoicetransfer.php') !== false){
		//if($cros7 != 'hide')
		$cros8 = 'selected';
	}
} else {
				$cros2 = $cros3 = $cros4 = $cros5 = $cros7 = $cros8 = 'hide';
}

?>

<div id="container">
	<div class="sidebar">
		<ul id="nav">
				<li><a class="<?php echo $cros2?>" href="inputotoritasrs.php">Otoritas</a></li>
					<li><a class="<?php echo $cros3?>" href="datauptodate.php">Data Up to Date</a></li>
					<li><a class="<?php echo $cros4?>" href="request.php">Request</a></li>
						<li><a class="<?php echo $cros5?>" href="verifikasitransfer.php">Verifikasi Transfer</a></li>
							<li><a class="<?php echo $cros7?>" href="otoritasmanajemen.php">Manajemen Akun</a></li>
								<li><a class="<?php echo $cros8?>" href="invoicetransfer.php"><i>Invoice</i> Transfer</a></li>
							<li><a class="<?php echo $cros6?>" href="datastokdarah.php">Data Stok Darah</a></li>

		</ul>
	</div>
	<div class="content">
