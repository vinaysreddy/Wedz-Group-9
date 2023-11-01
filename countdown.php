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
    <style type="text/css">#timer {
    font-size: 24px;
}

span {
    padding: 5px;
}</style>
</head>
<body>
    <h2>Wedding Countdown Timer</h2>
    <?php
    if (isset($_POST['weddingDate'])) {
        $weddingDate = new DateTime($_POST['weddingDate']);
        $now = new DateTime();
        
        if ($weddingDate > $now) {
            $interval = $weddingDate->diff($now);
            echo "<p>Your wedding is in:</p>";
            echo "<div id='timer'>";
            echo "<span id='days'>" . $interval->d . "</span> days ";
            echo "<span id='hours'>" . $interval->h . "</span> hours ";
            echo "<span id='minutes'>" . $interval->i . "</span> minutes ";
            echo "<span id='seconds'>" . $interval->s . "</span> seconds";
            echo "</div>";
        } else {
            echo "<p>Your wedding date has already passed.</p>";
        }
    }
    ?>
</body>
</html>
