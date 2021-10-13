
<?php 
$query = "SELECT * FROM users WHERE status='Verified' ";
    $stmt = $conn->prepare($query);
    if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
  if($num_rows > 0){
   
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";

      // if remember me clicked . Values will be stored in $_COOKIE  array
      if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("cuser",$_POST["username"],time()+ (10 * 365  24 * 60 * 60));
//COOKIES for password
setcookie ("cpass",$cpassword,time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["cuser"])) {
setcookie ("cuser","");
if(isset($_COOKIE["cpass"])) {
setcookie ("cpass","");
        }
      }
  
  }
  header('location:index.php');
}
else{

array_push($errors, "Account Not Verified ");
array_push($verifynow, "Verify Now ");
}
}else {
      array_push($errors, "Wrong username/password combination ");
    }
  }
  ?>