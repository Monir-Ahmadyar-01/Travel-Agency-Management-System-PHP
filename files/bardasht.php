<?php
include 'database.php';
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>برداشت شرکا</title>
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
  <link rel="stylesheet" href="dist/css/bardasht.css">
</head>
<?php

if(isset($_POST['save_take']))
{
$name = $_POST['name'];
$monetary_unit  = $_POST['monetary_unit'];
$amount  = $_POST['amount'];
$monetary_unit  = $_POST['monetary_unit'];
$quantity  = $_POST['quantity'];
$discerption  = $_POST['discerption'];
$date  = $_POST['date'];
$take_query = mysqli_query($connection, "INSERT INTO `take` (`take_id`, `shareholder`, `amount`, `currency`, `rate`, `description`, `date`) VALUES (NULL, '$name', '$amount', '$monetary_unit', '$quantity', '$discerption', '$date')");
if($take_query) {
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
        <div class="col-md-4"></div>
        <div class="col-md-4">
            
            <div class=" ">
                
                <!-- /.box-header -->
                <!-- form start -->
                <form action="" method="POST" class="frm needs-validation">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="dispInline">
                        <label for="name">نام:</label>
                      </div>
                      <div >
                         <select type="text" class="form-control" name="name" id="name" placeholder="نام" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                         <?php 
                          $show_currency_query =  mysqli_query($connection,"select * from shareholder");
                          while($row = mysqli_fetch_assoc($show_currency_query)){

                        ?>
                          <option value="<?php echo $row["shareholder_id"]; ?>"><?php echo $row["name"]; ?></option>
                        <?php
                          }
                        ?>
                         </select>
                      </div>
                      
                    </div>
                    <div class="form-group" style="position: relative;">
                      <label for="amount">مبلغ: </label>
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
                      <label for="date">تاریخ: </label>
                      <input type="date" class="form-control" name="date" id="date" placeholder="تاریخ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')"  required value="<?php echo date('Y-m-d');?>">
                    </div>
                      <div class="form-group">
                        <label for="discerption">توضیحات: </label>
                        <textarea type="text" class="form-control" name="discerption" id="discerption" placeholder="توضیحات" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required></textarea>
                      </div>
                   
                    
                  </div>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" name="save_take" class="btn btn-primary">برداشت</button>
                    <a href="bardasht_detail.php"><button type="button"  class="btn btn-success">لیست برداشت</button></a>
                  </div>
                </form>
              </div>
        </div>
        <div class="col-md-4"></div>
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