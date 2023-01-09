<!-- admin main panel starts -->

<div class="w3-row">

<!-- <?php  /* include_once('template_parts/metrics/top_metrics.php'); */ ?>
<?php
  // $dk = new DashboardDataAccess();

 ?> -->
   <!-- colon / middle container -->
<div class="w3-col m12 l12">
<!-- content stats here -->
<!-- widget Module starts -->
  <div class="w3-container w3-margin-bottom" style="margin-top:20px">
      <!--CUSTOM CHART START -->
        <div class="w3-container w3-card-2">
            <div class="w3-container w3-padding-16 border-head"></div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                <li><span>20+ </span></li>
                <li><span>10 </span></li>
                <li><span>5 </span></li>
                <li><span>2 </span></li>
              </ul>

              <!-- chart content -->
           

                    <div class="bar">
                      <div class="title">Number Of Cancelled Projects</div>
                      <div class="value tooltips w3-blue" data-original-title="Cancelled Projects : <?php echo (mt_rand(40,65)); ?>" data-toggle="tooltip" data-placement="top"><?php echo (mt_rand(40,65)); ?>%</div>
                    </div>

             
              <!-- ./ chart content  -->

            </div>
            </div>
            <!--custom chart end-->
  </div>
<!-- Widget Module Ends -->

<!-- content ends here -->
 </div>
</div>
