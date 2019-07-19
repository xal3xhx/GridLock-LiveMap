<?php
include_once('../include/api.php');

echo" <input type='checkbox' name='Server[]' value='All/All Servers in cluster'> All Servers in cluster <br />"; 
foreach($slaves as $slave) {
	if(isset($slave['info'])) {
		$value = $slave['unique'] . "/" . $slave['instanceName'];
		echo"<input type='checkbox' name='Server[]'' value='$value'>"; 
		echo($slave['instanceName'] . "	");

		$online = is_resource(@fsockopen($slave['publicIP'], $slave['rconPort']));
		if($online) {
			echo('<font style="color: green">Online</font><br />');
		}
		else {
			echo('<font style="color: red">Ofline</font><br />');
		}
	}
}
?>