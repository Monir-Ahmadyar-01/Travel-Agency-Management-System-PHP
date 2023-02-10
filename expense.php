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
  <!-- babakhani datepicker -->
  <link rel="stylesheet" href="dist/css/persian-datepicker-0.4.5.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" href="dist/css/bardasht.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <!-- persian data picker -->
  <link rel="stylesheet" href="dist/css/persian-datepicker.css">


  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
  <link rel="stylesheet" href="dist/css/myStyle.css">
</head>
<?php
// for saving the expenses
if(isset($_POST['save_exp'])) {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $amount = $_POST['amount'];
  $monetary_unit = $_POST['monetary_unit'];
  // $currency = $_POST['currency'];
  $quantity = $_POST['quantity'];
  $bill = $_POST['bill'];
  $date = $_POST['date'];
  $add_qxp_q = mysqli_query($connection, "INSERT INTO `expense` (`expence_id`, `expense`, `type`, `amount`, `currency`, `rate`, `bill_number`, `date`) VALUES (NULL, '$name', '$type', '$amount', '$monetary_unit', '$quantity', '$bill', '$date')");
  if($add_qxp_q) {
    echo "<script>alert('موفقیتانه اطاعات ثبت شد');</script>";
  } else {
    echo "<script>alert('ثبت اطاعات با خطا مواجه گردید');</script>";

  }
}

?>
<?php
  if(isset($_POST['save_ex_type'])) {
    $ex_type = $_POST['ex_type'];
    $ex_type_query = mysqli_query($connection, "INSERT INTO `expensetype` (`expensetype_id`, `type`) VALUES (NULL, '$ex_type');");
    if($ex_type_query) {
      echo "<script>alert('نوعیت جدید با موفقیت ثبت گردید')</script>";
    } else {
      echo "<script>alert('خطا در افزودن نوعیت')</script>";

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
              <span>ثبت مصارف</span>
            </div>
          </div>
        </div>
      </div>

     <div class="row">
       <div class="col-md-12">
         <form action="#" method="POST" style="padding: 12px;" class="needs-validation">
           <div class="row">
             <!-- first col -->
             <div class="col-md-4">
              <div class="form-group">
                <label for="name">نام مصرف</label>
                <input type="text" class="form-control" id="name" placeholder="نام مصرف" name="name" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
              </div>
              <div class="form-group">
                <label for="type">نوعیت</label> <br>
                <select name="type" name="type" id="type" class="form-control" style="height: 40px;">
                      <?php 
                          $show_ex_type_query =  mysqli_query($connection,"select * from expensetype");
                          while($row = mysqli_fetch_assoc($show_ex_type_query)){

                        ?>
                          <option value="<?php echo $row["expensetype_id"]; ?>"><?php echo $row["type"]; ?></option>
                        <?php
                          }
                        ?>
                      </select>
              </div>
   
            </div>

            <!-- second col -->
            <div class="col-md-4">
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
            </div>
            <!-- third col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="bill">نمبر بل</label>
                <input type="number" class="form-control" id="bill" placeholder="نمبر بل" name="bill" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
              </div>
   
              <div class="form-group">
                <label for="date">تاریخ</label>
                <input type="date" class="form-control date" id="date" name="date" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" value="<?php echo date('Y-m-d'); ?>">
              </div>
            
            </div>
           </div>

           <!-- button col -->
           <div class="row">
             <div class="col-md-9" style="padding: 4px 20px;">
                <button type="submit" name="save_exp" class="btn btn-primary saveBtn" type="button" style="width: 43%;">ذخیره شود</button>
                <button style="width: 43%; margin-right:25px" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">افزودن نوعیت جدید</button>
             </div>
             <div class="col-md-3" style="padding: 4px 20px; text-align: center;">
                  <a href="registered_expenses.php" style="color: white; width: 100%;" type="button" class="btn btn-success">
                  جدول مصارف ثبت شده</a>
            </div>
           </div>
         </form>
       </div>
     </div>
   </section>
    <!-- modal for type of expense -->
    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" > ثبت نوعیت جدید</h4>
                            </div>
                            <div class="modal-body">
                            
                              <form action="#" method="post" class="needs-validation">
                                  <div class="form-group">
                                      <label for="co_name"> نوعیت </label>
                                      <input type="text" name="ex_type" id="ex_type" class="ex_type form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">خروج</button>
                                    <button type="submit" name="save_ex_type" class="btn btn-primary">ذخیره</button>
                                </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->


  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- persian datepicker -->
  <script src="dist/js/persian-datepicker.js"></script>

  <!-- query code for datepicker-->
  <script>
    $(document).ready(() => {
            $('#date-man').datepicker({
                changeMonth: true,
                changeYear: true
            });
        });

    // Disable form submissions if there are invalid fields
    (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
  </script>
  <script src="dist/js/script.js"></script>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>