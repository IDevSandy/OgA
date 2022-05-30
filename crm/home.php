<?php include('include/header.php'); ?>

<!-- Left side column. contains the logo and sidebar -->

<?php include('include/leftsidebar.php'); ?>



<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Dashboard

            <!-- <small>Control panel</small> -->

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Dashboard</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <!-- Small boxes (Stat box) -->

        <div class="row">



            <div class="col-lg-3 col-xs-6">

                <!-- small box -->

                <div class="small-box bg-rainbow1">

                    <div class="inner">

                        <h3>

                            <?php

                  $where= array(

                  "status" => 1

                  );



                $BindData=$obj->getCount("services",$where);



                echo  $BindData['records'];

                ?>

                        </h3>



                        <p>Total Services</p>

                    </div>

                    <div class="icon">

                        <i class="fa fa-send"></i>

                    </div>

                    <a href="services.php?m=active" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>

                </div>

            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">

                <!-- small box -->

                <div class="small-box bg-purple1">

                    <div class="inner">

                        <h3>

                            <?php

        $where= array(

        "status" => 1

        );



      $BindData=$obj->getCount("categories",$where);



      echo  $BindData['records'];

      ?>

                        </h3>



                        <p>Total Active Cateogories</p>

                    </div>

                    <div class="icon">

                        <i class="fa fa-cube"></i>

                    </div>

                    <a href="categories.php?m=active" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>

                </div>

            </div>



            <!-- ./col -->
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">



                <!-- small box -->

                <div class="small-box bg-success1">

                    <div class="inner">

                        <h3>
<?php

        $where= array(

        "status" => 1

        );
      $BindData=$obj->getCount("blogs",$where);



      echo  $BindData['records'];

      ?>

                        </h3>



                        <p>Total Blogs</p>

                    </div>

                    <div class="icon">

                        <i class="fa fa-money"></i>

                    </div>

                    <a href="expenses.php?m=active" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>

                </div>

            </div>

            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">



                <!-- small box -->

                <div class="small-box bg-success1">

                    <div class="inner">

                        <h3>

                            <?php

              $BindData=mysqli_fetch_array(mysqli_query($obj->con,"select SUM(amount) AS 'PaidAmount' from expenses where  DATE(payment_date) between CURDATE() and CURDATE()+1"));



            echo  number_format_short($BindData['PaidAmount']);

              ?>

                        </h3>



                        <p>Total Today's Expenses</p>

                    </div>

                    <div class="icon">

                        <i class="fa fa-money"></i>

                    </div>

                    <a href="expenses.php?m=active" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>

                </div>

            </div>

            <!-- ./col -->

            <!-- ./col ->

            <div class="col-md-3 col-sm-6 col-xs-12">



                      <div class="info-box">

                        <span class="info-box-icon bg-aqua1"><i class="fa fa-book"></i></span>

                        <div class="info-box-content">

                          <span class="info-box-text"></span>

                          <span class="info-box-number"></span><br>

                          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                        </div>

                        <!-- /.info-box-content ->

                      </div>

                      <!-- /.info-box ->

                    </div>-->



        </div>

        <!-- /.row -->

      
        <!--! row -->





        <!-- Related Tables  -->

      




</div>



</section>

<!-- /.content -->

</div>

<!-- /.content-wrapper -->

<?php include('include/footer.php'); ?>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="dist/js/pages/dashboard.js"></script>

<!-- Morris.js charts ->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

  <script src="plugins/morris/morris.min.js"></script>

  <!-- Sparkline -->

<script src="plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- jvectormap -->

<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- jQuery Knob Chart -->

<script src="plugins/knob/jquery.knob.js"></script>





<script>
$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    // $('#example').DataTable({

    //     dom: 'Bfrtip',

    //     buttons: [

    //     'copy', 'csv', 'excel', 'pdf', 'print'

    // ]

    // });



    // The Calender

    var date = new Date();

    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

    var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());



    $('#calendar').datepicker({

        format: "mm/dd/yyyy",

        todayHighlight: true,

        startDate: today,

        endDate: end,

        autoclose: true

    });

    $('#calendar').datepicker('setDate', today);

    // $('#calendar')

    // .datepicker();



    // Get context with jQuery - using jQuery's .get() method.

    var salesChartCanvas = $('#salesChart')

        .get(0)

        .getContext('2d');

    // This will get the first returned node in the jQuery collection.

    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {

        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July']

            ,
        datasets: [{

            label: 'Electronics'

                ,
            fillColor: 'rgb(210, 214, 222)'

                ,
            strokeColor: 'rgb(210, 214, 222)'

                ,
            pointColor: 'rgb(210, 214, 222)'

                ,
            pointStrokeColor: '#c1c7d1'

                ,
            pointHighlightFill: '#fff'

                ,
            pointHighlightStroke: 'rgb(220,220,220)'

                ,
            data: [65, 59, 80, 81, 56, 55, 40]

        }, {

            label: 'Digital Goods'

                ,
            fillColor: 'rgba(60,141,188,0.9)'

                ,
            strokeColor: 'rgba(60,141,188,0.8)'

                ,
            pointColor: '#3b8bba'

                ,
            pointStrokeColor: 'rgba(60,141,188,1)'

                ,
            pointHighlightFill: '#fff'

                ,
            pointHighlightStroke: 'rgba(60,141,188,1)'

                ,
            data: [28, 48, 40, 19, 86, 27, 90]

        }]

    };

    var salesChartOptions = {

        // Boolean - If we should show the scale at all

        showScale: true

            , // Boolean - Whether grid lines are shown across the chart

        scaleShowGridLines: false

            , // String - Colour of the grid lines

        scaleGridLineColor: 'rgba(0,0,0,.05)'

            , // Number - Width of the grid lines

        scaleGridLineWidth: 1

            , // Boolean - Whether to show horizontal lines (except X axis)

        scaleShowHorizontalLines: true

            , // Boolean - Whether to show vertical lines (except Y axis)

        scaleShowVerticalLines: true

            , // Boolean - Whether the line is curved between points

        bezierCurve: true

            , // Number - Tension of the bezier curve between points

        bezierCurveTension: 0.3

            , // Boolean - Whether to show a dot for each point

        pointDot: false

            , // Number - Radius of each point dot in pixels

        pointDotRadius: 4

            , // Number - Pixel width of point dot stroke

        pointDotStrokeWidth: 1

            , // Number - amount extra to add to the radius to cater for hit detection outside the drawn point

        pointHitDetectionRadius: 20

            , // Boolean - Whether to show a stroke for datasets

        datasetStroke: true

            , // Number - Pixel width of dataset stroke

        datasetStrokeWidth: 2

            , // Boolean - Whether to fill the dataset with a color

        datasetFill: true

            , // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

        maintainAspectRatio: true

            , // Boolean - whether to make the chart responsive to window resizing

        responsive: true

    };

    // Create the line chart

    salesChart.Line(salesChartData, salesChartOptions);

    // ---------------------------

    // - END MONTHLY SALES CHART -

    // ---------------------------



});
</script>