<!doctype html>
<?php

include 'db.php';

$sql= "select * from contacts order by `id` asc ";
$rows= mysqli_query($conn,$sql);

 ?>


<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Ajax Contact Book | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <div class="row">
      <div class="large-6 columns">
        <h1 style = "font-family: Georgia,Times,Times New Roman,serif;">Ajax Contact Book</h1>
      </div>
      <div class="large-6 columns">
          <a class="add-btn button right medium" data-reveal-id="myModal" style="margin-top:10px;">Add Contact</a>
          <div style="background-color:#FAFAFA ;" id="myModal" class="reveal-modal" data-reveal>
          <h1>Add Contact</h1>

      <form id="myform" action="add.php" method="POST">
      <div class="row">
          <div class="large-12 columns">
          <label>Name
          <input type="text" name="name" placeholder="Enter Name" >
          </label>
          </div>
      </div>

      <div class="row">
        <div class="large-12 columns">
        <label>Phone Number
        <input type="number" name="num" placeholder="Enter Phone Number" >
        </label>
        </div>
      </div>

      <div class="row">
        <div class="large-12 columns">
        <label>Email</label>
        <input type="email" name="mail" placeholder="Enter Email Address">
        </div>
      </div>

      <div class="row">
        <div class="large-12 columns">
        <label> Address
        <input type="text" name="address" placeholder="Enter Address">
        </label>
        </div>
     </div>

      <input id="sub" type="submit" class="add-btn button right small"name="send" value="Submit">
      <a class="close-reveal-modal">&#215;</a>

          </form>
        </div>
      </div>
    <hr><br>
    </div>




        <div class="row">
        <div class="large 12-columns">

          <div class="col-md-12 text-center">
          <p style = "font-family: Georgia,Times,Times New Roman,serif;"><b>Search</b></p>
          <form class="form-group" action="search.php" method="post">
          <input type="text" placeholder="search" name="search" class="form-control" value="">
          </form>
          </div>




        <center>
        <div class="table-responsive">
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
                 <td><?php echo $row['id'] ?></td>
                 <td class="col-md-10"><?php echo $row['name']; ?></td>
                 <td class="col-md-10"><?php echo $row['phone']; ?></td>
                 <td class="col-md-10"><?php echo $row['email']; ?></td>
                 <td class="col-md-10"><?php echo $row['address']; ?></td>
                 <td>
                  <ul class="button-group">
                  <li><a href="edit.php?id=<?php echo $row['id'];?>" class="button tiny">Edit</a></li>
                  <li><a href="delete.php?id=<?php echo $row['id'];?>" class="button tiny alert">Delete</a></li>
                  </ul>
                 </td >
              </tr>
            <?php endwhile; ?>

             </tbody>

           </table>
         </div>
       </center>
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
