<?php
include 'a_authentication.php';
$title = 'Dashboard';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');

 ?>

  <div class="container-fluid px-4" style="margin-top: 12%;">
     <h1 class="mt-4">Admin Dashboard</h1>
     <br>

 <div class="row">
  <div class="col-xl-3 col-md-g mx-auto">
      <div class="card bg-primary text-white mb-4">
          <div class="card-body">Total Registered User 
              <?php

              $query ="SELECT * FROM registration WHERE verify_status = 1";
              $query_run = mysqli_query($con, $query);

              if ($registration_total = mysqli_num_rows($query_run)) {
                echo '<h4 class="mb-0">'.$registration_total.'</h4>';
              }
              else {
            echo '<h4 class="mb-0">No Data</h4>';
              }
              ?>
             
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"> </i></div>
          </div>
      </div>
  </div>

  <div class="col-xl-3 col-md-g mx-auto">
  <div class="card bg-success text-white mb-4">
          <div class="card-body">Total Answered Surveys
              <?php

              $query ="SELECT * FROM survey";
              $query_run = mysqli_query($con, $query);

              if ($survey_total = mysqli_num_rows($query_run)) {
                echo '<h4 class="mb-0">'.$survey_total.'</h4>';
              }
              else {
            echo '<h4 class="mb-0">No Data</h4>';
              }
              ?>
             
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"> </i></div>
          </div>
      </div>
  </div>



  
      


 <div class="col-xl-3 col-md-g mx-auto">
<div class="card bg-dark text-white mb-4">
          <div class="card-body">Total Announcement Post
              <?php

              $query ="SELECT * FROM announce";
              $query_run = mysqli_query($con, $query);

              if ($students_total = mysqli_num_rows($query_run)) {
                echo '<h4 class="mb-0">'.$students_total.'</h4>';
              }
              else {
            echo '<h4 class="mb-0">No Data</h4>';
              }
              ?>
             
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"> </i></div>
          </div>
      </div>
  </div>
 </div>


 <html>
  <head>
  <script src="https://code.highcharts.com/highcharts.js"></script>
 <script src="https://code.highcharts.com/modules/exporting.js"></script>
 <script src="https://code.highcharts.com/modules/export-data.js"></script>
 <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  </head>
  <body>

  <div class="container">
    <center>
        <div id="container"></div>
    </center>
 </div>

<?php

$query = "SELECT employment.emID, status, COUNT(*) as number FROM `survey` INNER JOIN employment on survey.emID = employment.emID
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '1'
 GROUP BY emID"; // get the records on which pie chart is to be drawn
$getData = $con->query($query);
?>
<script>
    // Build the chart
    Highcharts.chart('container', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Employment Status 2020'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:{point.percentage:.1f} %<br>value: {point.y}',
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'status',
            colorByPoint: true,
            data: [
                <?php
                $data = '';
                if ($getData->num_rows>0){
                    while ($row = $getData->fetch_object()){
                        $data.='{ name:"'.$row->status.'",y:'.$row->number.'},';
                    }
                }
                echo $data;
                ?>
            ]
        }]
    });
   
</script>

<div class="container">
    <center>
        <div id="container1"></div>
    </center>
 </div>
<?php

$query = "SELECT employment.emID, status, COUNT(*) as number FROM `survey` INNER JOIN employment on survey.emID = employment.emID
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '2'
 GROUP BY emID"; // get the records on which pie chart is to be drawn
$getData = $con->query($query);
?>
<script>
    // Build the chart
    Highcharts.chart('container1', {
        chart: {
           
            type: 'pie'
        },
        title: {
            text: 'Employment Status 2021'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:{point.percentage:.1f} %<br>value: {point.y}',
                },
                 
                showInLegend: true
            }
        },
        series: [{
            name: 'status',
            colorByPoint: true,
            data: [
                <?php
                $data = '';
                if ($getData->num_rows>0){
                    while ($row = $getData->fetch_object()){
                        $data.='{ name:"'.$row->status.'",y:'.$row->number.'},';
                    }
                }
                echo $data;
                ?>
            ]
        }]
    });
</script>

<div class="container">
    <center>
        <div id="container2"></div>
    </center>
 </div>
<?php

$query = "SELECT jobalign.jobID, align, COUNT(*) as number FROM `survey` 
INNER JOIN jobalign on survey.jobID = jobalign.jobID 
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '1'
GROUP BY jobID"; // get the records on which pie chart is to be drawn
$getData = $con->query($query);
?>
<script>
    // Build the chart
    Highcharts.chart('container2', {
        chart: {
           
            type: 'pie'
        },
        title: {
            text: 'Job Alignment 2020'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:{point.percentage:.1f} %<br>value: {point.y}',
                },
                 
                showInLegend: true
            }
        },
        series: [{
            name: 'status',
            colorByPoint: true,
            data: [
                <?php
                $data = '';
                if ($getData->num_rows>0){
                    while ($row = $getData->fetch_object()){
                        $data.='{ name:"'.$row->align.'",y:'.$row->number.'},';
                    }
                }
                echo $data;
                ?>
            ]
        }]
    });
</script>

<div class="container">
    <center>
        <div id="container3"></div>
    </center>
 </div>
<?php

$query = "SELECT jobalign.jobID, align, COUNT(*) as number FROM `survey` 
INNER JOIN jobalign on survey.jobID = jobalign.jobID 
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '2'
GROUP BY jobID"; // get the records on which pie chart is to be drawn
$getData = $con->query($query);
?>
<script>
    // Build the chart
    Highcharts.chart('container3', {
        chart: {
           
            type: 'pie'
        },
        title: {
            text: 'Job Alignment 2021'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:{point.percentage:.1f} %<br>value: {point.y}',
                },
                 
                showInLegend: true
            }
        },
        series: [{
            name: 'status',
            colorByPoint: true,
            data: [
                <?php
                $data = '';
                if ($getData->num_rows>0){
                    while ($row = $getData->fetch_object()){
                        $data.='{ name:"'.$row->align.'",y:'.$row->number.'},';
                    }
                }
                echo $data;
                ?>
            ]
        }]
    });
</script>

</body>
</html>


 <?php include('includes/footer-admin.php');
 include('includes/script.php'); ?>