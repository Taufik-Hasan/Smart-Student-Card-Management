<?php
	if(!isset($_SESSION)) {
    	session_start();
	}

	class Admin{
		public $username;
		public $name;
		public $designation;
		public $phone;
		public $email;
		public $room_number;

		public $user_type;
		public $user_type_number;
		function __construct(){
			$this->user_type="Admin";
			$this->user_type_number=0;
		}
		function set_data($username, $name, $designation, $phone,$email, $room_number) {
		    $this->username = $username;
		    $this->name = $name;
		    $this->designation = $designation;
		    $this->phone = $phone;
		    $this->email = $email;
		    $this->room_number = $room_number;
		    
		}
	}
	class Doctor{
		public $username;
		public $doc_name;
		public $designation;
		public $phone;
		public $email;
		public $room_number;

		public $user_type;
		public $user_type_number;
		function __construct(){
			$this->user_type="Doctor";
			$this->user_type_number=1;
		}
		function set_data($username, $doc_name, $designation, $phone,$email, $room_number) {
		    $this->username = $username;
		    $this->doc_name = $doc_name;
		    $this->designation = $designation;
		    $this->phone = $phone;
		    $this->email = $email;
		    $this->room_number = $room_number;
		    
		}
	}

	class Librarian{
		public $username;
		public $name;
		public $designation;
		public $phone;
		public $email;
		public $room_number;

		public $user_type;
		public $user_type_number;
		function __construct(){
			$this->user_type="Liberian";
			$this->user_type_number=2;
		}
		function set_data($username, $name, $designation, $phone,$email, $room_number) {
		    $this->username = $username;
		    $this->name = $name;
		    $this->designation = $designation;
		    $this->phone = $phone;
		    $this->email = $email;
		    $this->room_number = $room_number; 
		}
	}
	class Cafeteria{
		public $username;
		public $name;
		public $designation;
		public $phone;
		public $email;
		public $room_number;

		public $user_type;
		public $user_type_number;
		function __construct(){
			$this->user_type="Cafeteria";
			$this->user_type_number=2;
		}
		function set_data($username, $name, $designation, $phone,$email, $room_number) {
		    $this->username = $username;
		    $this->name = $name;
		    $this->designation = $designation;
		    $this->phone = $phone;
		    $this->email = $email;
		    $this->room_number = $room_number; 
		}
	}

	class Database{
		private $conn;
		public $current_user;

	  	function __construct() {
		    $this->conn = mysqli_connect("localhost","root","","smart_student_card");
		}

		function validate_login($userName, $userPassword){
			#$userPassword=md5($userPassword);
			$query=mysqli_query($this->conn, "SELECT * FROM users WHERE (username='$userName' AND password='$userPassword')");
			if(mysqli_num_rows($query)==1){
				$this->user=$userName;
				return true;
			}
			else
				return false;
		}

		function get_user_data($userName){
			$query=mysqli_query($this->conn, "SELECT  username, role FROM users WHERE (username='$userName')");
			
			$user_data=mysqli_fetch_array($query);
			if($user_data['role']==1)
				$user_data['role']="Doctor";
			else if($user_data['role']==2)
				$user_data['role']="Liberian";
			else if($user_data['role']==3)
				$user_data['role']="Cafeteria";
			else if($user_data['role']==0)
				$user_data['role']="Admin";
			else $user_data['role']=null;
			return $user_data;
		}

		function initialize_user($userName){
			$user_data=$this->get_user_data($userName);
			$userName=$user_data['username'];
			$additional_data=NULL;

			if($user_data['role']=="Admin"){
				$query=mysqli_query($this->conn, "SELECT name, designation, phone, email, room_number FROM admin WHERE (username='$userName')");
				$additional_data=mysqli_fetch_array($query);
				
				$_SESSION['SSC_user']=new Admin();
				$_SESSION['SSC_user']->set_data($user_data['username'], $additional_data['name'], $additional_data['designation'], $additional_data['phone'], $additional_data['email'],$additional_data['room_number']);
				$this->current_user=$_SESSION['SSC_user'];
			}else if($user_data['role']=="Doctor"){
				$query=mysqli_query($this->conn, "SELECT doc_name, designation, phone, email, room_number FROM doctor WHERE (doc_username='$userName')");
				$additional_data=mysqli_fetch_array($query);
				
				$_SESSION['SSC_user']=new Doctor();
				$_SESSION['SSC_user']->set_data($user_data['username'], $additional_data['doc_name'], $additional_data['designation'], $additional_data['phone'], $additional_data['email'],$additional_data['room_number']);
				$this->current_user=$_SESSION['SSC_user'];
			}else if($user_data['role']=="Liberian"){
				$query=mysqli_query($this->conn, "SELECT name, designation, phone, email, room_number FROM liberian WHERE (username='$userName')");
				$additional_data=mysqli_fetch_array($query);
				
				$_SESSION['SSC_user']=new Librarian();
				$_SESSION['SSC_user']->set_data($user_data['username'], $additional_data['name'], $additional_data['designation'], $additional_data['phone'], $additional_data['email'],$additional_data['room_number']);
				$this->current_user=$_SESSION['SSC_user'];
			}else if($user_data['role']=="Cafeteria"){
				$query=mysqli_query($this->conn, "SELECT name, designation, phone, email, room_number FROM liberian WHERE (username='$userName')");
				$additional_data=mysqli_fetch_array($query);
				
				$_SESSION['SSC_user']=new Cafeteria();
				$_SESSION['SSC_user']->set_data($user_data['username'], $additional_data['name'], $additional_data['designation'], $additional_data['phone'], $additional_data['email'],$additional_data['room_number']);
				$this->current_user=$_SESSION['SSC_user'];
			}else $this->current_user=null;
		}

		function medical_service($student_id){
			$query=mysqli_query($this->conn,"SELECT * from medical_services WHERE (student_id='$student_id') ORDER BY service_date DESC LIMIT 7");
			return $query;
		}

		function medical_service_provide($s_id,$s_descrip)
		{	
			$timestamp = time();
			$date=date("Y-m-d", $timestamp);

			return mysqli_query($this->conn,"INSERT INTO medical_services VALUES('','$s_id','$date','$s_descrip')");
		}
		function library_service_provide($s_id,$accession_id,$issue_date,$user)
		{	
			//$timestamp = time();
			//$date=date("Y-m-d", $timestamp);
			$query=mysqli_query($this->conn,"UPDATE book SET issued_to='$s_id' WHERE(accession_id='$accession_id') ");
			if($query){
				return mysqli_query($this->conn,"INSERT INTO library_service VALUES('','$s_id','$accession_id','$issue_date','$user','','','1')");
			}else return false;
		}

		function library_service($student_id){
			$query=mysqli_query($this->conn,"SELECT * from library_service WHERE (student_id='$student_id') ORDER BY service_date and status DESC LIMIT 8");
			return $query;
		}
		function library_returned_service_provide($student_id,$accession_id,$returned_date){
			$query=mysqli_query($this->conn,"UPDATE book SET issued_to=null WHERE(accession_id='$accession_id') ");
			if($query){
				$query=mysqli_query($this->conn,"UPDATE library_service SET return_date='$returned_date',status='0'  WHERE(accession_id='$accession_id' and status='1') ");
				if ($query) return true;
				else return false;
			}else return false;
			
		}

		function valid_book($accession_id){
			$query=mysqli_query($this->conn,"SELECT * from book WHERE (accession_id='$accession_id' and issued_to is null)");
			if(mysqli_num_rows($query)==1){
				return true;
			}else
				return false;
		}

		function library_service_check($student_id){
			$query=mysqli_query($this->conn,"SELECT * from library_service WHERE (student_id='$student_id' and status='1')");
			if(mysqli_num_rows($query)<3){
				return true;
			}else
				return false;
		}
		function library_service_check_issue_or_not($student_id,$accession_id){
			$query=mysqli_query($this->conn,"SELECT * from library_service WHERE (student_id='$student_id' and accession_id='$accession_id' and status='1')");
			if(mysqli_num_rows($query)==1){
				return true;
			}else
				return false;
		}

		function match_medical_details_id_and_student_id($details_id,$student_id){
			$query=mysqli_query($this->conn,"SELECT * from  medical_services WHERE id='$details_id' and student_id='$student_id'");
			if(mysqli_num_rows($query)==1){
				return true;
			}else
				return false;
		}
		function get_medical_details_data($details_id){
			$query=mysqli_query($this->conn,"SELECT * from  medical_services WHERE id='$details_id'");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return $data;
			}else
				return null;
		}


		function match_details_id_and_student_id($details_id,$student_id){
			$query=mysqli_query($this->conn,"SELECT * from  library_service WHERE id='$details_id' and student_id='$student_id'");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return true;
			}else
				return false;
		}
		function get_details_data($details_id){
			$query=mysqli_query($this->conn,"SELECT b.name,b.author,b.accession_id, l.service_date,l.issuer,l.return_date,l.fine,l.status from  library_service as l, book as b WHERE (id='$details_id' and b.accession_id=l.accession_id)");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return $data;
			}else
				return null;
		}
		function dayFind($details_id){
			$query=mysqli_query($this->conn,"SELECT TIMESTAMPDIFF(DAY, service_date, return_date) + 1 as day from  library_service WHERE id='$details_id' ");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return $data;
			}else
				return null;
		}

		function get_liberian_name_by_username($username){
			$query=mysqli_query($this->conn,"SELECT name from  liberian WHERE username='$username' ");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return $data['name'];
			}else
				return null;
		}

		function getStudent_information($card_id){
			$query=mysqli_query($this->conn,"SELECT * from students WHERE card_id='$card_id'");
			return $query;
		}
		function get_Student_ID($card_id){
			$query=mysqli_query($this->conn,"SELECT student_id from students WHERE card_id='$card_id'");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return $data['student_id'];
			}else
				return null;

		}

		function insert_UID($card_id){
			if($card_id=='') $this->card_id=null;
			else $this->card_id=$card_id;
		}

		function swip_by_card_id_update($card){
			//$user=$_SESSION['current_username'];
			//$swl="UPDATE swip_card_table SET card_id='$card' WHERE (username = '$user')";
			$query=mysqli_query($this->conn,"UPDATE swip_card_table SET card_id='$card'");
			if ($query) {
			  return 1;
			} else {
			  die();
			}
		}

		function swip_by_get_card_id($username){
			$query=mysqli_query($this->conn,"SELECT card_id from swip_card_table WHERE username='$username'");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return $data['card_id'];
			}else
				return null;
		}

		function get_user_id()
		{
			$user= $this->current_user->username;
			$query=mysqli_query($this->conn,"SELECT user_id from  users WHERE username='$user' ");
			if(mysqli_num_rows($query)==1){
				$data=mysqli_fetch_array($query);
				return $data['user_id'];
			}else
				return "NULL";
		}

	// Admin Functions 

		function total_student(){
			$query=mysqli_query($this->conn,"SELECT COUNT(*) as total FROM students");
			$data=mysqli_fetch_array($query);
			return $data['total'];
		}
		function today_total_medical_service(){
			$timestamp = time();
			$date=date("Y-m-d", $timestamp);

			$query=mysqli_query($this->conn,"SELECT COUNT(*) as total FROM medical_services WHERE service_date='$date'");
			$data=mysqli_fetch_array($query);
			return $data['total'];
		}
		function authorized_user(){
			$query=mysqli_query($this->conn,"SELECT COUNT(*) as total FROM users WHERE role !=0");
			$data=mysqli_fetch_array($query);
			return $data['total'];
		}
		function total_medical_user(){
			$query=mysqli_query($this->conn,"SELECT COUNT(*) as total FROM users WHERE role=1");
			$data=mysqli_fetch_array($query);
			return $data['total'];
		}
		function total_liberian_user(){
			$query=mysqli_query($this->conn,"SELECT COUNT(*) as total FROM users WHERE role=2");
			$data=mysqli_fetch_array($query);
			return $data['total'];
		}
		function total_cafeteria_user(){
			$query=mysqli_query($this->conn,"SELECT COUNT(*) as total FROM users WHERE role=3");
			$data=mysqli_fetch_array($query);
			return $data['total'];
		}

		function valid_card_id($card_id){
			$query=mysqli_query($this->conn,"SELECT * from  students WHERE card_id='$card_id' ");
			if(mysqli_num_rows($query)==1){
				return false;
			}else
				return true;
		}
		function valid_student_id($s_id){
			$query=mysqli_query($this->conn,"SELECT * from  students WHERE student_id='$s_id' ");
			if(mysqli_num_rows($query)==1){
				return false;
			}else
				return true;
		}
		function insert_new_student($card_id,$s_id,$s_name,$s_gender,$s_email,$s_phone,$s_dept,$s_year,$s_semester){
			return mysqli_query($this->conn,"INSERT INTO students VALUES('$s_id','$card_id','$s_name','$s_gender','$s_email','$s_phone','$s_dept','$s_year','$s_semester')");
		}

		function match_card_id_and_student_id($card_id,$s_id){
			$query=mysqli_query($this->conn,"SELECT * from  students WHERE student_id='$s_id' and card_id='$card_id'");
			if(mysqli_num_rows($query)==1){
				return true;
			}else
				return false;
		}
		function update_new_student($s_id,$s_name,$s_gender,$s_email,$s_phone,$s_dept,$s_year,$s_semester){
			$query=mysqli_query($this->conn,"UPDATE students SET name='$s_name',gender='$s_gender',email='$s_email',mobile='$s_phone',department='$s_dept',year='$s_year',semester='$s_semester'   WHERE student_id='$s_id'");
			if ($query) return true;
			else return false;
		}
		function valid_username($username){
			$query=mysqli_query($this->conn,"SELECT * from  users WHERE username='$username'");
			if(mysqli_num_rows($query)==1){
				return false;
			}else return true;
		}
		function create_medical_iser($userName,$password,$name,$desig,$phone,$email,$room_number){
			$query = mysqli_query($this->conn,"INSERT INTO users VALUES ('','$username','$password','1')");
			if($query){
				return mysqli_query($this->conn,"INSERT INTO doctor VALUES('','$userName','$name','$desig','$phone','$email','$room_number')");
			}else return false;
		}
		function create_liberian_iser($userName,$password,$name,$desig,$phone,$email,$room_number){
			$query = mysqli_query($this->conn,"INSERT INTO users VALUES ('','$userName','$password','1')");
			if($query){
				return mysqli_query($this->conn,"INSERT INTO liberian VALUES('','$userName','$name','$desig','$phone','$email','$room_number')");
			}else return false;
		}
		function update_card_number($s_id,$card_id){
			$query=mysqli_query($this->conn,"UPDATE students SET card_id='$card_id' WHERE(student_id='$s_id') ");
			return $query;
		}
		

	}
	$DB = new Database();

	if (isset($_SESSION['SSC_user'])) {
		$DB->current_user=$_SESSION['SSC_user'];
	}

?>