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
  <link rel="stylesheet" href="dist/css/myStyle.css">
  <link rel="stylesheet" href="dist/css/persian-datepicker.css">
</head>
<?php
if(isset($_POST['salary_save'])) {
  $name  = $_POST['name'];
  $payable  = $_POST['payable'];
  $amount  = $_POST['amount'];
  $removal_amount  = $_POST['removalAmount'];
  $detail  = $_POST['detail'];
  $date  = $_POST['date'];
  $add_salary = mysqli_query($connection, "INSERT INTO `salary_pay` (`pay_id`, `employee_id`, `payable`, `amount`, `removal_amount`, `detail`, `date`) VALUES (NULL, '$name', '$payable', '$amount', '$removal_amount', '$detail', '$date')");
  if($add_salary) {
    echo "<script>alert('ثبت اطلاعات موفقیت آمیز بود');</script>";
  } else {
    echo "<script>alert('خطا در ثبت اطلاعات');</script>";

  }
}
?>
<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
      <div class="row" style="text-align: center;">
        <div class="col-md-12">
          <div class="titlebody">
            <div class="title">
              <span>پرداخت معاش</span>
            </div>
          </div>
        </div>
      </div>

     <div class="row" style="display: flex; justify-content: center;">
       <div class="col-md-10 col-sm-12 col-xs-12" >
         <form action="#" method="POST" style="padding: 12px;" class="needs-validation">
           <div class="row">
             <!-- first col -->
             <div class="col-md-12">
              <div class="form-group">
                <label for="name">نام کارمند</label>
                <select name="name"id="name" class="form-control" style="height: 40px;">
                      <?php 
                          $show_emp_query =  mysqli_query($connection,"select * from staff");
                          while($row = mysqli_fetch_assoc($show_emp_query)){

                        ?>
                          <option value="<?php echo $row["staff_id"]; ?>"><?php echo $row["name"]; ?></option>
                        <?php
                          }
                        ?>
                      </select>
              </div>
              <div class="form-group">
                <label for="payable">مقدار قابل پرداخت</label>
                <input type="number" class="form-control" id="payable" name="payable" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
              </div>
              <div class="form-group">
                <label for="amount">مقدار معاش </label> <br>
                <input type="text" class="form-control" id="amount" name="amount" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
              </div>
              <div class="form-group">
                <label for="removalAmount">مقدار برداشت</label> <br>     
                <input type="number" class="form-control" id="removalAmount" name="removalAmount" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')">
            </div>
              <div class="form-group">
                <label for="detail">جزئیات</label>
                <textarea type="text" class="form-control " name="detail" id="detail" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required></textarea>
              </div>
              <div class="form-group">
                <label for="date">تاریخ</label>
                <input type="date" value="<?php echo  date('Y-m-d');?>" class="form-control " name="date" id="date" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
              </div>
   
            </div>

           
           <!-- button col -->
           <div class="row">
             <div class="col-md-9" style="padding: 4px 20px;">
                <button type="submit" name="salary_save" class="btn btn-primary saveBtn" type="button" style="width: 100%;">ذخیره شود</button>
             </div>
             <div class="col-md-3" style="padding: 4px 20px; text-align: center;">
                  <a href="registered_salaries.php" style="color: white; width: 100%;" type="button" class="btn btn-success">
                   معلومات ثبت شده</a>
            </div>
           </div>
         </form>
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
  <script src="dist/js/persian-datepicker.js"></script>

  <script>
    $(document).ready(() => {
            $('#date-man').datepicker({
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