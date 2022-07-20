<?php
session_start();
// Connection to DB
$mysqli = new mysqli("localhost", "root", "root", "zeralda");

// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}

$title=mysqli_real_escape_string($mysqli, $_POST['title']);
$post=mysqli_real_escape_string($mysqli, $_POST['post']);
$id=$_SESSION['id'];


if(strlen($title)<3)
{
    echo "title";
}
elseif(strlen($post)<10)
{
    echo "post";
}
else
{
    $insert_row=$mysqli->query("INSERT INTO Posts(title,post,id) VALUES('$title','$post','$id')");
    if ($insert_row) {
        echo 'true';
    }else{
        echo 'false';
    }
}



mysqli_close($mysqli);

?>