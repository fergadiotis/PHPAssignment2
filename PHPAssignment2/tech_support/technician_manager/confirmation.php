<?php 
session_start(); // Start the session to access session variables
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Confirmation</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<!-- the body section -->
<body>
<header>
    <h1>SportsPro Technical Support</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Back home</a></li>
        </ul>
    </nav>
</header>

<?php include("header.php"); ?>
<main id="confirmation">
    <h2>Confirmation</h2>
    <p>Thank you!</p>
    <?php if (isset($_SESSION['technician'])): ?>
        <p>Saving <?php echo $_SESSION['technician']; ?> information.</p>
        <?php unset($_SESSION['technician']); // Clear the session variable after use ?>
    <?php endif; ?>
    <a href="index.php">Back to List of Technicians</a>
</main>
<footer>
    <p class="copyright">
        &copy; <?php echo date("Y"); ?> SportsPro, Inc.
    </p>
</footer>
</body>
</html>