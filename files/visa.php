<?php
include 'database.php';
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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
  <link rel="stylesheet" href="dist/css/visaStyle.css">
</head>
<?php
if(isset($_POST['save_visa']))
{
  // for adding the visa main info
  $name = $_POST['name'];
  $visa = $_POST['visa'];
  $type = $_POST['type'];
  $p_o_issue = $_POST['p_o_issue'];
  $date = $_POST['date'];
  $add_visa_query = mysqli_query($connection, "INSERT INTO `visa` (`visa_id`, `customer`, `visa_name`, `type`, `place of issue`, `date`) VALUES (NULL, '$name', '$visa', '$type', '$p_o_issue', '$date')");
  if($add_visa_query) {
    echo "<script>alert('موفقیت در ثبت اطلاعات');</script>";
  } else {
    echo "<script>alert('خطا در ثبت اطلاعات');</script>";

  }
}
if(isset($_POST['save_detaik'])) {
  $visa_id  = $_POST['visa_id'];
  $d_o_req  = $_POST['dOfReq'];
  $d_o_issue  = $_POST['d_o_issue'];
  $date  = $_POST['date'];
  $price  = $_POST['price'];
  $comission  = $_POST['comission'];
  $recieved  = $_POST['recieved']; 
  $currency = $_POST['monetary_unit'];
  $rate = $_POST['quantity'];
  $due  = $_POST['due'];
  $add_detail_query = mysqli_query($connection, "INSERT INTO `visa_detail` (`vdetail_id`, `visa_id`, `D/of_request`, `D/of_issue`, `comision`, `price`, `currency`, `rate`, `recieved`, `date`) VALUES (NULL, '$visa_id', '$d_o_req', '$d_o_issue', '$comission', '$price', '$currency', '$rate', '$recieved', '$date')");

  if($add_detail_query) {
    echo "<script>alert('موفقیت در ثبت جزئیات ویزا');</script>";
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
           <span class="fa fa-cc-visa" style="font-size: 30px; "></span>
          
         </div>
        </div>
       </div>
     </div>
     

   <div class="row">
     <div class="col-md-12">
       <form action="" method="POST" class="needs-validation">
         <div class="row">
           <!--
             fist column of form
           -->
           <div class="col-sm-4">
  
            <!-- <div class="form-group">
              <label for="fName">F/Name:</label>
              <input type="text" class="form-control" id="fName" placeholder="father name"  maxlength = "15" minlength = "4" pattern = "^[a-zA-Zا-ی_]+$" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
            </div> -->


          </div>
            <!--
             secon column of form
           -->
           <div class="col-sm-4">
           <div class="form-group">
              <label for="name">Name:</label>
              <select style="height: 40px;" type="text" class="form-control " id="name" name="name" placeholder="name"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
            <?php
            $row_cs_query = mysqli_query($connection, "SELECT * FROM customer");
            while($row = mysqli_fetch_assoc($row_cs_query)) {
              ?>
              <option value="<?php echo $row['customer_id'] ?>"> <?php echo $row['name'] ?> <?php echo $row['lname'] ?> </option>
              <?php
            }
            ?>
            </select>
            </div>
            <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" class="form-control" name="type" id="type" placeholder="type"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
            </div>
            <div class="form-group">
              <label for="visa">Visa:</label>
              <input type="text" class="form-control" name="visa" id="visa" placeholder="visa"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
            </div>
            <div class="form-group">
                <label for="issuePlace">Place Of Issue:</label>
                <input type="text" class="form-control" name="p_o_issue" id="p_o_issue" placeholder="place of issue"   oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
              </div>    
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="place of issue"   oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo date('Y-m-d');?>">
              </div>    

              <div class="form-group">

              <button type="submit" name="save_visa" class="form-control btn btn-success saveBtn">Save</button>
      </form>
               
                <a href="visa_detail.php" type="button" id="add_det_btn" class="form-control btn btn-primary" style="margin-top: 10px;"><span class="fa fa-plus" style="margin-right: 20px;"></span>Add visa detail</a>
               </div>      
            
          </div>
          <!--third column of form-->
          <div class="col-sm-4">
            
 
            
              </div>          
            </div>        
         </div>      
     </div>
   </div>
             <!-- modal for detail -->
             <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" > ثبت جزئیات</h4>
                            </div>
                            <div class="modal-body">
                        
                            </div>
                                <div class="modal-footer">
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
  <script src="dist/js/script.js"></script>
  <!-- Select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
      $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
                          });
    </script>
  
</body>

</html>