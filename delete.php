<?php
include 'db.php';

ini_set('display_errors',1);

$id = $_GET['id'];

$sql = "delete from contacts where id = '$id'";

$val = mysqli_query($conn,$sql);

if($val)
{
    header('location:index.php');


};

 ?>
