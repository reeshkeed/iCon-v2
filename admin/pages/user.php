<?php
  $connect = mysqli_connect('localhost', 'root', '', 'icon');

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
  <title>iCon - User database</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="#">User</a>
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
    <h2 class="title-pages">Users database</h2>
    <div style="border: 1px solid #ced4da; padding: 24px; border-radius: 7px;" class="table-responsive">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Host</th>
            <th>Mac address</th>
            <th>IP address</th>
            <th>T.Remain</th>
            <th>Time in</th>
            <th>Time out</th>
            <th>Passcode</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_array($result)) {
            echo '
            <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["host"].'</td>
            <td>'.$row["mac_address"].'</td>
            <td>'.$row["ip_address"].'</td>
            <td>'.$row["time"].'</td>
            <td>'.$row["time_in"].'</td>
            <td>'.$row["time_out"].'</td>
            <td>'.$row["passcode"].'</td>
            <td>
            <button class="btn btn-danger btn-xs">
            Delete
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
