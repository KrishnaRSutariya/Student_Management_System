<?php
$servername = "sql6.freesqldatabase.com";
$username = "sql6638562";
$password = "cxAqDFIAHG";
$dbname = "sql6638562";

$con = mysqli_connect($servername, $username, $password, $dbname);

if ($con) {
    // echo "Connected ...!";
} else {
    die("Not Connected");
}
?>