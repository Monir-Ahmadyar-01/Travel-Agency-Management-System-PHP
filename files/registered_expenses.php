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
  <!-- persian datepicker -->
  <link rel="stylesheet" href="dist/css/persian-datepicker.css">

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
  <!-- persian datepicker -->
  <link rel="stylesheet" href="dist/css/myStyle.css">
  <link rel="stylesheet" href="dist/css/persian-datepicker.css">

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
     <div class="row" style="text-align: center;">
        <div class="col-sm-12">
            <div class="titlebody">
               <div class="title">
                 <span>لیست مصارف</span>
               </div>
            </div>
        </div>
    </div>

     <div class="box box-info" style="border: 1px solid rgb(199, 196, 196); border-radius: 1%; padding: 3px;">
        <div class="box-header">
            <div class="row" style="margin-right: 15px; margin-left: 15px;">
              <div class="btn-group print" style="float:right">
               
              </div>
              <div class="btn-group print" style="float:left">
                  <button class="btn btn-primary" onclick="javascript:print();"><span class="fa fa-print" title="چاپ"></span></button>
                  <a href="expense.php" class="btn btn-primary" title="افزودن مصرف جدید"><span class="fa fa-credit-card"></span></a>
                  <button class="btn btn-success" title="تبدیل به اکسل"><span class="fa fa-file-excel-o"></span></button>
                  <a href="expense.php" class="btn btn-info" title="برگشت"><span class="fa fa-arrow-left"></span></a>
              </div>
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
                  </div>
                </form>
            
            </div>
            
        </div>

        <div class="box-body table-responsive">
          <table id="expenses-table" class="table table-bordered table-striped col-sm-12">
            <thead style="background-color: goldenrod; color: white;">
              <tr>
                <th>#</th>
                <th>نام مصرف </th>
                <th>نوعیت</th>
                <th>مقدار</th>
                <th>واحد</th>
                <th>نرخ به دالر</th>
                <th>نمبر بل</th>
                <th>تاریخ</th>
                <th class="print"> عملیات</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $show_exp_query;
            $total_query;
            
                if(isset($_POST['search_table'])) {
                  $search_input_01 = $_POST["search_input"];
                    
                  $show_exp_query = mysqli_query($connection, "SELECT * FROM expense where expense.expense = '$search_input_01' or expense.type=(select type from expensetype where expensetype.expensetype_id = '$search_input_01')"); // s INNER JOIN customer cu on s.customer = cu.customer_id 
                  $total_query = mysqli_query($connection, "select sum(expense.amount/ expense.rate) as total_exp from expense where expense.expense = '$search_input_01' or expense.type=(select type from expensetype where expensetype.expensetype_id = '$search_input_01')");

                }
                 else if(isset($_POST['search_by_date'])) {
                  $from_date = $_POST["from_date"];
                  $to_date = $_POST["to_date"];
                  $show_exp_query = mysqli_query($connection, "SELECT * FROM `expense` where date between '$from_date' and '$to_date'");
                  $total_query = mysqli_query($connection, "select sum(expense.amount/ expense.rate) as total_exp from expense where date between '$from_date' and '$to_date'");

                } else {
                  $show_exp_query = mysqli_query($connection, "SELECT * FROM expense "); // s INNER JOIN customer cu on s.customer = cu.customer_id 
                  $total_query = mysqli_query($connection, "select sum(expense.amount/ expense.rate) as total_exp from expense");

                }

            $count = 1;
            while($row = mysqli_fetch_assoc($show_exp_query)) {
              $currency_id = $row['currency'];
                    $get_currency_query = mysqli_query($connection, "SELECT `currency` FROM `currency` WHERE `currency_id` = '$currency_id';");
                    $row_04 = mysqli_fetch_assoc($get_currency_query);

              $ex_type_id = $row['currency'];
                    $get_type_query = mysqli_query($connection, "SELECT `type` FROM `expensetype` WHERE `expensetype_id` = '$ex_type_id';");
                    $row_05 = mysqli_fetch_assoc($get_type_query);
                    
            ?>
              <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $row['expense'] ?></td>
                  <td><?php echo $row_05['type'] ?></td>
                  <td><?php echo $row['amount'] ?></td>
                  <td><?php echo $row_04['currency'] ?></td>
                  <td><?php echo $row['rate'] ?></td>
                  <td><?php echo $row['bill_number'] ?></td>
                  <td><?php echo $row['date'] ?></td>
                  <td class="print">
                      <div class="btn-group">
                          <a href="edit.php?exp_id=<?php echo $row['expence_id'] ?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                          <a href="delete.php?exp_id=<?php echo $row['expence_id'] ?>" onclick="confrim('آیا برای حذف اطلاعات اطمینان دارید؟')" class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
                      </div>
                  </td>
              </tr>
              <?php 
          $count++;  
          }
              ?>
          </tbody>
          <tfoot>
      
          </tfoot>
          </table>
          <table style="width: 100%; text-align: center;">
            <tfoot style="background-color: rgb(44, 44, 44); color: white;">
              <tr>
                  <th style="padding: 8px 20px;">مجموعه مصارف : <?php                   
                    $row_total = mysqli_fetch_assoc($total_query);
                  
                  echo $row_total['total_exp'] . " USD";  ?></th>
              </tr>
          </tfoot>
          </table>
         </div>
    </div>

   </section>
         </div>
       </div>


  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- persian datepicker -->
  <script src="dist/js/persian-datepicker.js"></script>
  <!-- query code for datepicker -->
  <script>
    $(document).ready(() => {
            $('#date-man').datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    
        $(document).ready(() => {
            $('#to-date-man').datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
</script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>