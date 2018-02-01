<?php include_once('header.php');

require('connect.php');
    // If the values are posted, insert them into the database.
    //print_r($_POST);


if(isset($_POST) & !empty($_POST)){
     $id = mysqli_escape_string($connection,$_POST['id']);
     $nama = mysqli_escape_string($connection,$_POST['nama']);
     $a1 = mysqli_escape_string($connection,$_POST['a1']);
     $a2 = mysqli_escape_string($connection,$_POST['a2']);
  	 $b1 = mysqli_escape_string($connection,$_POST['b1']);
     $b2 = mysqli_escape_string($connection,$_POST['b2']);
     $ab1 = mysqli_escape_string($connection,$_POST['ab1']);
  	 $ab2 = mysqli_escape_string($connection,$_POST['ab2']);
     $o1 = mysqli_escape_string($connection,$_POST['o1']);
  	 $o2 = mysqli_escape_string($connection,$_POST['o2']);
     $password = md5($_POST['sandi']);

			$sql = "INSERT INTO `datastok` (id,nama,a1,a2,b1,b2,ab1,ab2,o1,o2) values ('$id','$nama','$a1','$a2','$b1','$b2','$ab1','$ab2','$o1','$o2')";
			$res = mysqli_query($connection, $sql);

			$sql = "INSERT INTO `admin` (username, password, valid) values('$id','$password','1')";
			$res = mysqli_query($connection, $sql);

      $mes = "Successful"; $cgh= "green";
      } else {
      	$mes = "Unsuccessful"; $cgh = "lit";
      }

?>
		<h1>Input Otoritas RS dan Data Sementara</h1>
		<div id="box">
			<div class="box-top"></div>
			<div class="box-panel" >
        <?php if(isset($_POST) & !empty($_POST)){ ?>
        <a class="button" id="<?php echo $cgh; ?>"><?php echo $mes?></a>
      <?php } ?>
        <table>
          <tr  valign="top>
            <th width="40%"">
              <div><form class="form-signin" method="POST"  enctype="multipart/form-data">
    				 	<label for="tgl_buat">ID</label><br>
    				 	<input class="pantura" type="text" name="id" required="required"><br>
    				 	<label for="tgl_terima">Nama Rumah Sakit</label><br>
    				 	<input class="pantura" type="text" name="nama" required="required"><br>
    				 	<label for="tgl_terima">Kata Sandi</label><br>
    				 	<input class="pantura" type="password" name="sandi" required="required"><br>
    				 	</div>

            </th>

            <th width="15%">
              <div>
      				<label for="pengirim">A-</label>
      				<input class="pantura" type="number" name="a1" min="0" max="100" required="required">
              <label for="pengirim">A+</label>
              <input class="pantura" type="number" name="a2" min="0" max="100" required="required">
              </div>
              </th>


                          <th width="15%">
                            <div>
                            <label for="pengirim">B-</label>
                            <input class="pantura" type="number" name="b1" min="0" max="100" required="required">
                            <label for="pengirim">B+</label>
                            <input class="pantura" type="number" name="b2" min="0" max="100" required="required">
                            </div>
                            </th>

                            <th width="15%">
                              <div>
                                <label for="pengirim">AB-</label>
                                <input class="pantura" type="number" name="ab1" min="0" max="100" required="required">
                              <label for="pengirim">AB+</label>
                              <input class="pantura" type="number" name="ab2" min="0" max="100" required="required">
                              </div>
                              </th>
                                                          <th width="15%">
                                                            <div>
                                                              <label for="pengirim">O-</label>
                                                              <input class="pantura" type="number" name="o1" min="0" max="100" required="required">
                                                            <label for="pengirim">O+</label>
                                                            <input class="pantura" type="number" name="o2" min="0" max="100" required="required">
                                                            </div>
                                                            </th>

            </div> </div>

          </tr>
        </table>

        <button class="pantura" type="submit" class="btn btn-default">Submit</button>
      </form>
		</div>
<?php include_once('footer.php'); ?>
