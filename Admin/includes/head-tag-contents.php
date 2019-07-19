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
    	border-color: #ffdead;
		/*margin-top:20px;
		margin-left:20px;*/
	}
	.jumbotron {
		background-color: #222;
    	color: #e6e6e6;
    	border-color: #e6e6e6;
	}
	body {
		/*background-color: #222;
    	color: #e6e6e6;
    	border-color: #e6e6e6;
		margin-top:20px;
		margin-left:20px;*/
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
	    /*margin-left:2px;*/
	    /* Set the hr color */
	    color: #FF0060; /* old IE */
	    background-color: #FF0060; /* Modern Browsers */
	}
	p{
		font-family: Delicious-Roman;
		font-size: 18px;
		color: #ffdead
	}
	a{
		font-family: Delicious-Roman;
		color: #0facff
	}
	
</style>