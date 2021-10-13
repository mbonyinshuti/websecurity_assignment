<?php
session_start();

require_once('config.php');

if (isset($_POST['sub'])) {
 
    $email=$_SESSION['email'];
    $code=$_POST['code'];
    
   $query = "SELECT * FROM users WHERE code=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i',$code);
    if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
  if($num_rows > 0){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $query = "UPDATE users SET status='Verified' WHERE Email=? ";
  $stmti = $conn->prepare($query);
$stmti->bind_param('s',$email);
$stmti->execute();
$stmti->close();
header('location:loginpage.php');

    }
  else{
    echo "Wrong activation code ";
  }

  }


?>