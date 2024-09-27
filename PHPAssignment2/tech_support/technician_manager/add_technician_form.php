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
    <!-- Set the form action to the correct script and specify POST method -->
    <form action="add_technician.php" method="post">
        <div id="data">
            <div class="labs">
                <label for="">FIrst name:</label>
                <input type="text" name="firstName"><br>
            </div>

            <div class="labs">
                <label for="">Last name:</label>
                <input type="text" name="lastName"><br>
            </div>

            <div class="labs">
                <label for="">Email:</label>
                <input type="email" name="email"><br>
            </div>

            <div class="labs" >
                <label for="">Phone:</label>
                <input type="phone" name="phone"><br>
            </div>
            <div class="labs" >
                <label for="">Password:</label>
                <input type="text" name="password"><br>
            </div>

            <div class="labs">
                <input type="submit" value="Add Technician">
            </div>
        </div>
    </form>
    <a href="index.php">View techincians list</a>
</main>

<?php include '../view/footer.php'; ?>