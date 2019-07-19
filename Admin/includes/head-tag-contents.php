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
	  src: ('../../assets/Delicious-Roman.otf');
	}
	@font-face {
	  font-family: Delicious-Bold;
	  src: url('../../assets/Delicious-Bold.otf');
	}
	@font-face {
	  font-family: Delicious-Italic;
	  src: ('../../assets/Delicious-Italic.otf');
	}
	@font-face {
	  font-family: Delicious-BoldItalic;
	  src: ('../../assets/Delicious-BoldItalic.otf');
	}
	@font-face {
	  font-family: Delicious-Heavy;
	  src: ('../../assets/Delicious-Heavy.otf');
	}
	@font-face {
	  font-family: Delicious_SmallCaps;
	  src: ('../../assets/Delicious_SmallCaps.otf');
	}
	* {
		background-color: #000000;
    	border-color: #ffdead;
		color: #ffdead;
		font-size: 18px;
		font-family: Delicious-Roman;
	}
	.jumbotron {
    	border-color: #152025;
	}
	body {
    	border-color: #ffdead;
		color: #ffdead;
		font-size: 18px;
		font-family: Delicious-Roman;
		background-color: #000000;
    	border-color: #8000ff;
		margin-top:20px;
		margin-left:20px;
	}
	.footer {
		font-family: Delicious-Roman;
		background-color: #101020;
    	border-color: #00ffff;
		margin-top:20px;
		margin-left:20px;
		font-size: 14px;
		text-align: center;
	}
	hr {
		font-family: Delicious-Roman;
		color: #20a0ff;
	    border: none;
	    height: 1px;
	    /*margin-left:2px;*/
	    
	    background-color: #ff80ff; /* Modern Browsers */
	}
	p{
		font-family: Delicious-Roman;

	}
	a{
		font-family: Delicious-Bold;
		color: #20a0ff
	}
	
</style>