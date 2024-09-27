<?php
session_start();
require_once('../model/database.php');

// Getting data from the form submission
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$postalCode = filter_input(INPUT_POST, 'postalCode');
$countryCode = filter_input(INPUT_POST, 'countryCode');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$custID = filter_input(INPUT_POST, 'custID', FILTER_VALIDATE_INT);

// Fetch existing customer data if custID is available
if ($custID) {
    $query = 'SELECT * FROM customers WHERE customerID = :custID';
    $statement = $db->prepare($query);
    $statement->bindValue(':custID', $custID);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();

    // If customer data is fetched, populate the variables
    if ($customer) {
        $firstName = $customer['firstName'];
        $lastName = $customer['lastName'];
        $address = $customer['address'];
        $city = $customer['city'];
        $state = $customer['state'];
        $postalCode = $customer['postalCode'];
        $countryCode = $customer['countryCode'];
        $phone = $customer['phone'];
        $email = $customer['email'];
        $password = $customer['password'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- The head section -->
<head>
    <meta charset="UTF-8">
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<!-- The body section -->
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
    <!-- Set the form action to the correct script and specify POST method -->
    <form action="edit_customer.php" method="post">
        <div id="data">
            <div class="labs">
                <label for="firstName">First name:</label>
                <input type="text" name="firstName" value="<?php echo $firstName; ?>"><br>
            </div>

            <div class="labs">
                <label for="lastName">Last name:</label>
                <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>"><br>
            </div>

            <div class="labs">
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>"><br>
            </div>

            <div class="labs">
                <label for="city">City:</label>
                <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>"><br>
            </div>

            <div class="labs">
                <label for="state">State:</label>
                <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>"><br>
            </div>

            <div class="labs">
                <label for="postalCode">Postal Code:</label>
                <input type="text" name="postalCode" value="<?php echo htmlspecialchars($postalCode); ?>"><br>
            </div>

            <div class="labs">
                <label for="countryCode">Country Code:</label>
                <input type="text" name="countryCode" value="<?php echo htmlspecialchars($countryCode); ?>"><br>
            </div>

            <div class="labs">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br>
            </div>

            <div class="labs">
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
            </div>

            <div class="labs">
                <label for="password">Password:</label>
                <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>"><br>
            </div>

            <!-- Include hidden input for custID -->
            <input type="hidden" name="custID" value="<?php echo htmlspecialchars($custID); ?>">

            <div class="labs">
                <input type="submit" value="Update">
            </div>
        </div>
    </form>
    <a href="index.php">Search Customers</a>
</main>

<?php include '../view/footer.php'; ?>
</body>
</html>