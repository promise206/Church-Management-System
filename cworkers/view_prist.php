 <ul class="breadcrumb">
            <li><a href="../index.php">Home</a></li>
            <li class="active">Vicar</li>
        </ul>
        <div class="panel panel-default">
            <div class="panel-heading">


<?php 
if (isset($_GET['view_prist'])) {
                
              $prist_id = $_GET['view_prist'];

              $get_prist = "select * from current_workers where worker_id = '$prist_id'";
              $run_prist = mysqli_query($con, $get_prist);
              $row_prist = mysqli_fetch_array($run_prist);
              $prist_firstName = $row_prist['worker_firstname'];
              $prist_lastName = $row_prist['worker_lastname'];
              $prist_image = $row_prist['worker_image'];
              $prist_email = $row_prist['worker_email'];
              $prist_phoneno = $row_prist['worker_phoneno'];
              $prist_biography = $row_prist['worker_bio'];
              echo $prist_firstName;
              echo " ";
              echo $prist_lastName;
              
              }
?>
</div>
            <div class="panel-body">  
            
            <div class="box"> 
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 "><div class="grey-box">

          <p style='text-align:center;'><img src='images/<?php echo $prist_image ?>'  width='200' height='200'/>

          <div class="alert alert-success" role="alert">
          <h1>Phone Number: <?php  echo $prist_phoneno; ?></h1>
          <h1>Email: <?php  echo $prist_email; ?></h1>
          </div> 
           </div>
        </div>

    </div>
            <div class="editBox">
                <div class="form-box">
                
              <h1 style="text-align: center; color: #46594c;font-size: 20px; font-weight: bolder;"> BIOGRAPHY</h1>

              <?php  echo $prist_biography; ?>

              </div>
              </div>


           </div>


           
         </div>