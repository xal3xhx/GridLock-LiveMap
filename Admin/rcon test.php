<?php include("includes/head-tag-contents.php");?>
<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }
?>
<?php include('../include/api.php');?>
<?php include('../include/config.php');?>

<?php
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

<link href="includes/styles.css" rel="stylesheet">

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>


<div class="container" id="main-content">
  <h2>Test of rcon</h2>

<form name="form" action="" method="post">
  <input type="submit" name="Start" id="Start" value="rcon" /><br/>
</form>

<?php
// checks if button is pressed
if(array_key_exists('Start',$_POST)) {

  foreach($slaves as $slave) {
        if(isset($slave['info'])) {
          print_r($slave['instanceName']);
        }
      }  
}
?>

</form>
</div>


<?php include("includes/footer.php");?>

</body>
</html>

