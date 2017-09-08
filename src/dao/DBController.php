<?php
namespace DAO;
use PDO;
	/**
	* Database Controller
	*/
	class DBController
	{
		public $db;

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
			$host = 'localhost'; 
    		$db_name = 'cert02'; 
    		$db_username = 'root'; 
    		$db_password = 'facesimplon2016';
			try {
        		$this->db = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
        		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		}
    		catch (PDOException $exc) {
        		exit('Error Connecting To DataBase');
    		}
		}

		/**
		 * Function which verifies that the given account exists 
		 * in the database. And logs him in.
		 * @param email : string 	- 	The email of the user account
		 * @param pass  : string 	-	The password in clear
		 * @returns boolean 
		 */
		public function login($email, $pass) : bool{
			//$encrypted_pass = sha1($this->salt($pass));
			$encrypted_pass = $pass;
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
		/**
		* Function which gets the debts that the user can manage
		* @param email: string - the email of the user's account
		* @returns Object[] ?
		**/
		public function getDebts($id) {
			$debts = array();
			$query = "SELECT *
			FROM t_users
			INNER JOIN t_debts ON t_users.owner = t_debts.id
			WHERE id = :id";
			$handle = $this->db->prepare($query);
			$handle->bindParam(':id', $id);
			$handle->execute();
			while ($data = $handle->fetch(PDO::FETCH_ASSOC)) {
            	$debts[] = new Debt($data);
        	}
        	return $debts;	
		}

		/**
		* Function which updates the debt's state, and get
		* the updated debts
		* @param id: number - the id of the debt
		* @returns boolean
		**/
		public function updateDebt($id, $state) {
			$query = "UPDATE t_debts
				SET state = :state
				WHERE id = :id";
			$handle = $this->db->prepare($query);
			$handle->bindParam(':id', $id);
			$handle->bindParam(':state', $state);
			$handle->execute();
			$err = $handle->errorCode();
			if($err !== '00000') {
				error_log($err->errorInfo);
				return false;
			} else {
				return true;
			}
		}
		
	}
	class Debt{
		
		private $id;
		public $name;
		public $amount;
		public $state;
		public $owner;

		public function __construct(array $donnees) {
        	$this->insertData($donnees);
    	}
 
    	public function insertData($donnees) {
        	foreach ($donnees as $key => $value) {
         	   switch ($key) {
                case 'id':
                    $this->id = (int) $value;
                    break;
                case 'name':
                    $this->name = (string) $value;
                    break;
                case 'amount':
                    $this->amount = (float) $value;
                    break;
                case 'state':
                    $this->state = (string) $value;
                   	break;
                case 'owner':
                    $this->owner = (int) $value;
                   	break;
            	}
        	}
    	}
		
	}
?>