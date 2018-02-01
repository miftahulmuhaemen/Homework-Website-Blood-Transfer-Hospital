<?php include_once('header.php'); ?>
		<h1>Dasbor</h1>
		
		<div id="box">
			<div class="box-top"></div>
			<div class="box-panel">
				
				<?php

				require('connect.php');
				$sql = 'SELECT count(*) AS status_ya FROM surat_keluar where status=1';
				$hasil = mysqli_query($connection,$sql);
				$data = mysqli_fetch_array($hasil);
				$status_ya = $data['status_ya'];

				$sql = 'SELECT count(*) AS status_no FROM surat_keluar where status=0';
				$hasil = mysqli_query($connection,$sql);
				$data = mysqli_fetch_array($hasil);
				$status_no = $data['status_no'];

				$total = $status_no + $status_ya;

				//prosen status no dan ya
				$prosen_ya = $status_ya/$total * 100;
				$prosen_no = $status_no/$total * 100;

				//panjang batang berdasar prosentase
				$x_prosen_ya = $prosen_ya * 30/100;
				$x_prosen_no = $prosen_no * 30/100;

				$sql = 'SELECT count(*) AS disposisi_ya FROM surat_masuk where disposisi=1';
				$hasil = mysqli_query($connection,$sql);
				$data = mysqli_fetch_array($hasil);
				$disposisi_ya = $data['disposisi_ya'];

				$sql = 'SELECT count(*) AS disposisi_no FROM surat_masuk where disposisi=0';
				$hasil = mysqli_query($connection,$sql);
				$data = mysqli_fetch_array($hasil);
				$disposisi_no = $data['disposisi_no'];

				$total_d = $disposisi_ya + $disposisi_no;

				//prosen status no dan ya
				$prosen_d_ya = $disposisi_ya/$total_d * 100;
				$prosen_d_no = $disposisi_no/$total_d * 100;

				//panjang batang berdasar prosentase
				$y_prosen_ya = $prosen_d_ya * 30/100;
				$y_prosen_no = $prosen_d_no * 30/100;

				$total_pie = $total + $total_d;
				$prosen_ya_pie = $status_ya/$total_pie * 100;
				$prosen_no_pie = $status_no/$total_pie * 100;
				$prosen_d_ya_pie = $disposisi_ya/$total_pie * 100;
				$prosen_d_no_pie = $disposisi_no/$total_pie * 100;



				?>



<b>Surat Keluar (Sudah Ditindaklanjuti)</b> &nbsp;&nbsp;(Jumlah:&nbsp; <?php echo $status_ya; ?> |&nbsp;
 <?php echo $prosen_ya; ?>%)<br/><br/> <div style="height: 10px; width: <?php echo $x_prosen_ya; ?>%; 
 background-color: #FEC606;" title="Laki-laki (Jumlah: <?php echo $status_ya; ?> | <?php echo $prosen_ya; ?>%)"></div>
<br>
<b>Surat Keluar (Belum Ditindaklanjuti)</b> &nbsp;&nbsp;(Jumlah:&nbsp; <?php echo $disposisi_no; ?> |&nbsp; <?php echo $prosen_no; ?>%) <br/><br/><div style="height: 10px; width:
<?php echo $y_prosen_no; ?>%; background-color: #25373D;" title="Perempuan (Jumlah: <?php echo $disposisi_no; ?> | <?php echo $prosen_no; ?>%)"></div>

<br/>

<b>Surat Masuk (Sudah Didisposisi)</b> &nbsp;&nbsp;(Jumlah:&nbsp; <?php echo $disposisi_ya; ?> |&nbsp;
 <?php echo $prosen_d_ya; ?>%)<br/><br/> <div style="height: 10px; width: <?php echo $y_prosen_ya; ?>%; 
 background-color: #2CC990;" title="Laki-laki (Jumlah: <?php echo $status_ya; ?> | <?php echo $prosen_d_ya; ?>%)"></div>
<br>
<b>Surat Masuk (Belum Didisposisi)</b> &nbsp;&nbsp;(Jumlah:&nbsp; <?php echo $disposisi_no; ?> |&nbsp; <?php echo $prosen_d_no; ?>%) <br/><br/><div style="height: 10px; width:
<?php echo $y_prosen_no; ?>%; background-color: #249991;" title="Perempuan (Jumlah: <?php echo $disposisi_no; ?> | <?php echo $prosen_d_no; ?>%)"></div>

<br/>




			</div>
		</div>


<?php include_once('footer.php'); ?>

