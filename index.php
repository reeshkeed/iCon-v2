<?php
include 'globals.php';

  if (isset($_POST['submit'])) {
	$mac = get_mac();
	$ip = get_ip();
	//var_dump($mac, $ip);exit;
	
	allow_wlan0_internet($ip, $mac);
	header("Location: http://google.com.ph");
	die();

  } else {
  	echo "test";
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
        <div class="form-group">
          <label>Enter passcode here</label>
          <input type="passcode" class="form-control" id="passcode" aria-describedby="emailHelp" placeholder="Passcode">
	</div>
	<input type='submit' class='btn btn-block enter-button' value="Enter" name='submit'/>
      </form>
    </div>
  </div>

  <!--div id="about-us" class="footer">

  </div-->

<?php include 'template/footer.php' ?>
