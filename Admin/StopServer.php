<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }
?>

<!DOCTYPE html>
<html>
<head>
<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>
<?php include("includes/api.php");?>
<?php include("includes/config.php");?>


<div class="container" id="main-content">
  <h2>This Will Start all selected servers.</h2>

<form name="form" action="" method="post">
  <?php include("includes/Select.php");?><br/>
  <input type="submit" name="Start" id="Start" value="Start Selected servers" /><br/>
</form>

<?php
// checks if button is pressed
if(array_key_exists('Start',$_POST)) {
  $Server = $_POST['Server'];
  if(empty($Server)) 
  {
    echo("You didn't select any Servers.");
  } 
  else
  {
    $N = count($Server);

    echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      //echo($Server[$i] . " ");
      //echo explode("/",$Server);
      //$a = implode("/", $Server[$i]) . " ";
      //print_r($Server);
    }
  }
}
?>

</form>
</div>


<?php include("includes/footer.php");?>

</body>
</html>

