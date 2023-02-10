<?php 
  include 'database.php';
  include 'session.php';

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>شرکت محمدیان</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="dist/css/rtl.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
</head>

<!-- Info boxes -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">گزارشات دلخواه</h3>
              </div>
              <div class="box-body">
               <form action="" method="post">
                <div class="form-group col-md-4">
                  <label for="from" class="col-3">از تاریخ</label>
                    <input type="date" name="from_date" class="form-control" placeholder="از تاریخ">
                </div>
                <div class="form-group  col-md-4">
                  <label for="from" class="col-3">الی تاریخ</label>
                    <input type="date" name="to_date" class="form-control" placeholder="الی تاریخ">
                </div>
                <div class="col-md-4 btn-group">
                <button type="submit" name="by_date_submit" class="btn btn-primary " style="margin-top: 24px;"><i class="fa fa-search"></i></button>
                <button type="reset" style="margin-top: 24px;" class="btn btn-danger"><i class="fa fa-filter"></i></button>
                </div>
              </form>
              </div>

              <?php
                                    $sql_query_01 = null;
                                    if(isset($_POST["by_date_submit"])){
                                        $from_date = $_POST["from_date"];
                                       

                                        $to_date = $_POST["to_date"];
                                        // for sales sum
                                        $sql_query_01 = mysqli_query($connection,"SELECT SUM((((100 - sale_detail.discount)/100)*sale_detail.comission)+sale_detail.price) as total_price,SUM((((100 - sale_detail.discount)/100)*sale_detail.comission)) as total_pure_price FROM sale_detail WHERE sale_detail.date between '$from_date' and '$to_date' ");   
                                        // for sales payment
                                        $sql_query_02 = mysqli_query($connection,"SELECT SUM(payment.totalprice) as total_payment_price FROM payment WHERE payment.sdetail IS NOT NULL and payment.date between '$from_date' and '$to_date'"); 
                                      // for total take
                                        $sql_query_03 = mysqli_query($connection,"SELECT sum(take.amount/take.rate) as total_take from take WHERE take.date between '$from_date' and '$to_date'"); 
                                      // for total visa total price
                                        $sql_query_04 = mysqli_query($connection,"SELECT sum((visa_detail.comision + visa_detail.price) / visa_detail.rate) as total_visa_money, sum((visa_detail.comision) / visa_detail.rate) as pure_visa  from visa_detail WHERE visa_detail.date between '$from_date' and '$to_date'"); 
                                        // for visa payment
                                        $sql_query_05 = mysqli_query($connection,"SELECT SUM(payment.totalprice) as total_payment_price FROM payment WHERE payment.visa IS NOT NULL and payment.date between '$from_date' and '$to_date'"); 
                                        // total expense 
                                        $sql_query_06 = mysqli_query($connection,"SELECT sum(expense.amount/ expense.rate) as total_expense from expense WHERE expense.date between '$from_date' and '$to_date'"); 
                                        // for sales payment
                                        $sql_query_07 = mysqli_query($connection,"SELECT SUM(payment.totalprice) as total_payment_price FROM payment WHERE payment.company IS not NULL and payment.date between '$from_date' and '$to_date'"); 
                                        // for total salary
                                        $sql_query_08 = mysqli_query($connection,"SELECT sum(salary_pay.amount - salary_pay.removal_amount) as salary_total from salary_pay WHERE salary_pay.date between '$from_date' and '$to_date'"); 
                                      
                                    }
                                    
                                    else{
                                      // for sales sum
                                        $sql_query_01 = mysqli_query($connection,"SELECT SUM((((100 - sale_detail.discount)/100)*sale_detail.comission)+sale_detail.price) as total_price,SUM((((100 - sale_detail.discount)/100)*sale_detail.comission)) as total_pure_price FROM sale_detail");   
                                      // for sales payment
                                        $sql_query_02 = mysqli_query($connection,"SELECT SUM(payment.totalprice) as total_payment_price FROM payment WHERE payment.sdetail IS NOT NULL"); 
                                      // for total take
                                        $sql_query_03 = mysqli_query($connection,"SELECT sum(take.amount/take.rate) as total_take from take"); 
                                      // for total visa total price
                                        $sql_query_04 = mysqli_query($connection,"SELECT sum((visa_detail.comision + visa_detail.price) / visa_detail.rate) as total_visa_money, sum((visa_detail.comision) / visa_detail.rate) as pure_visa  from visa_detail"); 
                                        // for visa payment
                                        $sql_query_05 = mysqli_query($connection,"SELECT SUM(payment.totalprice) as total_payment_price FROM payment WHERE payment.visa IS NOT NULL"); 
                                        // total expense 
                                        $sql_query_06 = mysqli_query($connection,"SELECT sum(expense.amount/ expense.rate) as total_expense from expense"); 
                                        // for sales payment
                                        $sql_query_07 = mysqli_query($connection,"SELECT SUM(payment.totalprice) as total_payment_price FROM payment WHERE payment.company IS NOT NULL"); 
                                        $sql_query_08 = mysqli_query($connection,"SELECT sum(salary_pay.amount - salary_pay.removal_amount) as salary_total from salary_pay"); 
                                      
                                    }
                                    $fetch_01 = mysqli_fetch_assoc($sql_query_01);
                                    $fetch_02 = mysqli_fetch_assoc($sql_query_02);
                                    $fetch_03 = mysqli_fetch_assoc($sql_query_03);
                                    $fetch_04 = mysqli_fetch_assoc($sql_query_04);
                                    $fetch_05 = mysqli_fetch_assoc($sql_query_05);
                                    $fetch_06 = mysqli_fetch_assoc($sql_query_06);
                                    $fetch_07 = mysqli_fetch_assoc($sql_query_07);
                                    $fetch_08 = mysqli_fetch_assoc($sql_query_08);
                                    $income  = ($fetch_02["total_payment_price"] + $fetch_04['pure_visa']);
                                    $out = ($fetch_06['total_expense'] + $fetch_08['salary_total'] + $fetch_03['total_take'] + $fetch_07['total_payment_price']);

                                    $result = $income - $out;

                                   
                                ?>

              <div class="box-footer">

              </div>
            </div>
          </div>
                      <!-- ticket sale -->
                      <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-list-alt"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">فروش تکیت</span>
                  <span class="info-box-number">
                  <?php
                    echo $fetch_01["total_price"] . ' $ ';
                  ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-sticky-note-o"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text"> رسیدات فروش تکت</span>
                  <span class="info-box-number">
                  <?php
                    echo $fetch_02["total_payment_price"] . ' $ ';
                  ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          <!-- talabat frosh ticket -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text"> طلبات فروش تکت</span>
                  <span class="info-box-number">
                  <?php
                    echo round($fetch_01["total_price"] - $fetch_02["total_payment_price"],2);
                  ?>
                  <small>$</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
                                                <!-- visa -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-credit-card"><i class="fa fa-usd"></i></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">  مفاد خالص  تکیت</span>
                  <span class="info-box-number">
                    <?php
                      echo $fetch_01["total_pure_price"];
                    ?>
                    <small>$</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
                                                <!-- visa -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-cc-visa"><i class="fa fa-usd"></i></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text"> درآمد ویزا</span>
                  <span class="info-box-number"><?php echo round($fetch_04['total_visa_money'],2); ?>
                  <small>$</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- mafad khles -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">  رسیدات ویزه</span>
                  <span class="info-box-number">
                  <?php
                    echo $fetch_05["total_payment_price"] . ' $ ';
                  ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- mafad khles -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-tag"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">  طلبات ویزه</span>
                  <span class="info-box-number">
                  <?php
                    echo round($fetch_04["total_visa_money"] - $fetch_05["total_payment_price"],2);
                  ?>
                  <small>$</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- mafad khles -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-tag"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text"> مفاد خالص ویزه</span>
                  <span class="info-box-number"><?php 
                  
                  echo $fetch_04['pure_visa'];
                  ?>
                  <small>$</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- mafad khles -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-tag"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text"> مفاد خالص</span>
                  <span class="info-box-number">
                  <?php echo $fetch_01['total_pure_price']+ $fetch_04['pure_visa']; ?>
                  <small>$</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
                        <!-- majmo masaref -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-lemon-o"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">مجموع مصارف </span>
                  <span class="info-box-number"><?php echo $fetch_06['total_expense']; ?> <small>$</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
                        <!-- mashaat -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text"> معاشات</span>
                  <span class="info-box-number"><?php echo $fetch_08['salary_total']; ?> <small>$</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- pul dakhl -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">  برداشت شرکاء</span>
                  <span class="info-box-number">
                  <?php 
                    echo round($fetch_03['total_take'],2);
                  ?>
                  <small>$</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- rasid company -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">  رسیدات کمپنی ها </span>
                  <span class="info-box-number">
                  <?php 
                    echo round($fetch_07['total_payment_price'],2);
                  ?>
                  <small>$</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- pul dakhl -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text"> پول دخل</span>
                  <span class="info-box-number"><?php echo round($result, 2); ?> <small>$</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

  
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          
  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- ChartJS -->
  <script src="bower_components/Chart.js/Chart.js"></script>
  <script src="bower_components/Chart.js/myChart.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

      <script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChart = new Chart(barChartCanvas)
      var barChartData = areaChartData
      barChartData.datasets[1].fillColor = '#00a65a'
      barChartData.datasets[1].strokeColor = '#00a65a'
      barChartData.datasets[1].pointColor = '#00a65a'
      var barChartOptions = {
        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,
        //String - Colour of the grid lines
        scaleGridLineColor: 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - If there is a stroke on each bar
        barShowStroke: true,
        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,
        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,
        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,
        //String - A legend template
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to make the chart responsive
        responsive: true,
        maintainAspectRatio: true
      }

      barChartOptions.datasetFill = false
      barChart.Bar(barChartData, barChartOptions)
    })
  </script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->