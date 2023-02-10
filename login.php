<?php 
  include 'database.php';
  session_start();
  if(isset($_POST['log_btn'])) {
    $username  = $_POST['username'];
    $password  = $_POST['password'];
    $query_01 = mysqli_query($connection, "select * from user where username = '$username' and password = '$password'");
    if(mysqli_num_rows($query_01) > 0) {
      $row_01 = mysqli_fetch_assoc($query_01);

      echo $row_01['username'];
      $_SESSION['username'] = $row_01['username'];
      $_SESSION['password'] = $row_01['password'];
      $_SESSION['authority'] = $row_01['authority'];
      $_SESSION['full_name'] = $row_01['full_name'];
      $_SESSION['photo'] = $row_01['photo'];
      
      $_SESSION['user_id'] = $row_01['user_id'];
      

      header("location:index.php");

    } else {
      echo "<script>alert('نام کاربری و یا رمز ورودی اشتباه است')</script>";
    }
  }
?>
<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>سیستم پرواز</title>
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
  <link rel="stylesheet" href="dist/css/login.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="shortcut icon" href="images/aire-logo.png" type="image/x-icon">

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
    
     <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4" style="float: right;">
    <div class="box box-info login-box">
        <div class="box-header with-border">
          <h4 align="center">فرم  ورود به سیستم پرواز</h4>
          <center>
            <div class="img-box">
              <img src="images/aire-logo.png" alt="logo" width="100%" height="100%">
            </div>
          </center>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="" method="POST" class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3">نام کاربری</label>
                <input type="text" name="username" class="username form-control" id="username" placeholder="نام کاربری">
            </div>
            <div class="form-group">
              <label for="inputPassword3">رمز عبور</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="رمز عبور">
            </div>
            <div class="input-group" style="cursor: pointer;">
              <label  onclick="showPass();" for="showPass"> نمایش رمز عبور
                <input  onclick="showPass();" type="checkbox" id="showPass">
              </label>
                <script>
                  function showPass() {
                    var inp = document.getElementById('password');
                    if(inp.type == 'password') {
                      inp.type = 'text';
                    } else {
                      inp.type = 'password';
                    }
                  }
                  </script>
            </div>            
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" name="log_btn" class="btn btn-info pull-right btn-block">ورود</button>
          </form>
          </div>
      </div>
   </div>
   <div class="col-md-8" style="float: left;">
    <!-- <img src="dist/img/aireline-vc.jpg" alt="aireline-vc" width="100%"> -->
  </div>
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