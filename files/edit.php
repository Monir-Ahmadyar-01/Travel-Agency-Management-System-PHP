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
  <?php if(isset($_GET['edit_visa'])) { ?>
  <!--  -->
  <link rel="stylesheet" href="dist/css/visaStyle.css">
  <?php }else{?>
    
  <link rel="stylesheet" href="dist/css/rtl.css">
  <link rel="stylesheet" href="dist/css/bardasht.css">
  <?php }?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- <link rel="stylesheet" href="dist/css/myStyle.css"> -->
  <!-- <link rel="stylesheet" href="dist/css/balance.css"> -->
  <!-- <link rel="stylesheet" href="dist/css/custom-style.css"> -->
  <link rel="stylesheet" href="dist/css/myStyle.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">



  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- customize adminlte -->
  <link rel="stylesheet" href="dist/css/customize-adminlte.css">
   <!-- jQuery 3 -->
   <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/script.js"></script>
</head>
<style>
form {
  border: none;
}
</style>
<body dir="">
  
  <?php if(isset($_GET['edit_emp'])) { 
    
    $employee_id = $_GET['edit_emp'];
    $show_emp_query  = mysqli_query($connection, "SELECT * FROM staff WHERE `staff_id` = '$employee_id'");
    
    $emp_info = mysqli_fetch_assoc($show_emp_query);

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
  
      $sql_query_001 = mysqli_query($connection,"UPDATE `staff` SET `name` ='$emp_name', `lname` = '$lName', `phone` = '$phone', `email` = '$emailAddress', `tazkera_number` = '$identity', `job_area` = '$workPlace', `job_type`=  '$workType', `salary` = '$salary', `currency` = '$currency', `staff_reg_no` = '$registeredNumber', `address` = '$address', `date` = '$date' WHERE `staff_id` = '$employee_id'");
  
      if($sql_query_001){
        echo "<script>alert('اطلاعات موفقانه ذخیره شد')</script>";
      }
      else{
        echo "<script>alert('  خطا در ذخیره اطلاعات ')</script>";
      }
  
  }

    ?>
    <section class="content container-fluid">
      <div class="row" style="text-align: center;">
        <div class="col-12">
          <div class="titlebody">
            <div class="title">
              <span> ویرایش کارمند </span>
            </div>
          </div>
        </div>
      </div>

      <style>
        input, textarea, label {
          text-align: right !important;
        }
        .form-group .label {
          text-align: right !important;
          
          
        }
      </style>
      

     <div class="row">
       <div class="col-md-12">
         <form action="" method="POST" id="emp-submit-form" style="padding: 12px;">
           <div class="row">
             <!-- first col -->
             <div class="col-md-4">
              <div class="form-group">
                <label for="name" align="right">نام کارمند</label>
                <input type="text" class="form-control" id="name" name="emp_name" value="<?php echo $emp_info['name']?>">
              </div>
              <div class="form-group">
                <label for="lName">تخلص کارمند</label> <br>
                <input type="text" class="form-control" id="lName" name="lName"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" value="<?php echo $emp_info['lname']?>">
              </div>
              <div class="form-group">
                <label for="phone">تیلفون</label>
                <input type="number" class="form-control" id="phone" name="phone" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" value="<?php echo $emp_info['phone']?>">
              </div>
              <div class="form-group">
                <label for="emailAddress">ایمیل</label> <br>
                <input type="email" class="form-control" id="emailAddress" name="emailAddress" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" value="<?php echo $emp_info['email']?>">
              </div>
   
            </div>

            <!-- second col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="identity">نمبر تذکره</label>
                <input type="number" class="form-control" id="identity" name="identity" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" value="<?php echo $emp_info['tazkera_number']?>">
              </div>
              <div class="form-group">
                <label for="workPlace">ساحه کاری</label>
                <input type="text" class="form-control" id="workPlace" name="workPlace"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')"  value="<?php echo $emp_info['job_area']?>">
              </div>
              <div class="form-group">
                <label for="workType">نوعیت کاری</label>
                <input type="text" class="form-control" id="workType" name="workType"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')"  value="<?php echo $emp_info['job_type']?>">
              </div>
              <div class="form-group" style="position: relative;">
                      <label for="salary">معاش: </label>
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
                      <input type="number" class="form-control" name="salary" id="salary"  value="<?php echo $emp_info['salary']?>">
                </div>
            </div>

            <!-- third col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="registeredNumber">نمبر ثبت کارمند</label>
                <input type="number" class="form-control" id="registeredNumber" name="registeredNumber" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')"  value="<?php echo $emp_info['staff_reg_no']?>">
              </div>
              <div class="form-group">
                <label for="date-man">تاریخ</label>
                <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control " name="date" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')"  value="<?php echo $emp_info['date']?>">
              </div>
              <div class="form-group">
                <label for="address">آدرس</label>
                <textarea class="form-control" rows="4" id="address" name="address"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')"  value=""><?php echo $emp_info['address']?></textarea>
              </div>
            </div>
           </div>

           <!-- button col -->
           <div class="row">
             <div class="col-md-9 " style="padding: 4px 20px;">
                <button type="submit" class="btn btn-primary saveBtn" name="emp_submit_btn" style="width: 100%;"> ویرایش اطلاعات</button>
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
  <?php } ?>
<?php
if(isset($_GET['edit_customer_acc'])) { 
  
  $id = $_GET['edit_customer_acc'];
  $show_edit_cs = mysqli_query($connection, "SELECT * FROM `customer` WHERE customer_id = '$id'");
  $row_cs = mysqli_fetch_assoc($show_edit_cs);

  
  if(isset($_POST["customer_save"])){
        
    $name = $_POST['name'];
    // $nick_name = $_POST['nick_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $co_name = $_POST['co_name'];
    $add = $_POST['add'];
    $date = $_POST['date'];

    $sql_query_001 = mysqli_query($connection,"UPDATE `customer` set `full_name` = '$name', `phone` = '$phone', `email` = '$email', `company_name` = '$co_name', `address` = '$add', `date` = '$date' WHERE `customer_id` = '$id';");

    if($sql_query_001){
      echo "<script>alert('اطلاعات موفقانه ذخیره شد')</script>";
      header('location:customers-acc-db.php');
    }
    else{
      echo "<script>alert('  خطا در ذخیره اطلاعات ')</script>";
    }

}
  ?>
<section class="content container-fluid">
      <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                  <style>
                    form {
                      border: none;
                    }
                  </style>
                    <h3 class="box-title">ویرایش حساب مشتری</h3>
                </div>
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name">نام و تخلص</label>
                      <input type="text" name="name" id="name" class="name form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row_cs['full_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="phone">تیلیفون</label>
                      <input type="number" name="phone" id="phone" class="phone form-control" minlength="10" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row_cs['phone'];?>">
                  </div>
                  <div class="form-group">
                    <label for="email">ایمیل</label>
                      <input type="email" name="email" id="email" class="email form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row_cs['email'];?>">
                  </div>
                 </div>
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="co_name">نام شرکت</label>
                      <input type="text" name="co_name" id="co_name" class="co_name form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row_cs['company_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="add">آدرس</label>
                      <textarea  name="add" id="add" class="add form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                      <?php echo $row_cs['address'];?>
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="date">تاریخ</label>
                      <input value="<?php echo $row_cs['date'];?>" type="date" name="date" id="date" class="date form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div> -->
                 </div>
                 <!-- <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">نام</label>
                      <input type="text" name="name" id="name" class="name form-control">
                  </div>
                 </div> -->
                </div>
                <div class="box-footer">
                  <button type="submit" name="customer_save" class="btn btn-primary">ویرایش معلومات</button>
                     </form>
                     <a href="customers-acc-db.php" class="btn btn-success">لیست معلومات</a>
                </div>
            </div>
          </div>
      </div>

  </section>
<?php } ?>

<?php if(isset($_GET['company_id'])) { 
  $id = $_GET['company_id'];
  $show_company_info = mysqli_query($connection, "SELECT * FROM `company_account` WHERE id = '$id'");
  $row = mysqli_fetch_assoc($show_company_info);

  if(isset($_POST['company_save'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $acc_num = $_POST['acc_num'];
    $available = $_POST['available'];
    // $logo = $_POST['co_logo'];
    $date = $_POST['date'];
    // upload the image 
    $picUpload = $_FILES['co_logo']['name'];
    $picSource = $_FILES['co_logo']['tmp_name'];
    $picTarget = 'images/'.$_FILES['co_logo']['name'];
    move_uploaded_file($picSource, $picTarget);
    
    $insert_acc_com = mysqli_query($connection, "UPDATE `company_account` SET  `name` = '$name', `phone` = '$phone', `email` = '$email', `account_number` = '$acc_num', `valid_balance` = '$available', `logo` = '$picUpload', `date` = '$date' WHERE `id` = '$id';");
    if($insert_acc_com) {
      $get_image_query = mysqli_query($connection, "SELECT `logo` FROM `company_account` WHERE `id` = '$id'");
      $file = "images/"+$get_image_query;
      if($file) {
        unset($file);
      }
      echo "<script>alert('اطلاعات به طور موفقیتانه ثبت شد')</script>";
    } else {
      echo "<script>alert('خطا در ثبت اطلاعات')</script>";
    
    }
    }
    


  ?>
<style>
form {
  border: none;
}
</style>

  <section class="content container-fluid">
      <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">ویرایش حساب شرکتی</h3>
                </div>
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="name">نام شرکت</label>
                      <input type="text" name="name" id="name" class="name form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row['name']?>">
                  </div>
                  <div class="form-group">
                    <label for="phone">تیلیفون</label>
                      <input type="number" name="phone" id="phone" class="phone form-control"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['phone']?>">
                  </div>
                  <div class="form-group">
                    <label for="email">ایمیل (اختیاری)</label>
                      <input type="email" name="email" id="email" class="email form-control"oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['email']?>">
                  </div>
                  <div class="form-group">
                    <label for="acc_num"> شماره حساب </label>
                      <input type="number" name="acc_num" id="acc_num" class="acc_num form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['account_number']?>">
                  </div>
                 </div>
                 <div class="col-sm-4">
                  <div class="form-group">
                    <label for="available"> مقدار موجودی در حساب</label>
                      <input type="number" name="available" id="available" class="available form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['valid_balance']?>">
                  </div>
                  <div class="form-group">
                    <label for="co_logo">لوگو</label>
                      <input type="file" name="co_logo" id="co_logo" class="co_logo form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                  </div>
                  <div class="form-group">
                    <label for="date">تاریخ</label>
                      <input type="date" name="date" id="date" class="date form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['date']?>">
                  </div>
                 </div>
                </div>
                <div class="box-footer">
                  <button type="submit" name="company_save" class="btn btn-primary">ویرایش معلومات</button>
                     </form>
                     <a href="company-acc-db.php" class="btn btn-success">لیست معلومات</a>                   
                </div>
            </div>
          </div>
      </div>

  </section>
<?php } ?>

<?php if(isset($_GET['exp_id'])) {
  $id = $_GET['exp_id'];
  $show_exp_info = mysqli_query($connection, "SELECT * FROM `expense` WHERE `expence_id` = '$id';");
  $row_exp = mysqli_fetch_assoc($show_exp_info);

  if(isset($_POST['save_exp'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $monetary_unit = $_POST['monetary_unit'];
    // $currency = $_POST['currency'];
    $quantity = $_POST['quantity'];
    $bill = $_POST['bill'];
    $date = $_POST['date'];
    $add_qxp_q = mysqli_query($connection, "UPDATE `expense` SET `expense` = '$name', `type` = '$type', `amount` = '$amount', `currency` = '$monetary_unit', `rate` = '$quantity', `bill_number` = '$quantity', `date` ='$date' WHERE `expence_id` = '$id';");
    if($add_qxp_q) {
      echo "<script>alert('موفقیتانه اطاعات ثبت شد');</script>";
    } else {
      echo "<script>alert('ثبت اطاعات با خطا مواجه گردید');</script>";
  
    }
  }
  
  
  ?>
     <section class="content container-fluid">
      <div class="row" style="text-align: center;">
        <div class="col-md-12">
          <div class="titlebody">
            <div class="title">
              <span>ویرایش مصرف</span>
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
                <input type="text" class="form-control" id="name" placeholder="نام مصرف" name="name" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row_exp['expense'] ?>">
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
                      $row_cs_query = mysqli_query($connection, "SELECT * FROM currency");
                      while($row = mysqli_fetch_assoc($row_cs_query)) {
                        ?>
                        <option value="<?php echo $row['currency_id'] ?>" <?php if($row['currency_id'] == $row_exp['currency']) {echo 'selected';} else { echo '';} ?>> <?php echo $row['currency'] ?> </option>
                        <?php
                      }
                      ?>
                      </select>
                      <input type="number" class="form-control" name="amount" id="amount" placeholder="مبلغ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row_exp['amount'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="quantity">نرخ:</label>
                      <input type="number" class="form-control" name="quantity" id="quantity" placeholder="نرخ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row_exp['rate'] ?>">
                    </div>
            </div>

            <!-- third col -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="bill">نمبر بل</label>
                <input type="number" class="form-control" id="bill" placeholder="نمبر بل" name="bill" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row_exp['bill_number'] ?>">
              </div>
   
              <div class="form-group">
                <label for="date">تاریخ</label>
                <input type="date" class="form-control date" id="date" name="date" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" value="<?php echo $row_exp['date'] ?>">
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


 
<?php } ?>

<?php if(isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
  $show_user_query = mysqli_query($connection, "SELECT * FROM `user` WHERE `user_id` = '$user_id'");
  $row = mysqli_fetch_assoc($show_user_query);

  
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

  $add_user = mysqli_query($connection, "UPDATE `user` SET `full_name` = '$name', `username` = '$username', `password` = '$password', `authority` = '$authority', `photo` = '$picUpload' WHERE  `user_id` = '$user_id';");
  if($add_user) {
    echo "<script>alert('معلومات موفقانه ثبت گردید')</script>";
  } else {
    echo "<script>alert('خطا در ثبت معلومات')</script>";

  }
}

  
  ?>
  <section class="content container-fluid">
    <div class="container">
        <div class="row" style="display: flex; justify-content: center;"> 
            <div class="col-md-6 mx-auto" style="margin:0 auto;">
                 <!-- general form elements -->
                 <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title"> ویرایش کاربر</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="POST" enctype="multipart/form-data" class="needs-validation">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">نام و تخلص</label>
                          <input type="text" class="form-control" name="name" id="name" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row['full_name'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">نام کاربری  </label>
                          <input type="text" class="form-control" name="username" id="username" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row['username'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">صلاحیت</label>
                          <select  class="form-control" name="authority" id="authority" style="height: 34px;" required>
                            <option value="default"  <?php if($row['authority'] == 'default') echo 'selected' ?>> انتخاب </option>
                            <option value="50" <?php if($row['authority'] == 50) echo 'selected' ?>>صلاحیت نیمه</option>
                            <option value="100"  <?php if($row['authority'] == 100) echo 'selected' ?>>مکمل</option>
                          </select>
                        </div>
                        <div class="input-group">
                          <label for="password">پسورد</label>
                          <br>
                          <input type="password" name="password" id="password" class="password form-control" minlength="8" oninvalid="this.setCustomValidity('   حداقل رمز 8 کارکتر است.')" oninput="this.setCustomValidity('')" required value="<?php echo $row['password'] ?>">
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
<?php } ?>

<?php if(isset($_GET['edit_visa'])) {
    $visa_id = $_GET['edit_visa'];
    echo $visa_id;

                $show_visa_query = mysqli_query($connection, "SELECT *,(SELECT `full_name` FROM `customer` WHERE customer.customer_id = visa.customer) as cus_full_name FROM `visa` WHERE `visa_id` = '$visa_id' ");
                  
                  $row_01 = mysqli_fetch_assoc($show_visa_query);

                    $visa_id_2 = $row_01["visa_id"];
                    $show_visa_detail_query = mysqli_query($connection, "SELECT * FROM `visa_detail` where visa_id='$visa_id_2'");
                    $fetch_002 = mysqli_fetch_assoc($show_visa_detail_query);               
                    
                    $currency_id = $fetch_002['currency'];
                    $get_currency_query = mysqli_query($connection, "SELECT `currency` FROM `currency` WHERE `currency_id` = '$currency_id';");
                    $row_04 = mysqli_fetch_assoc($get_currency_query);

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
      $date  = $_POST['date'];
      
      $sql_query_0001 = mysqli_query($connection,"
        select count(customer_id) as num_cus_id from customer where customer_id ='$customer_name'
      ");
      $fetch_0001 = mysqli_fetch_assoc($sql_query_0001);
      
      if($fetch_0001["num_cus_id"] == 0){
        $sql_query_0002 = mysqli_query($connection,"
        INSERT INTO `customer` (`customer_id`, `full_name`, `phone`, `email`, `company_name`, `address`, `date`) VALUES (NULL, '$customer_name', '', '', '', '', '')
        ") or die(mysqli_error($connection));
        echo "sql_query_0002";
        
        $sql_query_0003 = mysqli_query($connection,"
        select customer_id from customer order by customer_id DESC limit 1
        ");
        
        $fetch_0003 = mysqli_fetch_assoc($sql_query_0003);
        $customer_id_db = $fetch_0003["customer_id"];
        echo "hello3";
        $sql_query_0004 = mysqli_query($connection,"
        UPDATE visa set customer = '$customer_id_db', visa_name = '$visa', type = '$type', place_of_issue = '$issuePlace', date = '$date' WHERE visa_id = '$visa_id'
        ");
       
    
        if ($sql_query_0004) {
          $sql_query_0005 = mysqli_query($connection,"
          select visa_id from visa order by visa_id DESC limit 1
        ");
        $fetch_0005 = mysqli_fetch_assoc($sql_query_0005);
        $visa_id_db = $fetch_0005["visa_id"];
  
        $sql_query_0006 = mysqli_query($connection,"
        UPDATE visa_detail  SET full_name = '$fName' ,  D_of_request = '$dOfReq', D_of_issue = '$dOfissue', comision = '$comation', price = '$price' where visa_id = '$visa_id'
        ");
  
        if($sql_query_0006) {
          echo "<script>alert('موفقیت در ثبت جزئیات ویزا');</script>";
        } else {
          echo "<script>alert('خطا در ثبت اطلاعات');</script>";
        }
  
      
        }
    
      }
      else
      {
      
        $sql_query_0004 = mysqli_query($connection,"
        UPDATE visa set customer = '$customer_name', visa_name = '$visa', type = '$type', place_of_issue = '$issuePlace', date = '$date' WHERE visa_id = '$visa_id'
        ");
    
        if($sql_query_0004){
          
          $sql_query_0006 = mysqli_query($connection,"
          UPDATE visa_detail  SET full_name = '$fName', D_of_request = '$dOfReq', D_of_issue = '$dOfissue', comision = '$comation', price = '$price' where visa_id = '$visa_id'
          ");
    
          if($sql_query_0006) {
            echo "<script>alert('موفقیت در ثبت جزئیات ویزا');</script>";
          } else {
            echo "<script>alert('خطا در ثبت اطلاعات');</script>";
          }
    
        }
    
      }
      
    }

  ?>
        <section class="container-fluid">
    <div class="row" dir="ltr">
      <div class="col-12">
        <div class="titleBody">
        <div class="box-title">
          <span class="fa fa-cc-visa" style="font-size: 30px; ">Edit Visa</span>
         
        </div>
       </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12">
      <form action="" method="post" class="needs-validation">
        <div class="row"  dir="ltr">
          <!--
            fist column of form
          -->
          <div class="col-sm-4">
           <div class="form-group"  dir="ltr">
             <label for="name">Customer:</label>
             <?php //$get_customer_id = $row_visa['customer'];
             //$get_customer = mysqli_query($connection, "SELECT `full_name` FROM  `customer` WHERE `customer_id`  = '$get_customer_id'");
             //$fetch_customer_query = mysqli_fetch_assoc($get_customer);
             ?>
             <input list="customer_list" type="text" class="form-control " name="customer_name" id="nmae"     oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row_01['customer'] ?>">
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
             <input type="text" class="form-control" name="fName" id="fName" placeholder="full name"    oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $fetch_002['full_name'] ?>">
           </div>
           <div class="form-group">
             <label for="dOfReq">D_of REQ:</label>
             <input type="date" class="form-control" name="dOfReq" id="dOfReq" placeholder="D/of REQ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $fetch_002['D_of_request'] ?>">
           </div>
           <div class="form-group">
               <label for="phone">D/of Issue:</label>
               <input type="date" class="form-control" name="dOfissue" id="dOfissue" placeholder="" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $fetch_002['D_of_issue'] ?>">
             </div>

         </div>
           <!--
            secon column of form
          -->
          <div class="col-sm-4">
           
           <div class="form-group">
             <label for="type">Type:</label>
             <input type="text" class="form-control" name="type" id="type" placeholder="type"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row_01['type'] ?>">
           </div>
           <div class="form-group">
             <label for="visa">Visa Duration:</label>
             <input type="text" class="form-control" name="visa" id="visa" placeholder="visa"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $row_01['visa_name'] ?>">
           </div>
           <div class="form-group">
               <label for="issuePlace">Place Of Issue:</label>
               <input type="text" class="form-control" name="issuePlace" id="issuePlace" placeholder="place of issue"    oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required value="<?php echo $row_01['place_of_issue'] ?>">
             </div>
           
             <div class="form-group" style="position: relative;" >
               <label for="price">Price:</label>
               <input  type="number" class="form-control" name="price" id="price" placeholder="price" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $fetch_002['price'] ?>">
               
             </div>
           
           
         </div>
         <!--third column of form-->
         <div class="col-sm-4">
           

             <div class="form-group">
               <label for="comission">Com:</label>
               <input type="number" class="form-control" name="comation" id="comation" placeholder="comission" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required value="<?php echo $fetch_002['comision'] ?>">
             </div>

             
              
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
            
            
             <div class="form-group">
               <label for="date">Date:</label>
               <input type="date" value="<?php echo $row_01['date'] ?>" class="form-control" name="date" id="date"  oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
             </div>
               
             
             <div class="">
               <!-- <BR></BR> -->
               <br>
               <br>
               <input type="submit" class="form-control btn btn-primary " name="save_detail"  value="SAVE" style="float: left">
               <br>
               <br>
              </div>
           
         </div>

         
       </div>
       
     </form>
               <a href="visaView.php" class="form-control btn btn-success ">View Visa list</a>
        </div>
     
    </div>
  </div>

 </section>
 

<?php } ?>

<?php if(isset($_GET['payment_id'])) {
  $p_id = $_GET['payment_id'];
  $show_pay_query = mysqli_query($connection, "select * from payment where payment_id = '$p_id'");
  $row = mysqli_fetch_assoc($show_pay_query);
  $co_id = $row["company"];

  ?>
   <section class="content container-fluid">
   <?php 
          //if(isset($_GET['add_reciept'])) {
          // $id = $_GET['add_reciept'];
            if(isset($_POST['save_payment'])) {
              $person = $_POST['person']; 
              //$curency = $_POST['monetary_unit']; 
              //$rate = $_POST['quantity']; 
              $amount = $_POST['amount']; 
              $detail = $_POST['detail']; 
              $date = $_POST['date']; 
              //$user_id = $_SESSION['user_id'];
              $old_price = $row['totalprice'];
              $currency = $_POST['monetary_unit'];
              $rate = $_POST['quantity'];
              

              $inser_payment = mysqli_query($connection, "UPDATE payment SET person = '$person',totalprice = '$amount', description = '$detail', currency = '$currency', rate = '$rate', date = '$date' WHERE payment_id = '$p_id'");
              

                 if($inser_payment) {
                //  echo "<script>alert('bigger')</script>";
                $sql_query_09 = mysqli_query($connection,"
                    select valid_balance from company_account where id='$co_id'
                 ");
                  $fetch_09 = mysqli_fetch_assoc($sql_query_09);
                 $db_company_valid_belance = $fetch_09["valid_balance"];
                 $new_belance = ( $amount - $old_price ) + $db_company_valid_belance  ; 
                 
                 $sql_query_09 = mysqli_query($connection,"
                    update company_account set valid_balance='$new_belance' where id='$co_id'
                 ");
                }
                 
                 if($inser_payment) {
                   echo "<script>alert('ثبت موفقانه اطلاعات')</script>";
                 } else {
                   echo "<script>alert('ثبت ناموفق اطلاعات')</script>";
   
                 }

            }
          //}
                 ?>
                 <!-- modal for rasid -->
                 <div class="">
                        <div class="modal-dialog" style="border: 2px solid dodgerblue;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" > ویرایش رسید </h4>
                            </div>
                            <div class="modal-body">
                            <form action="" method="post" class="needs-validation">
                                  <div class="form-group">
                                      <label for="id"> نام شخص</label>
                                      <input type="text" name="person" value="<?php echo $row["person"]; ?>" id="person" class="form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" >

                                  </div>
                                  
                                  <div class="form-group" style="position: relative;">
                                            <label for="monetary_unit">مبلغ: </label>
                                            <select name="monetary_unit" name="monetary_unit"  id="monetary_unit" onchange="exchaneg();">
                                            <?php 
                                                $show_currency_query =  mysqli_query($connection,"select * from currency");
                                                while($rows = mysqli_fetch_assoc($show_currency_query)){
                                                  if( $rows["currency_id"] == $row["currency"] ){
                                              ?>
                                                <option value="<?php echo $rows["currency_id"]; ?>" selected><?php echo $rows["currency"]; ?></option>
                                                <?php
                                                  }else{
                                                ?>
                                                <option value="<?php echo $rows["currency_id"]; ?>"><?php echo $rows["currency"]; ?></option>

                                                <?php
                                                  }
                                                }
                                              ?>
                                            </select>
                                            <input type="number" class="form-control" name="amount" value="<?php echo $row["totalprice"]; ?>" id="amount" placeholder="مبلغ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                                          </div>
                                          <div class="form-group">
                                            <label for="quantity">نرخ:</label>
                                            <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo $row["rate"]; ?>" placeholder="نرخ" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" required>
                                          </div>
                                  
                                  <div class="form-group">
                                      <label for="detail">  توضیحات</label>
                                      <textarea name="detail" id="detail" class="detail form-control"   oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد. لطفا اطلاعات درست وارد کنید')" oninput="this.setCustomValidity('')" required>
                                        <?php echo $row["description"]; ?>
                                      </textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="date">تاریخ </label>
                                      <input type="date" name="date" id="date" class="date form-control" oninvalid="this.setCustomValidity('این اطلاعات الزامی میباشد.')" oninput="this.setCustomValidity('')" value="<?php echo $row["date"]; ?>">
                                  </div>
                                 </div>
                                  
                                </div>
                                <div class="modal-footer">                                    
                                    <button type="submit" name="save_payment" class="btn btn-primary" data-dismiss="modal">ذخیره</button>
                                </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

 
   

  </section>
  <?php } ?>
  
  <?php if(isset($_GET['sale_id'])) {
    
    $sale_id = $_GET['sale_id'];
    $show_sale = mysqli_query($connection, "SELECT * from sale where sale_bill_number = '$sale_id'");
    $row= mysqli_fetch_assoc($show_sale);

    if(isset($_POST['update_sale'])) {
      $name = $_POST['customer'];
      $date = $_POST['date'];
      $insert_cs = mysqli_query($connection, "UPDATE sale set `customer` = '$name', `date` = '$date' where `sale_bill_number` = '$sale_id'");
      if($insert_cs) {
        echo "<script>alert('ویرایش با موفقیت انجام شد')</script>";
      } else {
        echo "<script>alert(خطا در ویرایش اطلاعات'')</script>";

      }

    }

    ?>
    <section class="content container-fluid">
    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">ویرایش معلومات تکیت</h3>
      </div>
      <div class="box-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="customer">مشتری</label>
              <select style="height:45px;" type="text" name="customer" id="customer" class="form-control">
              <?php
              $show_customer = mysqli_query($connection, "select customer_id,full_name from customer");
              while ($row_cs = mysqli_fetch_assoc($show_customer)) {
                  ?>  
              <option value="<?php echo $row_cs['customer_id'] ?>" <?php 
              if($row['customer'] == $row_cs['customer_id']) { echo 'selected'; } else { echo ''; }
              ?>><?php echo $row_cs['full_name'] ?></option>
                <?php
              } ?>
              </select>

            </div>
            <div class="form-group">
              <label for="date">تاریخ</label>
              <input type="date" name="date" id="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
      </div>
      <div class="box-footer">
        <button name="update_sale" type="submit" class="btn btn-primary">ویرایش</button>
      </form>
      <a href="sales-db.php" class="btn btn-success">برگشت</a>
      </div>
    </div>
   

  </section>

    <?php } ?>
    
    <?php if(isset($_GET['detail_id'])) {
      $d_id = $_GET['detail_id'];

      $show_det =  mysqli_query($connection, "select *from sale_detail where sdetail_id = '$d_id'");
      $row = mysqli_fetch_assoc($show_det);

      if(isset($_POST['update_det'])) {
        $pax_name = $_POST['pax_name'];
        $pnr = $_POST['pnr'];
        $sector = $_POST['sector'];
        $airline = $_POST['airline'];
        $d_o_issue = $_POST['d_o_issue'];
        $price = $_POST['price'];
        $com = $_POST['com'];
        $discount = $_POST['discount'];
        $company = $_POST['company'];
        $up_detail = mysqli_query($connection, "UPDATE `sale_detail`  set  `sector` = '$sector', `flight_number` = '$airline', `pax_name` = '$pax_name', `pnr` = '$pnr', `D_ofissue` = '$d_o_issue', `discount` = '$discount', `comission` = '$com', `price` = '$price', `company` = '$company' where sdetail_id = '$d_id'");
       
        if($up_detail) {
          echo "<script>alert('ویرایش با موفقیت انجام شد')</script>";
        } else {
          echo "<script>alert(خطا در ویرایش اطلاعات'')</script>";
  
        }
      }
      
      
      ?>
  <section class="content container-fluid">
    <div class="box box-danger col-md-3">
      <div class="box-header">
        <h3 class="box-title">ویرایش جزئیات تکیت</h3>
      </div>
      <div class="box-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="pax_name">Pax name</label> <!--  value="<?php // echo $row[''] ?>" -->
              <input type="text" name="pax_name" id="pax_name" class="form-control" value="<?php echo $row['pax_name'] ?>">
            </div>
            <div class="form-group">
              <label for="">PNR</label>
              <input type="text" name="pnr" id="pnr" class="form-control" value="<?php echo $row['pnr'] ?>">
            </div>
            <div class="form-group">
              <label for="sector">sector</label>
              <input type="text" name="sector" id="sector" class="form-control" value="<?php echo $row['sector'] ?>">
            </div>
            <div class="form-group">
              <label for="airline">airline</label>
              <input type="text" name="airline" id="airline" class="form-control" value="<?php echo $row['flight_number'] ?>">
            </div>
            <div class="form-group">
              <label for="d_o_issue">Date Issue</label>
              <input type="date" name="d_o_issue" id="d_o_issue" class="form-control" value="<?php echo $row['D_ofissue'] ?>">
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" name="price" id="price" class="form-control" value="<?php echo $row['price'] ?>">
            </div>
            <div class="form-group">
              <label for="com">COM</label>
              <input type="number" name="com" id="com" class="form-control" value="<?php echo $row['comission'] ?>">
            </div>
            <div class="form-group">
              <label for="discount">Discount</label>
              <input type="number" name="discount" id="discount" class="form-control" value="<?php echo $row['discount'] ?>"> 
            </div>
            <div class="form-group">
              <label for="compay">Company</label>
              <select name="company" id="company" class="form-control">
              <?php $show_comp = mysqli_query($connection, "select id, name from company_account");
              while ($row_comp = mysqli_fetch_assoc($show_comp)) {
                  ?>
              <option value="<?php echo $row_comp['id'] ?>" <?php if($row_comp['id'] == $row['company']) { echo 'selected';} else { echo '';}  ?> ><?php echo $row_comp['name'] ?></option>
              <?php
              } ?>
              </select>
            </div>
      </div>
      <div class="box-footer">
        <button name="update_det" class="btn btn-primary">ویرایش</button>
      </form>
      <a href="sales-db.php" class="btn btn-success">برگشت</a>
      </div>
    </div>
   

  </section>

      <?php } ?>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
</body>

</html>