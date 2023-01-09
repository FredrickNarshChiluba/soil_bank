<?php require_once('../_includes/header_session.php'); ?>
<?php
        require_once('../dashboard_classes/DatabaseAccess.php');
        require_once('../dashboard_classes/DashboardClasses.php');
        require_once('../dashboard_classes/DashboardDataAccess.php');
        require_once('../dashboard_classes/DashboardDataUpdate.php');
?>

<?php include_once('../dashboard_functions/basic_functions.php'); ?>

 <?php
     //loading data from the csv to the database

       $dk = new DashboardDataUpdate();

       $projectId = $what = $currentBudget = "";

       if(isset($_GET['projectId'])){
       		$projectId = $_GET['projectId'];
       }

        if(isset($_GET['what'])){
       		$what = $_GET['what'];
       }

       if(isset($_GET['currentBudget'])){
       	 $currentBudget = $_GET['currentBudget'];
       }
        
        switch ($what) {
        	case 'get_max_task_budget':
        		# get the maximum budget 
        		$maxBudget = $dk->setTaskMaxBudget($projectId);
        		echo $maxBudget;
        		break;

        	case 'get_max_task_budget_update':
        		$maxBudget = $dk->setTaskMaxBudgetOnUpdate($projectId, $currentBudget);
        		echo $maxBudget;
        		break;
        		
        	
        }


  

  ?>