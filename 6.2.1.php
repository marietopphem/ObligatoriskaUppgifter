<?php

$name = $_POST['name'];
$email = $_POST['email'];
$webpage = $_POST['webpage'];
$comment = $_POST['comment'];


$conn = databaseConnection();

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

function databaseConnection(){

    $mysql_host = 'atlas.dsv.su.se';
    $mysql_user = 'usr_17896829';
    $mysql_password = '896829';
    $mysql_db = 'db_17896829';
    $mysql_port = 3306;

    return @mysqli_connect($mysql_host, $mysql_user,$mysql_password, $mysql_db, $mysql_port);
}

$sql = "INSERT INTO Guests (name, email, webpage, comment) VALUES ('$name', '$email', '$webpage', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

    header('location: 6.2.1.1.html');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
