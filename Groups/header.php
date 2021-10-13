<?php

header("refresh:20");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>

</style>

<?php


  include'config.php';

include'notification.php'; 

$sql="select * from notification where receiver='$user' and status='not confirmed' order by date asc";
$result = $conn->query($sql);

$id=1;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

if(isset($_POST["join$id"])){
  $notification=$_SESSION["notification$id"];
 $update="update notification set status='Confirmed' where notification='$notification'";
 echo  $notification;
 $result = $conn->query($update);


if ($result===true) {
  echo"<script> alert(' You\'ve joined'); </script>";
  
}
else{
  echo"<script> alert(' something went went wrong try again'); </script>";
}
header("refresh:0");
}

$id++;
}
}
?>

</head>
<body>




<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Notification
          <span style="color:red"> <?php   echo Unread($user); ?> </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
  
  include'config.php';
  
  $id=0;
    
  $sql="select * from notification where receiver='$user' and status='not confirmed' order by date asc";
  $result = $conn->query($sql);
  
  
  if ($result->num_rows > 0) {
  // output data of each row
  $id=1;
  while($row = $result->fetch_assoc()) {
    $user_id=$row["sender"];
    $notification=strtolower($row["notification"]);
    $_SESSION["notification$id"]= $notification;
$user=getName($user_id);

echo"<br>
<form action='' method='post'>";
    echo"<p class='dropdown-item'>". $notification." <button  type='submit' name='join$id' style='color:red' >join</button> <br>";
    echo"Sent by ".$user;
    echo"</p>
    </form>
    <br>";
    $id++;
  }
  }
  
  ?>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
        <li class="nav-item">
        <a class="nav-link " href="index.php  ">Logout</a>
      </li>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


</body>
</html>
