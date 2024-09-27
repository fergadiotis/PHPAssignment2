<?php


require('../model/database.php'); // Include the database connection

// Getting data from the form
$techID = filter_input(INPUT_POST, 'techID', FILTER_VALIDATE_INT);

if ($techID && !empty($techID)) {
    // Prepare the DELETE statement
    $query = "DELETE FROM technicians WHERE techID = :techID";
    $statement = $db->prepare($query);
    $statement->bindValue(':techID', $techID);
    
    try {
        // Execute the DELETE statement
        $statement->execute();
        $statement->closeCursor();
        echo "Product deleted successfully."; // Optional debug message
        
        // Redirect back to the index page after deletion
        header("Location: index.php");
        exit;
        
    } catch (PDOException $e) {
        // Error handling
        echo "Error executing query: " . $e->getMessage();
        exit;
    }
} else {
    // Error handling if product code is not received
    echo "Error: No product code received or code is invalid.";
    exit;
}
?>