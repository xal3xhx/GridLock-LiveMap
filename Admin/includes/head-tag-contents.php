<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<title>Command Panel</title>

<style>
	/* A font by Jos Buivenga (exljbris) -> www.exljbris.com */
	@font-face {
	  font-family: Delicious-Roman; /* roman*/
	  src: ('../../assets/../../assets/Delicious-Roman.otf');
	}
	@font-face {
	  font-family: Delicious-Bold;
	  src: url(('../../assets/Delicious-Bold.otf');
	}
	@font-face {
	  font-family: Delicious-Italic;
	  src: ('../../assets/../../assets/Delicious-Italic.otf');
	}
	@font-face {
	  font-family: Delicious-BoldItalic;
	  src: ('../../assets/../../assets/Delicious-BoldItalic.otf');
	}
	@font-face {
	  font-family: Delicious-Heavy;
	  src: ('../../assets/../../assets/Delicious-Heavy.otf');
	}
	@font-face {
	  font-family: Delicious_SmallCaps;
	  src: ('../../assets/../../assets/Delicious_SmallCaps.otf');
	}
	* {
		background-color: #000000;
    	/*color: #ffdead;*/
    	border-color: #ff8000;
		/*margin-top:20px;
		margin-left:20px;*/
	}
	.jumbotron {
		background-color: #ff0000;
    	color: #00ff00;
    	border-color: #80ff00;
	}
	body {
		background-color: #0000ff;
    	color: #0080ff;
    	border-color: #8000ff;
		margin-top:20px;
		margin-left:20px;
	}
	.footer {
		background-color: #80ff80;
    	color: #ffff00;
    	border-color: #00ffff;
		margin-top:20px;
		margin-left:20px;
		font-size: 14px;
		text-align: center;
	}
	hr {
	    border: none;
	    height: 1px;
	    /*margin-left:2px;*/
	    /* Set the hr color */
	    color: #ff00ff; /* old IE */
	    background-color: #ff80ff; /* Modern Browsers */
	}
	p{
		font-family: Delicious-Roman;
		font-size: 18px;
		color: #ffffff
	}
	a{
		font-family: Delicious-Roman;
		color: #ffff80
	}
	
</style>