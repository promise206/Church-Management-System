<div class="content">
    <form action="" method="POST">
        <h5 style="color: red;">To recover your password, you have to enter the Email address and favorite food which you supplied during registration!</h5><br />
        <?php if (isset($_GET['forgotten_password'])): ?>
        <p class="success"><?php echo $_GET['forgotten_password'] ?></p> 
        <?php endif; ?>
        <div class="center">
            <label for="email">Email</label><input type="text" name="email" id="username" /><br />
            <label for="secrete_question">Favorite Food</label><input type="text" name="secrete_question" id="secrete_question" /><br />
            <input type="submit" name="recover" value="Recover" />
        </div>
    </form>
    </div>
    <div class="foot"><a href="index.php?forgotten_password">Go Home</a> - <a href="index.php?forgotten_password">Promsy Tech</a></div>

    <?php 

        if (isset($_POST['recover'])) {
            $email = $_POST['email'];
            $secrete_question = $_POST['secrete_question'];
            $secrete_question_lowercase = strtolower($secrete_question);
            $query = "SELECT * FROM `users` WHERE `email` = '$email'";

            $run_query = mysqli_query($obj->get_conn(), $query);

            $count_query = mysqli_num_rows($run_query);

            if ($count_query > 0) {
                $query2 = "SELECT * FROM `users` WHERE `secreat_question` = '$secrete_question_lowercase'";
                $run_query2 = mysqli_query($obj->get_conn(), $query2);
                $count_query2 = mysqli_num_rows($run_query2);

                if ($count_query2 > 0) {
                    if ($obj->recover_password($email, $secrete_question, "users")) {
                        
                    }
                }else{
                  $msg = "Invalid Secrete Question!";
                  header('location: index.php?forgotten_password='.$msg);
                }

            }else {
                $msg = "Invalid Email Address!";
                header('location: index.php?forgotten_password='.$msg);
            }
        }

     ?>
    