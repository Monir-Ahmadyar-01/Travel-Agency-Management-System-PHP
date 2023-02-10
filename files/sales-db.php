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
    <style>
      @media print {
        .print {
          display: none;
        }
        .print-show {
          display: block !important;
        }
      }
      .hidden {
        display: none;
      }
    </style>
   <!-- Main content -->
   <section class="content container-fluid">

    
    <div class="col-md-12">
      <div class="box box-primary" >
          <div class="box-header">
            <h3 class="box-title">  لیست   فروشات تکیت</h3>
            <h4 class="print-show hidden" ><?php
              $get_company_info = mysqli_query($connection, "select * from info where 1");
              $row = mysqli_fetch_assoc($get_company_info);
            echo $row['persion_name']; ?></h6>
            <div class="btn-group print" style="float:left">
                <button class="btn btn-primary" onclick="javascript:print();"><span class="fa fa-print" title="چاپ"></span></button>
                <a href="sales.php" class="btn btn-primary" title="فروش  جدید"><span class="fa fa-credit-card"></span></a>
                <button class="btn btn-success" title="تبدیل به اکسل"><span class="fa fa-file-excel-o"></span></button>
                <a href="sales.php" class="btn btn-info" title="برگشت"><span class="fa fa-arrow-left"></span></a>
            </div>
            <br> 
            <br> 
            <div class="search-div print">
              <form action="" method="post" class="col-md-2">
                  <!-- <div class="form-group col-md-2">
                    <input type="text" name="search_text" id="search_text" class="form-control" placeholder="چی ره میپالی؟">
                  </div>
                  <div class="btn-group col-md-1">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                  </div> -->
                  <div class="input-group ">
                  <input type="text" class="form-control search_input"  name="search_input" id="search_input" placeholder="چی ره میپالی؟">
                  <span class="input-group-btn">
                    <button type="submit" name="search_table" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>

                  </span>
                </div>

                </form>


                <form action="" method="post">
                  <div class="form-group col-md-2">
                    <input type="date" name="from_date" id="from_date" class="form-control">
                  </div>
                  <div class="form-group col-md-2">
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

            <table id="example1" class="table table-bordered table-striped table-hover col-sm-12" dir="ltr">
              <thead style="background-color: rgb(40, 40, 95); color: white;">             
                <tr>
                    <th>#</th>                    
                    <th>user</th>
                    <th>Invoice No</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Remain</th>
                    <th>Date</th>
                  <th class="print"> Operations</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php 
                $sql_query_01 =null;
               // $sql_query_01 = mysqli_query($connection, "SELECT * FROM sale s INNER JOIN customer cu on s.customer = cu.customer_id");
                if(isset($_POST['search_table'])) {
                  $search_input_01 = $_POST["search_input"];
                    
                        $sql_query_01 = mysqli_query($connection,"SELECT *,(select full_name from user where sale.user = user.user_id) as u_name, (select full_name from customer  where customer.customer_id = sale.customer) as cs_name FROM sale where sale.user=(select user_id from user where user.full_name ='$search_input_01') or sale.customer=(select customer_id from customer where customer.full_name ='$search_input_01')");
                        
                } else if(isset($_POST['search_by_date'])) {
                  $from_date = $_POST["from_date"];
                  $to_date = $_POST["to_date"];
                $sql_query_01 = mysqli_query($connection,"SELECT *,(select full_name from user where sale.user = user.user_id) as u_name, (select full_name from customer  where customer.customer_id = sale.customer) as cs_name FROM sale where sale.date between '$from_date' and '$to_date'");
                } else {
                  $sql_query_01 = mysqli_query($connection,"SELECT *,(select full_name from user where sale.user = user.user_id) as u_name, (select full_name from customer  where customer.customer_id = sale.customer) as cs_name FROM sale"); // s INNER JOIN customer cu on s.customer = cu.customer_id 
                }

                $last_row = array();
                  $last_row[0] = 0;
                  $last_row[1] = 0;
                  $last_row[2] = 0;

                  $count = 1;
                  while($fetch_01 = mysqli_fetch_assoc($sql_query_01)){
                  
                  $sale_detail = $fetch_01["sale_bill_number"];
                  $sql_query_05 = mysqli_query($connection,"SELECT SUM((((100 - discount)/100)*comission) + price) as total_amount from sale_detail where sale_bill_number =  '$sale_detail'");
                  $fetch_05 = mysqli_fetch_assoc($sql_query_05);

                  $sql_query_06 = mysqli_query($connection,"SELECT SUM(totalprice/rate) as total_amount from payment where sdetail =  '$sale_detail'");
                  $fetch_06 = mysqli_fetch_assoc($sql_query_06);
                  // payment sum bill
                  // $sql_query_02 = mysqli_query($connection,"select sum(totalprice/rate) as payment_sum from payment where sdetail='$sale_detail'");
                  // $fetch_02 = mysqli_fetch_assoc($sql_query_02);
                  
                  // sale_detail_sum_bill
                  // $sql_query_03 = mysqli_query($connection,"select sum(price_in1gram*quantity) as bill_detail_sum from sale_detail where sale_bill_number='$sale_detail'");
                  // $fetch_03 = mysqli_fetch_assoc($sql_query_03);


              ?>
                  <tr>
                      <td><?php echo $count ?></td>
                      <td><?php echo $fetch_01['u_name'] ?></td>
                      <td><?php echo $fetch_01['sale_bill_number'] ?></td>
                      <td><?php echo $fetch_01['cs_name'] ?></td>
                      <td><?php echo $fetch_05['total_amount']; ?></td>
                      <td><?php echo round($fetch_06['total_amount'],2); ?></td>
                      <td><?php echo round($fetch_05['total_amount'] - $fetch_06['total_amount'],2); ?></td>
                      <td><?php echo $fetch_01['date'] ?></td>
                      <td class="print">
                          <div class="btn-group print">
                              <a href="payment.php?sale_id=<?php echo $fetch_01['sale_bill_number']?>" class="btn btn-info btn-sm" > <span class="fa fa-plus-circle"></span></a>
                              <a href="edit.php?sale_id=<?php echo $fetch_01['sale_bill_number']; ?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                              <a href="delete.php?sale_id=<?php echo $fetch_01['sale_bill_number']; ?>" class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
                              <button data-toggle="collapse" data-target="#id_<?php echo $count; ?>" class="accordion-toggle btn btn-default btn-sm"><span class="fa fa-eye"></span></button>
                          </div>
                      </td>
                  </tr>
                   
                  <tr>
                  <style>
                  table tbody tr td{
                      text-align: center !important;
                      /* background-color: red; */
                  }
                  table thead tr th {
                    text-align: center;
                  }
                  </style>
                    <td colspan="12" class="hiddenRow">
                      <div class="accordian-body collapse" id="id_<?php echo $count; ?>"> 
                      <table class="table table-striped">
                              <thead>
                                <tr class="info">
                                  <th>No</th>
                                  <th>Pax Name</th>
                                  <th>PNR</th>
                                  <th>Sector</th>
                                  <th>Air line</th>
                                  <th>Date Issue</th>
                                  <th>Price</th>
                                  <th>COM</th>
                                  <th>Discount</th>
                                  <th>Company</th>
                                  <th>Total</th>
                                  <th class="print">Operation</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $sql_query_05 = mysqli_query($connection,"
                                      SELECT  *,(select name from company_account where company_account.id = sale_detail.company) as co_name from sale_detail where sale_bill_number = '$sale_detail'
                                  ");
                                  $count_2 = 1;
                                  while($fetch_05 = mysqli_fetch_assoc($sql_query_05)){
                                ?>
                                  <tr>
                                    <td><?php echo $count_2; ?></td>
                                    <td><?php echo $fetch_05["pax_name"]; ?></td>
                                    <td><?php echo $fetch_05["pnr"]; ?></td>
                                    <td><?php echo $fetch_05["sector"]; ?></td>
                                    <td><?php echo $fetch_05["flight_number"]; ?></td>
                                    <td><?php echo $fetch_05["D_ofissue"]; ?></td>
                                    <td><?php echo $fetch_05["price"]; ?></td>
                                    <td><?php echo $fetch_05["comission"]; ?></td>
                                    <td><?php echo $fetch_05["discount"]; ?></td>
                                    <td><?php echo $fetch_05["co_name"]; ?></td>
                                    <td><?php
                                    $new_com = ((100 - $fetch_05['discount']) / 100) * $fetch_05['comission'];
                                    $sum_total = $fetch_05['price'] + $new_com;
                                    
                                    
                                    echo $sum_total; ?></td>
                                    <td class="print"><div class="btn-group">
                              <a href="edit.php?detail_id=<?php echo $fetch_05['sdetail_id']; ?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                              <a href="delete.php?detail_id=<?php echo $fetch_05['sdetail_id']; ?>" class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
                              </div>
                              </td>
                                  </tr>

                                <?php
                                $count_2++;
                                  }
                                ?>
                              </tbody>
                      </table>
                      </div>
                    </td>
                  </tr>
                                <?php
                          $count++;
                      }
                                    
                    ?>  
              </tbody>
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