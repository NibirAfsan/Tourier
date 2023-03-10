<?php if(isset($_SESSION['user_id'])) {

  if(isset($_POST['action']) && $_POST['action'] == 'Payment_history')

{


}
<div class="album py-5 bg-light">
  <div class="container">
    <?php
    $query="SELECT * FROM user_id WHERE user_id = $_SESSION[u]";

    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
      ?>
      <div class="row">
      <?php
      foreach ($query_run as $row) {
        ?>

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src="<?= $row['acc_photo'] ?>" class="img-thumbnail">
              <div class="card-body">
                <p class="card-text"><?= $row['acc_description'] ?></p>
                <p class="card-text"><?= $row['acc_location'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                   <a href="index.php?page=book_room" type="button" class="btn btn-sm btn-outline-secondary">Reservation</a>
                  </div>
                  <small class="text-muted"><?= $row['acc_price'] ?> tk</small>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <?php
    }
    else
    {
      //invalid
      echo '<script type="text/javascript"> alert("No adds to show!!!")</script>';
    }
    ?>
  </div>
</div>




<div  class="container">
  <div  class="row">





      <table align='right'>
                  <tr>
                        <th> Room ID </th>
                        <th> Amount </th>

                  </tr>
              <?php while ($row = mysqli_fetch_array($search_result)): ?>
                  <tr>
                    <td><?php echo $row['acc_id'] ?></td>
                    <td><?php echo $row['acc_price'] ?></td>

                  </tr>
              <?php endwhile; ?>
      </table>

    </div>
  </div>
