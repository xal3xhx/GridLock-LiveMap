<?php
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

