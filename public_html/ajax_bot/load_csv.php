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
         $dk->loadResourceCSV("../csv/resources.csv");


  

  ?>