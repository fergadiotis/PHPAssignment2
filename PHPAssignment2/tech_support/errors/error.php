?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>

<!-- the body section -->
<body>
<header>
    <h1>SportsPro Technical Support</h1>
    <p>Error occurred</p>
    <nav>
        <ul>
            <li><a href="../index.php">Back home </a></li>
        </ul>
    </nav>
</header>
<main>
    <h1>Error</h1>
    <p>
        <?php 
        if (isset($_SESSION['error'])) {
            echo htmlspecialchars($_SESSION['error']);
            unset($_SESSION['error']);
        }
        ?>
    </p>
</main>

<?php include '../view/footer.php'; ?>