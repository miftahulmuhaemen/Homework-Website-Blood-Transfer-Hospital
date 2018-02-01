<?php include_once('header.php');

require('connect.php');
    // If the values are posted, insert them into the database.
    //print_r($_POST);
$sql = "SELECT * FROM `datastok`";
$res = mysqli_query($connection,$sql);

?>
				<h1>Data Stok Darah</h1>
		<p><i>Latest Update.</i></p>
		<div id="box"><form class="form-signin" method="POST"  enctype="multipart/form-data" id="formad">
			<div class="box-top"></div>
			<div class="box-panel">
				 	<div>

				 	<table width="100%">
					<tr bgcolor="#f2f2f2">
					<th rowspan="2">ID Rumah Sakit</th>
					<th rowspan="2">Nama Rumah Sakit</th>
					<th colspan="8">Stok Darah</th>
					</tr>
          <tr bgcolor="#f2f2f2">
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
						?>

					<tr>
					<td><?php echo $r['ID']; ?></td>
					<td><?php echo $r['Nama']; ?></td>
					<td><?php echo $r['A1']; ?></td>
					<td><?php echo $r['A2']; ?></td>
					<td><?php echo $r['B1']; ?></td>
					<td><?php echo $r['B2']; ?></td>
					<td><?php echo $r['AB1']; ?></td>
					<td><?php echo $r['AB2']; ?></td>
					<td><?php echo $r['O1']; ?></td>
					<td><?php echo $r['O2']; ?></td>
        </tr>
					<?php } ?>
			</table>

			</div>
</form>
		</div>
<?php include_once('footer.php'); ?>
