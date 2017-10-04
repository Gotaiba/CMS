<?php include 'header.php';  ?>
<?php

    include('../db/connect.php');
    //$query="Select COUNT(*) as Count from articles where IsDeleted=0";   
    $query="SELECT
  (SELECT COUNT(*) FROM articles WHERE IsDeleted=0) as ArtCount, 
  (SELECT COUNT(*) FROM courses WHERE IsDeleted=0) as CrsCount,
  (SELECT COUNT(*) FROM events WHERE IsDeleted=0) as EvtCount,
  (SELECT COUNT(*) FROM faq WHERE IsDeleted=0) as FaqCount";
    if($result=mysqli_query($db,$query))
    {
        $row=mysqli_fetch_array($result);
        $ArtCount=$row['ArtCount'];
        $CrsCount=$row['CrsCount'];
        $EvtCount=$row['EvtCount'];
        $FaqCount=$row['FaqCount'];
    }
    /*$query="Select COUNT(*) as Count from courses where IsDeleted=0";
    if($result=mysqli_query($db,$query))
    {
        $row=mysqli_fetch_array($result);
        $CrsCount=$row['Count'];        
    }
     $query="Select COUNT(*) as Count from events where IsDeleted=0";
    if($result=mysqli_query($db,$query))
    {
        $row=mysqli_fetch_array($result);
        $EvtCount=$row['Count'];        
    }
    $query="Select COUNT(*) as Count from faq where IsDeleted=0";
    if($result=mysqli_query($db,$query))
    {
        $row=mysqli_fetch_array($result);
        $FaqCount=$row['Count'];        
    }*/

?>
        
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Dashboard</h1>
            <h6>Welcome to ECPP admin panel</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 dash-rect crs-bar wow fadeInUp">
                <a href="courses.php" class="dash-anchor">
                <div class="col-md-6 count-shape crs-adj">
                    <i class="fa fa-4x fa-graduation-cap" aria-hidden="true"></i>
                </div>
                 <div class="col-md-6 no-padding">
                    <div>
                        <p class="dash-count"><?php echo $CrsCount ?></p>
                        <p class="dash-count-name">Total Courses</p>
                     </div>
                </div>
                </a>
            </div>
              <div class="col-md-3 dash-rect art-bar wow fadeInUp"  data-wow-delay="0.1s">
                  <a href="articles.php" class="dash-anchor">
                <div class="col-md-6 count-shape art-adj">
                    <i class="fa fa-4x fa-book" aria-hidden="true"></i>
                </div>
                 <div class="col-md-6 no-padding">
                    <div>
                        <p class="dash-count"><?php echo $ArtCount ?></p>
                        <p class="dash-count-name">Total Articles</p>
                     </div>
                </div>
                  </a>
            </div>
              <div class="col-md-3 dash-rect faq-bar wow fadeInUp"  data-wow-delay="0.2s">
                  <a href="faq.php" class="dash-anchor">
                <div class="col-md-6 count-shape faq-adj">
                    <i class="fa fa-4x fa-question-circle" aria-hidden="true"></i>
                </div>
                 <div class="col-md-6 no-padding">
                    <div>
                        <p class="dash-count"><?php echo $FaqCount ?></p>
                        <p class="dash-count-name">Total FAQ</p>
                     </div>
                </div>
                  </a>
            </div>
              <div class="col-md-3 dash-rect evt-bar wow fadeInUp"  data-wow-delay="0.3s">
                  <a href="events.php" class="dash-anchor">
                <div class="col-md-6 count-shape evt-adj">
                    <i class="fa fa-4x fa-calendar-check-o" aria-hidden="true"></i>
                </div>
                 <div class="col-md-6 no-padding">
                    <div>
                        <p class="dash-count"><?php echo $EvtCount ?></p>
                        <p class="dash-count-name">Total Events</p>
                     </div>
                </div>
                  </a>
            </div>
        </div>   
        <!--<div class="whitten"></div>-->
        <div class="col-md-12">
            <!--<div id="chartContainer" style="height: 300px; width: 97%;">
	        </div>-->
            <canvas id="myChart" width="400" height="130"></canvas>
        </div>
    </div>
</div>
<?php include 'footer.php';  ?>
<script type="text/javascript" src="../scripts/dashboard.js"></script>
 <script type="text/javascript">
     new WOW().init();   
      function drawLineChart() {

    // Add a helper to format timestamp data
    Date.prototype.formatMMDDYYYY = function() {
        return (this.getMonth() + 1) +
        "/" +  this.getDate() +
        "/" +  this.getFullYear();
    }

    var jsonData = $.ajax({
      url: '../ajax/GetVisitors.php',
      dataType: 'json',
    }).done(function (results) {

      // Split timestamp and data into separate arrays
        console.log(results[0].Date);
      var labels = [], data=[];
        for(var i=0;i<results.length;i++)
            {
                labels.push(new Date(results[i].Date).formatMMDDYYYY());
                data.push(parseFloat(results[i].Views));
            }
      /*results['visitors_count'].forEach(function(packet) {
        labels.push(new Date(packet.Date).formatMMDDYYYY());
        data.push(parseInt(packet.Views));
      });*/    

      // Get the context of the canvas element we want to select
        //console.log(labels);
      var ctx = document.getElementById("myChart").getContext("2d");
        var myLineChart = new Chart(ctx, {
            type: "line",
        data: {
                labels: labels,
                datasets: [{
                    label: ' Visitors',
                    data: data,
                    backgroundColor: 'rgba(135, 171, 239, 0.2)',
                    borderColor: 'rgba(81, 105, 149,1)',
                    borderWidth: 1
                }]
            }
        });
    });
      }
     window.onload=function(){
         drawLineChart();
     }
     /*window.onload = function () {
         var points;
          $.get("../ajax/GetVisitors.php",{},function(data,status){
            points=JSON.parse(data);
              var dp=[];
            for(var i=0;i<points.length;i++)
                {
                    dp.push({x: new Date(points[i].Date), y: parseInt(points[i].Views)})   
                }         
              var chart = new CanvasJS.Chart("chartContainer",
                        {

                          title:{
                              text: "Website Visitors",
                              fontSize: 14,
                              padding: 10  
                          },
                           data: [
                          {
                            type: "line",

                            dataPoints: dp
                          }
                          ]
                        });  
              chart.render();
    }); 

  }*/   

</script>