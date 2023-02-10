<?php
include_once 'database.php';
include 'session.php';

if(isset($_POST["give_me_company_data"])){
    $sql_query_02_x = mysqli_query($connection,"select  id,name from company_account");
    $option_data = '';
    while($rows = mysqli_fetch_assoc($sql_query_02_x)){
        $option_data .= "<option value='".$rows["id"]."'>".$rows["name"]."</option>";
    }
    echo $option_data;

}
   

    
    if(isset($_POST["customer_name"])){
       
        // customer Details
        $customer_name = $_POST["customer_name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        

        // check
        // $sql_query_01 = mysqli_query($connection,"select customer_id from customer where full_name='$customer_name'");
        $sql_query_02 = null;
        $sql_query_02 = mysqli_query($connection,"select  customer_id from customer where full_name='$customer_name'");
        if(mysqli_num_rows($sql_query_02) > 0){
            // exist
// echo 
        }
        else{

             $sql_query_i_01 = mysqli_query($connection,"INSERT INTO `customer` (`customer_id`, `full_name`, `phone`, `email`, `company_name`, `address`, `date`) VALUES (NULL, '$customer_name', '$phone', '', '', '$address', '')");
             $sql_query_02 = mysqli_query($connection,"SELECT customer_id FROM customer ORDER BY customer_id DESC LIMIT 1");
        
        }

        $fetch_02 = mysqli_fetch_assoc($sql_query_02);
        $customer_id = $fetch_02["customer_id"];
        $user = $_SESSION['user_id'];

        $discount = $_POST["discount"];
        $date = $_POST["date"];
        

        $sql_query_03 = mysqli_query($connection,"INSERT INTO `sale` (`sale_bill_number`, `user`, `customer`, `date`) VALUES (NULL, '$user', '$customer_id', '$date')");

        $sql_query_04 = mysqli_query($connection,"SELECT sale_bill_number FROM sale ORDER BY sale_bill_number DESC LIMIT 1");
        $fetch_04 = mysqli_fetch_assoc($sql_query_04);
        $sale_bill_number = $fetch_04["sale_bill_number"];
        $paid = $_POST["paid"];

        $inser_payment = mysqli_query($connection, "INSERT INTO `payment` (`payment_id`, `user`,`person`, `company`, `sdetail`, `visa`, `supplier`, `totalprice`, `description`, `currency`, `rate`, `date`) VALUES (NULL, '$user','$customer_name',NULL, '$sale_bill_number', NULL, NULL, '$paid', '', '2', '1', '$date')");


        if($sql_query_03){
            // Items Details
            $pax_name = $_POST["pax_name"];
            $pax_no = $_POST["pax_no"];
            $pnr = $_POST["pnr"];
            $sector = $_POST["sector"];
            $airline = $_POST["airline"];
            $date_issue = $_POST["date_issue"];
            $price = $_POST["price"];
            $com = $_POST["com"];
            $discount = $_POST["discount"];
            $company = $_POST['company'];
             $count = 0;
             while($count < count($pax_name)){                                

                 $sql_query_08 = mysqli_query($connection,"INSERT INTO `sale_detail` (`sdetail_id`, `sale_bill_number`, `sector`, `flight_number`, `pax_name`, `pax_no`, `pnr`, `D_ofissue`, `discount`, `comission`, `price`, `currency`, `date`, `company`) VALUES (NULL, '$sale_bill_number', '$sector[$count]', '$airline[$count]', '$pax_name[$count]', '$pax_no[$count]','$pnr[$count]', '$date_issue[$count]', '$discount[$count]', '$com[$count]', '$price[$count]', '2', '$date[$count]', '$company[$count]')");

                 $sql_query_09 = mysqli_query($connection,"
                    select valid_balance from company_account where id='$company[$count]'
                 ");

                 $fetch_09 = mysqli_fetch_assoc($sql_query_09);
                 $db_company_valid_belance = $fetch_09["valid_balance"];
                 $new_belance = $db_company_valid_belance - $price[$count];
                 
                 $sql_query_09 = mysqli_query($connection,"
                    update company_account set valid_balance='$new_belance'  where id='$company[$count]'
                 ");

                

                $count++;
             }
             echo "اطلاعات موفقانه ذخیره شد";
            //  print_r($sector);
            //  echo var_dump($sector);
            }
            else{
            //  echo ($sector);
             echo "خطا در ذخیره اطلاعات";
         }
     
    }    
?>