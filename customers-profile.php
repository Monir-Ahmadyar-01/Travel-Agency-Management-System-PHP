<?php include 'database.php'; 
include 'session.php';?>
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

   <h3 class="co_prof_title">حساب مشتری ها</h3>
   <?php
$show_cs_profile = mysqli_query($connection, "SELECT * FROM `customer`");
while($row = mysqli_fetch_assoc($show_cs_profile)){
  $cus_id = $row["customer_id"];
  $sql_query_01 = mysqli_query($connection,"SELECT SUM((((100 - s_d.discount)/100)*s_d.comission) + s_d.price) as total_amount from sale_detail s_d INNER JOIN sale s ON s_d.sale_bill_number = s.sale_bill_number INNER JOIN customer c ON s.customer = c.customer_id WHERE c.customer_id='$cus_id'");
  $sql_query_02 = mysqli_query($connection,"SELECT SUM(payment.totalprice/payment.rate) as total_price FROM payment INNER JOIN sale ON payment.sdetail = sale.sale_bill_number INNER JOIN customer on sale.customer = customer.customer_id WHERE customer.customer_id = '$cus_id'");

  $fetch_01 = mysqli_fetch_assoc($sql_query_01);
  $fetch_02 = mysqli_fetch_assoc($sql_query_02);
?>
   <div class="col-md-3 col-lg-3 col-sm-12">
                   <!-- Profile Image -->
                <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="images/aire-logo.png"
                    alt="User profile picture"> 
                    <a href="sales-db.php?cus_id=<?php echo $row["customer_id"]; ?>">
                      <h3 class="profile-username text-center"> <?php echo $row['full_name']  ?> </h3>
                    </a>
  
                  <p class="text-muted text-center" style="text-align: left; direction: ltr;"><?php echo "0". $row['phone']  ?> </p>
  
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b> مجموع خرید  </b> <a class="pull-left"><?php echo $fetch_01["total_amount"]; ?> </a>
                    </li>
                    <li class="list-group-item">
                      <b> رسید تکیت </b> <a class="pull-left"><?php echo $fetch_02['total_price']; ?> </a>
                    </li>
                    <li class="list-group-item"  >
                      <b>  باقی داری  </b> <a class="pull-left" style="color:red;"><?php echo round($fetch_01["total_amount"]-$fetch_02['total_price'],2); ?> </a>
                    </li>
                  </ul>
  
                  <a href="edit.php?edit_customer_acc=<?php echo $row['customer_id'] ?>" class="btn btn-primary btn-block"><b> ویرایش معلومات</b></a>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
   </div>
   <?php }?>
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