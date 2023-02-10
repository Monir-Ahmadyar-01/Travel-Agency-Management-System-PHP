<?php 
include 'database.php'; 
include 'session.php'; 
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>صفحه شروع | کنترل پنل</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/custom-style.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

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

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
    <h3 class="co_prof_title">پروفایل شرکاء</h3>
                <?php $show_share_query = mysqli_query($connection, "SELECT *FROM shareholder");
                  $query_02 = mysqli_query($connection, "SELECT amount, currency, rate
                  FROM take
                  LEFT JOIN shareholder
                  ON shareholder.shareholder_id = take.take_id;");
                while ($row = mysqli_fetch_assoc($show_share_query)) {
                  $row_02 = mysqli_fetch_assoc($query_02);
                    ?>
                <div class="col-md-3">
                  <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="images/<?php  echo $row['photo'] ?> "
                        alt="User profile picture">
      
                      <h3 class="profile-username text-center"><?php  echo $row['name'] ." ".$row['lname']; ?></h3>
      
                      <p class="text-muted text-center">  +93 <?php  echo $row['phone'] ?>  </p>
      
                      <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b> فیصدی شراکت</b> <a class="pull-left"><?php  echo $row['percentage'] ?></a>
                          </li>
                        <li class="list-group-item">
                          <b> برداشت</b> <a class="pull-left"><?php  echo $row_02['amount'] ?> </a>
                        </li>
                        <li class="list-group-item">
                          <b> واحد پولی</b> <a class="pull-left"><?php
                          $cur_id = $row_02['currency'];
                          $query_crr = mysqli_query($connection, "SELECT currency from currency WHERE `currency_id` = '$cur_id' ");
                          $row_cur = mysqli_fetch_assoc($query_crr);
                          
                          echo $row_cur['currency'] ?> </a>
                        </li>
                        <li class="list-group-item">
                          <b> نرخ دالر</b> <a class="pull-left"><?php  echo $row_02['rate'] ?> </a>
                        </li>
                      </ul>
      
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <?php
                } ?>

  </section>

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>