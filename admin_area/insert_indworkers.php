      
<?php
include("includes/db.php");


?>
      <div class="editBox">
                <div class="form-box">
                
              <h1 style="text-align: center; color: #46594c;font-size: 20px; font-weight: bolder;">Insert Indigenous Workers </h1>
                <form action="" method="post" enctype="multipart/form-data">
                  <label for="w_firstname" class="control-label">Name:</label>
                  <div class="row">
                      <div class="col-md-6 padding-top-10">
                          <input type="text" class="form-control" name="w_firstname" id="w_firstname" placeholder="First Name" required  />
                      </div>
                      <div class="col-md-6 padding-top-10">
                          <input type="text" class="form-control" name="w_lastname" id="w_lastname" placeholder="Last Name" required >
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 padding-top-10">
                      <label for="ordained" class="control-label">Year Ordained:</label>
                      <input type="year" class="form-control" id="ordained" name="ordained" placeholder="" >
                    </div>
                    <div class="col-md-3 padding-top-10">
                      <label for="died" class="control-label">Year Died:</label>
                      <input type="year" class="form-control" id="died" name="died" placeholder="">
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-md-3 padding-top-10">
                      <label for="m_state" class="control-label">Category:</label>
                      <select name="w_cat" id="w_cat" class="form-control">
                       <option>Select Category</option>
                         <?php
                            $get_cat = "select * from category";

                            $run_cat = mysqli_query($con, $get_cat);
                            while ($row_cat=mysqli_fetch_array($run_cat)) {
                              $cat_id = $row_cat['cat_id'];
                              $cat_title = $row_cat['cat_title'];


                            echo "<option value='$cat_title'>$cat_title</option>";
                            }

                         ?>
                     </select>
                    </div>
                    
                  
                    <div class="col-md-6 padding-top-10">
                      <label for="w_image" class="control-label">Image:</label>
                      <input type="file" class="form-control" id="w_image" name="w_image" placeholder="" required> 
                    </div>
                    
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="insert" class="btn btn-success">Insert</button>
                      </div>
                  </div>
                </form>
       </div>
       </div>

<?php
      if(isset($_POST['insert'])){

        $w_firstname = $_POST['w_firstname'];
        $w_lastname = $_POST['w_lastname'];
        $ordained = $_POST['ordained'];
        $died = $_POST['died'];
        $w_image = $_FILES['w_image']['name'];
        $w_image_tmp = $_FILES['w_image']['tmp_name'];
        $w_image_size = $_FILES['w_image']['size'];
        $max_image_size = 2097152;
        $w_image_type = strtolower($_FILES['w_image']['type']);
        $w_cat = $_POST['w_cat'];
        $extension = strtolower(substr($w_image, strpos($w_image, '.')+1));



      if (isset($w_image)) {
        if(!empty($w_image)){
          if (($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($w_image_type=='image/png' || $w_image_type=='image/jpeg' || $w_image_type=='image/jpg') && $w_image_size<$max_image_size ) {

            if(move_uploaded_file($w_image_tmp,"../indworkers/indworkers_images/$w_image")){

              $insert_w = "insert into ind_workers(worker_cat, worker_firstname, worker_lastname, image, ordained_on, died_on) VALUES ('$w_cat', '$w_firstname', '$w_lastname', '$w_image', '$ordained','$died')";

              $run_w = mysqli_query($con, $insert_w);

                if($run_w){

                  echo"<script>alert('Worker Inserted!')</script>";

                  echo"<script>window.open('index.php?#','_self')</script>";
                  exit();
                }
            }
          }
          echo"<script>alert('File must be jpg/jpeg/png and must be 2mb or less !!')</script>";
        }
      }
    }
?>