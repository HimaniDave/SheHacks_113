<?php

$servername="localhost";
$username="root";
$password="";
$database="signuppage";

$conn= mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Error " .mysqli_connect_error());
}

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username= $_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    $sqlExists= "SELECT * FROM `signuppage` WHERE name='$username'";
    $result=mysqli_query($conn,$sqlExists);
    $rowsExisting= mysqli_num_rows($result);


    if($rowsExisting>0){
        
      $showError="Username is already taken";

    }else{
  
    if(($password== $cpassword) ){
        // insert the data
        $sql= "INSERT INTO `signuppage` ( `name`, `password`, `datetime`) VALUES ( '$username', '$password', current_timestamp());";
        $result= mysqli_query($conn,$sql);

        if($result){
          $showAlert = true;
        }
        }
        else{
          $showError = "Passwords do not match";    }
}
}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <title>Signup</title>
</head>


<body>
    <?php
    if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong> You have signed up successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error </strong> '.$showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
    ?>
    <h1 class="main-heading">Signup</h1>
    <h4 class="main-heading">
        Remember this master password as forgetting this one would lead to major
        loss of other passwords.
    </h4>

    <div class="signup-container">
        <form action="masterSignup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" autocomplete="off" required class="form-control" id="username" name="username"
                    aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" required id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" required id="cpassword" name="cpassword">
            </div>


            <button type="submit" class="btn btn-primary">Signup</button>
            <br>
            <hr>
            <small class="small">Already have an account please <a href="masterLogin.php">login</a></small>
        </form>


    </div>
</body>
<!-- Bootstrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script src="app.js"></script>


</html>