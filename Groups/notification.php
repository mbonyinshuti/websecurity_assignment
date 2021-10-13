<?php
include'config.php';
include'invitation.php';

$user_id=$_SESSION["user_id"];
$user=getEmail($user_id);


function Unread($user){
include'config.php';
$id=0;
  
$sql="select * from notification where receiver='$user' and status='not confirmed' order by date asc";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $id++;
}
}

if($id>0){
   return $id;
}
}
?>