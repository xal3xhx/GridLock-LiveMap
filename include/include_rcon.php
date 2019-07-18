<?php
	require __DIR__ . '/SourceQuery/bootstrap.php';
	use xPaw\SourceQuery\SourceQuery;
	
	function rconCommand($host, $port, $pwd, $cmd) {
		$Query = new SourceQuery();
		$error = false;
		try {
			$Query->Connect($host, $port, 1, SourceQuery::SOURCE);
			$Query->SetRconPassword($pwd);
			$result = $Query->Rcon($cmd);
		}
		catch(Exception $e) {
			$error = true;
			$result = ($e->getMessage());
		}
		finally {
			$Query->Disconnect();
		}
		
		$obj = array("err","msg");
		$obj = (object)$obj;
		$return = new stdClass();
		$return->err = $error;
		$return->msg = $result;
		return $return;
	}
?>