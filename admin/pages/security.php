<?php
  include("../template/config.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <script src="../../js/jquery-3.3.1.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" href="../../css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="../../css/master.css">

  <link rel="icon" href="../../img/icon.png">
  <title>iCon - Security settings</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark" id="admin-nav">
    <div class="container">
      <a class="navbar-brand" href="../../index.php">
        <img src="../../img/icon-text.png" width="auto" height="30" alt="iConnect">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php">User</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Security</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <div class="card-cred container ">
      <h2 >Security Settings</h2>
      <form action = "security.php" method = "post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input class="form-control" name="username" aria-describedby="emailHelp"> <!--value="<?php echo $row['username']; ?>"-->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password"> <!--value="<?php echo $row['password']; ?>"-->
        </div>

        <!-- Button trigger modal -->
        <button type="button" name="save" class="btn btn-success btn-block" data-toggle="modal" data-target="#edit">
          Edit
        </button>

        <!-- Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit admin credentials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action = "security.php" method = "post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">New username</label>
                    <input class="form-control" name="new-user" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="password" class="form-control" name="old-pass">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" name="new-pass">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" name="confirm" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>

</body>

<!--script src="../../js/jquery-3.3.1.slim.js"></script-->
<script src="../../js/bootstrap.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );

  function myFunction() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
  };
</script>

</html>
