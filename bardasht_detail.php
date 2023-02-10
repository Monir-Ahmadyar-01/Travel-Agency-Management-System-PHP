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
<style>
  @media print {
      .print {
        display: none;
      }
  }
</style>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">

    <div class="col-md-12">
        <div class="box box-info" >
            <div class="box-header">
              <h3 class="box-title">  لیست برداشت ها </h3>
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
                    <input type="text" class="form-control search_input"  name="search_input" id="search_input" placeholder="چی ره میپالی؟">
                    <span class="input-group-btn">
                      <button type="submit" name="search_table" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>

                    </span>
                </div>
                
              </form>


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
                    
                    <button class="btn btn-primary" onclick='window.print();'><span class="fa fa-print" title="چاپ"></span></button>
                  </div>
                </form>
               
            </div>
            
            </div>

              

            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                      <th>#</th>
                    <th>نام شریک</th>
                    <th>مبلغ</th>
                    <th>واحد پولی</th>
                    <th>نرخ</th>
                    <th>توضیحات</th>
                    <th>تاریخ</th>
                    <th class="print">عملیات</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $show_payment; 

                    if(isset($_POST['search_table'])) {
                      $search_input_01 = $_POST["search_input"];
                        
                      $show_payment = mysqli_query($connection , "SELECT *,(select name from shareholder where shareholder.shareholder_id =take.take_id ) as share_holder_name,(select currency from currency where take.currency =currency.currency_id ) as currency_name FROM `take` where take.shareholder=(select shareholder_id from shareholder where shareholder.name ='$search_input_01')");

                    }
                     else if(isset($_POST['search_by_date'])) {
                      $from_date = $_POST["from_date"];
                      $to_date = $_POST["to_date"];
                      $show_payment = mysqli_query($connection , "SELECT *,(select name from shareholder where shareholder.shareholder_id =take.take_id ) as share_holder_name,(select currency from currency where take.currency =currency.currency_id ) as currency_name FROM `take` where date between '$from_date' and '$to_date'");

                    } else {
                      $show_payment = mysqli_query($connection , "SELECT *,(select name from shareholder where shareholder.shareholder_id =take.take_id ) as share_holder_name,(select currency from currency where take.currency =currency.currency_id ) as currency_name FROM `take`");

                    }

                    
                    
                    $count = 1;
                    
                    $total_bardasht = 0;
                    while($row = mysqli_fetch_assoc($show_payment)) {
                      

                  ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['share_holder_name'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td><?php echo $row['currency_name'] ?></td>
                        <td><?php
                        $total_bardasht = $total_bardasht + ($row['amount']/$row['rate']);
                        echo $row['rate']; ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                      
                        <td class="print">
                            <div class="btn-group">
                                <a href="delete.php?bardasht_id=<?php echo $row['take_id'] ?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                            </div>
                        </td>
                    </tr>
                    <?php $count++; } ?>
                    <tr>
                      <td colspan="8">
                        مجموع برداشت <?php echo $total_bardasht . ' $ ' ?>
                      </td>
                    </tr>
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