<?php
namespace DAO;

	/**
	* Database Controller
	*/
	class DBController
	{
		private $db;

		/**
		 * Function which adds a salt to a password, 
		 * for granting a better security.
		 *	@param : 	string - 	The password to salt
		 *	@returns : 	string - 	The salted password
		 */
		private function salt($pass){
			$result = "D";
			for($i=0; $i<strlen($pass); $i++){
				$result .= substr($pass, $i,1);
				$result .=$i;
			}
			return $result;
		}

		/**
		 * Magic method. Launches the DB Connection.
		 */
		public function __construct()
		{
			# Connect to Database..
		}

		/**
		 * Function which verifies that the given account exists 
		 * in the database. And logs him in.
		 * @param email : string 	- 	The email of the user account
		 * @param pass  : string 	-	The password in clear
		 * @returns boolean 
		 */
		public function login($email, $pass) : bool{
			$encrypted_pass = sha1($this->salt($pass));
			$query = "SELECT * FROM t_users 
				WHERE email = :email 
				AND password = :pass";
			$handle = $this->db->prepare($query);
			$handle->bindParam(':email', $email);
			$handle->bindParam(':pass' , $encrypted_pass);
			$handle->execute();

			$connected = $handle->fetchAll();
			$logsIn = (count($connected)>0);
			if($logsIn){
				$query = "UPDATE t_users 
				SET loggedIn = 1
				WHERE email = :email";
				$handle = $this->db->prepare($query);
				$handle->bindParam(':email', $email);
				$handle->execute();
			}

			return $logsIn;
		}

		
		/**
		 * Function which verifies that the given account exists 
		 * in the database. And logs him out.
		 * @param email : string 	- 	The email of the user account
		 * @returns boolean 
		 */
		public function logout($email) : bool{
			$query = "SELECT * FROM t_users 
				WHERE email = :email 
				AND loggedIn = 1";
			$handle = $db->prepare($query);
			$handle->bindParam(':email', $email);
			$handle->execute();

			$connected = $handle->fetchAll();
			$loggedIn = (count($connected)>0);
			if($loggedIn){
				$query = "UPDATE t_users 
				SET loggedIn = 0
				WHERE email = :email";
				$handle = $db->prepare($query);
				$handle->bindParam(':email', $email);
				$handle->execute();
			}
			return $loggedIn;
		}
	}
	?>