<?php
session_start();
if ($_SESSION['admin_login_status'] != "loged in" and !isset($_SESSION['user_id']))
  header("Location:../index.php");

if (isset($_GET['sign']) and $_GET['sign'] == "out") {
  $_SESSION['admin_login_status'] = "loged out";
  unset($_SESSION['user_id']);
  header("Location:../index.php");
}
?>


<?php
include_once ('../connection.php');

// Get the ID from the query string
$id = $_GET['updateid'];

//Fetch the existing details for the student
$sql = "SELECT * FROM student_registration WHERE s_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$s_name = $row['s_name'];
$mother = $row['mother'];
$father = $row['father'];
$b_date = $row['b_date'];
$local_guardian = $row['local_guardian'];
$address = $row['address'];
$phone = $row['phone'];
$email = $row['email'];
$password = $row['password'];
$photo = $row['photo'];


// Handle form submission for editing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {

  $s_name = $_POST['s_name'];
  $mother = $_POST['mother'];
  $father = $_POST['father'];
  $b_date = $_POST['mother'];
  $local_guardian = $_POST['local_guardian'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $update_sql = "UPDATE student_registration SET s_name = ?, mother = ?, father =?, b_date=?, local_guardian=?, address = ?, phone = ?, email = ?, password = ?, photo = ?  WHERE s_id = ?";
  $update_stmt = $con->prepare($update_sql);
  $update_stmt->bind_param("ssi", $s_name, $mother, $father, $b_date, $local_guardian, $address, $phone, $email, $password, $photo, $id);

  if ($update_stmt->execute()) {
    echo "<h1>Data Edited</h1>";
    header("Location: update.php");
    exit();
  } else {
    echo "<h1>Data not Edited</h1>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    /* Style the side navigation */
    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
    }


    /* Side navigation links */
    .sidenav a {
      color: white;
      padding: 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color on hover */
    .sidenav a:hover {
      background-color: #ddd;
      color: black;
    }

    /* Style the content */
    .content {
      background-color: #ddd;
      margin-left: 200px;
      padding-left: 20px;
    }

    /* Form design part*/
    body {
      font-family: Arial, sans-serif;
    }

    .form-container {
      margin: 20px;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 5px;
      width: 90%;
    }

    .form-container div {
      margin-bottom: 15px;
      
    }

    .form-container input[type="text"] {
      width: 50%;
      padding: 10px;
      box-sizing: border-box;
    }

    .form-container input[type="submit"] {
      background-color: #007bff;
      border: none;
      color: white;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
    }

    .form-container input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>

  <div class="sidenav">
    <a href="admin_homepage.php">Admin Home</a>
    <a href="admin_create_room.php">Create room</a>
    <a href="delete.php">Delete</a>
    <a href="update.php">Update</a>
    <a href="search.php">Search</a>
    <a href="admin_confirm.php">approval</a>
    <a href="view_students.php">View students</a>
    <a href="moderators.php">Moderators</a>
    <a href="?sign=out">Log off</a>
  </div>
  </div>
  <div align="center" class="gallery">
    <img src="../picture/logo2.png"><br>
  </div>

  <div class="content">

    <h2>Welcome to admin panel</h2>
    <div class="row">
    <div class="form-container">
    <form action="#" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div>
            Student Name: <input type="text" name="s_name" value="<?php echo $s_name; ?>" required /><br>
        </div>
        <div>
            Mother: <input type="text" name="mother" value="<?php echo $mother; ?>" required /><br>
        </div>
        <div>
            Father: <input type="text" name="father" value="<?php echo $father; ?>" required /><br>
        </div>
        <div>
            Birth-Date: <input type="date" name="b_date" value="<?php echo $b_date; ?>" required /><br>
        </div>
        <div>
            Local-Guardian: <input type="text" name="local_guardian" value="<?php echo $local_guardian; ?>" required /><br>
        </div>
        <div>
            Address: <input type="text" name="address" value="<?php echo $address; ?>" required /><br>
        </div>
        <div>
            Phone: <input type="text" name="phone" value="<?php echo $phone; ?>" required /><br>
        </div>
        <div>
            Email: <input type="text" name="email" value="<?php echo $email; ?>" required /><br>
        </div>
        <div>
            Password: <input type="text" name="password" value="<?php echo $password; ?>" required /><br>
        </div>
        <div>
            Photo: <input type="file" name="father" value="<?php echo $father; ?>" required /><br>
        </div>

        <div>
            <input type="submit" name="edit" value="Update Data" />
        </div>
    </form>
</div>

    </div>

  </div>

</body>

</html>


