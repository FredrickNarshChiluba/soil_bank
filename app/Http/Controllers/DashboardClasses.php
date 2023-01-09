<?php
//the main class that connect to the database
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\DatabaseAccess;
use App\Contracts\AttributeContract;
class DashboardClasses extends DatabaseAccess{

    //getting admin specific info
		//=========================================================================================
	protected function getAdminInfo($Id){
		$sql = "SELECT * FROM companyinfo WHERE Id = '$Id' LIMIT 1";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;

		if($numRows>0):
			$row=$result->fetch_assoc();

			//returning the results in an array
			return $row;
		endif;
	}

	// Admin Authentication
	//=========================================================================================
	protected function requestAdminAuthenticate($user,$password){
		$sql = "SELECT * FROM companyinfo WHERE Admin_username = '$user' AND Admin_password = '$password' LIMIT 1";
		$result = $this->connect()->query($sql);
		if($result->num_rows>0):
			return true;
		endif;
	}


		// Employee or User  Authentication
		//=========================================================================================
		protected function requestEmployeeAuthenticate($user,$password){
			$sql = "SELECT * FROM employeeinfo WHERE Employee_username = '$user' AND Employee_password = '$password' LIMIT 1";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0):
				return true;
			endif;
		}

		// Employee or User  Information fetch using userID and Password
		//=========================================================================================
		protected function requestEmployeeAuthenticateData($user,$password){
			$sql = "SELECT * FROM employeeinfo WHERE Employee_username = '$user' AND Employee_password = '$password' LIMIT 1";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0):
					$row=$result->fetch_assoc();
					return $row;
			endif;
		}

		// Admin Data fetch using username and password
		//=========================================================================================
		protected function requestAdminAuthenticateData($user,$password){
			$sql = "SELECT * FROM companyinfo WHERE Admin_username = '$user' AND Admin_password = '$password' LIMIT 1";
			$result = $this->connect()->query($sql);
			if($result->num_rows>0):
				$row=$result->fetch_assoc();
				return $row;
			endif;
		}


	//get Employee Specific Info
	//==========================================================================================
	protected function getSingleEmployeeInfo($id){
		$sql = "SELECT * FROM employeeinfo WHERE Id = '$id' ";
		$result = $this->connect()->query($sql);

		if($result->num_rows>0):
			$row=$result->fetch_assoc();
			//returning the results in an array
			return $row;
		endif;
	}

    //getting all the info from the admin
		//=======================================================================================
    protected function getCompanyInfo(){
		$sql = "SELECT * FROM companyinfo ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;

		if($numRows>0):
			$row=$result->fetch_assoc();

			//returning the results in an array
			return $row;
		endif;
	}


    //getting employees information
		//================================================================================
    protected function getEmployeeInfo(){
    $sql = "SELECT * FROM employeeinfo ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;

        if($numRows>0){
			while($row=$result->fetch_assoc()){
				$data[] = $row;
			}
			//returning the results found  in an array
			return $data;
		}
    }

		//getting eisting projects
		//=================================================================================================================
		protected function requestProjects(){
		$sql = "SELECT * FROM projects ORDER BY Project_create_date DESC";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;

				if($numRows>0){
			while($row=$result->fetch_assoc()){
				$data[] = $row;
			}
			//returning the results found  in an array
			return $data;
		}
		}

		/**
     * Requesting Projects By ID
		*/
		//getting eisting projects
		//==================================================================================================
		protected function requestProjectsById($Id){
		$sql = "SELECT * FROM projects WHERE Id = '$Id' ORDER BY Project_create_date DESC ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;

		if($numRows>0){
				$row=$result->fetch_assoc();
				//returning the results found  in an array
				return $row;
		}
		}

		/**
		 * Requesting Tasks by Given Project ID
		*/
		//getting the tasks for a specific project ID
		//==================================================================================================
		protected function requestTasksById($Id){
		$sql = "SELECT * FROM tasks WHERE Task_project_id = '$Id' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		 //return a data object rather than the  array
		 if($numRows>0){
	 while($row=$result->fetch_assoc()){
		 $data[] = $row;
	 }
	 //returning the results found  in an array
	 return $data;
 }

		}


//request all Task Information 

protected function requestAllTasksMeta($Id){
		$sql = "SELECT * FROM tasks WHERE Id = '$Id' ";
		$result = $this->connect()->query($sql);
		$numRows = $result->num_rows;
		 //return a data object rather than the  array
		 if($numRows>0){
		 $row=$result->fetch_assoc();
	
		 //returning the results found  in an array
	 	return $row;
 }

		}


/**
	* Requesting tasks for a specific user provided the project ID
	* This returns only user tasks,for this particular project and not all the tasks
	* @param Integer $projectID the ID of the project whose tasks are to be displayed
	* @param Integer $userID the ID of the User that allows to retrieve only tasks specific to this user
	* @return Array $data the array of data returned fro this process
*/

	protected function requestUserTasksByProjectId($projectID,$userID){
			$sql = "SELECT * FROM tasks WHERE Task_project_id = '$projectID' AND Task_user_id = $userID ";
			$result = $this->connect()->query($sql);
			$numRows = $result->num_rows;
			 //return a data object rather than the  array
			//  echo $sql;  //testing the query
			 if($numRows>0){
					while($row=$result->fetch_assoc()){
					 $data[] = $row;
			}
			//returning the results found  in an array
			return $data;
			}

	}


    //adding employees to the database
		//===============================================================================================================================================================

    protected function addEmployee($firstname, $lastname, $username, $password, $email, $adminRights, $department, $role){
        $sql = "INSERT INTO EmployeeInfo (Employee_firstname, Employee_lastname, Employee_username, Employee_password, Employee_email,
Admin_rights, Employee_department, Employee_role) VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$adminRights', '$department', '$role') ";

        $result = $this->connect()->query($sql);

        return $result;
    }

    //sanitize user data before using it in mysql Queries
		//================================================================================
    public function sanitizeInput($data){
  			//this function will sanitize the input and returned the filtered input
            $con = $this->connect();
  			//trimming whitespaces
  			if(isset($data)){
  				trim($data);
  				//stripcslashes($data);
  				//$data = htmlspecialchars($data);
  				$data = mysqli_real_escape_string($con, $data);
  				return $data;
  			}else{
  				$data = "";
  				return $data;
  			}
  		}

			//get the connection string
			//=====================================================================================
			public function getConnectionString(){
				return $this->connect();
			}

			//closing the database connection
			//==========================================================================
			public function closeDatabaseConnection(){
				$this->connect()->close(); //this closes the connection
			}

			/**
			* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			* EMPLOYEE INFORMATION, PROJECTS, TASKS AND OTHER AVAILABLE DATA FROM THE DATABASE
			*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*/

			protected function requestProjectsMeta($userId){
					$sql= "SELECT projects.Id AS projectID, projects.Project_name, projects.Project_category, projects.Project_description, tasks.Id AS taskID, Projects.Project_status, tasks.Task_name , tasks.Task_description , tasks.Task_status
					FROM projects,tasks WHERE  projects.Id = tasks.Task_project_id AND tasks.Task_user_id = {$userId}";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

							if($numRows>0){
						while($row=$result->fetch_assoc()){
							$data[] = $row;
						}
						//returning the results found  in an array
						return $data;
					}

			}


			/**
			* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			* REQUEST UNIQUE PROJECT META INFO USING THE PROJECT ID
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*/

			protected function requestUniqueProjectsMeta($projectID){
					$sql= "SELECT projects.Id AS projectID, Project_start_date, Project_end_date, Project_budget, projects.Project_name, projects.Project_category, projects.Project_description, Projects.Project_status
						FROM projects WHERE  projects.Id = {$projectID} ORDER BY projectID DESC";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

							if($numRows>0){
						while($row=$result->fetch_assoc()){
							$data[] = $row;
						}
						//returning the results found  in an array
						return $data;
					}

			}



//this is the similar method to the one above , but returns only one single array
				protected function requestUniqueProjectsMetaSingle($projectID){
					$sql= "SELECT projects.Id AS projectID, Project_start_date, Project_end_date, Project_budget, projects.Project_name, projects.Project_category, projects.Project_description, Projects.Project_status
						FROM projects WHERE  projects.Id = {$projectID} ORDER BY projectID DESC";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

							if($numRows>0){
						$row = $result->fetch_assoc();
						
						
						//returning the results found  in an array
						return $row;
					}

			}


			//requesting unique project IDs to be used while fetching the particular projects having user's tasks
			//one parameter is needed for that {$user_id } - This is the logged in user
			protected function requestUniqueProjectsID($userID){
					$sql= "SELECT DISTINCT Task_project_id FROM tasks WHERE  Task_user_id = {$userID} ORDER BY Task_project_id DESC";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

							if($numRows>0){
						while($row=$result->fetch_assoc()){
							$data[] = $row;
						}
						//returning the results found  in an array
						return $data;
					}

			}

			/**
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*    REQUESTING TASK STATUS BY TASK PROJECT ID AND INITIAL STATUS :: EMPLOYEE VIEW
			*    This is to find out whether the project the logged in is viewing is done or still pending based on how many tasks have been assigned to the latter
			*    The entire row could be selected (*) but we are more interested in the rows count not the data
			*    @param $projectID The Project ID attached to the task
			* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*/

			protected function requestEmployeeProjectStatus($projectID){
				//testing with Task_status is 0
					$sql= "SELECT * FROM tasks WHERE Task_status = '0' AND Task_project_id = {$projectID}";

					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

						$status = "";
					//	echo "<p>" . $sql . "</p>";
						if($numRows>=1){
							//project pending or Waiting
							return 0;

						}else{
							//project done
							return 1;

						}

			}

			/**
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*    REQUESTING TASKS ATTACHED TO A PROJECT
			*    @param $projectID The Project ID attached to the task
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*/

			protected function requestNumberOfTasks($projectID){
				//testing with Task_status is 0
					$sql= "SELECT * FROM tasks WHERE Task_project_id = {$projectID}";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

					//return the number of Tasks
					return $numRows;

			}


			/**
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*    REQUESTING TASKS ATTACHED TO A PROJECT, ONLY UNIQUE TO THIS USER
			*    @param $projectID The Project ID attached to the task
			*    @param $userID : The Id of $this->User
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*/

			protected function requestUserNumberOfTasks($projectID, $userID){
				//testing with Task_status is 0
					$sql= "SELECT * FROM tasks WHERE Task_project_id = {$projectID} AND Task_user_id = {$userID}";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

					//return the number of Tasks
					return $numRows;

			}



			/**
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*    REQUESTING PROGRESS OF A PROJECT IN PERCENTAGE
			*    This is based on the number of total tasks attached toa procject by the number of tasks already done
			*    @param $projectID The Project ID attached to the tasks
			*    @param $userID : The UserId used to indentify the current metrics displayed
			* +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*/

			protected function requestUserProjectProgress($projectID,$userID){
				//getting the number of the tasks , all the tasks
				//	$totalTasks = $this->requestUserNumberOfTasks($projectID, $userID); //number of existing tasks

					//testing the number of tasks without ID Attached
			  	$totalTasks = $this->requestUserNumberOfTasks($projectID,$userID); //number of existing tasks

				//	$sql= "SELECT * FROM tasks WHERE Task_project_id = {$projectID} AND Task_status = 1 AND Task_user_id = {$userID}";

					//testing the query without User ID attached

					$sql= "SELECT * FROM tasks WHERE Task_project_id = {$projectID} AND Task_status = 1 AND Task_user_id = {$userID}";

					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;


					//echo the query

					if($result){
					if ($numRows) {
						// do the math : percentage = a/b*100
						$progress = ($numRows / $totalTasks) * 100;
						return round($progress);

					}else{
						//return the number of Tasks
						//echo "<small>" . $sql . "</small>";
						return 0;


					}}else{
						echo "Error Code : X0008xb";
					}

			}

			/**
			* Request Global Project Progress
			* Useful for admin metrics
			*
			*/

			protected function requestGlobalProjectProgress($projectID){
				//getting the number of the tasks , all the tasks
				//	$totalTasks = $this->requestUserNumberOfTasks($projectID, $userID); //number of existing tasks

					//testing the number of tasks without ID Attached
					$totalTasks = $this->requestNumberOfTasks($projectID); //number of existing tasks

				//	$sql= "SELECT * FROM tasks WHERE Task_project_id = {$projectID} AND Task_status = 1 AND Task_user_id = {$userID}";

					//testing the query without User ID attached

					$sql= "SELECT * FROM tasks WHERE Task_project_id = {$projectID} AND Task_status = 1 ";

					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

					//echo the query

					if($result){
					if ($numRows) {
						// do the math : percentage = a/b*100
						$progress = ($numRows / $totalTasks) * 100;
						return round($progress);

					}else{
						//return the number of Tasks
						//echo "<small>" . $sql . "</small>";
						return 0;


					}}else{
						echo "Error Code : X0008xb";
					}


			}

			//================================== ADMIN METHODS  -----------------------------------

			/**
			* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			* EMPLOYEE INFORMATION, PROJECTS, TASKS AND OTHER AVAILABLE DATA FROM THE DATABASE
			*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			*/

			protected function requestProjectsMetaAdmin(){
					$sql= "SELECT projects.Id AS projectID, Project_start_date, Project_end_date, Project_budget, projects.Project_name, projects.Project_category, projects.Project_description, tasks.Id AS taskID, Projects.Project_status, tasks.Task_name , tasks.Task_create_date , tasks.Task_description , tasks.Task_status
					FROM projects,tasks WHERE  projects.Id = tasks.Task_project_id ORDER BY projectID DESC";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;
					//testing output
					//echo $sql;

							if($numRows>0){
						while($row=$result->fetch_assoc()){
							$data[] = $row;
						}
						//returning the results found  in an array
						return $data;
					}

			}

			//requesting unique project IDs to be used while fetching the particular projects having user's tasks
			//one parameter is needed for that {$user_id } - This is the logged in user
			protected function requestUniqueProjectsIDAdmin(){
					$sql= "SELECT DISTINCT Task_project_id FROM tasks ORDER BY Task_project_id DESC ";
					$result = $this->connect()->query($sql);
					$numRows = $result->num_rows;

					//testing output
					//echo $sql;

							if($numRows>0){
						while($row=$result->fetch_assoc()){
							$data[] = $row;
						}
						//returning the results found  in an array
						return $data;
					}

			}


/*
 =======================  REQUESTING METRICS SETTINGS ====================================
*/
//======================================================================================
protected function requestMetricsConfig($type){
	$sql = "SELECT * FROM $type ORDER BY metricID";
	$result = $this->connect()->query($sql);
	if($result->num_rows>0):
		while($row=$result->fetch_assoc()){
			$data[] = $row;
		}
			return $data;
	endif;
}


// REQUESTING METRICS META BY ID

protected function requestMetricsMetaById($type,$id){
	$sql = "SELECT * FROM $type WHERE metricID = $id ORDER BY metricID";
	$result = $this->connect()->query($sql);
	if($result->num_rows>0):
			$data = $result->fetch_assoc();
			return $data;
	endif;
}




/*
 =======================  REQUESTING AVAILABLE  METRICS  ====================================
*/
// requesting available Metrics [Only metrics where the displayMetric is 1]
protected function requestAvailableMetrics($type){
	$sql = "SELECT * FROM $type WHERE displayMetric = 1 ORDER BY metricID";
	$result = $this->connect()->query($sql);
	if($result->num_rows>0):
		while($row=$result->fetch_assoc()){
			$data[] = $row;
		}
			return $data;
	endif;
}














//class edge - bottom
}
