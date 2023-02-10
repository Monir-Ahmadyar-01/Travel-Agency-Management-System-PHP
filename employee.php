<?php 
  include("database.php");
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
  <!-- persian datepicker -->
  <!-- <link rel="stylesheet" href="dist/css/myStyle.css"> -->
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
  <link rel="stylesheet" href="dist/css/myStyle.css">
  <link rel="stylesheet" href="dist/css/persian-datepicker.css">
</head>
<?php 
  if(isset($_POST["emp_submit_btn"])){
        
    $emp_name = $_POST["emp_name"];
    $lName = $_POST["lName"];
    $phone = $_POST["phone"];
    $emailAddress = $_POST["emailAddress"];
    $identity = $_POST["identity"];
    $workPlace = $_POST["workPlace"];
    $workType = $_POST["workType"];
    $salary = $_POST["salary"];
    $currency = $_POST["currency"];
    $registeredNumber = $_POST["registeredNumber"];
    $date = $_POST["date"];
    $address = $_POST["address"];

    $sql_query_001 = mysqli_query($connection,"INSERT INTO `staff` (`staff_id`, `name`, `lname`, `phone`, `email`, `tazkera_number`, `job_area`, `job_type`, `salary`, `currency`, `staff_reg_no`, `address`, `date`) VALUES (NULL, '$emp_name', '$lName', '$phone', '$emailAddress', '$identity', '$workPlace', '$workType', '$salary', '$currency', '$registeredNumber', '$address', '$date');");

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
      <div class="row" style="text-align: center;">
        <div class="col-12">
          <div class="titlebody">
            <div class="title">
              <span>ثبت کارمند جدید</span>
            </div>
          </div>
        </div>
      </div>

     <div class="row">
       <div class="col-md-12">
         <form action="" method="POST" id="emp-submit-form" style="padding: 12px;">
           <div class="row">
             <!-- first col -->
             <div class="col-md-4">
              <div class="form-group">
                <label for="name">نام کارمند</label>
                <input type="text" class="form-control" id="name" name="emp_name" >
              </div>
              <div class="form-group">
                <label for="lName">تخلص کارمند</label> <br>
                <input type="text" class="form-control" id="lName" name="lName"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" >
              </div>
              <div class="form-group">
                <label for="phone">تیلفون</label>
                <input type="number" class="form-control" id="phone" name="phone" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" >
              </div>
              <div class="form-group">
                <label for="emailAddress">ایمیل</label> <br>
                <input type="email" class="form-control" id="emailAddress" name="emailAddress" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" >
              </div>
   
            </div>

            <!-- second col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="identity">نمبر تذکره</label>
                <input type="number" class="form-control" id="identity" name="identity" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" >
              </div>
              <div class="form-group">
                <label for="workPlace">ساحه کاری</label>
                <input type="text" class="form-control" id="workPlace" name="workPlace"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" >
              </div>
              <div class="form-group">
                <label for="workType">نوعیت کاری</label>
                <input type="text" class="form-control" id="workType" name="workType">
              </div>
              <div class="form-group" style="position: relative;">
                      <label for="salarys">معاش: </label>
                      
                      <select name="currency" id="monetary_unit">
                        <?php 
                          $show_currency_query =  mysqli_query($connection,"select * from currency");
                          while($row = mysqli_fetch_assoc($show_currency_query)){

                        ?>
                          <option value="<?php echo $row["currency_id"]; ?>"><?php echo $row["currency"]; ?></option>
                        <?php
                          }
                        ?>
                      </select>
                      <input type="number" class="form-control" name="salary" id="salary" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                </div>
            </div>

            <!-- third col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="registeredNumber">نمبر ثبت کارمند</label>
                <input type="number" class="form-control" id="registeredNumber" name="registeredNumber" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" >
              </div>
              <div class="form-group">
                <label for="date-man">تاریخ</label>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control " name="date" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" >
              </div>
              <div class="form-group">
                <label for="address">آدرس</label>
                <textarea class="form-control" rows="4" id="address" name="address"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" ></textarea>
              </div>
            </div>
           </div>

           <!-- button col -->
           <div class="row">
             <div class="col-md-9 " style="padding: 4px 20px;">
                <button type="submit" class="btn btn-primary saveBtn" name="emp_submit_btn" style="width: 100%;">ذخیره شود</button>
             </div>
             <div class="col-md-3" style="padding: 4px 20px; text-align: center;">
                  <a href="registered_employees.php" style="color: white; width: 100%;" type="button" class="btn btn-success">
                  جدول کارمندان ثبت شده</a>
            </div>
           </div>
           <div class="row col-sm-6"></div>
         </form>
       </div>
     </div>
   </section>

  <!--  JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- persian datepicker -->
  <script src="dist/js/persian-datepicker.js"></script>
  
  <script>
        // $(function(){
         

        //   $('#emp-submit-form').on('submit', function(){
        //         // alert('clicked');
        //         $.ajax({
        //           type: "POST",
        //           data:$(this).serialize(),
        //           url: "server.php",
        //           success: function(msg) {
        //             alert(msg);
                    
        //             // $('.answer').html(msg);
        //           }
        //         });
        //     });

        // });
    </script>
  <script>
    $(document).ready(() => {
            $('#date-man').datepicker({
                changeMonth: true,
                changeYear: true
            });
        });

        
</script>
  

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>