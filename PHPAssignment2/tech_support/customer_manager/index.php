<?php
require('../model/database.php');

// Check if the last name search input was submitted
$searchTerm = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['lastName'])) {
    $searchTerm = trim($_POST['lastName']);
    // Modify the query to search by last name
    $query = 'SELECT * FROM customers WHERE lastName = :lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName', $searchTerm);
} else {
    // Default query to fetch all customers if no search term is provided
    $query = 'SELECT * FROM customers';
    $statement = $db->prepare($query);
}

$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<!-- the body section -->
<body>
<header>
    <h1>SportsPro Technical Support</h1>
    <p>Sports management software for the sports enthusiast</p>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
        </ul>
    </nav>
</header>
<main>
    <h2>Customer List</h2>
    <form action="" method="post" style="display: flex; align-items: center; flex-direction: row; margin: 20px; justify-content: center;">
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" placeholder="Enter last name" value="<?php echo $searchTerm; ?>">
        <input type="submit" value="Search">
    </form>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>City</th>
            <th>&nbsp;</th> <!-- for delete button -->
        </tr>
        <?php if (!empty($customers)): ?>
            <?php foreach($customers as $customer): ?>
            <tr>
                <td><?php echo ($customer['firstName'] . ' ' . $customer['lastName']); ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <td>
                    <form action="edit_customer_form.php" method="post">
                        <input type="hidden" name="custID" value="<?php echo $customer['customerID']; ?>"/>
                        <input type="submit" value="Select"/>
                    </form>
                </td> <!-- for delete button -->
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No customers found with the last name "<?php echo $searchTerm; ?>".</td>
            </tr>
        <?php endif; ?>
    </table>
</main>

<?php include '../view/footer.php'; ?>