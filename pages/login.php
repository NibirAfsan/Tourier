<?php if(!isset($_SESSION['user_id'])) { ?>
<div  class="container">
  <div  class="row">
    <div  class="col-8 offset-2">
      <form class="myform" action="" method="post">
        <input type="hidden" name="action" value="user_login">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="useremail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="index.php?page=signup" class="btn btn-info">Sign up</a>
      </form>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['action']) && $_POST['action'] == 'user_login')
  {
    $useremail=$_POST['useremail'];
    $password=$_POST['password'];
    echo $password;
    $b = hash_init('sha256');
    hash_update($b,$password);
    $c = hash_final($b);
    echo $c;
    
    //$encrypt_password1 = password_verify($password, $user['user_password']);
    //$encrypt_password = md5($password);

    $query="SELECT user_id, user_name, user_email, user_phone FROM user WHERE user_email ='$useremail' AND user_password = '$c'"; //$c replace $encrypt_password
    
    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
      //valid
      while ($row = $query_run->fetch_assoc()) {
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['user_email']=$row['user_email'];
        $_SESSION['user_phone']=$row['user_phone'];
        echo '<script type="text/javascript">location.href = "index.php";</script>';
      }

    }
    else
    {
      //invalid
      echo '<script type="text/javascript"> alert("Invalid Log In!!!")</script>';
    }
  }

}
else
{
  echo "<div  class='container'>
    <div  class='row'>
      <div  class='col-8 offset-2'>";
echo "<div class='alert alert-warning' role='alert'>
  You are already logged in.
</div>";
echo "    </div>
  </div>
</div>";
} ?>
