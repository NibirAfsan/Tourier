<?php if(isset($_SESSION['user_id'])) {

  if(isset($_POST['action']) && $_POST['action'] == 'add_baggage')
  {

  //  $acc_price=$_POST['acc_price'];



    echo "<script type='text/javascript'>
    Swal.fire({
      title: 'Success!',
      text: 'Room booked',
      icon: 'success',
      confirmButtonText: 'Cool'
    })
    </script>";
  }
?>




<div  class="container">
  <div  class="row">
    <div  class="col-8 offset-2">
      <form class="myform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_baggage">









<!--

        <div class="form-group">
          <label for="exampleInputPrice">Price</label>
          <input name="bag_price" type="text" class="form-control" id="exampleInputPrice">
        </div>
-->
           <h4>Do you want to pay <?= $_GET['room_price'] ?> tk? </h4>
        <button type="submit" class="btn btn-success">Payment</button>
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
