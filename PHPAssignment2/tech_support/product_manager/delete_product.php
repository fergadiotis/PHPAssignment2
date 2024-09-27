<?php


require('../model/database.php'); 

$productCode = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);

if ($productCode && !empty($productCode)) {
    echo "Product Code: " . htmlspecialchars($productCode) . "<br>";
    
    $query = "DELETE FROM products WHERE productCode = :code";
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $productCode);
    
    try {
        $statement->execute();
        $statement->closeCursor();
        echo "Product deleted successfully.";
        
        header("Location: index.php");
        exit;
        
    } catch (PDOException $e) {
        echo "Error executing query: " . $e->getMessage();
        exit;
    }
} else {
    echo "Error: No product code received or code is invalid.";
    exit;
}
?>