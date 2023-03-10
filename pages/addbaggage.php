<?php if(isset($_SESSION['user_id'])) {

  if(isset($_POST['action']) && $_POST['action'] == 'add_baggage')
  {
    $user_id = $_SESSION['user_id'];
    $usercapacity = $_POST['bag_capacity'];
    $userbaglocation = $_POST['bag_Pick_Location'];
    $userbagdroplocation = $_POST['bag_Drop_Location'];
    $userbagdescription = $_POST['bag_description'];
    $bagphone = $_POST['bag_phone'];
    $bagprice = $_POST['bag_price'];
    $errors = [];

    if (isset($_FILES['bag_photo'])) {
      $file_getname = $_FILES['bag_photo']['name'];
      $file_extention = strtolower(pathinfo($file_getname ,PATHINFO_EXTENSION));
      $file_dir = 'uploads/';
      $file_name = 'DCIM_' . date('YmdHi', time());

      $file_size =$_FILES['bag_photo']['size'];
      $file_tmp =$_FILES['bag_photo']['tmp_name'];
      $image_data = getimagesize($file_tmp);
      $file_type = $image_data['mime'];

      $maxFileSize = 2 * 10e6;
      $allowedExtention = ['jpg', 'jpeg', 'png', 'gif'];
      $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];

      if (!file_exists($file_tmp)) $errors[] = 'Image file is missing in the server';
      if($file_size > 716000) $errors[]='File size must be less than 700kB';
      if ($file_size == 0) $errors[]='File size must be greater than 0kB';
      if (!$image_data) $errors[] = 'Invalid image';
      if (!in_array($file_extention, $allowedExtention)) $errors[] = 'Only jpeg, jpg, png and gif extentions are allowed';
      if (!in_array($file_type, $allowedMimeTypes)) $errors[] = 'Only JPEG, PNG and GIFs are allowed';
      if (is_dir($file_dir)==false) mkdir($file_dir, 0755);

      if (empty($errors)==true) {
        $uploaded = move_uploaded_file($file_tmp,$file_dir . $file_name . '.' . $file_extention);
        chmod($file_dir . $file_name . '.' . $file_extention, 0644);

        if ($uploaded==true) {
          $photo = $file_dir . $file_name . '.' . $file_extention;
          $query="INSERT INTO bag (user_id, bag_capacity, bag_Pick_Location, bag_Drop_Location, bag_description, bag_phone, bag_price, bag_photo ) values('$user_id','$usercapacity','$userbaglocation','$userbagdroplocation','$userbagdescription', '$bagphone', '$bagprice', '$photo')";
          $query_run=mysqli_query($con,$query);

          if($query_run){
            echo "<script type='text/javascript'>
            Swal.fire({
              title: 'Success!',
              text: 'Baggage added',
              icon: 'success',
              confirmButtonText: 'Cool'
            })
            </script>";
          }
          else{
            echo '<script type="text/javascript">toastr.warning("unknown error", {progressBar:true});</script>';
            //echo("Error description: " . mysqli_error($con));
            echo "<script type='text/javascript'>
            Swal.fire({
              title: 'Error!',
              text: 'We cannot add room now',
              icon: 'error',
              confirmButtonText: 'Cool'
            })
            </script>";
          }
        }
      }
      else {
        echo '<script type="text/javascript">toastr.warning("unknown error", {progressBar:true});</script>';
      }


    }

  }
?>




<div  class="container">
  <div  class="row">
    <div  class="col-8 offset-2">
      <form class="myform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_baggage">

        <div class="form-group">
            <label for="formControlRange">Bag Capacity</label>
            <input name="bag_capacity" type="range" class="form-control-range" id="formControlRange" value="1" min="1" max="20" step="1" oninput="document.getElementById('rangeValLabel').innerHTML = this.value;">
            <em id="rangeValLabel" style="font-style: normal;">1</em>
        </div>

        <div class="form-group">
            <label for="validationCustom04">Pick Location</label>
            <select name="bag_Pick_Location" class="custom-select" id="validationCustom04" required>
              <option selected disabled value="">Choose...</option>
              <option value="Dhaka">Dhaka</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Sylhet">Sylhet</option>
              <option value="Barisal">Barisal</option>
              <option value="Khulna">Khulna</option>
              <option value="Rangpur">Rangpur</option>
              <option value="NewYork">NewYork</option>
              <option value="London">London</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid Place.
            </div>
        </div>


        <div class="form-group">
            <label for="validationCustom05">Drop Location</label>
            <select name="bag_Drop_Location" class="custom-select" id="validationCustom04" required>
              <option selected disabled value="">Choose...</option>
              <option value="Dhaka">Dhaka</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Sylhet">Sylhet</option>
              <option value="Barisal">Barisal</option>
              <option value="Khulna">Khulna</option>
              <option value="Rangpur">Rangpur</option>
              <option value="NewYork">NewYork</option>
              <option value="London">London</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid Place.
            </div>
        </div>



        <div class="form-group">
          <label for="exampleInputDescription">Bag Description</label>
          <input name="bag_description" type="text" class="form-control" id="exampleInputDescription" aria-describedby="emailHelp">
          <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>

        <div class="form-group">
          <label for="exampleInputPrice">Phone</label>
          <input name="bag_phone" type="text" class="form-control" id="exampleInputPrice">
        </div>

        <div class="form-group">
          <label for="exampleInputPrice">Price</label>
          <input name="bag_price" type="text" class="form-control" id="exampleInputPrice">
        </div>

        <div class="form-group">
          <label for="exampleInputphoto">Pictures</label>
          <input name="bag_photo" type="file" class="form-control" id="exampleInputphoto" aria-describedby="emailHelp">
          <!-- <small id="phoneHelp" class="form-text text-muted"></small> -->
        </div>
        <button type="submit" class="btn btn-success">Add</button>
      </form>
    </div>
  </div>
</div>

<?php
}
else
{
  echo "<div  class='container'>
    <div  class='row'>
      <div  class='col-8 offset-2'>";
echo "<div class='alert alert-warning' role='alert'>
  You are not logged in.
</div>";
echo "    </div>
  </div>
</div>";
} ?>
