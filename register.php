<?php
    require('connect.php');


if(isset($_POST) & !empty($_POST)){
    $username = mysqli_escape_string($connection,$_POST['username']);
    $password = md5($_POST['password']);

    $sql = "INSERT INTO `admin` (username, password) values ('$username','$password')";
    $result = mysqli_query($connection, $sql);
        if($result){
        $smsg = "Registration Successful";
    } else {
        $fmsg = "Registration Failed";
    }
}

    ?>

<!DOCTYPE html>
<html>
<head>
<title>Registration!</title>
<link rel="stylesheet" type="text/css" href="frontpage/styles/global.css" />
<link rel="stylesheet" href="styles.css" >
</head>
<body>



<div class="container">
      <form class="form-signin" method="POST">
	    <?php if(isset($smsg)){ ?><div class="alert" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert" role="alert"> <?php echo $fmsg; ?> </div><?php } ?><br/><br/>

        <h2 class="form-signin-heading" style="margin-left:22%;"><img src="frontpage/image/logo.png"  height="150px" width="150px"></h2>
        <div class="input-group">
	    <label class="sr-only">Username</label>
        <input type="text" name="username" class="pantura" placeholder="Username" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="pantura" placeholder="Password" required>
        <button class="pantura" type="submit">Register</button>
        <a class="pantura centereds" href="login.php">Login</a>
      </form>
</div>

</body>
</html>
