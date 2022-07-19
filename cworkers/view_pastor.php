  <ul class="breadcrumb">
            <li><a href="../index.php">Home</a></li>
            <li class="active">Pastor</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">
 <?php if

              (isset($_GET['view_pastor'])) {
                
              $chatchist_id = $_GET['view_pastor'];

              $get_chatchist = "select * from current_workers where worker_id='$chatchist_id'";
              $run_chatchist = mysqli_query($con, $get_chatchist);
              $row_chatchist = mysqli_fetch_array($run_chatchist);
              $chatchist_firstName = $row_chatchist['worker_firstname'];
              $chatchist_lastName = $row_chatchist['worker_lastname'];
              $chatchist_image = $row_chatchist['worker_image'];
              $chatchist_email = $row_chatchist['worker_email'];
              $chatchist_phoneno = $row_chatchist['worker_phoneno'];
              $chatchist_biography = $row_chatchist['worker_bio'];

              echo $chatchist_firstName;
              echo " ";
              echo $chatchist_lastName;
              }
?>
</div>
  <div class="panel-body"> 

    <div class="box"> 
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">

          <p style='text-align:center;'><img src='images/<?php echo $chatchist_image ?>'  width='200' height='200'/>

          <div class="alert alert-success" role="alert">
          <h1>Phone Number: <?php  echo $chatchist_phoneno; ?></h1>
          <h1>Email: <?php  echo $chatchist_email; ?></h1>
          </div>  
           </div>
        </div>

    </div>

 <div class="editBox">
                <div class="form-box">
                
              <h1 style="text-align: center; color: #46594c;font-size: 20px; font-weight: bolder;"> BIOGRAPHY</h1>

             <h1 style="text-align: left;"><?php  echo $chatchist_biography; ?></h1>

              </div>
              </div>

  </div>

 