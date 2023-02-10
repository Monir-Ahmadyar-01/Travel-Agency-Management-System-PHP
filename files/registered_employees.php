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
  <title>لیست کارمندان  | کنترل پنل</title>
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
                 <span>لیست کارمندان</span>
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
                  <a href="employee.php" class="btn btn-primary" title="افزودن کارمند جدید"><span class="fa fa-user-plus"></span></a>
                  <button class="btn btn-success" title="تبدیل به اکسل"><span class="fa fa-file-excel-o"></span></button>
                  <a href="employee.php" class="btn btn-dark" title="برگشت"><span class="fa fa-arrow-left"></span></a>
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
                <th>تیلفون</th>
                <th>ایمیل</th>
                <th>نمبر تذکره</th>
                <th>آدرس</th>
                <th>ساحه کاری</th>
                <th>نوعیت کاری</th>
                <th>معاش</th>
                <th>واحد پولی</th>
                <th>نمبر ثبت کارمند</th>
                <th>تاریخ</th>
                <th class="print"> عملیات</th>
              </tr>
            </thead>
            <tbody>
            <?php
        $show_emp_qery = mysqli_query($connection, "select *,(select currency from currency where currency.currency_id = staff.currency) as currency_name from staff");
            $count = 1;
            while($row= mysqli_fetch_assoc($show_emp_qery)) {
            
            ?>
              <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['lname'] ?></td>
                  <td><?php echo $row['phone'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['tazkera_number'] ?></td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['job_area'] ?></td>
                  <td><?php echo $row['job_type'] ?></td>
                  <td><?php echo $row['salary'] ?></td>
                  <td><?php echo $row['currency_name'] ?></td>
                  <td><?php echo $row['staff_reg_no'] ?></td>
                  <td><?php echo $row['date'] ?></td>
                  <td class="print">
                      <div class="btn-group">
                          <a href="edit.php?edit_emp=<?php echo $row['staff_id']?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                          <a href="delete.php?remove_emp=<?php echo $row['staff_id']?>" onclick="confirm('آیا برای حذف اطلاعات مطمین هستید؟')"  class="btn btn-danger btn-sm" class="btn btn-danger btn-sm"><span class="fa fa-remove"></span></a>
                      </div>
                  </td>
              </tr>
            <?php
            $count++;
          } ?>
          </tbody>
          <tfoot>
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