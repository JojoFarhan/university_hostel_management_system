<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="picture/logo.png" type="image/x-icon">
	<style>
		input[type=text],
		input[type=password],
		input[type=date],
		input[type=file],
		select {
			width: 50%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=submit] {
			width: 100%;
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		div.form {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			width: 40%;
			margin: auto;
		}
		.Sign-up {
			position: absolute;
			top: 30%;
			left: 60%;
		}
	</style>
	
	<title>Registration Form</title>
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
		<br>
		<div align="center" class="gallery">
			<img src="picture/logo.png"><br>
		</div>
		<br><br><br><br><br><br><br><br><br>

		<div align="center" class="form">

			<form action="reg.php" method="post" enctype="multipart/form-data">
				<h1 style="color:Tomato;">Registration Form:</h1></br>

				Student name:
				<input type="text" id="s_name" name="s_name"><br></br>

				Mother's name:
				<input type="text" id="mother" name="mother"><br></br>

				Father's name:
				<input type="text" id="father" name="father"><br></br>

				Date of Birth:
				<input type="date" id="b_date" name="b_date"><br></br>

				Local Guardian name:
				<input type="text" id="local_guardian" name="local_guardian"><br></br>

				Address:
				<input type="text" id="address" name="address"><br></br>

				Phone:
				<input type="text" id="phone" name="phone"><br></br>

				Email:
				<input type="text" id="email" name="email"><br></br>

				password:
				<input type="password" id="password" name="password"><br></br>

				Image:
				<input type="file" name="fileToUpload" id="fileToUpload"><br></br>


				<input type="submit" value="Submit" name="submit">

			</form>
		</div>




	</header>
</body>

</html>

<?php
include ("connection.php");
if (isset($_POST['submit'])) {
	$s_name = $_POST['s_name'];
	$mother = $_POST['mother'];
	$father = $_POST['father'];
	$b_date = $_POST['b_date'];
	$local_guardian = $_POST['local_guardian'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];


	$num = rand(10, 100);
	$s_id = "s-" . $num;

	$ext = explode(".", $_FILES['fileToUpload']['name']);
	$c = count($ext);
	$ext = $ext[$c - 1];
	$date = date("D:M:Y");
	$time = date("h:i:s");
	$image_name = md5($date . $time . $s_id);
	$image = $image_name . "." . $ext;

	$password = $_POST['password'];

	$query = "insert into student_registration values('$s_id','$s_name','$mother','$father','$b_date','$local_guardian','$address','$phone','$email','$password','$image')";
	if (mysqli_query($con, $query)) {
		echo "Succesfully inserted !!";
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "reg_img/$image");
	} else {
		echo mysqli_error($con);
	}
}
?>