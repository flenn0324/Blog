<?php
session_start();
$name=$_SESSION["fname"];
unset($_SESSION["login"]);
unset($_SESSION["fname"]);
unset($_SESSION["lname"]);

header("location:index.php?logout=true&name={$name}")

?>