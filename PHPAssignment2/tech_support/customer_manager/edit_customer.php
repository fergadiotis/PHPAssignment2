<?php
session_start();
require_once('../model/database.php');
//getting data from form
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
// code to save data to SQL database
//validating the inputs from add_contact_form
$requiredFields = [$firstName, $lastName, $email, $phone, $password, $address, $city, $state, $postalCode, $countryCode];

// Check if any required field is empty or null
if (in_array(null, $requiredFields, true) || in_array('', $requiredFields, true)) {
    $_SESSION['error'] = 'Invalid data. Please make sure all fields are filled';
    //redirecting to an error page
    $url = "../errors/error.php";
    header("Location: " . $url); //header is the method to redirect
    die(); // similar to return or break 
} else {
    $query = "UPDATE customers SET 
        firstName = :firstName, 
        lastName = :lastName, 
        address = :address, 
        city = :city, 
        state = :state, 
        postalCode = :postalCode, 
        countryCode = :countryCode, 
        email = :email, 
        phone = :phone, 
        password = :password
    WHERE customerID = :custID"; 

    
    $statement = $db->prepare($query);

    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postalCode', $postalCode);
    $statement->bindValue(':countryCode', $countryCode);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':custID', $custID);
      $statement->execute();
      $statement->closeCursor();

}

$_SESSION['customer'] = $firstName . ' ' . $lastName;

// redirecting to confirmation page
header("Location: confirmation.php");
die();
?>