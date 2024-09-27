<?php
session_start();
require_once('../model/database.php');

$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$version = filter_input(INPUT_POST, 'version');
$release = filter_input(INPUT_POST, 'date', );


if ($code == null || $name == null || $version == null || $release == null) {
    $_SESSION['error'] = 'Invalid data. Please make sure all fields are filled';

    $url = "../errors/error.php";
    header("Location: " . $url); 
    die();
} else {

    $query = "INSERT INTO products (productCode, name, version, releaseDate) VALUES (:code, :name, :version, :releaseDate)";
    $statement = $db->prepare($query);

    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $release);

      $statement->execute();
      $statement->closeCursor();

}

$_SESSION['product'] = $name . ', version of (' . $version . ')';

header("Location: confirmation.php");
die();
?>