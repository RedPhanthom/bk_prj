<?php

include("Functions.php");

$conn = db_connect();
session_start();

$datum = new DateTime();
$orderDateTime = $datum->format('Y-m-d H:i:s');

//Request From Form For Customer Information
$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
$middleInital = mysqli_real_escape_string($conn, $_REQUEST['middleinitial']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
$phoneNumber = mysqli_real_escape_string($conn, $_REQUEST['phonenumber']);
$emailAddress = mysqli_real_escape_string($conn, $_REQUEST['email']);

//Request From Form For Customer Address Information
$addressLine1 = mysqli_real_escape_string($conn, $_REQUEST['address1']);
$addressLine2 = mysqli_real_escape_string($conn, $_REQUEST['address2']);
$cityName = mysqli_real_escape_string($conn, $_REQUEST['city']);
$stateName = mysqli_real_escape_string($conn, $_REQUEST['state']);
$zipCode = mysqli_real_escape_string($conn, $_REQUEST['zipcode']);

//Request From #$_SESSION[] For ISBN, QTY, & TotalPrice
$order_isbn = mysqli_real_escape_string($conn, $_SESSION['ISBN']);
$order_qty = mysqli_real_escape_string($conn, $_SESSION['QTY']);
$order_total_price = mysqli_real_escape_string($conn, $_SESSION['total_price']);

$result1 = $conn->query("INSERT INTO Customer(FirstName, MiddleInitial, LastName, PhoneNumber, Email) VALUES('$firstName', '$middleInital', '$lastName', '$phoneNumber', '$emailAddress')");

$lastCustomerID = mysqli_insert_id($conn);

$result2 = $conn->query("INSERT INTO Address(CustomerID, Address1, Address2, City, State, ZipCode) VALUES('$lastCustomerID','$addressLine1', '$addressLine2', '$cityName', '$stateName', '$zipCode')");

$result3 = $conn->query("INSERT INTO Orders(Date,ISBN, CustomerID, Total) VALUES('$orderDateTime','$order_isbn', '$lastCustomerID', '$order_total_price')");

echo "<p>Order Placed.</p>";
?>