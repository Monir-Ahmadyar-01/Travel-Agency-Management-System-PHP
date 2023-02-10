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

<?php
if(isset($_POST['company_save'])) {
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$acc_num = $_POST['acc_num'];
$available = $_POST['available'];
// $logo = $_POST['co_logo'];
$date = $_POST['date'];
// upload the image 
$picUpload = $_FILES['co_logo']['name'];
$picSource = $_FILES['co_logo']['tmp_name'];
$picTarget = 'images/'.$_FILES['co_logo']['name'];
move_uploaded_file($picSource, $picTarget);

$insert_acc_com = mysqli_query($connection, "INSERT INTO `company_account` (`id`, `name`, `phone`, `email`, `account_number`, `valid_balance`, `logo`, `date`) VALUES (NULL, '$name', '$phone', '$email', '$acc_num', '$available', '$picUpload', '$date');");
if($insert_acc_com) {
  echo "<script>alert('اطلاعات به طور موفقیتانه ثبت شد')</script>";
} else {
  echo "<script>alert('خطا در ثبت اطلاعات')</script>";

}
}

?>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
      <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">ثبت حساب شرکتی</h3>
                </div>
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name">نام شرکت</label>
                      <input type="text" name="name" id="name" class="name form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">تیلیفون</label>
                      <input type="number" name="phone" id="phone" class="phone form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <div class="form-group">
                    <label for="email">ایمیل (اختیاری)</label>
                      <input type="email" name="email" id="email" class="email form-control"oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <div class="form-group">
                    <label for="acc_num"> شماره حساب </label>
                      <input type="number" name="acc_num" id="acc_num" class="acc_num form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                 </div>
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="available"> مقدار موجودی در حساب</label>
                      <input type="number" name="available" id="available" class="available form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <div class="form-group">
                    <label for="co_logo">لوگو</label>
                      <input type="file" name="co_logo" id="co_logo" class="co_logo form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <div class="form-group">
                    <label for="date">تاریخ</label>
                      <input type="date" value="<?php echo date('Y-m-d'); ?>" name="date" id="date" class="date form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div> -->
                 </div>
                 <!-- <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                 </div> -->
                </div>

                <div class="box-footer">
                  <button type="submit" name="company_save" class="btn btn-primary">ثبت معلومات</button>
                     </form>
                     <a href="company-acc-db.php" class="btn btn-success">لیست معلومات</a>
                     
                </div>
            </div>
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