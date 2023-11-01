<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weddingDate = $_POST["wedding_date"];
    // You can save $weddingDate to a file or a database for later use.
    // For simplicity, we'll save it to a text file here.
    
    // Example: Save to a text file named 'wedding_date.txt'
    file_put_contents('wedding_date.txt', $weddingDate);
    header("Location: user_page.php");
}
?>
