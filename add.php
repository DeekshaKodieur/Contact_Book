<?php

include 'db.php';

if(isset($_POST['send']))
{
  $name = $_POST['name'];
  $phone = $_POST['num'];
  $mail = $_POST['mail'];
  $add = $_POST['address'];

  $sql= "insert into contacts(`name`,`phone`,`email`,`address`) values('$name','$phone','$mail','$add')";
  $val=mysqli_query($conn,$sql);

  if($val)
 {
   header('location: index.php');

 }

}

 ?>
