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
  if(isset($_POST["customer_save"])){
        
    $name = $_POST['name'];
    // $nick_name = $_POST['nick_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $co_name = $_POST['co_name'];
    $add = $_POST['add'];
    $date = $_POST['date'];

    $sql_query_001 = mysqli_query($connection,"INSERT INTO `customer` (`customer_id`, `full_name`, `phone`, `email`, `company_name`, `address`, `date`) VALUES (NULL, '$name', '$phone', '$email', '$co_name', '$add', '$date')");

    if($sql_query_001){
      echo "<script>alert('اطلاعات موفقانه ذخیره شد')</script>";
    }
    else{
      echo "<script>alert('  خطا در ذخیره اطلاعات ')</script>";
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
                    <h3 class="box-title">ثبت حساب مشتری</h3>
                </div>
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name">نام کامل</label>
                      <input type="text" name="name" id="name" class="name form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="nick_name">تخلص</label>
                      <input type="text" name="nick_name" id="nick_name" class="nick_name form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                  </div> -->
                  <div class="form-group">
                    <label for="phone">تیلیفون</label>
                      <input type="number" name="phone" id="phone" class="phone form-control" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <div class="form-group">
                    <label for="email">ایمیل</label>
                      <input type="email" name="email" id="email" class="email form-control"   >
                  </div>
                 </div>
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="co_name">نام شرکت</label>
                      <input type="text" name="co_name" id="co_name" class="co_name form-control"   >
                  </div>
                  <div class="form-group">
                    <label for="add">آدرس</label>
                      <textarea type="text" name="add" id="add" class="add form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="date">تاریخ</label>
                      <input value="<?php echo date('Y-m-d');?>" type="date" name="date" id="date" class="date form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
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
                  <button type="submit" name="customer_save" class="btn btn-primary">ثبت معلومات</button>
                     </form>
                     <a href="customers-acc-db.php" class="btn btn-success">لیست معلومات</a>
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