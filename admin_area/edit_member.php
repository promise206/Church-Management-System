      
<?php
include("includes/db.php");

if (isset($_GET['edit_member'])) {
 $get_id = $_GET['edit_member'];
 $get_query = "select * from members where member_id = '$get_id'";

  $run_member = mysqli_query($con, $get_query);

  $row_member = mysqli_fetch_array($run_member);

    $member_email = $row_member['email'];
    $member_id = $row_member['member_id'];
    $member_firstname = $row_member['first_name'];
    $member_lastname= $row_member['last_name'];
    $member_image = $row_member['image'];
    $member_phoneno = $row_member['phone_no'];
    $member_pass = $row_member['pass'];
    $member_address = $row_member['address'];
    $member_date = $row_member['date'];
    $member_gender = $row_member['gender'];
    $member_country = $row_member['country'];
    $member_state = $row_member['state'];
    }



?>
      <div class="editBox">
                <div class="form-box">
                
              <h1 style="text-align: center; color: #46594c;font-size: 20px; font-weight: bolder;">Update Your Account </h1>
                <form action="" method="post" enctype="multipart/form-data">
                  <label for="m_firstname" class="control-label">First Name:</label>
                  <div class="row">
                      <div class="col-md-6 padding-top-10">
                          <input type="text" class="form-control" name="m_firstname" id="m_firstname" placeholder="First Name" required value="<?php echo $member_firstname; ?>" />
                      </div>
                      <div class="col-md-6 padding-top-10">
                          <input type="text" class="form-control" name="m_lastname" id="m_lastname" placeholder="Last Name" required value="<?php echo $member_lastname; ?>">
                      </div>
                  </div>
                  <label for="m_email" class="control-label">Email:</label>
                  <div class="row padding-top-10">
                      <div class="col-md-12">
                        <input type="text" class="form-control" id="m_email" name="m_email" placeholder="Email" value="<?php echo $member_email; ?>" required>
                      </div>
                  </div>
                  <label for="m_address" class="control-label">Address:</label>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                        <input type="text" class="form-control" id="m_address" name="m_address" placeholder="Address" value="<?php echo $member_address; ?>" required>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_mobile" class="control-label">Phone Number:</label>
                      <input type="text" class="form-control" id="m_mobile" name="m_mobile" placeholder="Phone Number" value="<?php echo $member_phoneno; ?>" required>
                    </div>
                    <div class="col-md-6 padding-top-10">
                      <label for="m_pass" class="control-label">Password:</label>
                      <input type="text" class="form-control" id="m_pass" name="m_pass" placeholder="Phone Number" value="<?php echo $member_pass; ?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_date" class="control-label">Date Of Birth:</label>
                      <input type="date" class="form-control" id="m_date" name="m_date" placeholder="" value="<?php echo $member_date; ?>" required>
                    </div>
                    <div class="col-md-6 padding-top-10">
                      <label for="m_gender" class="control-label">Gender:</label>
                      <?php 
                      $male = "Male";
                      $female= "Female";
                      if ($member_gender==$male) {
                        echo "<input type='radio' name='m_gender' checked value='$member_gender' >Male";
                        echo "<input type='radio' name='m_gender' value = '$female' >Female";
                      }
                      if ($member_gender==$female) {
                        echo "<input type='radio' name='m_gender' checked value='$member_gender' >Female";
                        echo "<input type='radio' name='m_gender' value='$male' >Male";
                      }
                      
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 padding-top-10">
                      <label for="m_image" class="control-label">Image:</label>
                      <input type="file" class="form-control" id="m_image" name="m_image" placeholder="" required><img src="../members/members_images/<?php echo $member_image; ?> " width= "60" height="60">
                    </div>
                    <div class="col-md-3 padding-top-10">
                      <label for="m_country" class="control-label">Country:</label>
                      <select name="m_country" id="m_country" class="form-control">
                         <option><?php  echo $member_country; ?></option>
                        <option>Nigeria</option>
                         <option>Ghana</option>
                          <option>South Africa</option>
                           <option>Algeria</option>
                            <option>Malaysia</option>
                             <option>Cotonu</option>
                         </select>
                    </div>
                    <div class="col-md-3 padding-top-10">
                      <label for="m_state" class="control-label">State:</label>
                      <select name="m_state" id="m_state" class="form-control">
                       <option><?php  echo $member_state; ?></option>
                         <option>Anambra</option>
                         <option>Lagos</option>
                         <option>Imo</option>
                         <option>Calabar</option>
                         <option>Port Harcourt</option>
                         <option>Abia</option>
                     </select>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-2">
                        <button type="submit" name="register" class="btn btn-success">Update</button>
                      </div>
                  </div>
                </form>
       </div>
       </div>

<?php
      if(isset($_POST['register'])){

        $m_id = $get_id;
        $m_firstname = $_POST['m_firstname'];
        $m_lastname = $_POST['m_lastname'];
        $m_email = $_POST['m_email'];
        $m_address = $_POST['m_address'];
        $m_mobile = $_POST['m_mobile'];
        $m_gender = $_POST['m_gender'];
        $m_date = $_POST['m_date'];
        $m_pass = $_POST['m_pass'];
        $m_image = $_FILES['m_image']['name'];
        $m_image_tmp = $_FILES['m_image']['tmp_name'];
        $m_image_size = $_FILES['m_image']['size'];
        $max_image_size = 2097152;
        $m_image_type = strtolower($_FILES['m_image']['type']);
        $m_country = $_POST['m_country'];
        $m_state = $_POST['m_state'];
        $extension = strtolower(substr($m_image, strpos($m_image, '.')+1));



      if (isset($m_image)) {
        if(!empty($m_image)){
          if (($extension=='jpg' || $extension=='jpeg' || $extension=='png') && ($m_image_type=='image/png' || $m_image_type=='image/jpeg' || $m_image_type=='image/jpg') && $m_image_size<$max_image_size ) {

            if(move_uploaded_file($m_image_tmp,"../members/members_images/$m_image")){

              $update_c = "update members set first_name='$m_firstname',last_name='$m_lastname', email='$m_email', address='$m_address', phone_no='$m_mobile', pass='$m_pass', gender='$m_gender', date='$m_date', image='$m_image', country='$m_country', state='$m_state' where member_id='$m_id'";

              $run_c = mysqli_query($con, $update_c);

                if($run_c){

                  echo"<script>alert('Account Updated successful!')</script>";

                  echo"<script>window.open('index.php?view_members','_self')</script>";
                  exit();
                }
            }
          }
          echo"<script>alert('File must be jpg/jpeg/png and must be 2mb or less !!')</script>";
        }
      }
    }
?>