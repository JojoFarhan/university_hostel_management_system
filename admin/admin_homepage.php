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
    <p>No user data found!</p>

    <div class="row">

      <?php
      include ("../connection.php");

      $sql = "select student_allocation.amount, student_registration.email from student_registration, student_allocation where student_registration.email = student_allocation.email";
      $r = mysqli_query($con, $sql);
      echo "<table id='student'>";
      echo "<tr>
 <th>room amount</th>
 <th>Number of Student</th>
  </tr>";
      while ($row = mysqli_fetch_array($r)) {
        $amnt = $row['amount'];
        $num_std = $row['email'];

        echo "<tr>
    <td>$amnt</td><td>$num_std</td>
    </tr>";
      }
      echo "</table>";

      ?>
    </div>


  </div>

</body>

</html>