<?php
require('../model/database.php');
$queryProducts = 'SELECT * FROM products';
$statement = $db-> prepare($queryProducts);
$statement-> execute();
$products = $statement->fetchAll();
$statement-> closeCursor();

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css"
          href="../main.css">
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
    <table>
      <tr>
        <th>CODE</th>
        <th>Product name</th>
        <th>Version</th>
        <th>Release Date</th>
        <th>&nbsp</th> <!-- for delete button -->
      </tr>
        <?php foreach($products as $product):?> <!--: instead of { } like in other languages -->
         <tr>
          <td><?php echo $product['productCode'];?></td>
          <td><?php echo $product['name'];?></td>
          <td><?php echo $product['version'];?></td>
          <td><?php echo $product['releaseDate'];?></td>
          <td>
            <form action = "delete_product.php" method = "post">
            <input type="hidden" name = "code" value = "<?php echo $product['productCode'];?>"/>  
            <input type="submit" value = "Delete"/>
            </form>
          </td> <!-- for delete button -->
         </tr>
        <?php endforeach; ?> <!-- end of forearch loop -->
    </table>
    <p class = "option"><a href="add_product_form.php">Add product</a></p>
</main>
    
<?php include '../view/footer.php'; ?>