<?php session_start() ?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Web course work">
	<meta name="keywords" content="WWW, Web, HTML, CSS, JavaScript">
	<meta name="author" content="Igor(C)">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>index</title>
	<link rel="icon" href="" type="image/png">
	<link rel="stylesheet" type="text/css" href="">
	<script src="" type="text/javascript"></script>
		<!--  Google Font  -->
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
	<link rel='stylesheet' href=''><!--CSS-->
	<style>
		* {box-sizing: border-box;}
		body {
			margin: 0px;
			height: 962px;
			font-family: 'Source Sans Pro';
		}
		main {
			margin: 0px;
			height: 100%;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
		}
		.side {
			width: 30%;
			background-image: url('1634667136_8-papik-pro-p-plakat-khimiya-8.jpg');
			background-attachment: fixed;	
			background-repeat: no-repeat;
			background-size: contain;
			overflow: hidden;
		}
		.side1 {
			width: 70%;
			padding: 5% 10%;
			font-size: 30px;
		}
		h1 {
			font-size: 80px;
			color: #0072FF;
		}
		.loga {
			background-color: #0072FF;
			padding: 1% 5%;
			text-align: center;
			border: 1px solid black;
		}
		a.loga:link {color: white; text-decoration: none;}
		a.loga:visited {color: white; text-decoration: none;}
		a.loga:hover {color: white; text-decoration: underline;}
		a.loga:active {color: white; text-decoration: none;}
		@media screen and (max-width: 1100px) {
			body {height: 1350px;}
			main {flex-direction: column;}
			.side {width: 100%; height: 50%; background-position: center; background-size: cover; background-attachment: inherit;}
			.side1 {width: 100%;}
            h1 {font-size: 50px}
		}
	</style>
</head>
<body>
	<main>
		<div class="side">
		</div>
		<div class="side1">
			<article class='graph'>
				<h1>What would you like to do today?</h1>
				<p>Access school's lab or explore publicly available information and data about the lab</p>
			</article>
			<a href='log_in.php' class="loga">Log in</a>
		</div>
	</main>
</body>
</html>