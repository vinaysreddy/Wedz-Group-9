<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

$user_id = $_SESSION['user_id']; // Retrieve the user's ID from the session


$sql = "SELECT wdate FROM `orders` WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["wdate"];
} else {
    echo "Wedding date not found for this user.";
}

$conn->close();
?>
