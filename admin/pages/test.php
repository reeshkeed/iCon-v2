<?php
  $connect = mysqli_connect('localhost', 'root', '', 'icon');

  $query = "SELECT * FROM user ORDER BY ID DESC";
  $result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="../../css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../../css/master.css">
    <title>Test</title>
  </head>
  <body>
    <div class="container">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Mac address</th>
                <th>Model</th>
                <th>IP address</th>
                <th>Passcode</th>
                <th>Time remaining</th>
                <th>Time in</th>
                <th>Time out</th>
              </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
              echo '
              <tr>
                <th scope="row">'.$row["id"].'</th>
                <td>'.$row["mac_address"].'</td>
                <td>'.$row["model"].'</td>
                <td>'.$row["ip_address"].'</td>
                <td>'.$row["passcode"].'</td>
                <td>'.$row["time_remaining"].'</td>
                <td>'.$row["time_in"].'</td>
                <td>'.$row["time_out"].'</td>
              </tr>
              ';
            }
            ?>
          </tbody>
      </table>
    </div>
  </body>

  <script src="js/jquery-3.3.1.slim.js"></script>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>
</html>
