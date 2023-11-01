<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel - Set Wedding Date</h2>
    <form action="set_wedding_date.php" method="post">
        <label for="weddingDate">Wedding Date:</label>
        <input type="date" id="weddingDate" name="weddingDate" required>
        <button type="submit">Set Wedding Date</button>
    </form>
</body>
</html>
<?php
@include 'config.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['weddingDate'])) {
        $weddingDate = $_POST['weddingDate'];

        // Replace with your database connection code
       

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE wedding_info SET wedding_date = :weddingDate WHERE id = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':weddingDate', $weddingDate);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }

    header("Location: admin_panel.html");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel - Set Wedding Date</h2>
    <form action="" method="post">
        <label for="weddingDate">Wedding Date:</label>
        <input type="date" id="weddingDate" name="weddingDate" required>
        <button type="submit">Set Wedding Date</button>
    </form>
</body>
</html>
