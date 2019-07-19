<?php
	include_once('include/api.php');
	include_once('include/config.php');

?>
<html>
	<head>
		<title>Gridlock live map</title>
		<style>
			body {
				background-color: #222;
    			color: #e6e6e6;
    			border-color: #e6e6e6;
			}
		</style>
	</head>
	<body>
		<?php
			//echo("test");
			//print_r($responce);
			//echo("test");
			foreach($slaves as $slave) {
				if(isset($slave['info'])) {
					print_r($slave['instanceName']);
					echo(' @ '.$slave['publicIP'].':'.$slave['serverPort']."\r\n<br />Status: ");
					$online = is_resource(@fsockopen($slave['publicIP'], $slave['rconPort']));
					if($online) {
						echo('<font style="color: green">Online</font><br />');
						echo($slave['UPS']);
						//echo('<a href="steam://rungameid/427520//--mp-connect='.$slave['publicIP'].':'.$slave['serverPort'].'">Click here</a> to connect to the server (only works if you have Factorio on Steam)<br />'."\r\n");
						$rconResult = rconCommand($slave['publicIP'], $slave['rconPort'], $slave['rconPassword'], '/p o');
						if(!$rconResult->err) {
							echo($rconResult->msg."<br />\r\n");
						}
					} else {
						echo('<div style="color: red">Offline</div>');
					}
					echo("\r\n<br />\r\n");
					//print_r($slave['info']);
					echo("\r\n<hr />\r\n");
				}
			}
			if(isset($_GET['debug']) && $_GET['debug'] === 'Master-Guy') {
				print_r($slaves);
			}
		?>
	</body>
</html>