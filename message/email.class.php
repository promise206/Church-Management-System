<?php
class email {

    //Declare Variable
    private $conn;
    private $table;

    //Below is the function to connect to database server
    function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '', 'church');
    }

    // returns the db connection instance
    function get_conn() {
        return $this->conn;
    }

    // returns schedule email form
    public function show_Schedule_form(){
        return ('<form method="POST" action="" enctype="multipart/form-data">

              <?php if (isset($_GET["msg"])): ?>
              <p class="success"><?php echo $_GET["msg"] ?></p> 
              <?php endif; ?>
	
		<table>

			<tr>
				<td><label for="email">Reciever Username</label></td>
				<td><input  type="text" id="email" name="email" placeholder="Enter reciever email.." maxlength="100"/></td>
			</tr>


			<tr>
				
				<td><label for="subject">Subject</label></td>
				<td><input  type="text" id="subject" name="subject" placeholder="Enter your subject.." maxlength="100"/></td>

			</tr>

            <tr>
                <td><label for="date">Date</label></td>
                <td><input type="date" id="date" name="date"/><td>
            </tr>

            <tr>
                <td><label for="time">Time</label></td>
                <td><input type="time" id="time" name="time"/><td>
            </tr>

			<tr>
				
				<td><label for="message">Massage</label></td>

				<td><textarea id="message" name="message" placeholder="Enter your message content.."></textarea></td>

			</tr>

            <tr>
                <td><label for="file_name">Attarch file</label></td>
                <td><input  type="file" id="file_name" name="file_name"/></td>
            </tr>
				<td><input type="submit" name="submit" value="Schedule Massage"><td>
		</table>

	</form>');
    }
    //Schedule email
    public function schedule($remail,$file_name, $subject,$message, $timestamp){
        date_default_timezone_set('Africa/Lagos');
        $sent = 0;
        $open = 0;
        $not_sent = 0;
        $semail = $_COOKIE['email'];
        if ($this->time_is_lower($timestamp)) {
            $sent = 1;
        }
        
        $query = "INSERT INTO `messages` (`from`, `email`, `subject`, `message`,`file_name`, `time`, `open`, `sent`,`not_sent`) VALUES ('$semail','$remail','$subject','$message','$file_name','$timestamp','$open','$sent','$not_sent')";
        $run_query = mysqli_query($this->conn, $query);
        return $run_query;
    }

    public function time_is_lower($timestamp) {
        date_default_timezone_set('Africa/Lagos');
        if ($timestamp <= time()) {
            return TRUE;
        }
        return FALSE;
    }
 
//view scheduled email
    public function view_schedule($user){
        $from = $user;
         $query = "select * from messages where `from` = '$user' and not_sent = '0' AND `sender_deleted` = 0 ORDER BY id DESC LIMIT $offset,$limit";
         $run_query = mysqli_query($this->conn, $query);
         return $run_query;
    }
//delete schedule email
    public function delete_email($table_name, $id,$sender_deleted){
       $query = "UPDATE ".$table_name." SET ".$sender_deleted." = '1' WHERE `id` = '$id'";
       $run_query = mysqli_query($this->conn, $query);
       return $run_query;
    }
    //function to send schedule
    public function send_schedule(){
        date_default_timezone_set('Africa/Lagos');
        $open = 0;
        $current_time = time();
        $update_query = "UPDATE `messages` SET `sent` = '1' WHERE `time` <= '$current_time'";
        $run_query = mysqli_query($this->conn, $update_query);
    }

//edit_schedule
    public function update_schedule($id, $email, $subject, $timestamp, $message) {
        $sent = 0;
        if ($this->time_is_lower($timestamp)) {
            $sent = 1;
        }
       $query = "UPDATE `messages` SET `email` = '$email', `subject` = '$subject', `time` = '$timestamp', `message` = '$message', `sent` = '$sent' WHERE `id` = '$id'";
       $run_query = mysqli_query($this->conn, $query);

       return $run_query;
    }

    //getting the total Number of Recieved mail 
    public function get_total_email($email){
    $get_inbox = "SELECT * FROM `messages` WHERE email = '$email' AND `sent` = '1' AND `receiver_deleted` = 0";
    $run_inbox = mysqli_query($this->conn, $get_inbox);
    $get_total = mysqli_num_rows($run_inbox);
    echo '<p>You have Total of<b>  '.$get_total.'  </b>Emails</p>';
    }
    //getting total number of new mails
    public function get_total_new_email($user){

    $get_inbox = "SELECT * FROM `messages` WHERE `email` = '$user' AND `open` = 0 AND `sent` = '1' AND `receiver_deleted` = 0";
    $run_inbox = mysqli_query($this->conn, $get_inbox);
    $get_total = mysqli_num_rows($run_inbox);
    echo '('.$get_total.' new )';
    }
    //send new mail
    public function send_new_email($table_name,$send_email){
        $string = "INSERT INTO ".$table_name." (`";
        $string .= implode("`,`", array_keys($send_email)).'`) values (';
        $string .= "'". implode("','", array_values($send_email))."')";
        if (mysqli_query($this->conn, $string)) {
            return true;
        }
        else{
                        echo mysqli_error($this->conn);
        }
    }

    //send saved mail
    public function send_saved_email($table_name,$send_email, $id){
        $string = "INSERT INTO ".$table_name." (`";
        $string .= implode("`,`", array_keys($send_email)).'`) values (';
        $string .= "'". implode("','", array_values($send_email))."')";
        if (mysqli_query($this->conn, $string)) {
            $this->delete_saved("draft", $id);
            return true;
        }
        else{
            echo mysqli_error($this->conn);
        }
    }

    //delete saved mails
    public function delete_saved($table_name, $where){
        $delete_query = "DELETE FROM `draft` WHERE `id` = $where";
        $run_query = mysqli_query($this->conn, $delete_query);
        return $run_query;
    }

    //select function to select users
    public function select_email($table_name){
        $array = array();
        $query = "SELECT * FROM ".$table_name."";
        $run_query = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($run_query)) {
            $array[] = $row;
        }
        return $array;
    }

    //function that enables the user to save mail as a draft
    public function save_email($table_name,$save_email){
        $string = "INSERT INTO ".$table_name." (";
        $string .= implode(",", array_keys($save_email)).') values (';
        $string .= "'". implode("','", array_values($save_email))."')";
        if (mysqli_query($this->conn, $string)) {
            return true;
        }
        else{
            echo mysqli_error($this->conn);
        }
    }

    //getting total saved mail
    public function get_total_draft($user){
    $get_saved = "SELECT * FROM `draft` WHERE `sender_email` = '$user' ";
    $run_saved = mysqli_query($this->conn, $get_saved);
    $get_total_saved = mysqli_num_rows($run_saved);
    echo '<p>You have Total of<b>  ('.$get_total_saved.')  </b>Saved Emails</p>';
    }

    //getting the total New mail 
    public function get_total_schedule($user){
    $get_schedule = "SELECT * FROM `messages` WHERE `from` = '$user' AND `not_sent` = '0' AND `sender_deleted` = 0";
    $run_schedule = mysqli_query($this->conn, $get_schedule);
    $get_total = mysqli_num_rows($run_schedule);
    echo '<p>You have Total of<b>  '.$get_total.'  </b>Scheduled Emails</p>';
    }

    //getting the total sent messages
    public function get_total_sent($user){
    $get_schedule = "SELECT * FROM `messages` WHERE `from` = '$user' AND `sent` = '1' AND `sender_deleted` = '0'";
    $run_schedule = mysqli_query($this->conn, $get_schedule);
    $get_total = mysqli_num_rows($run_schedule);
    echo '<p>You have Total of<b>  '.$get_total.'  </b>Sent Emails</p>';
    }
}
?>