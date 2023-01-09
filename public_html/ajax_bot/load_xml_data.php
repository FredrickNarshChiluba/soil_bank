<?php require_once('../_includes/header_session.php'); ?>
<?php
        require_once('../dashboard_classes/DatabaseAccess.php');
        require_once('../dashboard_classes/DashboardClasses.php');
        require_once('../dashboard_classes/DashboardDataAccess.php');
        require_once('../dashboard_classes/DashboardDataUpdate.php');
?>

<?php include_once('../dashboard_functions/basic_functions.php'); ?>

 <?php
     //testing the update of the metrics from the database

       $dk = new DashboardDataUpdate();
         $dk->loadAllMetricsFromXML("../xml/data.xml");

       //$dk->loadMetricsFromXML("xml/data.xml","business_metric_config");
      //$dk->loadMetricsFromXML("xml/data.xml","project_metric_config");
       //$dk->loadMetricsFromXML("xml/data.xml","product_metric_config");
       //$dk->loadMetricsFromXML("xml/data.xml","team_metric_config");
       //$dk->loadMetricsFromXML("xml/data.xml","resource_metric_config");

  ?>
