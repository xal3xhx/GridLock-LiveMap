<?php
include_once('config.php');
?>

<!-- return api/slaves -->
<?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token: $token","cache-control: no-cache"));
    $response = curl_exec($ch);
    //print_r(array("X-Access-Token: $token"));
    // Then, after your curl_exec call:
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    //$header = substr($response, 0, $header_size);
    //echo($response);
    $slaves = json_decode(substr($response, $header_size), true);
    
    curl_close ($ch);
?>
<?php
//ptero api that i though was going to be faster but was just slower...
//will still be used for things later

// function online($ID, $PteroToken) {
//  $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://panel.factorio.events/api/client/servers/".$ID."/utilization",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_HTTPHEADER => array(
//     "Authorization: Bearer ".$PteroToken,
//     "Cache-Control: no-cache"),
// ));
    
//  $res = curl_exec($curl);
//  $h_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
//     //$header = substr($res, 0, $h_size);
//     $stat = json_decode($res, true);
//     //echo($res);
//     //echo($stat['attributes']['state']);
//     // if($stat['attributes']['state']) {return True;}
//     // else {return False;}

// return $stat['attributes']['state'];
// curl_close($curl);
// }
?>

<?php
// used to send commands for the /Admin panel
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

//used to send commands to test servers for the /Admin panel
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
// sends commands through rcon using ip, port, and password
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