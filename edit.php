<!doctype html>
<?php

include 'db.php';

$id = $_GET['id'];
$sql= "select * from contacts  where id = '$id' order by `id` asc";
$rows = mysqli_query($conn,$sql);

$row = $rows->fetch_assoc();

if(isset($_POST['send'])){

  $name=$_POST['name'];
  $phone=$_POST['num'];
  $mail=$_POST['mail'];
  $add=$_POST['address'];

  $sql2= "update contacts set name='$name',phone='$phone',
  email='$mail',address='$add' where id='$id'";

  $db=mysqli_query($conn,$sql2);

  header('location:index.php');

}

 ?>

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>Edit Contact </title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <div class="container">
    <div class="row" style="margin-top:70px;">
    <center>
    <div class="large-12 columns">
    <h1 style = "font-family: Georgia,Times,Times New Roman,serif;">Update Contact Book</h1>
    </div>
    </center>

      <div class="col-md-10 col-md-offset-1">

        <table class="table">

        <hr><br>
      <div class="jumbotron">


      <form method="POST">
      <div class="row">
        <div class="large-12 columns">
        <div class="form-group">
        <label>Name
        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" placeholder="Enter Name" />
        </label>
        </div>
        </div>
     </div>

      <div class="row">
        <div class="large-12 columns">
        <div class="form-group">
        <label>Phone Number
        <input type="number" name="num" value="<?php echo $row['phone']; ?>" class="form-control" placeholder="Enter Phone Number" />
        </label>
        </div>
        </div>
      </div>

        <div class="row">
          <div class="large-12 columns">
          <div class="form-group">
          <label>Email</label>
          <input type="email" name="mail" value="<?php echo $row['email']; ?>" class="form-control"  placeholder="Enter Email Address" />
          </div>
          </div>
       </div>


      <div class="row">
        <div class="large-12 columns">
        <div class="form-group">
        <label> Address
        <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control" placeholder="Enter Address" />
        </label>
        </div>
        </div>
      </div>

      <input type="submit" name="send" value="Update Contact" class="btn btn-success">&nbsp;
      <a href="index.php" class="btn btn-warning">Back </a>

      </form>
    </div>
  </table>

</div>
</div>
</div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    </body>
    </html>

<?php
  mysqli_close($conn);
 ?>
