<?php include_once('header.php');

require('connect.php');
    // If the values are posted, insert them into the database.
    //print_r($_POST);

if(isset($_POST) & !empty($_POST)){
	$temp = $_POST['delete'];

$sql = "DELETE FROM `admin` where username='$temp'";
$res = mysqli_query($connection,$sql);

$sql = "DELETE FROM `datastok` where ID='$temp'";
$res = mysqli_query($connection,$sql);

$mes = "Successful"; $cgh= "green";
} else {
	$mes = "Unsuccessful"; $cgh = "lit";
}


$sql = "SELECT ID, Nama FROM `datastok`";
$res = mysqli_query($connection,$sql);


?>
				<h1>Manajemen Akun</h1>
		<p><i>Latest Update.</i></p>
		<div id="box"><form class="form-signin" method="POST"  enctype="multipart/form-data" id="formad">
			<div class="box-top"></div>
			<div class="box-panel">
				 	<div>
						<?php if(isset($_POST) & !empty($_POST)){ ?>
						<a class="button" id="<?php echo $cgh; ?>"><?php echo $mes?></a>
					<?php } ?>
				 	<table width="100%">
					<tr bgcolor="#f2f2f2">
					<th>ID</th>
					<th width="70%">Rumah Sakit</th>
					<th>Aksi</th>
					</tr>

					<?php
					while($r = mysqli_fetch_assoc($res)) {
						?>

					<tr>
					<td><?php echo $r['ID']; ?></td>
					<td><?php echo $r['Nama']; ?></td>
					<td><button name="delete" value="<?php echo $r['ID']; ?>" class="pantoro" type="submit" class="btn btn-default" >Delete</button></td>
        </tr>
					<?php } ?>
			</table>

			</div>
</form>
		</div>
<?php include_once('footer.php'); ?>
