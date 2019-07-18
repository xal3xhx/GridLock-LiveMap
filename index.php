<?php
	include_once('include/api.php');
	include_once('include/config.php');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token: $token"));
	$response = curl_exec($ch);
	// Then, after your curl_exec call:
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	$header = substr($response, 0, $header_size);
	$slaves = json_decode(substr($response, $header_size), true);
	
	curl_close ($ch);
?>
<html>
	<head>
		<title>Gridlock live map</title>
		<style>
			body {
				margin: 0px;
				padding: 0px;
				background-color: black;
				color: white;
			}
		</style>
	</head>
	<body>
		<?php
			foreach($slaves as $slave) {
				if(isset($slave['info'])) {
					print_r($slave['instanceName']);
					echo(' @ '.$slave['publicIP'].':'.$slave['serverPort']."\r\n<br />Status: ");
					$online = is_resource(@fsockopen($slave['publicIP'], $slave['rconPort']));
					if($online) {
						echo('<font style="color: green">Online</font><br />');
						echo('<a href="steam://rungameid/427520//--mp-connect='.$slave['publicIP'].':'.$slave['serverPort'].'">Click here</a> to connect to the server (only works if you have Factorio on Steam)<br />'."\r\n");
						$rconResult = rconCommand($slave['publicIP'], $slave['rconPort'], $slave['rconPassword'], '/p o');
						if(!$rconResult->err) {
							echo($rconResult->msg."<br />\r\n");
						}
					} else {
						echo('<div style="color: red">Offline</div>');
					}
					echo("\r\n<br />\r\n");
					print_r($slave['info']);
					echo("\r\n<hr />\r\n");
				}
			}
			if(isset($_GET['debug']) && $_GET['debug'] === 'Master-Guy') {
				print_r($slaves);
			}
		?>
	</body>
</html>