<?php
include 'a_authentication.php';
$title = 'BSCS Charts';
include ('includes/navbarhome-admin.php');
include ('includes/header-admin.php');
include ('../includes/connection.php');
 ?>
<html>
  <head>
  <script src="https://code.highcharts.com/highcharts.js"></script>
 <script src="https://code.highcharts.com/modules/exporting.js"></script>
 <script src="https://code.highcharts.com/modules/export-data.js"></script>
 <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  </head>
  <body>

  <div class="container-fluid px-4" style="margin-top: 12%;">
     <h1 class="mt-4">Statiscal Data</h1>
     <br>


  <div class="container">
    <center>
        <div id="container"></div>
    </center>
 </div>

<?php

$query = "SELECT employment.emID, status, COUNT(*) as number FROM `survey` INNER JOIN employment on survey.emID = employment.emID
INNER JOIN registration on survey.registerID = registration.registerID
INNER JOIN gradlist_tbl on registration.grad_ID = gradlist_tbl.grad_ID
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '1' AND courses.courseID = '2'
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
            text: 'Employment Status of BSCS 2020'
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
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID 
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '2' AND courses.courseID = '2'
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
            text: 'Employment Status of BSCS 2021'
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
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '1' AND courses.courseID = '2'
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
            text: 'Job Alignment of BSCS 2020'
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
INNER JOIN courses on gradlist_tbl.courseID = courses.courseID
INNER JOIN batch on gradlist_tbl.batchID = batch.batchID WHERE batch.batchID = '2' AND courses.courseID = '2'
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
            text: 'Job Alignment of BSCS 2021'
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
</div>

</body>
</html>


<?php include('includes/footer-admin.php'); ?>