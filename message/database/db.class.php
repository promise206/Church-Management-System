<?php

//Creating class for login form and to check user authentication
class database
{
    //Declare Variable
    private $connection;
    private $table;

    //Below is the function to connect to database server
    function connect($host,$username,$password,$database)
    {
        $this->connection=mysqli_connect($host,$username,$password,$database);
    
    }

    //Create Login form
    function showLoginForm()
    {
        return(' <div class="login">
    <h2 style="color:white; text-align:center;"></h2>
	<h1>Login</h1>
    <form method="POST" action="">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login.</button>
    </form>

    <a href="register.php">Not yet a member</a>
</div>');
    }

    //Create function for checking username and Password
    Public function login($username, $password)
    {
        $query="SELECT * FROM users WHERE email='".$username."' and
        pass='".$password."'";
        $result=mysqli_query($this->connection, $query);
        $numrows=mysqli_num_rows($result);
        return !($numrows==0);
        
    }
}

?>