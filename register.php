<?php
include'config.php';


if(isset($_POST["signup"])){
$fname=$_POST["first"];
$lname=$_POST["last"];
$username=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["pass"];

$code= mt_rand(100000, 999999);
$status="Not verified";
$to=$email;
    $from="From: mbonyinshutifiston@gmail.com";
    $subject="Verification Code for fiston Website";
    $message =$code;
  $status='No verified';
 $_SESSION['code']=$code;
  
    $mailing = mail($to,$subject,$message,$from); 
   // header('location: verify.php');

$sql="insert into users(First_name,Last_name,username,Email,Password,code,status) values('$fname','$lname','$username','$email','$password','$otp','$status')";

if($conn->query($sql)===true){
  
   header('location: verify.php');
}
else if(mysqli_errno($conn) == 1062)
{
    echo "<script> alert('This email exists already!!!<br><br>  Try Again');</script>";
}
else{
    die("something went wrong: ".$conn->error);
}

}
	

?>