<?php
$servername = "sql106.infinityfree.com";
$username = "if0_38991963";
$password = "PbXSQloqcRhXU6";
$dbname = "if0_38991963_books";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
