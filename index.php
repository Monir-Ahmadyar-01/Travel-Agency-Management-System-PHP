<?php

include 'database.php';
include 'session.php';
  if(isset($_GET['logout'])) {
    unset($_SESSION['username']);
    header("location:login.php");
  }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    سیستم پرواز - خانه
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="apple-touch-icon" sizes="76x76" href="dist/img/aire-logo.png>
  <link rel="icon" type="image/png" href="dist/img/aire-logo.png">
  <link rel="icon" href="dist/img/aire-logo.png">
  <link rel="favicon" href="dist/img/aire-logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/custom-style.css">
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
<style>
  iframe {
    margin-top: 20px;
    border: none;
    width: 100%;
    height: 300vh;
    /* padding: 0 !important; */
  
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">Asia</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b> 
        <?php $show_org_info = mysqli_query($connection, "select * from `info` where 1");
        $row_info = mysqli_fetch_assoc($show_org_info);
        echo $row_info['persion_name']
        ?>
         </b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown logo-air">
              <img src="images/<?php echo $row_info['logo']; ?>" width="56px" alt="">

            </li>
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu dropdown-menu-cs">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-dollar color-white"></i>
              </a>
              <style>
                .color-white {
                  color: black;
                }
                .dropdown-menu-cs {
                  width: 56px;
                  color:black;
                    /* color: #fff; */
                  border-radius: 3px;
                  text-align: center;
                  font-size: 24px;
                }
              </style>
              <ul class="dropdown-menu" style="padding: 20px;">
                <div class="card">
                  <div class="card-header"> <h5>تعیین نرخ دالر</h5> </div>
                  <div class="card-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <label for="dollar">دالر</label>
                        <input type="number" name="dollar" id="dollar" class="dollar form-control">
                      </div>

                    </div>
                    <div class="card-footer">
                      <button type="button" onclick="exchange();" id="dollar_exc" class="btn btn-success">ثبت</button>
                      <script>                          
                          function exchange () {
                        var dollar = $('.dollar').val();
                        alert( 'نرخ جدید دالر:  '+ dollar);
                        if(dollar == "") {
                        } else {
                          localStorage.setItem(1, dollar);

                        }
                        }
                      
                      </script>
                    </form>
                  </div>
                </div>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="images/<?php echo $_SESSION['photo']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php  echo $_SESSION['full_name'] ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="images/<?php echo $_SESSION['photo']; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php  echo $_SESSION['full_name'] ?>
                    <small><?php if($_SESSION['authority'] == '100') {echo 'سوپر ادمین';} else {echo 'ادمین عادی';} ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div>
                    <a href="?logout=01" class="btn btn-plimary btn-block" style="width: 100%; background-color:dodgerblue; color:white;">خروج</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-right image">
            <img src="images/<?php echo $_SESSION['photo']; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-right info">
            <p><?php  echo $_SESSION['full_name'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
          </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="treeview">
            <a href="#">
              <i class="fa fa-ticket"></i>
              <span>  فروشات تکیت</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="sales.php" target="iframe"><i class="fa fa-circle-o"></i> فروش تکیت</a></li>
              <li><a href="sales-db.php" target="iframe"><i class="fa fa-circle-o"></i>  لیست تکیت ها</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cc-visa"></i>
              <span>ثبت ویزا</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="visa_detail.php" target="iframe"><i class="fa fa-circle-o"></i>ثبت ویزای جدید </a></li>
              <li><a href="visaView.php" target="iframe"><i class="fa fa-circle-o"></i>  لیست ویزا</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-credit-card"></i>
              <span>مدیریت حساب ها</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="customers-acc.php" target="iframe"><i class="fa fa-circle-o"></i>ثبت مشتریان</a></li>
              <li><a href="customers-profile.php" target="iframe"><i class="fa fa-circle-o"></i>حساب مشتریان</a></li>
              <li><a href="company-acc.php" target="iframe"><i class="fa fa-circle-o"></i>حساب شرکت ها</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cube"></i>
              <span>بخش مصارف</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="expense.php" target="iframe"><i class="fa fa-circle-o"></i> مصرف جدید </a></li>
              <li><a href="registered_expenses.php" target="iframe"><i class="fa fa-circle-o"></i>  لیست مصارف </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>بخش کارمندان</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="employee.php" target="iframe"><i class="fa fa-circle-o"></i>ثبت کارمند جدید </a></li>
              <li><a href="registered_employees.php" target="iframe"><i class="fa fa-circle-o"></i> لیست کارمندان </a></li>
              <li><a href="salary.php" target="iframe"><i class="fa fa-circle-o"></i>  پرداخت معاش </a></li>
              <li><a href="registered_salaries.php" target="iframe"><i class="fa fa-circle-o"></i>   لیست معاشات </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>شرکاء</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="partnershipRegis.php" target="iframe"><i class="fa fa-circle-o"></i>ثبت شرکاء </a></li>
              <li><a href="bardasht.php" target="iframe"><i class="fa fa-circle-o"></i>برداشت شرکاء </a></li>
              <li><a href="balace_partnerships.php" target="iframe"><i class="fa fa-circle-o"></i>بیلانس شرکاء </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-plus"></i>
              <span>کابران</span>
              <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="newuser.php" target="iframe"><i class="fa fa-circle-o"></i>ثبت کاربر جدید </a></li>
              <li><a href="user-db.php" target="iframe"><i class="fa fa-circle-o"></i> لیست کابران </a></li>
            </ul>
          </li>
          <li><a href="org-info.php" target="iframe"><i class="fa fa-circle-o text-red"></i> <span>ثبت معلومات شرکت</span></a></li>
          <li><a href="backup.php" target="iframe"><i class="fa fa-database text-blue"></i> <span>  تهیه  کاپی از دیتابیس</span></a></li>
          <li><a href="video.php" target="iframe"><i class="fa fa-play text-aqua"></i> <span>     رهنمون ویدیوئی </span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
      <iframe class="content" src="dashboard.php" id="iframe" name="iframe" frameborder="1">

      </iframe>
      <!-- /.content -->
    </div>



    <!-- /.content-wrapper -->
    <footer class="main-footer text-left">
      <strong>Copyleft &copy; 2021 <a href="https://asrepoya.com">Asre Poya Technology Company</a>

    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
        </div>
        <div class="tab-pane" id="control-sidebar-settings-tab">
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

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
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>