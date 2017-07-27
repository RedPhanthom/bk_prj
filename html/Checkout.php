<?php
include("Header.php");
include("NavBar.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Shopping Cart Receipt</strong></div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ISBN</th>
                            <th>QTY</th>
                        </tr>
                        <?php
                        include("Functions.php");
                        session_start();
                        foreach ($_SESSION['cart'] as $isbn => $qty) {
                            $_SESSION['ISBN'] = $isbn;
                            $_SESSION['QTY'] = $qty;
                            echo "<tr>"
                            . "<td>" . $isbn . "</td>"
                            . "<td align=\"center\">" . $qty . "</td>"
                            . "</tr>";
                        }
                        echo "<tr>"
                        . "<td align=\"center\"><strong>Total Price: $" . number_format($_SESSION['total_price'], 2) . "</strong></td>"
                        . "<td align=\"center\">" . $_SESSION['items'] . "</td></tr>";
                        ?>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">Shipping Information</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="PlaceOrder.php" method="post">
                        <div class="form-group">
                            <div class="col-md-12">
                                <legend>Customer Details</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" placeholder="First Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Middle Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="middleinitial" placeholder="Middle Initial" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lastname" placeholder="Last Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone #</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="phonenumber" placeholder="Phone Number" class="form-control" required>
                                    </div>

                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <legend>Address Details</legend>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address 1</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address1" placeholder="Address Line 1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">Line 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address2" placeholder="Address Line 2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="city" placeholder="City" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="textinput">State</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="state" placeholder="State" class="form-control" maxlength="2" required>
                                    </div>

                                    <label class="col-sm-2 control-label" for="textinput">Postcode</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="zipcode" placeholder="Post Code" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-10">
                                <button type="submit" class="btn btn-primary">Place Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("Footer.php");
?>