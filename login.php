<?php
session_start();
include'config.php';

 include'remember.php'; 


if(isset($_POST["login"])){

$user=$_POST["username"];
$pass=$_POST["pass"];





$sql="select * from users where username='$user'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

    $password=$row["Password"];
    $username=$row["username"];
    

  if($pass==$password && $user==$username)
{
    if(isset($_POST["remember"])){

 
   setcookie("username",$user);
   setcookie("password",$pass);

    }
}


if($pass==$password && $user==$username)
{
    header("Location: home.php");
    
}
else{
    echo" login failed ";
}

}
}

}
?>
