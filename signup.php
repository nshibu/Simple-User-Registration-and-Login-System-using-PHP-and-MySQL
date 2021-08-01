<?php 
session_start();
if(isset($_SESSION['email'])){
    header('location : index.php');
}
 require_once "db_config.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Simple User Registration and Login System Using Php and MySQL</title>

    <style>

    </style>
  </head>
  <body>

<div class="container p-5">
<div class="row">

<div class="col-md-6 col-sm-9 col-xs-9 mx-auto py-5 px-0 ">
    <h2 class="text-center">Sign Up</h2>

      <?php  if (isset($_SESSION['error'])) : ?>
  <div class="error text-danger">
  	<?php foreach ($_SESSION['error'] as $error) : ?>
  	  <p><?php echo '<p>'.$error.'</p>'; ?></p>
  	<?php endforeach ?>
  </div>

<?php  endif;  unset($_SESSION['error']);?>



<form action="execute.php" method="post"  >
     <div class="form-group mb-3">
    <label for="name">Name</label>
   <input type="text" class="form-control" name="name" id="name" placeholder="Name" required ">
   </div>
     <div class="form-group mb-3">
    <label for="email">Email</label>
   <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
   </div>
     <div class="form-group mb-3">
    <label for="password">Password</label>
   <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
   </div>
     <div class="form-group mb-3">
    <label for="cpassword">Confirm PAssword</label>
   <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
   </div>
     <button type="submit" class="btn btn-primary mb-3" name="signup">Submit</button>
   </form>

   <small>Already have an account ? <a href="login.php"> Login </a></small>
</div>
</div>
</div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>