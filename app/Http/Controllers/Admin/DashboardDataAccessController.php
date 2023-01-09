<?php
//the main class that connect to the database
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\DashboardClasses;
use App\Contracts\AttributeContract;
class DashboardDataAccess extends DashboardClasses {

    //displaying employees information
	public function showEmployeeInfo(){

		if($this->getEmployeeInfo()):
			$datas = $this->getEmployeeInfo();
            return $datas;
	endif;
	}

  //displaying projects from the database
  public function displayProjects(){

    if($this->requestProjects()):
      $datas = $this->requestProjects();
            return $datas;
  endif;
  }

	//displaying the project by ID
	public function displayProjectsById($Id){

		if($this->requestProjectsById($Id)):
			$datas = $this->requestProjectsById($Id);
						return $datas;
	endif;
	}


	/**
	* @author Ninsiime Pinelupe
	*  This method returns tasks meta data proviced the project ID
	* Later improvement can be carried on as the project grows bigger
	*/
	public function displayTasksById($Id){

		if($this->requestTasksById($Id)):
			$datas = $this->requestTasksById($Id);
						return $datas;
	endif;
	}

/**
* Request User Tasks by given Project ID
* @param $projectID the ID of the project whose Tasks are needed
* @param $userID the ID of the user displaying or requesting the tasks
* @return boolean true or false based on the dataset
*/

public function displayUserTasksByProjectId($projectID, $userID){

	if($this->requestUserTasksByProjectId($projectID, $userID)):
		$datas = $this->requestUserTasksByProjectId($projectID, $userID);
					return $datas;
endif;
}

    /**
    * Accessing Admin Info from the database
    */
    public function isUserAdmin($user,$password){
        if($this->getAdminInfo()){
            $data = $this->getAdminInfo();
                //check if the user is admin
                if($user==$data['Admin_username'] && $password == $data['Admin_password'])
                return true ; //user is admin
        }else{
            return false; //user credentials don't match!

    }
        }


	/**
	* Authenticate the Admin
	* This checks to find out whether the admin exixsts in the database
	*
	*/

	public function authenticateAdmin($user,$password){
		if($this->requestAdminAuthenticate($user,$password)){
			return true;
		}else{
			return false;
		}
	}

	/**
	* Authenticate the Employee
	* This checks to find out whether the EMployee  exixsts in the database
	*
	*/

	public function authenticateEmployee($user,$password){
		if($this->requestEmployeeAuthenticate($user,$password)){
			return true;
		}else{
			return false;
		}
	}

	/**
	* Get Authenticated Employee Data  on Login
	* This is to fetch authenticated employee data using the UserID and Password
	*
	*/

	public function getEmployeeAuthenticateData($user,$password){
		$data = $this->requestEmployeeAuthenticateData($user,$password);
		return $data;

	}

	/**
	* Get Authenticated Admin Data  on Login
	* This is to fetch authenticated Admin data using the UserID and Password
	*
	*/

	public function getAdminAuthenticateData($user,$password){
		$data = $this->requestAdminAuthenticateData($user,$password);
		return $data;

	}


/**
* Accessing Employee Info From the Database
* Authenticate user
*/
public function isUserEmployee($user,$password){
		if($this->getSingleEmployeeInfo()){
				$data = $this->getSingleEmployeeInfo();
						//check if the user is admin
						if($user==$data['Employee_username'] && $password == $data['Employee_password'])
						return true ; //user is admin
		}else{
				return false; //user credentials don't match!

}
		}

    /**
    * Accessing Admin personal Info from the database
    */
    public function getAdminData($Id = 0){
        if($this->getAdminInfo($Id)){
            $data = $this->getAdminInfo($Id);
                return $data ; //user is admin
        }
        }

			/**
			* Getting signle employee Personal Information  from the database
			*
			*/
		public function getSingleEmployeeData($id=0){
			if($this->getSingleEmployeeInfo($id)){
					$data = $this->getSingleEmployeeInfo($id);
							return $data ; //user is admin
			}

		}

		/**
		* This is the method that requests  project data from the database
		* It has different versions using different parameters
		*
		*/

		public function displayProjectsMeta($Id){

			if($this->requestProjectsMeta($Id)):
				$datas = $this->requestProjectsMeta($Id);
							return $datas;
		endif;
		}


//get task meta 

		public function getAllTasksMeta($Id){ 
			if($this->requestAllTasksMeta($Id)):
				$datas = $this->requestAllTasksMeta($Id);
					return $datas;
		endif;
		}

		/**
		* This is the method that requests unique project data from the projects table
		* It has different versions using different parameters
		*  Here what we need is the list of projects that have tasks assigned to $this user / employee
		*/

		public function displayUniqueProjectsMeta($Id){

			if($this->requestUniqueProjectsMeta($Id)):
				$datas = $this->requestUniqueProjectsMeta($Id);
							return $datas;
		endif;
		}



		/**
		* This is the method that requests unique project data from the projects table
		* It has different versions using different parameters
		*  It is similar to the one above , however it only returns a single array
		*/

		public function displayUniqueProjectsMetaSingle($Id){

			if($this->requestUniqueProjectsMetaSingle($Id)):
				$datas = $this->requestUniqueProjectsMetaSingle($Id);
							return $datas;
		endif;
		}


		/**
		* This is the method that requests unique project Id from the tasks table
		* These Ids from the tasks table will help us find the relevant projects to display to the user
		*  @param $Id : this is the loggen in user Id
		*/
		public function getUniqueProjectID($Id){
			if($this->requestUniqueProjectsID($Id)):
				$datas = $this->requestUniqueProjectsID($Id);
							return $datas;
		endif;

		}

/**
* This method returns a number between 0 and 1 determining whether the user has finished all the tasks attached to a project or not
* @return Integer 0 : The project is still pending
* @return Integer 1 : The project is completed
* @param Integer $projectID : The Project Id to be passed in our Query for this action
*/

public function isEmployeeProjectDone($projectID){
	$data = $this->requestEmployeeProjectStatus($projectID);
	//return the possible values
	return $data;

}

/**
* This returns the number of tasks attached to a project provided the ProjectID
* @return Integer $rowCount the number of tasks for a given project
* @param Integer $projectID : The Id of the project used to fetch the attached tasks
*/

public function getNumberOfTasks($projectID){
	$data = $this->requestNumberOfTasks($projectID);
	//return the possible values
	return $data;

}


/**
* =================================================================================================
* Request Number of tasks assigned to this particular user
* This considers only the current user's tasks
* =================================================================================================
*/

public function getUserNumberOfTasks($projectID,$userID){
	$data = $this->requestUserNumberOfTasks($projectID, $userID);
	//return the possible values
	return $data;

}


/**
* This method returns the specific user project metrics or progress
* @return Integer $data : the return value in percentage upon success
*/
public function getUserProjectProgress($projectID,$userID){
	$data = $this->requestUserProjectProgress($projectID,$userID);
	//return the possible values
	return $data;

}


//============================ ADMIN PUBLIC METHODS  ===========================================


/**
* This is the method that requests  project data from the database
* It is requested by the admin for metrics reasons
*
*/

public function displayProjectsMetaAdmin(){

	if($this->requestProjectsMetaAdmin()):
		$datas = $this->requestProjectsMetaAdmin();
					return $datas;
endif;
}


/**
* This is the method that requests unique project Id from the tasks table
* These Ids from the tasks table will help us find the relevant projects to display to the user
*  @param $Id : this is the loggen in user Id
*/
public function getUniqueProjectIDAdmin(){
	if($this->requestUniqueProjectsIDAdmin()):
		$datas = $this->requestUniqueProjectsIDAdmin();
					return $datas;
endif;

}


/**
* This method returns the  project metrics or progress
* @return Integer $data : the return value in percentage upon success
*/
public function getProjectProgressAdmin($projectID){
	$data = $this->requestGlobalProjectProgress($projectID);
	//return the possible values
	return $data;

}

/*
===============================================================================================
		PUBLIC CLASSES , FOR QUICK DATA ACCESS
===============================================================================================
*/

// GET THE TOTAL NUMBER OF PROJECT ++++ Project Count
public function getTotalProjectsCount(){
	//do something
	$query = "SELECT COUNT(*) AS totalNumber FROM projects";
	$result = $this->connect()->query($query);
	$numRows = $result->num_rows;
	if($numRows > 0){
		$num = $result->fetch_array();
		return $num['totalNumber'];
	}else{
		return 0;
	}
}


//GET THE TOTAL NUMBER OF TASKS
public function getTotalTasksCount(){
	//do something
	$query = "SELECT COUNT(*) AS totalNumber FROM tasks";
	$result = $this->connect()->query($query);
	$numRows = $result->num_rows;
	if($numRows > 0){
		$num = $result->fetch_array();
		return $num['totalNumber'];
	}else{
		return 0;
	}
}

//GET TOTAL EMPLOYEE COUNT
public function getTotalEmployeeCount(){
	//do something
	$query = "SELECT COUNT(*) AS totalNumber FROM employeeinfo";
	$result = $this->connect()->query($query);
	$numRows = $result->num_rows;
	if($numRows > 0){
		$num = $result->fetch_array();
		return $num['totalNumber'];
	}else{
		return 0;
	}
}

//GET the Team Metrics
public function getTeamMetrics(){
		$sql= "SELECT * FROM employeeinfo";
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


//GET The Mtrics Configurations

public function getMetricsConfig($type){
	$data = $this->requestMetricsConfig($type);
	//return the possible values
	return $data;

}

//get metric Meta by Id
public function getMetricsMetaById($type,$id){
	$data = $this->requestMetricsMetaById($type,$id);
	//return the possible values
	return $data;

}



/*
----------------------------------------------------------------------------
	GET THE AVAILABLE METRICS
----------------------------------------------------------------------------
*/
public function getAvailableMetrics($type){
	$data = $this->requestAvailableMetrics($type);
	//return the possible values
	return $data;

}












































// The edge
}
