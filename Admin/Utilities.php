<?php include("includes/head-tag-contents.php");?>
<link href="includes/styles.css" rel="stylesheet">
<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<?php include('../include/api.php');?>
<?php include('../include/config.php');?>


<div class="box">
	<h2>Here are some useful buttons we press all the time..</h2>

<form name="form" action="" method="post">
    <input type="submit" name="RemovePass" id="RemovePass" value="Remove Password on all servers" /><br/>
    <input type="submit" name="SaveServer" id="SaveServer" value="Saves save on all servers" /><br/>
</form>

<?php
// checks if button is pressed
if(array_key_exists('RemovePass',$_POST))	{
	runcommand('/config set password', $token);
}
if(array_key_exists('SaveServer',$_POST))	{
	runcommand('/server-save', $token);
}
?>

</form>
</div>


<?php include("includes/footer.php");?>

</body>
</html>

