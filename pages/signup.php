
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
          <small id="emailHelp" class="form-text text-muted">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</small>
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
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="index.php?page=login" class="btn btn-info">Login</a>
      </form>
    </div>
  </div>
</div>


<?php
/*if(isset($_POST['action']) && $_POST['action'] == 'user_signup')
{
  $username = $_POST['user_name'];
  $useremail = $_POST['useremail'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $phonenumber = $_POST['user_phone'];

  //$password = 'user-input-pass';

// Validate password strength
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);
  if($password!=$cpassword || !$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
  {
      echo '<script type="text/javascript"> alert("Password and Confirm Password did not match! Or Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.")</script>';

  }
  else{

     // $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
   // $encrypt_password = md5($password);
      $b = hash_init('sha256');
      hash_update($b,$password);
      $c = hash_final($b);
      $query = "SELECT user_id FROM user WHERE user_email='$useremail'";
      $query_run = mysqli_query($con,$query);

      if(mysqli_num_rows($query_run)>0)
      {
        echo '<script type = "text/javascript"> alert("User exists..looks like you are already registered. forgot password? try recover.")</script>';
      }
      else
      {
        $query="INSERT INTO user (user_name, user_email, user_password, user_phone) values('$username','$useremail','$c','$phonenumber')"; //$c replace $encrypt_password
        $query_run=mysqli_query($con,$query);

        if($query_run){
          echo '<script type="text/javascript"> alert("User Registered....Go to login page")</script>';
          echo '<script type="text/javascript">location.href = "index.php?page=login";</script>';
        }
        else{
          echo '<script type="text/javascript"> alert("Error")</script>';
        }
      }

  }

}

*/


if(isset($_POST['action']) && $_POST['action'] == 'user_signup')
{
  $username = $_POST['user_name'];
  $useremail = $_POST['useremail'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $phonenumber = $_POST['user_phone'];

  //$password = 'user-input-pass';

// Validate password strength
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);

  if($password==$cpassword)
  {
    //if($password!=$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
    if($password!=$cpassword || !$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
    {
        echo '<script type="text/javascript"> alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.")</script>';

    }
    else{

       // $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
     // $encrypt_password = md5($password);
        $b = hash_init('sha256');
        hash_update($b,$password);
        $c = hash_final($b);
        $query = "SELECT user_id FROM user WHERE user_email='$useremail'";
        $query_run = mysqli_query($con,$query);

        if(mysqli_num_rows($query_run)>0)
        {
          echo '<script type = "text/javascript"> alert("User exists..looks like you are already registered. forgot password? try recover.")</script>';
        }
        else
        {
          $query="INSERT INTO user (user_name, user_email, user_password, user_phone) values('$username','$useremail','$c','$phonenumber')"; //$c replace $encrypt_password
          $query_run=mysqli_query($con,$query);

          if($query_run){
            echo '<script type="text/javascript"> alert("User Registered....Go to login page")</script>';
            echo '<script type="text/javascript">location.href = "index.php?page=login";</script>';
          }
          else{
            echo '<script type="text/javascript"> alert("Error")</script>';
          }
        }

    }

  }
  else{
    echo '<script type="text/javascript"> alert("Password and Confirm Password did not match!")</script>';
  }



}



?>
