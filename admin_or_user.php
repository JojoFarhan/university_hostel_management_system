<!DOCTYPE html>
<html>

<head>
	<style>
		.Reg {
			position: absolute;
			top: 50%;
			left: 34%;
		}

		h1 a {
			text-decoration: none;
			color: white;
			padding: 10px 40px;
			transition: 0.5s ease;
		}

		h1 a:hover {
			background-color: #00b33c;
		}
	</style>
	<title>user selection</title>
	<link rel="icon" href="picture/logo.png" type="image/x-icon">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div class="main">
			<ul>
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="reg.php">Registration</a></li>
				<li><a href="admin_or_user.php">Sign in</a></li>
			</ul>
		</div>

		<div class="Head">
			<h1 style="color:#00d910;">Green </h1>
			<h1 style="color:#07a4f8;">University</h1>
		</div>

		<div align="center" class="gallery">
			<img src="picture/logo.png"><br>
		</div>

		<div class="Reg" align="center">
			<h2>Sign in as student or admin:</h2></br>
			<div>
				<h1><a href="admin_login.php">ADMIN</a> <a href="guest_login.php">STUDENT</a></h1><br>
			</div>
		</div>

		<div class="footer" align="center">
		</div>
	</header>
</body>

</html>