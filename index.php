<?php
include 'globals.php';
	$connect = mysqli_connect('localhost', 'admin', 'password', 'icon');
	$message_error = '';
	
	if (isset($_POST['submit'])) {
		$mac = get_mac();
		$ip = get_ip();
		$model = get_device_info();
		$pass = $_POST['code'];
		$date = date('Y-m-d H:i:s');
		
		$check_code = "SELECT status FROM user where passcode='" .$pass. "';";
		$query_code = mysqli_query($connect, $check_code);
		$get_code = mysqli_fetch_assoc($query_code);
		//var_dump($get_code);exit;
		
		if ($get_code['status'] == "inactive"){
			$query = "UPDATE user SET model='" .$model['platform']. "', ip_address='" .$ip. "', mac_address='" .$mac. "', time_in='" .$date."', status ='active' WHERE passcode='" .$pass. "';";
			$result = mysqli_query($connect, $query);
			
			allow_wlan0_internet($ip, $mac);
			header("Location: http://google.com.ph");
			die();
		} else {
			$message_error = "Code already been used.";
		}
	}

include 'template/header.php';
?>

  <div class="main-bg">
    <div class="container text-light text-center content">
      <div>
        <img src="img/icon.png" class="img-fluid mx-auto d-block logo">
        <h2 class="h2 headings">Welcome to iCon Wi-fi Vending Machine</h2>
      </div>

      <form id="form-code"  action='' method='post'>
		  <?php if(!empty($message_error)) { ?> 
			<div class="alert alert-danger" role="alert">
			  <?php echo $message_error ?>
			</div>
		  <?php }  ?>
        <div class="form-group">
          <label>Enter passcode here</label>
          <input type="passcode" class="form-control" name="code" id="code" aria-describedby="emailHelp" placeholder="Passcode">
	</div>
	<input type='submit' class='btn btn-block enter-button' value="Enter" name='submit'/>
      </form>
    </div>
  </div>

  <!--div id="about-us" class="footer">

  </div-->

<?php include 'template/footer.php' ?>
