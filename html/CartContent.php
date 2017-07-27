<!--Display the Cart Content-->
<div class="container">
    <div class="col-lg-12 ">
        <table class="table table-bordered" id="book_table">
            <form action="show_cart.php" method="post"/>
            <tr>
                <th>Image</th>
                <th>Book Title</th>
                <th>Price</th>
                <th class="th-cust">Quantity</th>
                <th>Total</th>
            </tr>
            <?php
            include('Functions.php');

            session_start();

            @$new = $_GET['new'];

            if ($new) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                    $_SESSION['items'] = 0;
                    $_SESSION['total_price'] = '0.00';
                }
                if (isset($_SESSION['cart'][$new])) {
                    $_SESSION['cart'][$new] ++;
                } else {
                    $_SESSION['cart'][$new] = 1;
                }
                $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
                $_SESSION['items'] = calculate_items($_SESSION['cart']);
            }
            if (($_SESSION['cart']) && (array_count_values($_SESSION['cart']))) {
                display_cart($_SESSION['cart']);
            } else {
                echo "<div>";
                echo "<div class=\"alert alert-warning\"><strong>Nothing In Your Cart.</strong></div>";
                echo "</div>";
            }
            if (isset($_POST['save'])) {
                foreach ($_SESSION['cart'] as $ISBN => $qty) {
                    if ($_POST[$ISBN] == '0') {
                        unset($_SESSION['cart'][$ISBN]);
                    } else {
                        $_SESSION['cart'][$ISBN] = $_POST[$ISBN];
                    }
                }
                $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
                $_SESSION['items'] = calculate_items($_SESSION['cart']);
            }
            ?>
            </form>
        </table>
    </div>
</div>
<div class="container">
    <div class="col-lg-offset-8">
        <input class="btn btn-warning" type="button" value="Reload Page" onClick="window.location.reload()">
        <a class="btn btn-default" href="ShopBooks.php">Continue Shopping</a>
        <a class="btn btn-default" href="Checkout.php">Check Out</a>
    </div>
</div>