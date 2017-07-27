<?php

session_start();
$old_user = $_SESSION['admin_user'];
unset($_SESSION['admin_user']);
session_destroy();

include('Header.php');
include('NavBar.php');

if (!empty($old_user)) {
    echo "<p>You Have Been Logged Out. </p>";
} else {
    echo "<p>You Were Not Logged In Anyways.</p>";
}

include('Footer.php');
