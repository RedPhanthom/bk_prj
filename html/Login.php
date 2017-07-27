<?php

session_set_cookie_params(0);
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_conn = new mysqli('localhost', 'root', 'password', 'bookstore');
    if (mysqli_connect_errno()) {
        echo 'Connection To Database Failed: ' . mysqli_connect_error();
        exit();
    }
    $result = $db_conn->query("SELECT * FROM AuthorizedUsers WHERE Username='$username' AND Password=sha1('$password')");
    if ($result->num_rows > 0) {
        $_SESSION['admin_user'] = $username;
    }
    $db_conn->close();
}

include("Header.php");
include("NavBar.php");
include("LoginContent.php");
include("Footer.php");
?>
