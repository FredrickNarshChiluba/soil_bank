<?php  session_start();  ?>
<?php
  if(!isset($_SESSION['adminID'])){   header("location:login.php");   }
?>
<?php
        require_once('../dashboard_classes/DatabaseAccess.php');
        require_once('../dashboard_classes/DashboardClasses.php');
        require_once('../dashboard_classes/DashboardDataAccess.php');
        require_once('../dashboard_classes/DashboardDataUpdate.php');
?>
<?php require_once('../dashboard_functions/basic_functions.php'); ?>




<?php

    //add a new task to the database
    $k = new DashboardDataUpdate();
    //get the connection string
    $con = $k->getConnectionString();

    //if action is add_project, then add the data into the database

    $companyName = sanitize_input($con,$_POST['CompanyName']);
    $businessType  = sanitize_input($con,$_POST['BusinessType']);
    $companySize  = sanitize_input($con,$_POST['CompanySize']);
    $companyDescription  = sanitize_input($con,$_POST['CompanyDescription'] );
    $dateOfCreation  = sanitize_input($con,$_POST['DateOfCreation']);
    $companyEmail = sanitize_input($con,$_POST['CompanyEmail']);
    $rowID = $_SESSION['adminID'];

    $dataUpdate = $k->update_company_info_all($companyName, $businessType, $companySize, $companyDescription, $dateOfCreation, $companyEmail, $rowID);
    if($dataUpdate){
      return "Success!";
    }else{
      return "Failure";
    }

?>
