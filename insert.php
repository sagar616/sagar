<?php


	class user_model{

		function __construct(){
			
			$this->con = new mysqli("localhost", "root", "", "db");

			// if($con->connect_errno==0){
			// 	echo "Connection Successful";
			// }
			// else{
			// 	echo "<h1>".$con->connect_error."</h1>";
			// }
		}

		public function check_username($potential_username='')
		{
			$qry = "SELECT id FROM members WHERE full_name='".$potential_username."';";

			$res = $this->con->query($qry);

			if($res->num_rows>0){

				echo "username_not_available";

			}
			else{

				echo "username_available";

			}

		}
		
		function add_user(){

			$qry = "INSERT INTO members(full_name, City, phone, status)
             VALUES('".$_POST['full_name']."', '".$_POST['City']."', '".$_POST['phone']."', '".$_POST['status']."' )";

			$result = $this->con->query($qry);

			if($result){
				echo "user_added";
			}
			else{
				echo "contact_developer";
			}
		}
    }
?>