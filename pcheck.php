<?php
session_start();

// Connection to DB
$mysqli = new mysqli("localhost", "root", "root", "zeralda");

// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}


$email=$_POST['email'];
$password=$_POST['password'];

$query = "SELECT * from MyGuests where email='$email'" ;
$result= mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
$num_row=mysqli_num_rows($result);
$row=mysqli_fetch_array($result);


if ($num_row=1)
{
    if (password_verify($password,$row['psw'])) 
    {
        $_SESSION['login'] = $mysqli->insert_id;
        $_SESSION['fname'] = $row['firstname'];
        $_SESSION['lname'] = $row['lastname'];
        $_SESSION['id'] = $row['id'];
        echo "true";
    }
    else {
        echo "false";
    }
}
else {
    echo "false2";
}


mysqli_close($mysqli);


?>