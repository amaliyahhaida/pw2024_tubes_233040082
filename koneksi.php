<?php
$con = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040082");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function query($query)
{
    global $con;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    $rows = [];


    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }
    return $rows;
}
