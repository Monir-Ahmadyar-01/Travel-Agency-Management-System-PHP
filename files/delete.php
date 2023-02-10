<?php
include 'database.php';

  // for deleting the employees
  if(isset($_GET['remove_emp'])) {
    $emp_id = $_GET['remove_emp'];
    $remove_emp_query = mysqli_query($connection, "DELETE FROM `staff` WHERE `staff_id` = '$emp_id'");
    if($remove_emp_query) {
      header("location:registered_employees.php");
    } else {
      header("location:registered_employees.php");

    }
      exit();
  }

// for deleting the custoemrs
if(isset($_GET['del_field'])) {
  $cs_id =$_GET['del_field'];
   $del_field_query = mysqli_query($connection, "DELETE FROM `customer` WHERE `customer_id`  = '$cs_id';");
  if($del_field_query) {
    header("location:customers-acc-db.php");
  } else {
    header("location:customers-acc-db.php");

  }
  exit();   
 }

 // for deleting the bardasht shoraka
if(isset($_GET['bardasht_id'])) {
  $bardasht_id =$_GET['bardasht_id'];
   $del_field_query = mysqli_query($connection, "DELETE FROM `take` WHERE `take_id`  = '$bardasht_id';");
  if($del_field_query) {
    header("location:bardasht_detail.php");
  } else {
    header("location:bardasht_detail.php");

  }
  exit();   
 }

 // for removing the company acc
 if(isset($_GET['company_id'])) {
   $co_id = $_GET['company_id'];
   $del_field_query = mysqli_query($connection, "DELETE FROM `company_account` WHERE `id`  = '$co_id';");
   if($del_field_query) {
     header("location:company-acc-db.php");
   } else {
     header("location:company-acc-db.php");
   }
   exit(); 
 }

 // for removing the expense acc
 if(isset($_GET['exp_id'])) {
   $exp_id = $_GET['exp_id'];
   $del_field_query = mysqli_query($connection, "DELETE FROM `expense` WHERE `expence_id`  = '$exp_id';");
   if($del_field_query) {
     header("location:registered_expenses.php");
   } else {
     header("location:registered_expenses.php");
   }
   exit(); 
 }

 // for removing the expense acc
 if(isset($_GET['remove_emp'])) {
   $remove_emp = $_GET['remove_emp'];
   $del_field_query = mysqli_query($connection, "DELETE FROM `staff` WHERE `staff_id`  = '$remove_emp';");
   if($del_field_query) {
     header("location:registered_employees.php");
    } else {
     header("location:registered_employees.php");
  }
   exit(); 
 }

 // for removing the salary pay
 if(isset($_GET['salary_id'])) {
   $salary_id = $_GET['salary_id'];
   $del_field_query = mysqli_query($connection, "DELETE FROM `salary_pay` WHERE `pay_id`  = '$salary_id';");
   if($del_field_query) {
     header("location:registered_salaries.php");
    } else {
     header("location:registered_salaries.php");
  }
   exit(); 
 }

 // for removing the user
 if(isset($_GET['user_id'])) {
   $user_id = $_GET['user_id'];
   $del_field_query = mysqli_query($connection, "DELETE FROM `user` WHERE `user_id`  = '$user_id';");
   if($del_field_query) {
     header("location:user-db.php");
    } else {
     header("location:user-db.php");
  }
   exit(); 
 }

 // for removing the visa detaol
 if(isset($_GET['delete_visa'])) {
   $visa_id = $_GET['delete_visa'];

   $visa_detail_remove = mysqli_query($connection, "DELETE FROM `visa_detail`WHERE `visa_id` = '$visa_id' ");
   if($visa_detail_remove) {
     $query_02 = mysqli_query($connection, "DELETE FROM `visa` WHERE `visa_id` = '$visa_id' ");
     header("location:visaView.php");
    } else {
     header("location:visaView.php");
   }
 }

 // for removing the payment
 if(isset($_GET['payment_id'])) {
   $pay_id = $_GET['payment_id'];

   $remove_pay = mysqli_query($connection, "DELETE FROM `payment`WHERE `payment_id` = '$pay_id' ");
   if($remove_pay) {
     header("location:payment-db.php");
    } else {
     header("location:payment-db.php");
   }
 }

 // remove the sale and detail
 if(isset($_GET['sale_id'])) {
   $sale_id = $_GET['sale_id'];

   $remove_sale_detail = mysqli_query($connection, "DELETE FROM `sale_detail`WHERE `sale_bill_number` = '$sale_id' ");
   if($remove_sale_detail) {
     $remove_sale = mysqli_query($connection, "DELETE FROM `sale`WHERE `sale_bill_number` = '$sale_id' ");

     header("location:sales-db.php");
    } else {
     header("location:sales-db.php");
   }
 }

 if(isset($_GET['detail_id'])) {
   $detail_id = $_GET['detail_id'];

   $remove_sale_detail = mysqli_query($connection, "DELETE FROM `sale_detail`WHERE `sdetail_id` = '$detail_id' ");
   if($remove_sale_detail) {
     header("location:sales-db.php");
    } else {
     header("location:sales-db.php");
   }
 }