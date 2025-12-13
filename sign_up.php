<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Web course work">
	<meta name="keywords" content="WWW, Web, HTML, CSS, JavaScript">
	<meta name="author" content="Igor(C)">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>account sign up</title>
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
			height: 900px;
			font-family: 'Source Sans Pro';
		}
		main {
			margin: 0px;
			height: 100%;
			display: flex;
			flex-direction: row;
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
			padding: 2% 10%;
			font-size: 30px;
		}
		.back {
			font-size: 25px;
		}
		a.back:link {color: black; text-decoration: none;}
		a.back:visited {color: black; text-decoration: none;}
		a.back:hover {color: black; text-decoration: underline;}
		a.back:active {color: black; text-decoration: none;}
		h1 {
			font-size: 80px;
			color: #0072FF;
		}
		p {
			margin: 0px;
		}
		input {
			font-size: 25px;
			width: 300px;
			padding: 10px 20px;
		}
		.tran {
			transform: translate(0px, -50px);
		}
		.log {
			display: block;
			background-color: #0072FF;
			padding: 12px;
			width: 170px;
			text-align: center;
			font-size: 24px;
			color: white;
			border: 1px solid black;
			margin-top: 3%;
		}
		.log:link {color: white; text-decoration: none;}
		.log:visited {color: white; text-decoration: none;}
		.log:hover {color: white; text-decoration: underline; cursor: pointer;}
		.log:active {color: white; text-decoration: none;}

		@media screen and (max-width: 1100px) {
			body {height: 2200px;}
			main {flex-direction: column;}
			.side {width: 100%; height: 50%; background-position: center; background-size: cover; background-attachment: inherit;}
			.side1 {width: 100%;}
            h1 {font-size: 60px;}
		}
	</style>
</head>
<body>
	<main>
		<div class="side">
			
		</div>
		<div class="side1">
			<a href='index.php' class='back'>Back to home page</a>
			<article class='graph'>
				<h1>What would you like to do today?</h1>
				<p class="tran">Chemistry laboratory accounting system</p>
			</article>
			<form id="registerForm" action="php/registration.php" method="POST">
				<p style="font-size: 20px;">Name</p>
				<input type="text" id="first_name" name="first_name" placeholder="Enter name">
				<p style="font-size: 20px; margin-top: 20px;">Last name</p>
				<input type="text" id="last_name" name="last_name" placeholder="Enter last name">
				<p style="font-size: 20px; margin-top: 20px">Email</p>
				<input type="email" id="email" name="email" placeholder="Enter email">
				<p style="font-size: 20px; margin-top: 20px;">Password</p>
				<input type="password" id="password" name="password" placeholder="Enter password">
				<?php
					if (isset($_SESSION['register_error'])) {
						echo '<p style="color:red; margin-top:5px; font-size:20px;">' . $_SESSION['register_error'] . '</p>';
						unset($_SESSION['register_error']);
					}
				?>
				<button type="submit" class="log">Sign up</button>
			</form>
		</div>
	</main>
	<script>
	document.getElementById("registerForm").addEventListener("submit", function(e) {
		let empty = false;

		// Get all inputs
		const inputs = ['first_name', 'last_name', 'email', 'password'];
		inputs.forEach(function(id) {
			const input = document.getElementById(id);
			if (input.value.trim() === "") {
				input.style.border = "2px solid red";  // Highlight empty fields
				empty = true;
			} else {
				input.style.border = "";  // Reset border if not empty
			}
		});

		if (empty) {
			e.preventDefault();  // Stop form submission
		}
	});
	</script>
</body>
</html>