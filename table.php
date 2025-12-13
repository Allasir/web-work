<?php
include 'php/auth.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: log_in.php");
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
	<title>table</title>
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
			height: 1000px;
			font-family: 'Source Sans Pro';
		}
		main {
			margin: 0px;
			height: 100%;
			display: flex;
			flex-direction: column;
			flex-wrap: wrap;
		}
		.side {
			width: 100%;
			padding: 1% 10%;
			font-size: 30px;
		}
		.side1 {
			width: 100%;
			padding: 0% 10%;
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
			width: 100%;
			padding: 10px 20px;
			border-radius: 30px;
			border: 1px solid gray;
		}
        .buttons {
            margin-top: 5%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .rad {
            width: 60%;
            white-space: normal;
            display: flex;
        }
		input[type='button']:hover {
			cursor: pointer;
		}
		.viss {
			height: 55px;
			margin-left: 20px;
			background-color: #0072FF;
			width: 180px;
			text-align: center;
			border: 1px solid #0072FF;
			border-radius: 30px;
			color: white;
		}
        .vielas, .apr {
            background-color: white;
            height: 55px;
            margin-left: 20px;
            color: #0072FF;
            width: 250px;
            text-align: center;
            border: 1px solid #0072FF;
            border-radius: 30px;
        }
		.loga:link {color: white; text-decoration: none;}
		.loga:visited {color: white; text-decoration: none;}
		.loga:hover {color: white; text-decoration: none;}
		.loga:active {color: white; text-decoration: underline;}
		.tabula {
			border-collapse: collapse;
			width: 100%;
		}
		.tabula tr td {
			padding: 4px;
			border-bottom: 10px solid #E5E5E5;
		}
		.tabula td:nth-child(1) {
			text-align: center;
		}
		.tabula tr th {
			color: white;
			background-color: #00004A;
			font-size: 22px;
			text-align: left;
			padding: 8px;
		}
		@media screen and (max-width: 1500px) {
			body {height: 1100px;}
            .buttons {
                flex-direction: column;
            }
            .rad {
                width: 100%;
                flex-direction: column;
            }
            .rad input {
                font-size: 18px; /* adjust as needed */
                height: auto; /* allow button to grow */
                padding: 10px 20px; /* keeps nice shape */
            }
			input {width: 90%; margin-bottom: 20px;}
            .viss, .vielas, .apr {
                white-space: normal;
            }
            td {
                border-left: 3px solid #E5E5E5;
                border-right: 3px solid #E5E5E5;
                font-size: 10px;
                padding: 3px;
            }
            .tabula tr th {
                font-size: 12px;
                padding: 3px;
            }
		}
	</style>
</head>
<body>
	<main>
		<div class="side">
			<a href="php/logout.php" class='back'>Back to home page and <b>logout</b></a>
			<article class='graph'>
				<h1>Public database</h1>
				<p style="text-decoration: underline; text-decoration-color: #0072FF;">In this database you can view available substances and equipment.</p>
			</article>
			<div class='buttons'>
				<div>
					<input type="text" id='searc' onchange="sear()" size="25" maxlength="500" placeholder="search">
				</div>
				<div class="rad">
					<input type="button" class="viss" onclick="look();" value="Show all">
					<input type="button" class="vielas" onclick="viel();" value='Show substances'>
					<input type="button" class="apr" onclick="aprik();" value='Show equipment'>
				</div>
			</div>
		</div>
		<div class="side1">
			<table class='tabula'>
				<tr>
					<th style="text-align: center;">
						ID
					</th>
					<th>
						Name
					</th>
					<th>
						Type
					</th>
					<th>
						Subtype
					</th>
					<th>
						Number
					</th>
					<th>
						Weight
					</th>
				</tr>
				<tr id='1'>
					<td>
						KL1042724
					</td>
					<td>
						Catalyst
					</td>
					<td>
						Equipment
					</td>
					<td>
						Container
					</td>
					<td>
						23
					</td>
					<td>
					</td>
				</tr>
				<tr id='2'>
					<td>
						KL1042723
					</td>
					<td>
						Burette
					</td>
					<td>
						Equipment
					</td>
					<td>
						Container
					</td>
					<td>
						20
					</td>
					<td>
					</td>
				</tr>
				<tr id='3'>
					<td>
						KL1042742
					</td>
					<td>
						HCl
					</td>
					<td>
						Substance
					</td>
					<td>
						Acid
					</td>
					<td>
						19
					</td>
					<td>
						40
					</td>
				</tr>
				<tr id='4'>
					<td>
						KL1042741
					</td>
					<td>
						Flask
					</td>
					<td>
						Equipment
					</td>
					<td>
						Container
					</td>
					<td>
						20
					</td>
					<td>
					</td>
				</tr>
				<tr id='5'>
					<td>
						KL1042534
					</td>
					<td>
						Fe
					</td>
					<td>
						Substance
					</td>
					<td>
						Metal
					</td>
					<td>
						48
					</td>
					<td>
						10
					</td>
				</tr>
				<tr id='6'>
					<td>
						KL1442721
					</td>
					<td>
						Na
					</td>
					<td>
						Substance
					</td>
					<td>
						Metal
					</td>
					<td>
						20
					</td>
					<td>
						20
					</td>
				</tr>
			</table>

		</div>
	</main>
	<script>
		function sear() {
			var tex = document.getElementById('searc').value;
			var c1 = document.getElementById('1');
			var c2 = document.getElementById('2');
			var c3 = document.getElementById('3');
			var c4 = document.getElementById('4');
			var c5 = document.getElementById('5');
			var c6 = document.getElementById('6');
            if (tex == 'Catalyst' || tex == 'KL1042724') {
				c1.style.color = 'black';
				c2.style.color = 'white';
				c3.style.color = 'white';
				c4.style.color = 'white';
				c5.style.color = 'white';
				c6.style.color = 'white';
            } else if (tex == 'Burette' || tex == 'KL1042723') {
				c1.style.color = 'white';
				c2.style.color = 'black';
				c3.style.color = 'white';
				c4.style.color = 'white';
				c5.style.color = 'white';
				c6.style.color = 'white';
            } else if (tex == 'HCl' || tex == 'KL1042742') {
				c1.style.color = 'white';
				c2.style.color = 'white';
				c3.style.color = 'black';
				c4.style.color = 'white';
				c5.style.color = 'white';
				c6.style.color = 'white';
            } else if (tex == 'Flask' || tex == 'KL1042741') {
				c1.style.color = 'white';
				c2.style.color = 'white';
				c3.style.color = 'white';
				c4.style.color = 'black';
				c5.style.color = 'white';
				c6.style.color = 'white';
            } else if (tex == 'Fe' || tex == 'KL1042534') {
				c1.style.color = 'white';
				c2.style.color = 'white';
				c3.style.color = 'white';
				c4.style.color = 'white';
				c5.style.color = 'black';
				c6.style.color = 'white';
            } else if (tex == 'Na' || tex == 'KL1442721') {
				c1.style.color = 'white';
				c2.style.color = 'white';
				c3.style.color = 'white';
				c4.style.color = 'white';
				c5.style.color = 'white';
				c6.style.color = 'black';
			} else if (tex == '') {
				c1.style.color = 'black';
				c2.style.color = 'black';
				c3.style.color = 'black';
				c4.style.color = 'black';
				c5.style.color = 'black';
				c6.style.color = 'black';
			}
		}
	</script>
	<script>
		function look() {
			document.getElementById('1').style.color = 'black';
			document.getElementById('2').style.color = 'black';
			document.getElementById('3').style.color = 'black';
			document.getElementById('4').style.color = 'black';
			document.getElementById('5').style.color = 'black';
			document.getElementById('6').style.color = 'black';
		}
	</script>
	<script>
		function viel() {
			document.getElementById('1').style.color = 'white';
			document.getElementById('2').style.color = 'white';
			document.getElementById('3').style.color = 'black';
			document.getElementById('4').style.color = 'white';
			document.getElementById('5').style.color = 'black';
			document.getElementById('6').style.color = 'black';
		}
	</script>
	<script>
		function aprik() {
			document.getElementById('1').style.color = 'black';
			document.getElementById('2').style.color = 'black';
			document.getElementById('3').style.color = 'white';
			document.getElementById('4').style.color = 'black';
			document.getElementById('5').style.color = 'white';
			document.getElementById('6').style.color = 'white';

		}
	</script>
</body>
</html>