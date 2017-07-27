<?php

include("Functions.php");

$conn = db_connect();
session_start();

//Request From Form to add new book entries
$imagenumber = mysqli_real_escape_string($conn, $_REQUEST['imagenumber']);
$bookisbn = mysqli_real_escape_string($conn, $_REQUEST['isbn']);
$booktitle = mysqli_real_escape_string($conn, $_REQUEST['booktitle']);
$author = mysqli_real_escape_string($conn, $_REQUEST['author']);
$description = mysqli_real_escape_string($conn, $_REQUEST['description']);
$publisher = mysqli_real_escape_string($conn, $_REQUEST['publisher']);
$publishedyear = mysqli_real_escape_string($conn, $_REQUEST['publishedyear']);
$bookprice = mysqli_real_escape_string($conn, $_REQUEST['bookprice']);

//Static QTY Number
$qty = '0';

echo "INSERT INTO Books(Image, ISBN, Title, Author, Description, Publisher, PublishedYear, Price, Quantity) VALUES('$imagenumber', '$bookisbn', '$booktitle', '$author', '$description', '$publisher', '$publishedyear', '$bookprice', '$qty')";

$result1 = $conn->query("INSERT INTO Books(Image, ISBN, Title, Author, Description, Publisher, PublishedYear, Price, Quantity) VALUES('$imagenumber', '$bookisbn', '$booktitle', '$author', '$description', '$publisher', '$publishedyear', '$bookprice', '$qty')");

echo "<p>Book Added.</p>";
