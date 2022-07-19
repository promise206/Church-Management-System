<?php
/**
* 
*/
class admin{

    //Declare Variable
    private $conn;
    private $table;
	
	function __construct()
	{
		$this->conn = mysqli_connect('localhost', 'root', '', 'email');
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
            <label for="username">Email</label><input type="text" name="email" id="username" /><br />
            <label for="password">Password</label><input type="password" name="pass" id="password" /><br />
            <input type="submit" name="submit" value="Log in" />
            <div class="col-md-4">
        </div>
        </div>
    </form>
    </div>
    <div class="foot"><a href="index.php">Go Home</a> - <a href="index.php">Promsy Tech</a></div>
    ');
    }

    //Create function for checking username and Password
    Public function login($email, $password)
    {
        $query="SELECT * FROM admin WHERE email='".$email."' and
        pass='".$password."'";
        $result=mysqli_query($this->conn, $query);
        $numrows=mysqli_num_rows($result);
        return !($numrows==0);
        
    }
    // Function for logging the user out
    Public function logout(){

        session_destroy();
        setcookie("email", "", time() - 3600, "/");
        echo "<script>window.open('index.php','_self')</script>";


    }

    // Function to view users
    public function select_users($table_name){

    	$array = array();
    	$query = "SELECT * FROM ".$table_name." LIMIT 20";
    	$result = mysqli_query($this->conn, $query);
    	$total = mysqli_num_rows($result);
    	while ($row = mysqli_fetch_assoc($result)) {
    		$array[] = $row;
    	}
    	return $array;
    }

    //delete users
    public function delete_user($table_name, $id){

       $query = "DELETE FROM ".$table_name." WHERE id = ".$id."";
       $run_query = mysqli_query($this->conn, $query);

       return $run_query;
    }

    // Function to view Deleted mails
    public function select_deleted_emails($table_name){

        $array = array();
        $query = "SELECT * FROM ".$table_name." WHERE receiver_deleted = 1 and sender_deleted = 1   LIMIT 20";
        $result = mysqli_query($this->conn, $query);
        $total = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }

    // Function to Delete mails that both the sender and Reciever have deleted
    public function delete_mail($table_name, $id){

       $query = "DELETE FROM ".$table_name." WHERE id = ".$id." AND receiver_deleted = 1 AND sender_deleted = 1 ";
       $run_query = mysqli_query($this->conn, $query);

       return $run_query;
    }
}


?>