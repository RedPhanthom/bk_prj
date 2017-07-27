<body>
    <!--Welcome Alert-->
    <section name="welcome-admin">
        <div class="container">
            <div class="alert alert-info"><strong>Welcome Admin!</strong></div>
        </div>
    </section>

    <!--Admin Functions-->
    <section name="admin-functions">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#admin_home">Admin Home</a></li>
                <li><a data-toggle="pill" href="#show_orders">Show Orders</a></li>
                <li><a data-toggle="pill" href="#edit_books">Edit Books</a></li>
            </ul>

            <div class="tab-content">
                <div id="admin_home" class="tab-pane fade in active">
                    <h3>Admin Home</h3>
                    <p>1234567890</p>
                </div>
                <div id="show_orders" class="tab-pane fade">
                    <h3>Orders</h3>
                    <table class="table" id="order_table">
                        <tr>
                            <th>Transaction ID</th>
                            <th>Date</th>
                            <th>ISBN</th>
                            <th>Customer ID</th>
                            <th>Total Amount</th>
                        </tr>
                        <?php
                        $db_conn = new mysqli('localhost', 'root', 'password', 'bookstore');
                        if (mysqli_connect_errno()) {
                            echo 'Connection to database failed:' . mysqli_connect_error();
                            exit();
                        }
                        $result = $db_conn->query("SELECT * FROM Orders");
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['TransactionID'] . "</td>";
                            echo "<td>" . $row['Date'] . "</td>";
                            echo "<td>" . $row['ISBN'] . "</td>";
                            echo "<td>" . $row['CustomerID'] . "</td>";
                            echo "<td>" . $row['Total'] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
                <div id="edit_books" class="tab-pane fade">
                    <h3>Edit Books</h3>
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addBook">Add Book</button>

                    <!-- Modal -->
                    <div id="addBook" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add New Book Record</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" action="add_book.php" method="post">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Image Number</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="imagenumber" placeholder="Image Number" class="form-control" required>
                                                    </div>
                                                    <label class="col-sm-2 control-label">ISBN</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="isbn" placeholder="ISBN" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Book Title</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="booktitle" placeholder="Book Title" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Author</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="author" placeholder="Author Name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Description</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="description" placeholder="Description" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Publisher</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="publisher" placeholder="Publisher Name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Published Year</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="publishedyear" placeholder="Published Year" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Price</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="bookprice" placeholder="Price" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-8">
                                                <button type="submit" class="btn btn-primary">Add Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <table class="table" id="book_table">
                        <tr>
                            <th>Book Cover</th>
                            <th>ISBN</th>
                            <th>Book Tile</th>
                            <th>Author</th>
                            <th>Description</th>
                            <th>Publisher</th>
                            <th>Published Year</th>
                            <th>Price</th>
                            <th>Buy</th>
                        </tr>
                        <?php
                        $db_conn = new mysqli('localhost', 'root', 'password', 'bookstore');
                        if (mysqli_connect_errno()) {
                            echo 'Connection to database failed:' . mysqli_connect_error();
                            exit();
                        }
                        $result = $db_conn->query("SELECT * FROM Books");

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td><img class=\"img-responsive img-thumbnail\" src=\"" . $row['Image'] . "\"></td>";
                            echo "<td>" . $row['ISBN'] . "</td>";
                            echo "<td>" . $row['Title'] . "</td>";
                            echo "<td>" . $row['Author'] . "</td>";
                            echo "<td>" . $row['Description'] . "</td>";
                            echo "<td>" . $row['Publisher'] . "</td>";
                            echo "<td>" . $row['PublishedYear'] . "</td>";
                            echo "<td>" . $row['Price'] . "</td>";
                            echo "<td> <button class=\"btn btn-default\" type=\"submit\">Edit Book</button> </td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </section>