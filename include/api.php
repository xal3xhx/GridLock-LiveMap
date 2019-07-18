<?php
function runCommand($command, $token, $nodeId = null) {
    $curl = curl_init('http://panel.factorio.events:8336/api/runCommand');
    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        [
            'X-Access-Token: '.$token,
            'Content-Type: application/json',
            'Cache-Control: no-cache',
            'Accept: */*'
        ]
    );
    if ($nodeId !== null) {
        $data = ['command' => $command, 'instanceID' => $nodeId];
    } else {
        $data = ['command' => $command, 'broadcast' => true];
    }
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    echo $command, ' => ', curl_exec($curl), PHP_EOL;
    curl_close($curl);
}

function runCommandTest($command, $token, $nodeId = null) {
    $curl = curl_init('94.237.89.108:10000/api/runCommand');
    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        [
            'X-Access-Token: '.$token,
            'Content-Type: application/json',
            'Cache-Control: no-cache',
            'Accept: */*'
        ]
    );
    if ($nodeId !== null) {
        $data = ['command' => $command, 'instanceID' => $nodeId];
    } else {
        $data = ['command' => $command, 'broadcast' => true];
    }
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    echo $command, ' => ', curl_exec($curl), PHP_EOL;
    curl_close($curl);
}
?>

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