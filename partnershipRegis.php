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



  <!-- Google Font -->
  <link rel="stylesheet" 
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
  <link rel="stylesheet" href="dist/css/myStyle.css">
  

</head>
<?php
if(isset($_POST['save_stakeholder'])) {
$name = $_POST['name'];
$family = $_POST['family'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$tazkera = $_POST['tazkera'];
$date = $_POST['partnership_date'];
$percentage = $_POST['percent'];

// upload the image 
$picUpload = $_FILES['photo']['name'];
$picSource = $_FILES['photo']['tmp_name'];
$picTarget = 'images/'.$_FILES['photo']['name'];
move_uploaded_file($picSource, $picTarget);
$add_query = mysqli_query($connection, "INSERT INTO `shareholder` (`shareholder_id`, `name`, `lname`, `phone`, `email`, `identity`, `percentage`, `photo`, `date`) VALUES (NULL, '$name', '$family', '$phone', '$email', '$tazkera', '$percentage', '$picUpload', '$date');");
if($add_query) {
  echo "<script>alert('موفقیت در ثبت اطلاعات');</script>";
} else {
  echo "<script>alert('خطا در ثبت اطلاعات');</script>";
}

}
?>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
     <div class="row">
       <div class="col-12">
         <div class="titleBody">
         <div class="title">
           <img src="images/registration.png" alt="">
           <span >ثبت شرکا</span>
         </div>
        </div>
       </div>
     </div>

   <div class="row">
     <div class="col-md-12">
       <form action="#" method="post" enctype="multipart/form-data" class="needs-validation">
         <div class="row">
           <!--
             fist column of form
           -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="name">نام:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="نام"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
            </div>
            <div class="form-group">
              <label for="family">تخلص:</label>
              <input type="text" class="form-control" id="family" name="family" placeholder="تخلص" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
            </div>
 <div class="form-group">
              <label for="phone">مبایل:</label>
              <input type="number" name="phone" class="form-control" id="phone" placeholder="مبایل"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
            </div>
          </div>
            <!--
             secon column of form
           -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="email">ایمیل:</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="ایمیل"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
            </div>
            <div class="form-group">
              <label for="tazkera">نمبر تذکره:</label>
              <input type="number" name="tazkera" class="form-control" id="tazkera" placeholder="نمبر تذکره" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
            </div>
            
            <div class="form-group">
              <label for="partnership_date"> تاریخ شراکت:</label>
              <input type="date" name="partnership_date" class="form-control" id="partnership_date" placeholder="تاریخ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo date('Y-m-d'); ?>">
            </div>

            
            
          </div>
          <div class="col-md-4">
            

            <div class="form-group">
              <label for="percent">فیصدی شراکت:</label>
              <input type="number" name="percent" class="form-control" id="percent" placeholder="فیصدی شراکت" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
            </div>

            <div class="form-group">
                <label for="percent">تصویر شریک:</label>
                <input type="file" name="photo" class="form-control" id="photo" placeholder=" تصویر شریک" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
              </div>
          </div>

          
        </div>
        <div class="row">
           
               
              
          
          <div class="col-12" style="padding: 4px 20px;">
            <button  style="margin-right: 16px;" name="save_stakeholder"   class="btn btn-primary saveBtn" type="submit">ذخیره شود</button>
            <a href="balace_partnerships.php" type="button"  class="btn btn-success saveBtn" type="button">  بیلانس شرکا</a>
            <style>
                
            </style>
          </div>
        </div>
      </form>
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
  <script src="dist/js/script.js"></script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>