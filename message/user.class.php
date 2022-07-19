<?php

//Creating class for login form and to check user authentication
class user
{
    //Declare Variable
    private $conn;
    private $table;

    //Function to connect to database server
    function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'church');
    }

    // returns the db connection instance
    function get_conn() {
        return $this->conn;
    }

    //Create Login form
    function showLoginForm()
    {
    return('<div class="content">
    <form action="" method="POST">
        Please Enter your Email and password to log in:<br />
        <div class="center">
            <label for="username">Username</label><input type="text" name="email" id="username" /><br />
            <label for="password">Password</label><input type="password" name="pass" id="password" /><br />
            <input type="submit" name="submit" value="Log in" />
            <div class="col-md-4">
            <a href="profile/register.php">Not Yet a Member</a><br>
            <a href="index.php?forgotten_password">Forgotten Password</a>
            <div class="col-md-4">
            <a href="admin_area/index.php">Admin Login</a>
        </div>
        </div>
        </div>
    </form>
    </div>
    <div class="foot"><a href="homepage.php">Go Home</a> - <a href="homepage.php">Promsy Tech</a></div>
    ');
    }

    //Create function for checking username and Password
    Public function login($username, $password)
    {
        $query="SELECT * FROM members WHERE email='".$username."' and
        pass='".$password."'";
        $result=mysqli_query($this->conn, $query);
        $numrows=mysqli_num_rows($result);
        return !($numrows==0);
        
    }
    // Function to log the user out
    Public function logout(){
        session_start();
        session_destroy();
        setcookie("email", "", time() - 3600, "/");
        echo "<script>window.open('index.php','_self')</script>";


    }

    //Function to insert new user
    Public function register($table_name,$data)
    {
        $string = "INSERT INTO ".$table_name." (";
        $string .= implode(",", array_keys($data)).') values (';
        $string .= "'". implode("','", array_values($data))."')";
        if (mysqli_query($this->conn, $string)) {
            return true;
        }
        else{
            echo mysqli_error($this->conn);
        }
    }
    //Function to recover password
    Public function recover_password($email, $secrete_question, $table_name){
        $query = "SELECT * FROM `$table_name` WHERE `email` = '$email' and `secreat_question` = '$secrete_question'";
        $run_query = mysqli_query($this->conn, $query);
        while ($row_query = mysqli_fetch_array($run_query)) {
            $password = $row_query['pass'];
            header('location: index.php?password='.$password);
        }
    }
}
?>