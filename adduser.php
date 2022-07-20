<?php
session_start();
// Connection to DB
$mysqli = new mysqli("localhost", "root", "root", "zeralda");

// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}

$fname=mysqli_real_escape_string($mysqli, $_POST['fname']);
$lname=mysqli_real_escape_string($mysqli, $_POST['lname']);
$email=mysqli_real_escape_string($mysqli, $_POST['email']);
$password=mysqli_real_escape_string($mysqli, $_POST['password']);

if(strlen($fname)<3)
{
    echo "fname";
}
elseif(strlen($lname)<3)
{
    echo "lname";
}
elseif(strlen($email)<4)
{
    echo "eshort";
}
elseif (filter_var($email, FILTER_VALIDATE_EMAIL)=== false)
{
    echo "eformat";
}
elseif(strlen($password)<4)
{
    echo "pshort";
}
//VALID
else
{
    //password hash
    $spassword=password_hash($password,PASSWORD_BCRYPT,array('cost'=> 12));

    $query = "SELECT * from MyGuests where email='$email'" ;
    $result= mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
    $num_row=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);

    if($num_row<1)
    {
        $insert_row=$mysqli->query("INSERT INTO MyGuests(firstname,lastname,email,psw) VALUES('$fname','$lname','$email','$spassword')");

        if($insert_row)
    {
        $_SESSION['login'] = $mysqli->insert_id;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;

        echo "true";
    }
    }
    else 
    { echo "false" ; }


$query2 = "SELECT id from MyGuests where email='$email'" ;
$result2= mysqli_query($mysqli,$query2) or die(mysqli_error($mysqli));
$num_row=mysqli_num_rows($result2);
$row=mysqli_fetch_array($result2);


    if ($num_row=1)
      {  
        $_SESSION['id'] = $row['id'];
      }  


}











mysqli_close($mysqli);

?>