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
            <li><a href="index.php">Back to product list</a></li>
        </ul>
    </nav>
</header>
<main>
    <!-- Set the form action to the correct script and specify POST method -->
    <form action="add_product.php" method="post">
        <div id="data">
            <div class="labs">
                <label for="code">Product code:</label>
                <input type="text" name="code"><br>
            </div>

            <div class="labs">
                <label for="name">Product name:</label>
                <input type="text" name="name"><br>
            </div>

            <div class="labs">
                <label for="version">Product version:</label>
                <input type="text" name="version"><br>
            </div>

            <div class="labs" id="date">
                <label for="date">Release date:</label>
                <input type="date" name="date"><br>
            </div>

            <div class="labs">
                <input type="submit" value="Add">
            </div>
        </div>
    </form>
    <a href="index.php">View product list</a>
</main>

<?php include '../view/footer.php'; ?>