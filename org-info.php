<?php
include 'database.php';
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
  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
</head>
<?php
if(isset($_POST['save_org_info']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['add'];
    // $logo = $_POST['logo'];
    $backup = mysqli_real_escape_string($connection, $_POST['backup']);
    
    $slogan = $_POST['slogan'];
    $website = $_POST['website'];
     // for upload the image
  $picUpload = $_FILES['logo']['name'];
  $picSource = $_FILES['logo']['tmp_name'];
  $picTarget = 'images/'.$_FILES['logo']['name'];
  move_uploaded_file($picSource, $picTarget);
    $add_info_query = mysqli_query($connection, "UPDATE `info` set `logo` = '$picUpload' , `persion_name` = '$name', `phone` = '$phone', `email` = '$email', `address` = '$address', `backup_address` = '$backup', `slogan`= '$slogan', `website` = '$website' where `info_id` = '1';");

    if($add_info_query) {
		echo "<script>alert('موفقیت در ثبت اطلاعات');</script>";
	  } else {
		echo "<script>alert('خطا در ثبت اطلاعات');</script>";

	  }

}
?>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">ثبت معلومات شرکت</h3>
        </div>
        <div class="box-body">
        <?php 
        $show_info_query = mysqli_query($connection, "SELECT * FROM `info` WHERE 1");
        $row = mysqli_fetch_assoc($show_info_query); 
        
        ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="name">عنوان شرکت</label>
                        <input type="text" name="name" id="name" class="name form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row['persion_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">نمبر تماس </label>
                        <input type="text" name="phone" id="phone" class="phone form-control" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">ایمیل  </label>
                        <input type="email" name="email" id="email" class="email form-control" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">آدرس </label>
                        <input type="text" name="add" id="add" class="add form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['address'] ?>">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="logo">نماد شرکت </label>
                        <input type="file" name="logo" id="log" class="logo form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                    </div>
                    <div class="form-group">
                        <label for="backup"> آدرس نسخه پشتیبان </label>
                        <input type="text" name="backup" id="backup" class="backup form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['backup_address'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="slogan"> شعار </label>
                        <input type="text" name="slogan" id="slogan" class="slogan form-control" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['slogan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="website"> وبسایت </label>
                        <input type="text" name="website" id="website" class="website form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['website'] ?>">
                    </div>
                </div>
            </div>
            <div class="box-footer col-md-4">
                <button type="submit" name="save_org_info" class="btn btn-primary btn-block">برور رسانی معلومات</button>
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
  <!-- <script src="dist/js/form-valiate.js"></script> -->

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>