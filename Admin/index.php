<?php
?>

<!DOCTYPE html>
<html class="dark">
<head>
<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include('includes/design-top.php');?>
<?php include('includes/navigation.php');?>

<?php include('../include/api.php');?>
<?php include('../include/config.php');?>


<div class="container" id="main-content">
	<h2>Enter a Message.</h2>
<p>
	this will send a message to the Server(s)<br />
</p>


<form name="form" action="" method="post">
<?php include("includes/Select.php");?><br/>
  <input type="text" name="message" id="message" value="">
	<input type="submit" name="RUN" id="RUN" value="RealCluster" />
  <input type="submit" name="RUNTEST" id="RUNTEST" value="TestCluster" /><br/>
</form>

<?php
if(array_key_exists('RUN',$_POST)) {
	$Server = $_POST['Server'];
  if(empty($Server)) {
    echo("You didn't select any Servers.");
  } 
  else {
    $N = count($Server);
    $message = $_POST['message'];
    echo("You selected $N server(s): ");
    forEach($Server as $info) {
        list($first,$second) = explode("/",$info);
        $instanceId = $first;

        echo "<br>";
        echo ("Server ID: " . $first) . "<br>";
        echo ("Server Name: " . $second) . "<br>";
        //echo "<br>";

        if ($instanceId == "All") {
        	runcommand('/silent-command game.print("' . $message . '")', $token);
        	echo "<br>";
        }
    else {
    	runcommand('/silent-command game.print("' . $message . '")', $token, $instanceId);
    	echo "<br>";
    		}
        }
    echo "<br>";
    }
  }

if(array_key_exists('RUNTEST',$_POST)) {
	$Server = $_POST['Server'];
  if(empty($Server)) {
    echo("You didn't select any Servers.");
  } 
  else {
    $N = count($Server);
    $message = $_POST['message'];
    echo("You selected $N server(s): ");
    forEach($Server as $info) {
        list($first,$second) = explode("/",$info);
        $instanceId = $first;

        echo "<br>";
        echo ("Server ID: " . $first) . "<br>";
        echo ("Server Name: " . $second) . "<br>";
        //echo "<br>";

        if ($instanceId == "All") {
        	runcommandTest('/silent-command game.print("' . $message . '")', $TestToken);
        	echo "<br>";
        }
    else {
    	runcommandTest('/silent-command game.print("' . $message . '")', $TestToken, $instanceId);
    	echo "<br>";
    		}
        }
    }
  }
?>

</form>
</div>

<?php include("includes/footer.php");?>

</body>
</html>