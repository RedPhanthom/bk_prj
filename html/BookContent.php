<!-- Book Container -->
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                What are you interesting in Buying?
            </div>
        </div>
        <div class="col-lg-12 table-responsive">
            <table class="table table-bordered" id="book_table">
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
                session_start();
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
                    echo "<td> <a href=\"show_cart.php?new=".$row['ISBN']."\" class=\"btn btn-default\">Add Book</a> </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
