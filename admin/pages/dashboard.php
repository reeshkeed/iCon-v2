<?php
  $connect = mysqli_connect('localhost', 'admin', 'password', 'icon');

  $query = "SELECT * FROM user ORDER BY ID DESC";
  $result = mysqli_query($connect, $query);
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
  <title>iCon - Dashboard</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="security.php">Security</a>
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

  <div style="padding-top: 20px; padding-bottom: 20px;" class="container">
    <!--h2 class="title-pages">Users statistics</h2>
    <div class="row text-center">
      <div class="col">
        <div class="card bg-light mb-3" style="max-width: 18rem;">
          <div class="card-header"><h5 class="h5">Total users</h5></div>
          <div class="card-body">
            <h1 class="h1">0</h1>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card bg-light mb-3" style="max-width: 18rem;">
          <div class="card-header"><h5 class="h5">Connected</h5></div>
          <div class="card-body">
            <h1 class="h1">1</h1>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card bg-light mb-3" style="max-width: 18rem;">
          <div class="card-header"><h5 class="h5">Diconnected</h5></div>
          <div class="card-body">
            <h1 class="h1">0</h1>
          </div>
        </div>
      </div>
    </div-->

    <h2 class="title-pages">Active users</h2>
    <div style="border: 1px solid #ced4da; padding: 24px; border-radius: 7px;" class="table-responsive">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
          <tr>
            <th>Device</th>
            <th>Mac address</th>
            <th>IP address</th>
            <th>Time In</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_array($result)) {
            echo '
            <tr>
            <td>'.$row["model"].'</td>
            <td>'.$row["mac_address"].'</td>
            <td>'.$row["ip_address"].'</td>
            <td>'.$row["time_in"].'</td>
            <td>'.$row["duration"].'</td>
            <td>'.$row["status"].'</td>
            <td>
            <button class="btn btn-danger btn-xs">
            Block
            </button>
            </td>
            </tr>
            ';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

<!--script src="../../js/jquery-3.3.1.slim.js"></script-->
<script src="../../js/bootstrap.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>

</html>
