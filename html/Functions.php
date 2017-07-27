<?php

function admin_login($username, $password) {
    $conn = db_connect();
    if (!$conn) {
        return 0;
    }
    $result = $conn->query("SELECT * FROM AuthorizedUsers WHERE Username ='" . $username . "' AND Password = sha1('" . $password . "')");
    if (!$result) {
        return 0;
    }
    return $result;
}

function db_connect() {
    $result = new mysqli('localhost', 'root', 'password', 'bookstore');
    if (!$result) {
        return false;
    }
    $result->autocommit(TRUE);
    return $result;
}

function check_admin_user() {
    if (isset($_SESSION['admin'])) {
        return true;
    } else {
        return false;
    }
}

function calculate_price($cart) {
    $Price = 0.0;
    if (is_array($cart)) {
        $conn = db_connect();
        foreach ($cart as $ISBN => $qty) {
            $result = $conn->query("SELECT Price FROM Books WHERE ISBN = '" . $ISBN . "'");
            if ($result) {
                $item = $result->fetch_object();
                $item_price = $item->Price;
                $Price += $item_price * $qty;
            }
        }
    }
    return $Price;
}

function calculate_items($cart) {
    $items = 0;
    if (is_array($cart)) {
        foreach ($cart as $ISBN => $qty) {
            $items += $qty;
        }
    }
    return $items;
}
function edit_book($ISBN){
    if((!$ISBN) || (!$ISBN == '')){
        return false;
    }
    $conn = db_connect();
    
}

function display_cart($cart, $change = true) {
    foreach ($cart as $ISBN => $qty) {
        $book = get_book_details($ISBN);
        echo "<tr>";
        echo "<td>";
        if (file_exists("img/" . $ISBN . ".jpg")) {
            $size = getimagesize("img/" . $ISBN . ".jpg");
            if (($size[0] > 0) && ($size[1] > 0)) {
                echo "<img class=\"img-ctm img-rounded\" src=\"img/" . $ISBN . ".jpg\">";
            }
        } else {
            echo "&nbsp;";
        }
        echo "</td>";

        echo "<td>" . $book['Title'] . "</td>";
        echo "<td>" . number_format($book['Price'], 2) . "</td>";
        if ($change == true) {
            echo "<td align=\"middle\"><input type=\"text\" name=\"" . $ISBN . "\" value=\"" . $qty . "\" size=\"3\"/></td>";
        }
        echo "<td class=\"txt_align\">" . number_format($book['Price'] * $qty, 2) . "</td></tr>";
    }

    //Display Total Shopping Amout
    echo "<tr>"
    . "<td colspan=\"3\"></td>"
    . "<td align=\"center\">" . $_SESSION['items'] . "</td>"
    . "<td align=\"center\"> \$" . number_format($_SESSION['total_price'], 2) . "</td></tr>";

    //Display Save Button
    if ($change == true) {
        echo "<tr>"
        . "<td colspan=\"3\"></td>"
        . "<td align=\"center\"><input type=\"hidden\" name=\"save\" value=\"true\"/>"
        . "<input class=\"btn btn-primary\" type=\"submit\" value=\"Save Changes\"/></td></tr>";
    }
}

function get_book_details($ISBN) {
    if ((!$ISBN) || ($ISBN == '')) {
        return false;
    }
    $conn = db_connect();
    $result = $conn->query("SELECT * FROM Books WHERE ISBN = '" . $ISBN . "'");
    if (!$result) {
        return false;
    }
    $result = @$result->fetch_assoc();
    return $result;
}
