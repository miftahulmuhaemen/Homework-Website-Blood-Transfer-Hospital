<?php
session_start();
    require('connect.php');

    if(isset($_POST['buton']) & !empty($_POST['buton'])){
          header('location: ../frontpage/datastokdarah.php');
    }


else if(isset($_POST) & !empty($_POST)){
    $username = mysqli_escape_string($connection,$_POST['username']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    $r = mysqli_fetch_assoc($result);
    if($count == 1){
        $_SESSION['username'] = $username;
        $_SESSION['valid'] = $r['valid'];
    } else {
        $fmsg = "Invalid Username or Password";
    }
    // = mysqli_query($connection, $sql);
}
if(isset($_SESSION['username'])){
    $smsg = "User Already Logged in";
    header('location: ../frontpage/datastokdarah.php');
}

    ?>

<!DOCTYPE html>
<html>
<head>
<title>Login!</title>
<link rel="stylesheet" type="text/css" href="frontpage/styles/global.css" />
<link rel="stylesheet" href="styles.css">
</head>
<body>



<div class="container">


      <form class="form-signin" method="POST">
              <?php if(isset($smsg)){ ?><div role="alert" class="pantura centereds"> <?php echo $smsg; ?> </div><?php } ?>
             <?php if(isset($fmsg)){ ?><div role="alert" class="pantura centereds"> <?php echo $fmsg; ?> </div><?php } ?><br/><br/>
        <h2 class="form-signin-heading" style="margin-left:22%;"><img src="frontpage/image/logo.png"  height="150px" width="150px"></h2>
        <div class="input-group">

        <label class="sr-only">Username</label>
        <input type="text" name="username" class="pantura" placeholder="Username">
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="pantura" placeholder="Password">
        <button name="boton" class="pantura" type="submit">Login</button>
        <button name="buton" class="pantura" type="submit" value="guest">Guest</button>
      </form>
</div>

</body>
</html>
