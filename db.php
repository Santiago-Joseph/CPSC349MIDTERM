<!-- PART 2 Write the php code to connect to a remote database, and display an error message if the connection fails.  -->
<?php
    $connection = mysqli_connect("localhost", "root", "", "midtermDatabase");
    if (!$connection) {
        echo "Failed to connect to database". mysqli_connect_error();
        exit();
    }
?>