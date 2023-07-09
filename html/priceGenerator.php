<?php

// Include the database connection file
include 'db.php';

// Query the database to get the most recent price
$query = "SELECT price FROM prices ORDER BY timestamp DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Fetch the most recent price
    $row = mysqli_fetch_assoc($result);
    $currentPrice = $row['price'];

    // Generate a new price by adding a random value between -0.5 and 0.5 to the current price
    $newPrice = $currentPrice + (rand(-50, 50) / 100);

    // Insert the new price into the database
    $query = "INSERT INTO prices (price) VALUES ($newPrice)";
    mysqli_query($conn, $query);

    // Return the new price
    echo $newPrice;
} else {
    // If there are no prices in the database yet, insert the initial price of 100
    $query = "INSERT INTO prices (price) VALUES (100)";
    mysqli_query($conn, $query);

    // Return the initial price
    echo 100;
}

mysqli_close($conn);

?>
