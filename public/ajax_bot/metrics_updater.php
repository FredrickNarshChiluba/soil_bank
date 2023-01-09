<?php require_once('../_includes/header_session.php'); ?>
<?php
        require_once('../dashboard_classes/DatabaseAccess.php');
        require_once('../dashboard_classes/DashboardClasses.php');
        require_once('../dashboard_classes/DashboardDataAccess.php');
        require_once('../dashboard_classes/DashboardDataUpdate.php');
?>

<?php include_once('../dashboard_functions/basic_functions.php'); ?>
<?php

$dap = new DashboardDataUpdate();

//vaaribles initialization
$configName = $metricID = $metricStatus = "";

//let's first get the values passed

  if(isset($_POST['configName'])){ $configName = $_POST['configName'];   }
  if(isset($_POST['metricID'])){ $metricID = $_POST['metricID'];   }
  if(isset($_POST['metricStatus'])){ $metricStatus = $_POST['metricStatus'];   }

  //update the metric status using the values passed
    $feedb = $dap->updateMetricStatus($configName,$metricID,$metricStatus);
    echo $feedb;








 ?>
