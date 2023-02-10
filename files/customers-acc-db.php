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

    <div class="col-md-12">
        <div class="box box-info" >
            <div class="box-header">
              <h3 class="box-title">  لیست  حسابات مشتریان</h3>
              <div class="btn-group print" style="float:left">
                <a href="user-profile.php" class="btn btn-primary" title="پروفایل کابران"><span class="fa fa-user"></span></a>
                  <button class="btn btn-primary" onclick="javascript:print();"><span class="fa fa-print" title="چاپ"></span></button>
                  <a href="customers-acc.php" class="btn btn-primary" title="افزودن مشتری جدید"><span class="fa fa-user-plus"></span></a>
                  <button class="btn btn-success" title="تبدیل به اکسل"><span class="fa fa-file-excel-o"></span></button>
                  <button class="btn btn-dark" title="برگشت"><span class="fa fa-arrow-left"></span></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped col-sm-12">
                <thead style="background-color: goldenrod; color: white;">
                  <tr>
                      <th>#</th>
                      <th>نام و تخلص </th>
                    <th>تیلیفون</th>
                    <th>ایمیل</th>
                    <th>نام شرکت</th>
                    <th>آدرس</th>
                    <th>تاریخ</th>
                    <th class="print"> عملیات</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $show_employee_query = mysqli_query($connection, "SELECT * FROM customer");
                  $count =1;
                  while($row = mysqli_fetch_assoc($show_employee_query)) {
                  ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['company_name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td class="print">
                            <div class="btn-group">
                                <a href="edit.php?edit_customer_acc=<?php echo $row['customer_id']; ?>" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                                <a href="delete.php?del_field=<?php echo $row['customer_id']; ?>" class="btn btn-danger" onclick="confirm('آیا شما برای حذف <?php echo $row['name'];?> اطمینان دارید؟');"><span class="fa fa-remove"></span></a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                   $count++; 
                  }?>
                </tbody>
                <tfoot>
                    
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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