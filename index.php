<?php
	include_once("admin/includes/head-tag-contents.php");
	include_once('include/api.php');
	include_once('include/config.php');
?>
<link href="/admin/includes/styles.css" rel="stylesheet">
<html>
	<head>
		<title>Gridlock live map</title>
</head>
	<body>

<?php

			foreach($slaves as $slave) {
				if(isset($slave['info'])) {
					echo('<p>');
					//print_r($slave);
					print_r($slave['instanceName']);
					echo(' @ '.$slave['publicIP'].':'.$slave['serverPort']."\r\n<br />Status: ");
					//check if online through ptero
					//if({online("33e9b691",$PteroToken)) {

					//check if online through fsocket
					$online = is_resource(@fsockopen($slave['publicIP'], $slave['rconPort']));
					if($online) {
						echo('<font style="color: green">Online</font><br />');
						echo('<a href="steam://rungameid/427520//--mp-connect='.$slave['publicIP'].':'.$slave['serverPort'].'">Click here</a> to connect to the server (only works if you have Factorio on Steam)<br />'."\r\n");
						echo("UPS: ");
						echo($slave['meta']['UPS'] . "<br />\r\n");
						$rconResult = rconCommand($slave['publicIP'], $slave['rconPort'], $slave['rconPassword'], '/p o');
						$password = rconCommand($slave['publicIP'], $slave['rconPort'], $slave['rconPassword'], '/config get password');
						if(!$rconResult->err) {
							echo($password->msg."<br />\r\n");
							echo($rconResult->msg."<br />\r\n");
						}
						else {
							echo ($rconResult->msg);
						}
					} 
					else {
						echo('<font style="color: red">Ofline</font><br />');
					}
					echo("\r\n<br />\r\n");
					//print_r($slave['info']);
					echo("\r\n<hr />\r\n");
					echo('</p>');
				}
			}
		?>
	</body>
</html>

<?php include_once("admin/includes/footer.php");?>