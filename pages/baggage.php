<div class="album py-5 bg-light">
  <div class="container">
    <?php
    $query="SELECT * FROM bag";

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
              <img src="<?= $row['bag_photo'] ?>" class="img-thumbnail">
              <div class="card-body">
                <p class="card-text"><?= $row['bag_description'] ?></p>
                <p class="card-text">Weight : <?= $row['bag_capacity'] ?>kg</p>
                <p class="card-text">From : <?= $row['bag_Pick_Location'] ?></p>
                <p class="card-text">To : <?= $row['bag_Drop_Location'] ?></p>
                <div class="d-flex justify-content-between align-items-center">

                  <button type="button" class="btn btn-success btn-sm show_num" data-toggle="modal" data-target="#quoteModal" data-title="Phone number" data-id="<?= $row['bag_id'] ?>" data-value1="<?= $row['bag_phone'] ?>">
                  Phone Number?</button>

                  <!--  <div class="btn-group">
                    <a <? $row['bag_id'] ?>"class="btn btn-sm btn-outline-secondary">Show Phone Number</button>
                  </div> -->
                  <small class="text-muted bag_phone"><?= $row['bag_Price'] ?> tk <span class="<?= $row['bag_id'] ?>"></span></small>
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
      echo '<script type="text/javascript"> alert("No adds to show")</script>';
    //  echo("Error description: " . mysqli_error($con));
    }
    ?>
  </div>
</div>
