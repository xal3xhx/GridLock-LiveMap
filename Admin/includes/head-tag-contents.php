<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<title>Command Panel</title>

<style>
	* {
		background-color: #222;
    	color: #e6e6e6;
    	border-color: #e6e6e6;
		margin-top:20px;
		margin-left:20px;
	}
	.jumbotron {
		background-color: #222;
    	color: #e6e6e6;
    	border-color: #e6e6e6;
	}
	body {
		background-color: #222;
    	color: #e6e6e6;
    	border-color: #e6e6e6;
		margin-top:20px;
		margin-left:20px;
	}
	.footer {
		background-color: #222;
    	color: #e6e6e6;
    	border-color: #e6e6e6;
		margin-top:20px;
		margin-left:20px;
		font-size: 14px;
		text-align: center;
	}
	hr {
	    border: none;
	    height: 1px;
	    margin-left:2px;
	    /* Set the hr color */
	    color: #333; /* old IE */
	    background-color: #333; /* Modern Browsers */
	}
</style>