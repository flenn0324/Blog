<?php
session_start();
// Connection to DB
$mysqli = new mysqli("localhost", "root", "root", "zeralda");

// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}
?>
