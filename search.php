<!DOCTYPE html>

<?php include 'db.php';

if(isset($_POST['search'])){

  $name= htmlspecialchars($_POST['search']);

  $sql= "select * from contacts where name like '%$name%' order by `id` asc";

  $rows = mysqli_query($conn,$sql);

}


?>



<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>Contact Book</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <div class="container" style="background-color:#FAFAFA ;">
      <div class="row" style="margin-top:70px;">
        <center><h1 style = "font-family: Georgia,Times,Times New Roman,serif;">Searched Contacts</h1> </center>

              <hr><br>

              <div class="row">
              <div class="large 12-columns">

              <div class="col-md-12 text-center">
                <p style = "font-family: Georgia,Times,Times New Roman,serif;"><b>Search</b></p>
                <form class="form-group" action="search.php" method="post">
                <input type="text" placeholder="search" name="search" class="form-control" value="">
                </form>

            </div>

            <?php if(mysqli_num_rows($rows)<1) : ?>
              <center>
              <h3 class="text-danger text-center"><b>Nothing Found!</b></h3>
              <a href="index.php" class="btn btn-warning"> Back</a>
            </center>
            <?php else : ?>

              <table class="table">
                  <thead>
                       <tr>
                       <th width="50" height="80">Sr.no</th>
                       <th width="210" height="80">Name</th>
                       <th width="140"height="80">Phone</th>
                       <th width="210"height="80">Email</th>
                       <th width="260"height="80">Address</th>
                       <th width="160"height="80">Actions</th>
                     </tr>
                   </thead>

                   <tbody class="table table-striped">
                     <tr>

                       <?php while ($row= $rows->fetch_assoc()) : ?>
                       <td><?php echo $row['id'] ;?></td>
                       <td><?php echo $row['name']; ?></td>
                       <td ><?php echo $row['phone']; ?></td>
                       <td ><?php echo $row['email']; ?></td>
                       <td><?php echo $row['address']; ?></td>
                       <td>
                          <ul class="button-group">
                           <li><a href="edit.php?id=<?php echo $row['id'];?>" class="button tiny" style="text-decoration:none;" >Edit</a></li>
                           <li><a href="delete.php?id=<?php echo $row['id'];?>" class="button tiny alert" style="text-decoration:none;">Delete</a></li>
                          </ul>
                           </td>
                           </tr>
                  <?php endwhile; ?>

                   </tbody>


                <?php endif; ?>
              </table>

             </div>
           </div>

      </div>
      </div>
    </div>

  </body>
</html>
