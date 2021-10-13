<?php 


  include'config.php';
  $group_name="callaway_group";
  $user_id=26937;
  $table=$group_name."_".$user_id."_members";
  echo $table;

  $id=0;
    
  $sql="select * from $table ";
  $result = $conn->query($sql);
  
  
  if ($result->num_rows > 0) {
  // output data of each row
  $id=1;
  while($row = $result->fetch_assoc()) {
    $user_id=$row["User_id"];
  
include'notification.php';
 


 
$sql="select * from users where User_id=$user_id and First_name='$fname' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
  $lname=$row["Last_name"];
}
}


    $id++;
  }
  }
  
  ?>