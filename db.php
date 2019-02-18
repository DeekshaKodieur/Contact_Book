<?php

$conn = mysqli_connect('localhost','root','','addressbook');

if(mysqli_connect_errno())
{
  die("Connection Failed! ".mysqli_connect_error());
}

 ?>
