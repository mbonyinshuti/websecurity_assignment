
<?php
if(!isset($_COOKIE["username"]) && !isset($_COOKIE["password"])) {
     
} else {
     
    $_SESSION["user_id"]=$_COOKIE["username"];

    header("Location: home.php");


}
?>
