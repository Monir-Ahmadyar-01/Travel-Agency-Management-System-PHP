<?php
include 'database.php';
include 'session.php';
?>
<!DOCTYPE html>
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
  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
</head>


<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">

   <h3 class="co_prof_title">پروفایل شرکت ها</h3>
   <?php
    $show_company_info = mysqli_query($connection, "SELECT * FROM `company_account`");
    while($row = mysqli_fetch_assoc($show_company_info)) {
   ?>
   <div class="col-md-3 col-lg-3 col-sm-12">

                   <!-- Profile Image -->
                   <div class="box box-primary">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="dist/img/kam-logo.png"
                        alt="User profile picture">
      
                      <h3 class="profile-username text-center"> <?php echo $row['name'] ?> </h3>
      
                      <p class="text-muted text-center">  شرکت هوایی</p>
      
                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>شمار حساب </b> <a class="pull-left"> <?php echo $row['account_number'] ?></a>
                        </li>
                        <li class="list-group-item">
                          <b> موجودی</b> <a class="pull-left"> <?php echo $row['valid_balance'] ?></a>
                        </li>
                        
                      </ul>
      
                      <a href="edit.php?company_id=<?php echo $row['id'] ?>" class="btn btn-primary btn-block"><b> ویرایش معلومات</b></a>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->


   </div>
   <?php } ?>

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