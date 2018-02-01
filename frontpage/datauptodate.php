<?php include_once('header.php');

require('connect.php');
    // If the values are posted, insert them into the database.
    //print_r($_POST);

$UN = $_SESSION['username'];
$sql = "select * from `datastok` where ID='$UN'";
$res = mysqli_query($connection,$sql);
$r = mysqli_fetch_assoc($res);


if(isset($_POST) & !empty($_POST)){
     $a1 = mysqli_escape_string($connection,$_POST['a1']);
     $a2 = mysqli_escape_string($connection,$_POST['a2']);
  	 $b1 = mysqli_escape_string($connection,$_POST['b1']);
     $b2 = mysqli_escape_string($connection,$_POST['b2']);
     $ab1 = mysqli_escape_string($connection,$_POST['ab1']);
  	 $ab2 = mysqli_escape_string($connection,$_POST['ab2']);
     $o1 = mysqli_escape_string($connection,$_POST['o1']);
  	 $o2 = mysqli_escape_string($connection,$_POST['o2']);
     $sql = "UPDATE `datastok` SET a1='$a1', a2='$a2', b1='$b1', b2='$b2', ab1='$ab1', ab2='$ab2', o1='$o1', o2='$o2' where ID='$UN'";
			$res = mysqli_query($connection, $sql);
			if($res){
        $mes = "Successful"; $cgh= "green";
        } else {
        	$mes = "Unsuccessful"; $cgh = "lit";
        }
}



?>
		<h1>Data Up to Date <?php echo $r['Nama'] ?></h1>
		<div id="box">
			<div class="box-top"></div>
			<div class="box-panel" >
        <?php if(isset($_POST) & !empty($_POST)){ ?>
        <a class="button" id="<?php echo $cgh; ?>"><?php echo $mes?></a>
      <?php } ?>
        <table>
          <tr>
            <th width="40%">
              <div><form class="form-signin" method="POST"  enctype="multipart/form-data">
    				 	<label for="tgl_buat">ID</label><br>
    				 	<input class="pantura" type="text" name="id" placeholder="<?php echo $r['ID'] ?>" disabled><br>
    				 	<label for="tgl_terima">Nama Rumah Sakit</label><br>
    				 	<input class="pantura" type="text" name="nama" placeholder="<?php echo $r['Nama'] ?>" disabled><br>
    				 	</div>

            </th>

            <th width="15%">
              <div>
      				<label for="pengirim">A-</label>
      				<input class="pantura" type="number" name="a1" min="0" max="100" required="required"  value="<?php echo $r['A1'] ?>">
              <label for="pengirim">A+</label>
              <input class="pantura" type="number" name="a2" min="0" max="100" required="required" value="<?php echo $r['A2'] ?>">
              </div>
              </th>


                          <th width="15%">
                            <div>
                            <label for="pengirim">B-</label>
                            <input class="pantura" type="number" name="b1" min="0" max="100" required="required" value="<?php echo $r['B1'] ?>">
                            <label for="pengirim">B+</label>
                            <input class="pantura" type="number" name="b2" min="0" max="100" required="required" value="<?php echo $r['B2'] ?>">
                            </div>
                            </th>

                            <th width="15%">
                              <div>
                                <label for="pengirim">AB-</label>
                                <input class="pantura" type="number" name="ab1" min="0" max="100" required="required"  value="<?php echo $r['AB1'] ?>">
                              <label for="pengirim">AB+</label>
                              <input class="pantura" type="number" name="ab2" min="0" max="100" required="required" value="<?php echo $r['AB2'] ?>">
                              </div>
                              </th>
                                                          <th width="15%">
                                                            <div>
                                                              <label for="pengirim">O-</label>
                                                              <input class="pantura" type="number" name="o1" min="0" max="100" required="required" value="<?php echo $r['O1'] ?>">
                                                            <label for="pengirim">O+</label>
                                                            <input class="pantura" type="number" name="o2" min="0" max="100" required="required" value="<?php echo $r['O2'] ?>">
                                                            </div>
                                                            </th>

            </div> </div>

          </tr>
        </table>

        <button class="pantura" type="submit" class="btn btn-default">Update</button>
      </form>
		</div>
<?php include_once('footer.php'); ?>
