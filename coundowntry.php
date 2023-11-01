<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wedding Countdown Timer</title>
</head>
<body>
    <h2>Enter Your Wedding Date</h2>
    <form action="countdown.php" method="post">
        <label for="weddingDate">Wedding Date:</label>
        <input type="date" id="weddingDate" name="weddingDate" required>
        <button type="submit">Start Countdown</button>
    </form>
</body>
</html>
