<?php
include 'php/auth.php';

// If cookie exists, go straight to table
if (isset($_SESSION['user_id']) && isset($_COOKIE['remember_me'])) {
    header("Location: table.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Web course work">
	<meta name="keywords" content="WWW, Web, HTML, CSS, JavaScript">
	<meta name="author" content="Igor(C)">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>account login</title>
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
			height: 960px;
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
			padding: 5% 10%;
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
		.inp_field {
			font-size: 25px;
			width: 300px;
			padding: 10px 20px;
		}
		.tran {
			transform: translate(0px, -50px);
		}
		.log_buttons {
			width: 300px;
			margin-top: 3%;
			display: flex;
			flex-direction: row;
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
		}
		.log:link {color: white; text-decoration: none;}
		.log:visited {color: white; text-decoration: none;}
		.log:hover {color: white; text-decoration: underline; cursor: pointer;}
		.log:active {color: white; text-decoration: none;}
		.line {
			border: 1px solid gray;
			width: 105%;
			margin-top: 5%;
		}
		.google {
			height: auto;
			width: 50px;
			margin: 5% 0% 0% 5%;
			border: 2px solid black;
			border-radius: 100%;
		}
		.google:link {border-color: blue;}
		.google:visited {border-color: blue;}
		.google:hover {border-color: blue;}
		.google:active {border-color: blue;}

		.remember_me {
			padding: 0px;
		}

		a.profile:link {color: #0072FF; text-decoration: none}
		a.profile:visited {color: #0072FF; text-decoration: none}
		a.profile:hover {color: #0072FF; text-decoration: underline}
		a.profile:active {color: #0072FF; text-decoration: none;}
		@media screen and (max-width: 1100px) {
			body {height: 1800px;}
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
			<form id="loginForm" action="php/login.php" method="POST">
				<p style="font-size: 20px;">Email</p>
				<input type="email" id="email" name="email" class="inp_field" placeholder="Enter email">
				<p style="font-size: 20px; margin-top: 20px;">Password</p>
				<input type="password" id="password" name="password" class="inp_field" placeholder="Enter password">
				<p id="loginError" style="color: red; margin-top: 5px; font-size: 20px;"></p>
				<?php
				if (isset($_SESSION['login_error'])) {
					echo '<p style="color:red; margin-top:5px; font-size:20px;">' . $_SESSION['login_error'] . '</p>';
					unset($_SESSION['login_error']); // clear message after displaying
				}
    			?>
				<div class="log_buttons">
					<button type="submit" class="log">Log in</button>
					<a href="php/google-login.php" id="google-login-link">
						<img src="google_logo.png" class="google">
					</a>
				</div>
				<label>
					<input type="checkbox" name="remember_me" class="remember_me" id="remember_me"> Remember me
				</label>
			</form>
			<div class="line"></div>
			<p>Not registered yet? <a href='sign_up.php' class='profile'>create a profile</a></p>
		</div>
	</main>
	<script>
	document.getElementById("loginForm").addEventListener("submit", function(e) {
		let empty = false;
		const inputs = ['email', 'password'];

		inputs.forEach(function(id) {
			const input = document.getElementById(id);
			if (input.value.trim() === "") {
				input.style.border = "2px solid red";
				empty = true;
			} else {
				input.style.border = "";
			}
		});

		if (empty) {
			e.preventDefault();
			document.getElementById("loginError").innerText = "Please fill in all fields!";
		}
	});

	document.getElementById('google-login-link').addEventListener('click', function(e){
		const remember = document.getElementById('remember_me').checked ? 1 : 0;
		e.preventDefault(); // prevent default link
		window.location.href = 'php/google-login.php?remember=' + remember;
	});
	</script>
</body>
</html>