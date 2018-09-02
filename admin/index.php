<?php
   include("template/config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']);

      $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: pages/dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/master.css">

    <link rel="icon" href="../img/icon.png">
    <title>iCon - Wifi Vending Machine</title>
  </head>
  <body class="dark-bg">

  <div class="content">
    <div class="card-login text-light container ">
      <div class="text-center">
        <a class="brand-title" href="../index.php">
          <img src="../img/icon-text.png" class="d-inline-block align-top" alt="">
        </a>
      </div>
      <form action = "" method = "post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input class="form-control dark-input" name="user" aria-describedby="emailHelp" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control dark-input" name="pass" placeholder="Password">
        </div>
        <button id="btn-login" type="submit" name="Submit" class="btn btn-outline-secondary btn-block">Login</button>
      </form>
    </div>
  </div>

  <script src="../js/jquery-3.3.1.slim.js"></script>
  <script src="../js/bootstrap.js"></script>
  </body>
</html>
