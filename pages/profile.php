<?php if(isset($_SESSION['user_id'])) { ?>
<div  class="container">
  <div  class="row">
    <div  class="col-8 offset-2">
      <form class="myform" action="" method="post">
        <input type="hidden" name="action" value="user_signup">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="useremail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputusername">User Name</label>
          <input name="user_name" type="text" class="form-control" id="exampleInputusername" aria-describedby="emailHelp">
          <!-- <small id="usernameHelp" class="form-text text-muted"></small> -->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="cpassword">Confirm Password</label>
          <input name="cpassword" type="password" class="form-control" id="cpassword">
        </div>
        <div class="form-group">
          <label for="exampleInputphone">Phone Number</label>
          <input name="user_phone" type="tel" class="form-control" id="exampleInputphone" aria-describedby="emailHelp">
          <!-- <small id="phoneHelp" class="form-text text-muted"></small> -->
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
        <a href="index.php?page=login" class="btn btn-info">Login</a>
      </form>
    </div>
  </div>
</div>

<?php
if(isset($_POST['action']) && $_POST['action'] == 'user_signup')
{
  $user_id = $_SESSION['user_id'];
  $username = $_POST['user_name'];
  $useremail = $_POST['useremail'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $phonenumber = $_POST['user_phone'];

  if($password==$cpassword)
  {
      $query = "SELECT user_id FROM user WHERE user_email='$useremail'";
      $query_run = mysqli_query($con,$query);

      if(mysqli_num_rows($query_run)>0)
      {
        echo '<script type = "text/javascript"> alert("User is exists..looks like you are already registered. forgot password? try recover.")</script>';
      }
      else
      {
        $query = "Update user SET user_name = '$username', user_email = '$useremail', user_password = '$password', user_phone = '$phonenumber' WHERE user_id = '$user_id'";
        $query_run=mysqli_query($con,$query);

        if($query_run){
          echo '<script type="text/javascript"> alert("User Registered....Go to login page")</script>';
          echo '<script type="text/javascript">location.href = "index.php?page=login";</script>';
        }
        else{
          //echo '<script type="text/javascript"> alert("Error")</script>';
        echo("Error description: " . mysqli_error($con));
        }
      }
  }
  else{
    echo '<script type="text/javascript"> alert("Password and Confirm Password did not match!")</script>';
  }

}

} ?>
