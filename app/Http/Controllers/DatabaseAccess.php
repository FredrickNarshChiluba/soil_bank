<?php
//the main class that connect to dashboard database
//database properties are protected, only authorized classes can access them
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\DashboardClasses;
use App\Contracts\AttributeContract;
class DatabaseAccess {
	private $username;
	private $password;
	private $servername;
	private $dbname;

	//the constructor
	protected function connect(){
		$this->servername = "localhost";
		$this->username = 'root';
		$this->password = '';
		$this->dbname = 'tamoc_solution';

		//connecting to the database using mysqli
		$con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		//returning the connection from this method

		return $con; //return connection to the database
	}

	public function last_insertID(){
		$last_id = $this->connect()->insert_id;
		return $last_id;
	}

	public function close_connection(){
		$this->connect()->close();
	}


}
