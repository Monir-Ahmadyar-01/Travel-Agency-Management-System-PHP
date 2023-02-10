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
  <link rel="stylesheet" href="dist/css/custom-style.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

 
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
</head>
<?php 

if(isset($_POST['save_user'])) {
  $name  = $_POST['name'];
  $username  = $_POST['username'];
  $authority  = $_POST['authority'];
  $password  = $_POST['password'];
  // for upload the image
  $picUpload = $_FILES['photo']['name'];
  $picSource = $_FILES['photo']['tmp_name'];
  $picTarget = 'images/'.$_FILES['photo']['name'];
  move_uploaded_file($picSource, $picTarget);

  $add_user = mysqli_query($connection, "INSERT INTO `user` (`user_id`, `full_name`, `username`, `password`, `authority`, `photo`) VALUES (NULL, '$name', '$username', '$password', '$authority', '$picUpload');");
  if($add_user) {
    echo "<script>alert('معلومات موفقانه ثبت گردید')</script>";
  } else {
    echo "<script>alert('خطا در ثبت معلومات')</script>";

  }
}

?>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
    <div class="container">
        <div class="row" style="display: flex; justify-content: center;"> 
            <div class="col-md-6 mx-auto" style="margin:0 auto;">
                 <!-- general form elements -->
                 <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title"> ثبت کاربر جدید</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data" class="needs-validation">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">نام و تخلص</label>
                          <input type="text" class="form-control" name="name" id="name" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">نام کاربری  </label>
                          <input type="text" class="form-control" name="username" id="username" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">صلاحیت</label>
                          <select type="text" class="form-control" name="authority" id="authority" style="height: 34px;" required>
                            <option value="50">صلاحیت نیمه</option>
                            <option value="100">مکمل</option>
                          </select>
                        </div>
                        <div class="input-group">
                          <label for="password">پسورد</label>
                          <br>
                          <input type="password" name="password" id="password" class="password form-control"  required>
                          <span onclick="showPass();" class="input-group-addon ps-shower" style="cursor: pointer; height: 20px !important;"><i class="fa fa-eye"></i></span>
                        </div>
                        <script>
                          function showPass() 
                          {
                            var input = document.getElementById('password');
                            if(input.type == 'password') {
                              input.type = 'text';
                            } else {
                              input.type = 'password';
                            }
                          }

                         
                        </script>
                        <div class="form-group">
                          <label for="photo">تصویر کاربر </label>
                          <input type="file" name="photo" id="photo" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
      
                          <p class="help-block"> فایل باید با فرمت jpg, png , jpeg باشد و سایز عکس از 2 mb زیاد نباشد </p>
                        </div>
                      </div>
                      <!-- /.box-body -->
      
                      <div class="box-footer">
                        <button type="submit" name="save_user" class="btn btn-primary">ارسال</button>
                        <a href="user-db.php" class="btn btn-success">لیست کاربران</a>
                        
                      </div>
                    </form>
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