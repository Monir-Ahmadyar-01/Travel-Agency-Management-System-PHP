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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.css"> 
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="dist/css/visaStyle.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
  
</head>
<?php
if(isset($_POST['save_detail'])) {
  $customer_name  = $_POST['customer_name'];
  $fName  = $_POST['fName'];
  $dOfReq  = $_POST['dOfReq'];
  $dOfissue  = $_POST['dOfissue'];
  $type  = $_POST['type'];
  $visa  = $_POST['visa'];
  $issuePlace  = $_POST['issuePlace'];
  $price  = $_POST['price'];
  $comation  = $_POST['comation'];
  $recived  = $_POST['recived'];
  $monetary_unit  = $_POST['monetary_unit'];
  $rate  = $_POST['rate'];
  $date  = $_POST['date'];
  $user = $_SESSION['user_id'];
  
  $sql_query_01 = mysqli_query($connection,"
    select count(customer_id) as num_cus_id from customer where customer_id ='$customer_name'
  ");
  $fetch_01 = mysqli_fetch_assoc($sql_query_01);

  if($fetch_01["num_cus_id"] == 0){
    $sql_query_02 = mysqli_query($connection,"
    INSERT INTO `customer` (`customer_id`, `full_name`, `phone`, `email`, `company_name`, `address`, `date`) VALUES (NULL, '$customer_name', '', '', '', '', '')
    ");

    $sql_query_03 = mysqli_query($connection,"
      select customer_id from customer order by customer_id DESC limit 1
    ");
    $fetch_03 = mysqli_fetch_assoc($sql_query_03);
    $customer_id_db = $fetch_03["customer_id"];

    $sql_query_04 = mysqli_query($connection,"
    INSERT INTO `visa` (`visa_id`, `customer`, `visa_name`, `type`, `place_of_issue`, `date`) VALUES (NULL, '$customer_id_db', '$visa', '$type', '$issuePlace', '$date')
    ");

    if($sql_query_04){
      $sql_query_05 = mysqli_query($connection,"
        select visa_id from visa order by visa_id DESC limit 1
      ");
      $fetch_05 = mysqli_fetch_assoc($sql_query_05);
      $visa_id_db = $fetch_05["visa_id"];

      $sql_query_06 = mysqli_query($connection,"
      INSERT INTO `visa_detail` (`vdetail_id`, `visa_id`, `full_name`, `D_of_request`, `D_of_issue`, `comision`, `price`, `currency`, `rate`, `recieved`) VALUES (NULL, '$visa_id_db', '$fName', '$dOfReq', '$dOfissue', '$comation', '$price', '$monetary_unit', '$rate', '$recived')
      ");

      if($sql_query_06) {
        echo "<script>alert('موفقیت در ثبت جزئیات ویزا');</script>";
      } else {
        echo "<script>alert('خطا در ثبت اطلاعات');</script>";
      }

    }

  }
  else
  {
  
    $sql_query_04 = mysqli_query($connection,"
    INSERT INTO `visa` (`visa_id`, `customer`, `visa_name`, `type`, `place_of_issue`, `date`) VALUES (NULL, '$customer_name', '$visa', '$type', '$issuePlace', '$date')
    ");

    if($sql_query_04){
      $sql_query_05 = mysqli_query($connection,"
        select visa_id from visa order by visa_id DESC limit 1
      ");
      $fetch_05 = mysqli_fetch_assoc($sql_query_05);
      $visa_id_db = $fetch_05["visa_id"];

      $sql_query_06 = mysqli_query($connection,"
      INSERT INTO `visa_detail` (`vdetail_id`, `visa_id`,`full_name`, `D_of_request`, `D_of_issue`, `comision`, `price`, `currency`, `rate`, `recieved`) VALUES (NULL, '$visa_id_db', '$fName',  '$dOfReq', '$dOfissue', '$comation', '$price', '$monetary_unit', '$rate', '$recived')
      ");

      $inser_payment = mysqli_query($connection, "INSERT INTO `payment` (`payment_id`, `user`,`person`, `company`, `sdetail`, `visa`, `supplier`, `totalprice`, `description`, `currency`, `rate`, `date`) VALUES (NULL, '$user','$fName',NULL, NULL, '$visa_id_db', NULL, '$recived', 'رسید ویزه', '$monetary_unit', '$rate', '$date')");


      if($sql_query_06) {
        echo "<script>alert('موفقیت در ثبت جزئیات ویزا');</script>";
      } else {
        echo "<script>alert('خطا در ثبت اطلاعات');</script>";
      }

    }

  }
  
}
?>

<body class="hold-transition skin-blue sidebar-mini">
   <!-- Main content -->
   <section class="content container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="titleBody">
        <div class="box-title">
          <span class="fa fa-cc-visa" style="font-size: 30px; "> Visa registeration</span>
         
        </div>
       </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12">
      <form action="" method="post" class="needs-validation">
        <div class="row">
          <!--
            fist column of form
          -->
          <div class="col-sm-4">
           <div class="form-group">
             <label for="name">Customer:</label>
             <input list="customer_list" type="text" class="form-control " name="customer_name" id="nmae" placeholder="name"    oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
           </div>
           <datalist name="customer_list" id="customer_list">
           <?php
                $row_cs_query = mysqli_query($connection, "SELECT * FROM customer");
                while($row = mysqli_fetch_assoc($row_cs_query)) {
                  ?>
                  <option value="<?php echo $row['customer_id'] ?>"> <?php echo $row['full_name'] ?> </option>
                  <?php
                }
                ?>           
           
           </datalist>
           <div class="form-group">
             <label for="fName">Full Name:</label>
             <input type="text" class="form-control" name="fName" id="fName" placeholder="full name"    oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
           </div>
           <div class="form-group">
             <label for="dOfReq">D/of REQ:</label>
             <input type="date" class="form-control" name="dOfReq" id="dOfReq" placeholder="D/of REQ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
           </div>
           <div class="form-group">
               <label for="phone">D/of Issue:</label>
               <input type="date" class="form-control" name="dOfissue" id="dOfissue" placeholder="" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
             </div>

         </div>
           <!--
            secon column of form
          -->
          <div class="col-sm-4">
           
           <div class="form-group">
             <label for="type">Type:</label>
             <input type="text" class="form-control" name="type" id="type" placeholder="type"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
           </div>
           <div class="form-group">
             <label for="visa">Visa Duration:</label>
             <input type="text" class="form-control" name="visa" id="visa" placeholder="visa"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
           </div>
           <div class="form-group">
               <label for="issuePlace">Place Of Issue:</label>
               <input type="text" class="form-control" name="issuePlace" id="issuePlace" placeholder="place of issue"    oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
             </div>
           
             <div class="form-group" style="position: relative;" >
               <label for="price">Price:</label>
               <input  type="number" class="form-control" name="price" id="price" placeholder="price" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
               
             </div>
           
           
         </div>
         <!--third column of form-->
         <div class="col-sm-4">
           

             <div class="form-group">
               <label for="comission">Com:</label>
               <input type="number" class="form-control" name="comation" id="comation" placeholder="comission" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
             </div>
             <div class="form-group">
               <label for="total">Total:</label>
               <input type="number" class="form-control" name="total" id="total" placeholder="total" readonly>
             </div>

             <div class="form-group" style="position: relative;">
               <label for="recived">Recived:</label>
               <input type="number" class="form-control" name="recived" id="recived" placeholder="recived" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
               <input type="number" readonly id="quantity" class="rate" name="rate" placeholder="نرخ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
               <select name="monetary_unit" id="monetary_unit" onchange="exchaneg();calc_total();" require>
                <?php
                $row_cs_query = mysqli_query($connection, "SELECT * FROM currency");
                while($row = mysqli_fetch_assoc($row_cs_query)) {
                  ?>
                  <option value="<?php echo $row['currency_id'] ?>"> <?php echo $row['currency'] ?> </option>
                  <?php
                }
                ?>
                </select>
             </div>

             <div class="form-group">
               <label for="due">Remain:</label>
               <input type="number" class="form-control" name="remain" id="remain" placeholder="remain" readonly >
             </div>
             <div class="form-group">
               <label for="due">Date:</label>
               <input type="date" value="<?php echo date('Y-m-d') ?>" class="form-control" name="date" id="date"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
             </div>

             
             <div class="">
               <!-- <BR></BR> -->
               <br>
               <br>
               <input type="submit" class="form-control btn btn-primary " name="save_detail"  value="SAVE" style="float: right;">
               <br>
               <br>
               <a href="visaView.php" class="form-control btn btn-success ">View Visa list</a>
              </div>
           
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
  <!-- Select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
      $('#price').keyup(function() {
        calc_total();
      });
      $('#comation').keyup(function() {
        calc_total();
      });
      $('#recived').keyup(function() {
        calc_total();
        });
        

      function calc_total() {
        $('#total').val(parseFloat($('#price').val()) + parseFloat($('#comation').val()));
        $('#total').val(parseFloat($('#price').val()) + parseFloat($('#comation').val()));
        $("#remain").val(parseFloat($("#total").val()) - ((parseFloat($("#recived").val()) / parseFloat($('#quantity').val()))).toFixed(3));



      }
      calc_total();

    </script>
  
</body>

</html>