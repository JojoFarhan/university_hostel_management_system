<?php
include_once('../connection.php'); 

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Using prepared statements to prevent SQL injection
    $sql = "DELETE FROM student_registration WHERE s_id = $id";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<h1>Data Deleted</h1>";
        header("Location: delete.php"); 
        exit(); 
    } else {
        echo "<h1>Data not Deleted</h1>";
    }
    
    $stmt->close();
}

$con->close();
?>