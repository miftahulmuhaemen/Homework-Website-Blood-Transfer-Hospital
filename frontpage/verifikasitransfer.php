<?php include_once('header.php');

require('connect.php');
    // If the values are posted, insert them into the database.
    //print_r($_POST);
		$UN = $_SESSION['username'];
		$sql = "select * from `datastok` where ID='$UN'";
		$redd = mysqli_query($connection,$sql);
		$rr = mysqli_fetch_assoc($redd);

		$sql = "SELECT * FROM `request`";
		$res = mysqli_query($connection,$sql);

		if(isset($_GET) & !empty($_GET)){
			if($_GET['id']=="jxad2asd"){
			$mes = "Successful Delete"; $cgh= "green"; }
			else if($_GET['id']=="13sadxcd"){
			$mes = "Successful Verified"; $cgh= "green"; }
			else if($_GET['id']=="1"){
			$mes = "Not Enough Blood Stock from Requested RS"; $cgh= "lit"; }
		 else {
				$mes = "Unsuccessful"; $cgh = "lit";}
		}
?>
				<h1>Verifikasi Transfer Darah</h1>
		<p><i>Latest Update.</i></p>
		<div id="box"><form class="form-signin" method="POST"  enctype="multipart/form-data" id="formad">
			<div class="box-top"></div>
			<div class="box-panel">
				 	<div>
						<?php if(isset($_GET) & !empty($_GET)){ ?>
						<a class="button" id="<?php echo $cgh; ?>"><?php echo $mes?></a>
					<?php } ?>
						<table width="100%">
						<tr bgcolor="#FEC606">
						<th >Current Stock RS</th>
	          <th>A-</th>
	          <th>A+</th>
	          <th>B-</th>
	          <th>B+</th>
	          <th>AB-</th>
	          <th>AB+</th>
	          <th>O-</th>
	          <th>O+</th>
	          </tr>

						<tr>
						<td><?php echo $rr['Nama']; ?></td>
						<td><?php echo $rr['A1']; ?></td>
						<td><?php echo $rr['A2']; ?></td>
						<td><?php echo $rr['B1']; ?></td>
						<td><?php echo $rr['B2']; ?></td>
						<td><?php echo $rr['AB1']; ?></td>
						<td><?php echo $rr['AB2']; ?></td>
						<td><?php echo $rr['O1']; ?></td>
						<td><?php echo $rr['O2']; ?></td>
	        </tr>
				</table>

				 	<table width="100%">
					<tr bgcolor="#FEC606">
					<th rowspan="2">Request RS</th>
					<th rowspan="2">Requested RS</th>
					<th colspan="8">Stok Darah</th>
					<th rowspan="2" colspan="2">Aksi</th>
					</tr>
          <tr bgcolor="#FEC606">
          <th>A-</th>
          <th>A+</th>
          <th>B-</th>
          <th>B+</th>
          <th>AB-</th>
          <th>AB+</th>
          <th>O-</th>
          <th>O+</th>
          </tr>
					<?php
					while($r = mysqli_fetch_assoc($res)) {

						if($r['Requested']==$rr['Nama']){
						?>

					<tr>
						<input type="hidden" name="Number" value="<?php echo $r['Number'] ?>">
					<td><?php echo $r['Request']; ?></td>
					<td><?php echo $r['Requested']; ?></td>
					<td><?php echo $r['A1']; ?></td>
					<td><?php echo $r['A2']; ?></td>
					<td><?php echo $r['B1']; ?></td>
					<td><?php echo $r['B2']; ?></td>
					<td><?php echo $r['AB1']; ?></td>
					<td><?php echo $r['AB2']; ?></td>
					<td><?php echo $r['O1']; ?></td>
					<td><?php echo $r['O2']; ?></td>
					<td><a class="button" id="lit" href="delete.php?Number=<?php echo $r['Number']; ?>">Delete</a></td>
					<td><a class="button" id="green" href="verified.php?Number=<?php echo $r['Number']; ?>&Nama=<?php echo $rr['Nama']; ?>">Verified</a></td>
        </tr>
			<?php } } ?>
			</table>

			</div>
</form>
		</div>
<?php include_once('footer.php'); ?>
