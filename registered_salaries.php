<?php include 'database.php'; 
include 'session.php'; ?>
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
  <link rel="stylesheet" href="dist/css/myStyle.css">
  <link rel="stylesheet" href="dist/css/persian-datepicker.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row" style="text-align: center;">
       <div class="col-sm-12">
           <div class="titlebody">
              <div class="title">
                <span>لیست معاشات</span>
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
                 <a href="salary.php" class="btn btn-primary" title="افزودن معاش"><span class="fa fa-credit-card"></span></a>
                 <button class="btn btn-success" title="تبدیل به اکسل"><span class="fa fa-file-excel-o"></span></button>
                 <a href="salary.php" class="btn btn-dark" title="برگشت"><span class="fa fa-arrow-left"></span></a>
             </div>
           </div>
       </div>

       <div class="box-body table-responsive">
         <table id="employees-table" class="table table-bordered table-striped col-sm-12">
           <thead style="background-color: goldenrod; color: white;">
             <tr>
               <th>#</th>
               <th>نام کارمند</th>
              <th>تخلص کارمند</th>
              <th>معاش</th>
              <th>مقدار برداشت</th>
              <th>پرداخت شده </th>
              <th>واحد پولی</th>
              <th>نرخ  </th>
              <th>تاریخ</th>
               <th class="print"> عملیات</th>
             </tr>
           </thead>
           <tbody>
           <?php 
    $show_salary_query = mysqli_query($connection, "SELECT *,(select `name` from staff where salary_pay.employee_id = staff.staff_id) as name_staff,(select currency from currency where salary_pay.currency = currency.currency_id) as currency FROM `salary_pay`");
    $count =1 ;
    $show_lname = mysqli_query($connection, "SELECT *,(select `lname` from staff where salary_pay.employee_id = staff.staff_id) as lname_staff FROM `salary_pay`");
    $row_lname = mysqli_fetch_assoc($show_lname);
    while($row = mysqli_fetch_assoc($show_salary_query)) {
?>
             <tr>
                 <td><?php echo $count; ?></td>
                 <td><?php echo $row['name_staff'] ?></td>
                 <td><?php echo $row_lname['lname_staff'] ?></td>
                 <td><?php echo $row['amount'] ?></td>
                 <td><?php echo $row['removal_amount'] ?></td>
                 <td><?php echo $row['payable'] ?></td>
                 <td><?php echo $row['currency'] ?></td>
                 <td><?php echo $row['rate'] ?></td>
                 <td><?php echo $row['date'] ?></td>
                 
                 <td class="print">
                     <div class="btn-group">
                         <a href="edit.php?salary_id=<?php echo $row['pay_id'] ?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                         <a href="delete.php?salary_id=<?php echo $row['pay_id'] ?>" class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
                     </div>
                 </td>
             </tr>
             <?php $count++; }?>
         </tbody>
         <tfoot>
     
         </tfoot>
         </table>
         <table style="width: 100%; text-align: center;">
          <tfoot style="background-color: rgb(44, 44, 44); color: white;">
            <tr>
                <th style="padding: 8px 20px;">
                
                <?php
                 $sum_of_salary = mysqli_query($connection, "SELECT SUM(salary_pay.amount/salary_pay.rate) as total_salary, sum(salary_pay.removal_amount/salary_pay.rate) as total_r from salary_pay");
                $row_t = mysqli_fetch_assoc($sum_of_salary);
                ?>
                مجموعه معاشات : 
                <?php
                  echo round($row_t['total_salary'],2) . ' $ ';
                ?>
                </th>
                <th style="padding: 8px 20px;">برداشت معاشات : 
                <?php
                  echo round($row_t['total_r'],2) . ' $ ';
                ?>
                </th>
                <th style="padding: 8px 20px;">باقی معاشات :
                <?php
                  echo round($row_t['total_salary'] - $row_t['total_r'],2) .' $ ';
                ?>
                 </th>
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