<?php

// Include the database connection file
include 'db.php';

try {
    // Query the database to get the most recent price
    $stmt = $pdo->query("SELECT price FROM prices ORDER BY timestamp DESC LIMIT 1");
    $row = $stmt->fetch();

    if ($row) {
        // Fetch the most recent price
        $currentPrice = $row['price'];
    } else {
        // If there are no prices in the database yet, insert the initial price of 100
        $currentPrice = 100;
        $pdo->query("INSERT INTO prices (price) VALUES ($currentPrice)");
    }

    // Generate a new price by adding a random value between -0.5 and 0.5 to the current price
    $newPrice = $currentPrice + (rand(-50, 50) / 100);

    // Insert the new price into the database
    $pdo->query("INSERT INTO prices (price) VALUES ($newPrice)");

    // Return the new price
    echo $newPrice;
} catch (Exception $e) {
    // If an error occurred, return the error message
    echo $e->getMessage();
}

?>
