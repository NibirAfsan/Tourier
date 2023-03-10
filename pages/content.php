  <div class="album py-5 bg-light">
    <div class="container">


      <?php
      $query="SELECT acc_photo, acc_price, acc_description FROM accomodation ORDER BY acc_id ASC LIMIT 3";

      $query_run = mysqli_query($con,$query);
      //echo ("Error description: " . mysqli_error($con));
      if(mysqli_num_rows($query_run)>0)
      {
        ?>
        <div class="row">
          <div class="col-md-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
              <?php
              $i = 0;
              foreach ($query_run as $row) {
              ?>
                <div class="carousel-item <?php if($i == 0) echo 'active'; $i++ ?>">
                  <img src="<?= $row['acc_photo'] ?>" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><?= $row['acc_price'] ?> tk</h5>
                    <p><?= $row['acc_description'] ?></p>
                  </div>
                </div>
              <?php } ?>
              </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
          <?php
      } ?>

    </div>
  </div>
