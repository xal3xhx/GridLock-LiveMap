<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }
?>

<!DOCTYPE html>
<html class="dark">
<head>
<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<?php include('../include/api.php');?>
<?php include('../include/config.php');?>


<div class="container" id="main-content">
	<h2>Enter a command.</h2>
<p>
	this will send a Command to the Server(s)<br />
	Please make sure you know what youre doing!<br />
	fires get started very easily...<br />
</p>


<form name="form" action="" method="post">
<?php include("includes/Select.php");?><br/>
	<input type="text" name="command" id="command" value="">
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
    $command = $_POST['command'];
    echo("You selected $N server(s): ");
    forEach($Server as $info) {
        list($first,$second) = explode("/",$info);
        $instanceId = $first;

        echo "<br>";
        echo ("Server ID: " . $first) . "<br>";
        echo ("Server Name: " . $second) . "<br>";
        //echo "<br>";

        if ($instanceId == "All") {
          runcommand($command, $token);
          echo "<br>";
        }
    else {
      runcommand($command, $token, $instanceId);
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
    $command = $_POST['command'];
    echo("You selected $N server(s): ");
    forEach($Server as $info) {
        list($first,$second) = explode("/",$info);
        $instanceId = $first;

        echo "<br>";
        echo ("Server ID: " . $first) . "<br>";
        echo ("Server Name: " . $second) . "<br>";
        //echo "<br>";

        if ($instanceId == "All") {
          runcommandTest($command, $TestToken);
          echo "<br>";
        }
    else {
      runcommandTest($command, $TestToken, $instanceId);
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

