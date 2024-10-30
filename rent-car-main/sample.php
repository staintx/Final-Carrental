<?php
include 'connect_db.php';  // Include your database connection

// Fetch cars from the database
$result = $conn->query("SELECT * FROM cars");

if ($result->num_rows > 0) {
    echo "<div class='car-list'>";
    while ($row = $result->fetch_assoc()) {
        // Display each car's image
        echo "<div class='car-item'>";
        echo "<h3>{$row['make']} {$row['model']} ({$row['year']})</h3>";
        if (!empty($row['car_img'])) {
            echo "<img src='{$row['car_img']}' alt='Car Image' style='width:200px; height:auto;'/>";
        } else {
            echo "<p>No image available</p>";
        }
        echo "<p>Price per day: {$row['price_per_day']}</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No cars found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>