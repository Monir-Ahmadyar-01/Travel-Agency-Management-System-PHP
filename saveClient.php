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
</head>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
     <div class="row">
       <div class="col-12">
         <div class="titleBody">
         <div class="title">
           <img src="images/passport.png" alt="">
           <span >ثبت مشتری</span>
         </div>
        </div>
       </div>
     </div>

   <div class="row">
     <div class="col-md-12">
       <form action="#" method="post">
         <div class="row">
           <!--
             fist column of form
           -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="name">نام</label>
              <input type="text" class="form-control" id="nmae" placeholder="نام">
            </div>
            <div class="form-group">
              <label for="fName">ولد</label>
              <input type="text" class="form-control" id="fName" placeholder="ولد">
            </div>
            <div class="form-group">
              <label for="family">تخلص</label>
              <input type="text" class="form-control" id="family" placeholder="تخلص">
            </div>

          </div>
            <!--
             secon column of form
           -->
           <div class="col-md-4">
            <div class="form-group">
              <label for="phone">مبایل</label>
              <input type="number" class="form-control" id="phone" placeholder="مبایل">
            </div>
            <div class="form-group">
              <label for="emaol">ایمیل</label>
              <input type="email" class="form-control" id="email" placeholder="ایمیل">
            </div>
            <div class="form-group">
              <label for="tazkera">نمبر تذکره</label>
              <input type="number" class="form-control" id="tazkera" placeholder="نمبر تذکره">
            </div>
            
            

            
            
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="date">تاریخ</label>
              <input type="number" class="form-control" id="date" placeholder="تاریخ">
            </div>

            <div class="form-group">
              <label for="address">آدرس</label>
              <input type="text" class="form-control" id="address" placeholder="آدرس" 
              style="height:104px ;">
            </div>
          </div>

          
        </div>
        <div class="row">
          
          <div class="col-12" style="padding: 4px 20px;">
            <button type="submit"  class="btn btn-primary saveBtn" type="button">ذخیره شود</button>
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

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>