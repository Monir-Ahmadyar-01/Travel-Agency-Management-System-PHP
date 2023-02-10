<?php
include 'database.php';
include 'session.php';
?>
<head>
<link rel="stylesheet" href="dist/css/invoice-style.css">
<style>
  .logo {
  float:right !important;
  
}
tbody input{
  margin:-8px;  
}
</style>

</head>
<body>

  <div id="invoiceholder">
  <div id="invoice" class="effect2">
    
        <?php $show_org_info = mysqli_query($connection, "select * from `info` where 1");
        $row_info = mysqli_fetch_assoc($show_org_info);
        
        ?>
    <div id="invoice-top">
      <div class=""> 
        <div class="logo"><img src="images/<?php echo $row_info['logo'] ?>" width="50px" alt="Logo" /></div>
        <div class="left-header">
      <h1><?php echo $row_info['persion_name'] ?></h1>
      <p>Address: <span><?php echo $row_info['address'] ?></span></p>
      <p>Phone: <span><?php echo $row_info['phone'] ?></span></p>
      

      </div>
    </div><!--End Title-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div><!--End InvoiceTop-->
  <div class="right-header">
  <?php
    $sql_query = mysqli_query($connection,"select max(sale_bill_number) as Sale_Maxid from sale");
    $fetch_sql_query = mysqli_fetch_assoc($sql_query);
  ?>
  <h1>Invoice #<span class="invoiceVal invoice_num"><?php echo $fetch_sql_query["Sale_Maxid"]+1; ?></span></h1>
  <p>Invoice Date: <span id="invoice_date"><?php echo date('Y-M-d') ?></span><br>
  </p></div>        
    <div id="invoice-mid">   
        <div class="clearfix">
            <div class="col-left">
      <div id="message">
        <h2>Bill to:</h2>
        <input list="customer_list" type="text" name="name" id="name" class="name" style="border: none; text-align:left;">
      </div>
      <datalist name="customer_list" id="customer_list">
        <?php $show_customer = mysqli_query($connection, "SELECT customer_id,full_name from `customer`");
        while ($row_02 = mysqli_fetch_assoc($show_customer)) {
            ?>
      <option value="<?php echo $row_02['full_name'] ?>"><?php echo $row_02['full_name'] ?></option>
      <?php
        } ?>
      </datalist>
                <table class="table">
                    <tbody id="">
                        <tr>
                            <td><span> Address : </span><input type="text" name="address" id="address" class="address long-input"></td>
                        </tr>
                        <tr>
                            <td><span> Phone :</span><input type="text" name="phone" id="phone" class="phone long-input"></td>
                        </tr>
                        <tr>
                            <td><span> Date : </span><input type="date" name="date" id="date" class="long-input" value="<?php echo date("Y-m-d"); ?>"></td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
        </div>       
    </div><!--End Invoice Mid-->
    
    <div id="invoice-bot">
      
      <div id="table">
        <table class="table-main">
          <thead>    
              <tr class="tabletitle" style="border: 3px solid black; ">
                <th>NO</th>
                <th>Pax Name</th>
                <th>Pax No</th>
                <th>PNR</th>
                <th>Sector</th>
                <th>Air line</th>
                <th>Date Issue</th>
                <th class="print">Price</th>
                <th class="print">COM</th>
                <th class="print">Discount</th>
                <th>Company</th>
                <th>Total</th>
                <th class="print">Rmove</th>
              </tr>
          </thead>
          <tbody id="tbody">
           
          </tbody>
            
        </table>
        <table style=" width: 500px; display:inline-block">
          <thead>
            <tr class="list-item total-row">
              <th colspan="9" class="tableitem"> SubTotal</th>
              <td data-label="SubTotal" class="tableitem" ><input style="width:90px;" readonly type="number" name="subtotal" id="subtotal" class="hidden-inp"></td>
          </tr>
          <tr class="list-item total-row">
              <th colspan="9" class="tableitem">Tax Rate</th>
              <td data-label="Tax Rate" class="tableitem"><input style="width:90px;" type="number" name="tax_rate" id="tax_rate" class="hidden-inp"></td>
          </tr>
          <tr class="list-item total-row">
              <th colspan="9" class="tableitem">Other Costs</th>
              <td data-label="Other Costs" class="tableitem" ><input style="width:90px;" type="number" id="other_costs" name="other_costs" class="hidden-inp"></td>
          </tr>
          <tr class="list-item total-row">
              <th colspan="9" class="tableitem">Total Cost</th>
              <td data-label="Total Cost" class="tableitem"><input style="width:90px;" readonly type="number" name="total_all"  id="total_all" class="hidden-inp"></td>
          </tr>
          <tr class="list-item total-row">
              <th colspan="9" class="tableitem">Paid</th>
              <td data-label="Total Cost" class="paid"><input style="width:90px;"  type="number" name="paid"  id="paid" class="hidden-inp"></td>
          </tr>
          <tr class="list-item total-row">
              <th colspan="9" class="tableitem">Remain</th>
              <td data-label="Total Cost" class="remain"><input style="width:90px;" readonly type="number" name="remain"  id="remain" class="hidden-inp"></td>
          </tr>
          </thead>
        </table>
        
      </div><!--End Table-->
      <div class="cta-group print" style="width: 100%; float: left;">
        <button type="button" name="btn_add_ticket" id="btn_add_ticket" onclick="send_data();" class="btn-primary">Approve</button>
        <button  onclick="javascript:print();" class="btn-default">print</button>
        <button  class="btn-info item-add" id="item-add">Add row</button>
        <a href="sales-db.php" class="btn-dark">List of sales</a>
    </div> 
      
    </div><!--End InvoiceBot-->
   <footer>
      <div id="legalcopy" class="clearfix">
        <p class="col-right">Our mailing address is:
            <span class="email"><a href="mailto:<?php echo $row_info['email'] ?>"><?php echo $row_info['email'] ?></a></span>
        </p>
      </div>
    </footer>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/bill-incoice.js"></script>
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->
  <script>
    function send_data() {
            var check = window.confirm("اطلاعت خواهد در دیتابیس ذخیره شد برای تایید ok را کلیک کنید ");
            if (check == true) {


                // header
                var customer_name = $("#name").val();
                var address = $("#address").val();
                var phone = $("#phone").val();
                var date = $("#date").val();
                
                // footer
                var sub_total = $("#subtotal").val();
                var tax_rate = $("#tax_rate").val();
                var other_costs = $("#other_costs").val();
                var total_cost = $("#total_all").val();
                var paid = $("#paid").val();
                

                var pax_name = $('textarea[name^=pax_name]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                var pax_no = $('input[name^=pax_no]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                var pnr = $('input[name^=pnr]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                var sector = $('input[name^=sector]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                var airline = $('input[name^=airline]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                var date_issue = $('input[name^=date_issue]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var price = $('input[name^=price]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var com = $('input[name^=com]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var discount = $('input[name^=discount]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var company = $('select[name^=company]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();

                
               

                $.ajax({
                    type: "POST",
                    data: {
                        customer_name: customer_name,
                        address: address,
                        phone: phone,
                        date: date,
                        sub_total: sub_total,
                        tax_rate: tax_rate,
                        other_costs: other_costs,
                        total_cost: total_cost,
                        paid: paid,
                        pax_name: pax_name,
                        pax_no: pax_no,
                        pnr: pnr,
                        sector: sector,
                        airline: airline,
                        date_issue: date_issue,
                        price: price,
                        com: com,
                        discount: discount,
                        company: company,
                    },
                    url: "sales_server.php",
                    success: function(result) {
                      
            // var result_arr = JSON.parse(result);
            // var result_obj = Object.values(result_arr);
                        // $('.answer').html(msg);
                        alert(result);
                    }
                });

            }
        }
  </script>
</body>
