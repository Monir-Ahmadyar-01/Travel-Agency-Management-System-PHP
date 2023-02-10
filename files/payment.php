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
  <link rel="stylesheet" href="dist/css/bardasht.css">

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
  <script src="dist/js/script.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
   <?php 
            $pass_id = 0;
            if(isset($_POST['save_payment'])) {
              $person = $_POST['person']; 
              //$curency = $_POST['monetary_unit']; 
              //$rate = $_POST['quantity']; 
              $amount = $_POST['amount']; 
              $detail = $_POST['detail']; 
              $currency = $_POST['monetary_unit']; 
              $rate = $_POST['quantity']; 
              $date = $_POST['date'];               
              $user_id = $_SESSION['user_id'];
          if(isset($_GET['company_id'])) {
            $id = $_GET['company_id'];
            $pass_id = $_GET['company_id'];
              $inser_payment = mysqli_query($connection, "INSERT INTO `payment` (`payment_id`, `user`,`person`, `company`, `sdetail`, `visa`, `supplier`, `totalprice`, `description`, `currency`, `rate`, `date`) VALUES (NULL, '$user_id','$person', '$id', NULL, NULL, NULL, '$amount', '$detail', '$currency', '$rate', '$date')");
              $sql_query_09 = mysqli_query($connection,"
                    select valid_balance from company_account where id='$id'
                 ");

                 $fetch_09 = mysqli_fetch_assoc($sql_query_09);
                 $db_company_valid_belance = $fetch_09["valid_balance"];
                 $new_belance = $db_company_valid_belance + ($amount/$rate);
                 
                 $sql_query_09 = mysqli_query($connection,"
                    update company_account set valid_balance='$new_belance'  where id='$id'
                 ");

              if($inser_payment) {
                echo "<script>alert('ثبت موفقانه اطلاعات')</script>";
              } else {
                echo "<script>alert('ثبت ناموفق اطلاعات')</script>";

              }
            }
            // part payment sale
            else if(isset($_GET['sale_id'])) {
              $sale_id = $_GET['sale_id'];
              $pass_id = $_GET['sale_id'];
                $inser_payment_2 = mysqli_query($connection, "INSERT INTO `payment` (`payment_id`, `user`,`person`, `company`, `sdetail`, `visa`, `supplier`, `totalprice`, `description`, `currency`, `rate`, `date`) VALUES (NULL, '$user_id','$person',NULL, '$sale_id', NULL, NULL, '$amount', '$detail', '$currency', '$rate', '$date')");
                
  
                if($inser_payment_2) {
                  echo "<script>alert('ثبت موفقانه اطلاعات')</script>";
                } else {
                  echo "<script>alert('ثبت ناموفق  اطلاعات')</script>";
  
                }
              }
              else{
                $visa_id = $_GET['visa_id'];
                $pass_id = $_GET['visa_id'];
                  $inser_payment_2 = mysqli_query($connection, "INSERT INTO `payment` (`payment_id`, `user`,`person`, `company`, `sdetail`, `visa`, `supplier`, `totalprice`, `description`, `currency`, `rate`, `date`) VALUES (NULL, '$user_id','$person',NULL, NULL, '$visa_id', NULL, '$amount', '$detail', '$currency', '$rate', '$date')");
                  
    
                  if($inser_payment_2) {
                    echo "<script>alert('ثبت موفقانه اطلاعات')</script>";
                  } else {
                    echo "<script>alert('ثبت ناموفق  اطلاعات')</script>";
    
                  }
                }
          }
                 ?>
                 <!-- modal for rasid -->
                 <div class="">
                        <div class="modal-dialog" style="border: 2px solid dodgerblue;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" > ثبت رسید جدید</h4>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post" class="needs-validation">
                                  <div class="form-group">
                                      <label for="id"> نام شخص</label>
                                      <input type="text" name="person" id="person" class="form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" >

                                  </div>
                                  
                                  <div class="form-group" style="position: relative;">
                                            <label for="monetary_unit">مبلغ: </label>
                                            <select name="monetary_unit" name="monetary_unit" id="monetary_unit" onchange="exchaneg();">
                                            <?php 
                                                $show_currency_query =  mysqli_query($connection,"select * from currency");
                                                while($row = mysqli_fetch_assoc($show_currency_query)){

                                              ?>
                                                <option value="<?php echo $row["currency_id"]; ?>"><?php echo $row["currency"]; ?></option>
                                              <?php
                                                }
                                              ?>
                                            </select>
                                            <input type="number" class="form-control" name="amount" id="amount" placeholder="مبلغ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="quantity">نرخ:</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="نرخ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                                          </div>
                                  
                                  <div class="form-group">
                                      <label for="detail">  توضیحات</label>
                                      <textarea name="detail" id="detail" class="detail form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="date">تاریخ </label>
                                      <input type="date" name="date" id="date" class="date form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" value="<?php echo date('Y-m-d'); ?>">
                                  </div>
                                 </div>
                                  
                                </div>
                                <div class="modal-footer">                                    
                                    <button type="submit" name="save_payment" class="btn btn-primary" data-dismiss="modal">ذخیره</button>
                                    <?php
                                      if(isset($_GET['company_id'])) {
                                    ?>
                                    <a href="payment-db.php?company_id=<?php  echo $_GET['company_id']; ?>" class="btn btn-success">لیست رسید ها</a>
                                      
                                    <?php
                                      }
                                      else if(isset($_GET['sale_id'])) {
                                    ?>
                                      <a href="payment-db.php?sale_id=<?php  echo $_GET['sale_id']; ?>" class="btn btn-success">لیست رسید ها</a>
                                    <?php
                                      }
                                      else{
                                    ?>
                                        <a href="payment-db.php?visa_id=<?php  echo $_GET['visa_id']; ?>" class="btn btn-success">لیست رسید ها</a>
                                    <?php
                                      }                                    
                                    ?>
                                </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

 
   

  </section>

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    $(function(){
      exchaneg();
    });
  </script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>