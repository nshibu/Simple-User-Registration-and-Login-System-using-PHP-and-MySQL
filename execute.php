<?php

include "db_config.php";
session_start();

if (isset($_POST['signup'])){
    $errors = array(); 
  
  $name =  mysqli_real_escape_string($conn,$_POST["name"]);
  $email =  mysqli_real_escape_string($conn,$_POST["email"]);
  $password = mysqli_real_escape_string($conn,$_POST["password"]);
  $cpassword =  mysqli_real_escape_string($conn,$_POST["cpassword"]);


 if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password && $cpassword)) { array_push($errors, "Password is required"); }
  if ($password != $cpassword) {
	array_push($errors, "The two passwords do not match");
  }

 
 
  $user_check_query = "SELECT * FROM users WHERE email='$email' OR password='$password' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['email'] == $email) {
      array_push($errors, "Email already exists");
    }
  }

 
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "INSERT INTO users (name, email, password) 
  			  VALUES('$name', '$email', '$password')";

                if(mysqli_query($conn, $query))
                {
                	header('location: login.php');
                }
  	
  }else{
      $_SESSION['error']=$errors;
header('location: signup.php');
  }

}


if(isset($_POST['login'])){
     $email =  mysqli_real_escape_string($conn,$_POST["email"]);
  $password = mysqli_real_escape_string($conn,$_POST["password"]);

  $password=md5($password);


  $sql="SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
  
  
      $result=mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
       

        if($user){
             $_SESSION['email']=$user['email']; 
              header('location: index.php');

        }else{
            $_SESSION['error'] ="The password or email does not match";
            header('location: login.php'); 
        }
  
}

?>