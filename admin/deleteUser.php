<?php
include ('../config/connect.php');

if(isset($_GET ['id']) && !empty($_GET ['id'])){
    $id = $_GET ['id'];
    mysqli_query($connect,"DELETE FROM `users` WHERE id = '$id'");
  
       
        header("Location:users");
    }
else{
    header("Location:users");die;
}
?>