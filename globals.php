<?php


	function iptables_unblock_https($mac,$ethernet,$ip)
	{
	 shell_exec("sudo iptables -t nat -D PREROUTING -i ".$ethernet." -p tcp --destination-port 443 -m mac --mac-source ". $mac ." -j DNAT --to-destination ".$ip);
	}

	function iptables_block_https($mac,$ethernet,$ip)
	{
	 shell_exec("sudo iptables -t nat -A PREROUTING -i ".$ethernet." -p tcp --destination-port 443 -m mac --mac-source ". $mac ." -j DNAT --to-destination ".$ip);
	}

	function allow_service_https($mac,$ethernet,$ip)
	{
	 shell_exec("sudo iptables -t nat -A PREROUTING -i ".$ethernet." -p tcp --destination-port 443 -m mac --mac-source ". $mac ." -j DNAT --to-destination ".$ip);
	}

	function disallow_service_https($mac,$ethernet,$ip)
	{
	 shell_exec("sudo iptables -t nat -D PREROUTING -i ".$ethernet." -p tcp --destination-port 443 -m mac --mac-source ". $mac ." -j DNAT --to-destination ".$ip);
	}

	/*
	* get user's IP address
	*/
	function get_ip() {
		return $_SERVER['REMOTE_ADDR'];

	}

	/*
	* get user's MAC
	*/
	function get_mac() {
		$ip = get_ip();

		/* identifying user mac addrress */
		$mac = shell_exec("/usr/sbin/arp -an | grep '(". $ip .")'" ); // Uncomment once in testing phase
		preg_match('/..:..:..:..:..:../',$mac, $matches);
		$mac  = @$matches[0];

		// if MAC Address couldn't be identified.
		if( $mac === NULL)
		{
		    $mac = '';
		}

		return $mac;
	}
	
	
	/*
	 * Allown internet by mac on wlan0 interface
	 */
	function allow_wlan0_internet($ip, $mac) {
		//  Reconnect the device to the firewall
		exec("sudo rmtrack " . $ip);
		$i = "sudo iptables -t mangle -A wlan0_Outgoing  -m mac --mac-source " . $mac . " -j MARK --set-mark 2";
		exec($i);
		
		sleep(5);
	}

	function disallow_wlan0_internet($ip, $mac) {
		$i = "sudo iptables -t mangle -D wlan0_Outgoing  -m mac --mac-source " . $mac . " -j MARK --set-mark 2";
		exec($i);
		sleep(5);
	}
	
	/*
	* @param string $mac - mac address
	* allow mac address in iptables internet
	*/
	function iptables_allow_internet($mac) {
		shell_exec("sudo iptables -t mangle -I internet 1 -m mac --mac-source ".$mac." -j RETURN");
	}

	/*
	* @param string $mac - mac address
	* disallow mac address in iptables internet
	*/
	function iptables_remove_internet($mac)
	{
	    	shell_exec("sudo iptables -D internet -t mangle -m mac --mac-source ". $mac ." -j RETURN");
	}

	function getServiceAddTime($time) {
  		return $addtime = date('H:i:s',strtotime('+'.$time.' seconds'));
	}

	function smsSender($mobile) {

		// $ci =& get_instance();
		// $ci->load->library('Curl');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://162.209.21.247/broadcaster/?account=EggNPD&accountkey=nFztud&msisdn=".$mobile."&message=aljohn&source=aljohn&rcvd_transid=12345");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
	}

	function isToday($datetime) {
		$isToday = false;
		//echo "<pre>";
		$date = $datetime;
		if(preg_match_all('/([\d]+-)+(\d+)/', $datetime, $match)) {
			$date = $match[0][0];
		}

		$date1 = new DateTime($date);
	    $date2  = new DateTime ( 'now');
	    $interval = $date1->diff($date2);
        if( $interval->format('%R%a ') == 0){
        	$isToday = true;
        }
        return $isToday;
	}

	/*
	*@return array device info
	*/
	function get_device_info() {
		# load getbrowser library for device info
		require_once('getbrowser.php');
		# get user Device Info
		$browser = new Browser(); // Constructor
		$device = array(
				'browser' => $browser->getBrowser(),
				'platform' => $browser->getPlatform()
			);

		return $device;
	}

	function sleeper($secs = 2) {
		sleep($secs);
	}
