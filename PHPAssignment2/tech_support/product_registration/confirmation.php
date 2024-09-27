<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['custID'])) {
    header('Location: login_page.php');
    exit();
}

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected product code from the form submission
    $productCode = filter_input(INPUT_POST, 'productCode', FILTER_SANITIZE_STRING);

    // Get the customer ID from the session
    $customerID = $_SESSION['custID'];

    // Store the product code in the session for use in the confirmation message
    $_SESSION['productCode'] = $productCode;

    // Include the database connection
    require_once('../model/database.php');

    // Debugging: Check variable values
    if (empty($customerID) || empty($productCode)) {
        echo 'Error: customerID or productCode is empty.<br>';
        echo 'customerID: ' . var_export($customerID, true) . '<br>';
        echo 'productCode: ' . var_export($productCode, true) . '<br>';
        exit();
    }


    // Insert the registration into the database
    $query = 'INSERT INTO registrations (customerID, productCode, registrationDate)
              VALUES (:customerID, :productCode, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);

    try {
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        // Temporarily display the error message for debugging
        $_SESSION['error'] = 'You have already registered this product.';
    header('Location: ../errors/error.php');
    exit();
    }
}
?>

<!DOCTYPE html>
<html>

<!-- The head section -->
<head>
    <title>Confirmation</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<!-- The body section -->
<body>
<header>
    <h1>SportsPro Technical Support</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Back home</a></li>
        </ul>
    </nav>
</header>

<main id="confirmation">
    <h2>Register Product</h2>
    <p>Thank you <?php echo $_SESSION['cutomer']?></p>
    <p>Product (<?php echo isset($_SESSION['productCode']) ? htmlspecialchars($_SESSION['productCode']) : 'Unknown'; ?>) was registered successfully.</p>

    <?php unset($_SESSION['customer']); // Clear the session variable after use ?>
</main>

<footer>
    <p class="copyright">
        &copy; <?php echo date("Y"); ?> SportsPro, Inc.
    </p>
</footer>
</body>
</html>