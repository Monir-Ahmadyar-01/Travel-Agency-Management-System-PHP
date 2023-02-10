<?php include 'database.php'; 
include 'session.php';?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>جدول ها | کنترل پنل</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <link rel="stylesheet" href="dist/css/visaStyle.css">
</head>
<style>
@media print {
  .print {
    display: none;
  }
  .dataTables_filter, .dataTables_info, #example1_length, .dataTables_paginate, .paging_simple_numbers, #example1_paginate {
    display: none;
  }
}
td{
  padding:0px !important;
}
</style>
<script>
$('.dataTables_filter').addClass('print');
</script>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">     
      
      <div class="box">
      <div class="box-header" style="direction: ltr !important;">
      <h3  class="">List of visa </h3>

        <div class="btn-group print" dir="ltr">
          <a href="visa_detail.php" class="btn btn-info" title="برگشت"><span class="fa fa-arrow-left"></span></a>
          <a href="dashboard.php" class="btn btn-primary" title="خانه"><span class="fa fa-home"></span></a>
            <button class="btn btn-primary" onclick="javascript:print();"><span class="fa fa-print" title="چاپ"></span></button>
            <a href="visa_detail.php" class="btn btn-primary" title="افزودن ویزای جدید"><span class="fa fa-cc-visa"></span></a>
            <button class="btn btn-success" title="تبدیل به اکسل"><span class="fa fa-file-excel-o"></span></button>
        </div> 

        <br> 
            <br> 
            <div class="search-div print">
              <form action="" method="post" class="col-md-3">
                  <!-- <div class="form-group col-md-2">
                    <input type="text" name="search_text" id="search_text" class="form-control" placeholder="چی ره میپالی؟">
                  </div>
                  <div class="btn-group col-md-1">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                  </div> -->
                  <div class="input-group ">
                  <input type="text" class="form-control search_input"  name="search_input" id="search_input" placeholder="Search any thing  ">
                  <span class="input-group-btn">
                    <button type="submit" name="search_table" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>

                  </span>
                </div>

                </form>
                <style>
                .dataTables_filter {
                  display: none;
                }
                </style>

                <form action="" method="post">
                  <div class="form-group col-md-3">
                    <input type="date" name="from_date" id="from_date" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <input type="date" name="to_date" id="to_date" class="form-control">
                  </div>
                  <div class="btn-group print">
                    <button type="submit" name="search_by_date" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <button onclick="reset" class="btn btn-info"><i class="fa fa-filter"></i></button>
                  </div>
                </form>

            </div>
      </div>
        
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th align="center">No</th>
                <th>Customer</th>
                <th>Full name</th>
                <th>D_of REQ </th>
                <th>D_of Issue</th>
                <th>Type</th>
                <th>Visa duration</th>
                <th>Place of issue</th>
                <th>Price</th>
                <th>Com </th>
                <th>Recived</th>
                <th>Currency</th>
                <th>Date</th>
                <th class="print">Operations</th>
              </tr>
            </thead>
            <tbody>
                          <?php 
                $sql_query_01 =null;
               // $sql_query_01 = mysqli_query($connection, "SELECT * FROM sale s INNER JOIN customer cu on s.customer = cu.customer_id");
                if(isset($_POST['search_table'])) {
                  $search_input_01 = $_POST["search_input"];
                    
                        $sql_query_01 = mysqli_query($connection,"SELECT *, (select full_name from customer where customer.customer_id =  visa.customer) as cs_name from visa
                        inner JOIN
                        visa_detail on visa_detail.visa_id = visa.visa_id where  visa.customer=(select customer_id from customer where customer.full_name ='$search_input_01') or visa.type='$search_input_01' or visa_detail.full_name like '%$search_input_01%' or visa.place_of_issue='$search_input_01' or visa.date='$search_input_01'");
                        
                } else if(isset($_POST['search_by_date'])) {
                  $from_date = $_POST["from_date"];
                  $to_date = $_POST["to_date"];
                $sql_query_01 = mysqli_query($connection,"SELECT *, (select full_name from customer where customer.customer_id =  visa.customer) as cs_name from visa
                inner JOIN
                visa_detail on visa_detail.visa_id = visa.visa_id where visa.date between '$from_date' and '$to_date'");
                } else {
                  $sql_query_01 = mysqli_query($connection,"SELECT *, (select full_name from customer where customer.customer_id =  visa.customer) as cs_name from visa
                  inner JOIN
                  visa_detail on visa_detail.visa_id = visa.visa_id"); // s INNER JOIN customer cu on s.customer = cu.customer_id 
                }

                $last_row = array();
                  $last_row[0] = 0;
                  $last_row[1] = 0;
                  $last_row[2] = 0;

                  $count = 1;
                  while($fetch_01 = mysqli_fetch_assoc($sql_query_01)){
                  
                  // payment sum bill
                  // $sql_query_02 = mysqli_query($connection,"select sum(totalprice/rate) as payment_sum from payment where sdetail='$sale_detail'");
                  // $fetch_02 = mysqli_fetch_assoc($sql_query_02);
                  
                  // sale_detail_sum_bill
                  // $sql_query_03 = mysqli_query($connection,"select sum(price_in1gram*quantity) as bill_detail_sum from sale_detail where sale_bill_number='$sale_detail'");
                  // $fetch_03 = mysqli_fetch_assoc($sql_query_03);


              ?>
              <tr>
              <td align="center"><?php echo $count;?></td>
                <td><?php echo $fetch_01['cs_name'] ?></td>
                <td><?php echo $fetch_01['full_name'] ?></td>
                <td><?php echo $fetch_01['D_of_request'] ?></td>
                <td><?php echo $fetch_01['D_of_issue'] ?></td>
                <td><?php echo $fetch_01['type'] ?></td>
                <td><?php echo $fetch_01['visa_name'] ?></td>
                <td><?php echo $fetch_01['place_of_issue'] ?></td>
                <td><?php echo $fetch_01['price'] ?></td>
                <td><?php echo $fetch_01['comision'] ?></td>
                <td><?php 
                  $visa_id = $fetch_01["visa_id"];
                  $sql_query_04 = mysqli_query($connection,"SELECT SUM(payment.totalprice / payment.rate) as visa_amount from payment WHERE payment.visa = '$visa_id'");
                  $fetch_04 = mysqli_fetch_assoc($sql_query_04);
                  echo $fetch_04["visa_amount"];
                ?></td>
                <td><?php echo "USD"; ?></td>
                <td><?php echo $fetch_01['date'] ?></td>
                <td style="text-align: center;" class="print">
                <div class="btn-group  ">

                <a href="payment.php?visa_id=<?php echo $fetch_01['visa_id']?>" class="btn btn-info btn-sm" > <span class="fa fa-plus-circle"></span></a>
                <a href="edit.php?edit_visa=<?php echo $fetch_01['visa_id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="delete.php?delete_visa=<?php echo $fetch_01['visa_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
                </td>

              </tr>
              <?php $count++; } ?>
               </tbody>
            
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    })
  </script>
</body>

</html>