<?php include 'header.php';  ?>


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
                        <p class="dash-count">198</p>
                        <p class="dash-count-name">Total Courses</p>
                     </div>
                </div>
                </a>
            </div>
              <div class="col-md-3 dash-rect art-bar wow fadeInUp"  data-wow-delay="0.5s">
                  <a href="faq.php" class="dash-anchor">
                <div class="col-md-6 count-shape art-adj">
                    <i class="fa fa-4x fa-book" aria-hidden="true"></i>
                </div>
                 <div class="col-md-6 no-padding">
                    <div>
                        <p class="dash-count">198</p>
                        <p class="dash-count-name">Total Articles</p>
                     </div>
                </div>
                  </a>
            </div>
              <div class="col-md-3 dash-rect faq-bar wow fadeInUp"  data-wow-delay="1s">
                  <a href="faq.php" class="dash-anchor">
                <div class="col-md-6 count-shape faq-adj">
                    <i class="fa fa-4x fa-question-circle" aria-hidden="true"></i>
                </div>
                 <div class="col-md-6 no-padding">
                    <div>
                        <p class="dash-count">198</p>
                        <p class="dash-count-name">Total FAQ</p>
                     </div>
                </div>
                  </a>
            </div>
              <div class="col-md-3 dash-rect evt-bar wow fadeInUp"  data-wow-delay="1.5s">
                  <a href="events.php" class="dash-anchor">
                <div class="col-md-6 count-shape evt-adj">
                    <i class="fa fa-4x fa-calendar-check-o" aria-hidden="true"></i>
                </div>
                 <div class="col-md-6 no-padding">
                    <div>
                        <p class="dash-count">198</p>
                        <p class="dash-count-name">Total Events</p>
                     </div>
                </div>
                  </a>
            </div>
        </div>   
        <div class="whitten"></div>
        <div class="col-md-12">
            <div id="chartContainer" style="height: 250px; width: 97%;">
	        </div>
        </div>
    </div>
</div>
<?php include 'footer.php';  ?>
<script type="text/javascript" src="../scripts/dashboard.js"></script>
 <script type="text/javascript">
     new WOW().init();
     window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {

      title:{
      text: "Website visitores - per month"
      },
       data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(2012, 00, 1), y: 450 },
        { x: new Date(2012, 01, 1), y: 414 },
        { x: new Date(2012, 02, 1), y: 520 },
        { x: new Date(2012, 03, 1), y: 460 },
        { x: new Date(2012, 04, 1), y: 450 },
        { x: new Date(2012, 05, 1), y: 500 },
        { x: new Date(2012, 06, 1), y: 480 },
        { x: new Date(2012, 07, 1), y: 480 },
        { x: new Date(2012, 08, 1), y: 410 },
        { x: new Date(2012, 09, 1), y: 500 },
        { x: new Date(2012, 10, 1), y: 480 },
        { x: new Date(2012, 11, 1), y: 510 }
        ]
      }
      ]
    });

    chart.render();
  }

</script>