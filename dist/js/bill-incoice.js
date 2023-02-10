var count = 1;
$("#item-add").on("click", function() {
    
    // alert('hello')

    var html_code = "<tr id='row_id_" + count + "'>";
    var item_search_id = "hello";

    $.ajax({
        type: "POST",
        data: {
            give_me_company_data: item_search_id,
        },
        url: "sales_server.php",
        success: function(result) {

            // alert(result);
            $(".company").html(result);
        }
    });

            html_code +=
                '<td class="idss" style="text-align:center; font-weight:bolder;">' + count + '</td>';
            html_code +=
                '<td><textarea style="height:35px;" cols="40" type="text"  name="pax_name" class="pax_name" id="pax_name"></textarea></td>';
            html_code +=
                '<td><input type="text"  name="pax_no"  class="pax_no" id="pax_no"></td>';
            html_code +=
                '<td><input type="text"  name="pnr"  class="pnr" id="pnr"></td>';
            html_code +=
                '<td><input type="text"  name="sector"  class=" sector" id="sector"></td>';

            html_code +=
                '<td><input type="text" name="airline"  class=" airline" id="airline"></td>';

            html_code +=
            '<td  style="width:80px;"><input style="width:150px;" type="date" name="date_issue"   class=" date_issue" id="date_issue"></td>';

            
            html_code +=
            '<td class="print"><input type="number" name="price"  class=" price" id="price_' + count + '"></td>';
            
            html_code +=
                '<td class="print"><input type="number"  name="com"  class=" com" id="com_' + count + '"></td>';
            
            html_code +=
            '<td class="print"><input type="number" name="discount" value="0" class=" discount" id="discount_' + count + '"></td>';

            html_code +=
            '<td  style="width:130px;"><select style="width:130px;" name="company" class=" company" id="company_' + count + '"></select></td>';
            html_code +=
            '<td><input type="number" name="total" class="total" id="total_' + count + '"></td>';      

            html_code +=
                '<td class="print text-center" style="vertical-align:center; padding-top:17px; cursor:pointer;"><img src="dist/img/trash.svg" width="20px" class="delete-img print"  id="' + count + '" ></td>';
            html_code += "</tr>";
            // add row with server incoming
            
            $("#tbody").append(html_code);
            set_ids_front();
            total_cal(count);
        
    //     }
    // });

    count++;
});

function set_ids_front()
{
    var num_ids = $('.idss').length;

    // $('.idss').index(0).text("wqd");
    for (var x = 1; x <= num_ids; x++) {
        document.getElementsByClassName("idss")[x-1].innerHTML = x;
    }
}
$(document).on('click', '.delete-img', function() {
    var row_id = $(this).attr("id");
    $("#row_id_" + row_id).remove();
    total_cal(count);
    set_ids_front();

    

    
});

$(document).on('keyup', '.price', function() {
    total_cal(count);
    
    
});
$(document).on('keyup', '.com', function() {
    total_cal(count);
});
$(document).on('keyup', '.discount', function() {
    total_cal(count);
});
$(document).on('keyup', '.tax_rate', function() {
    total_cost();
    
});

$(document).on('keyup', '.other_costs', function() {
    total_cost();
});
$(document).on('keyup', '#tax_rate', function() {
    total_cost();
    
});

$(document).on('keyup', '#paid', function() {
    var total_amount = parseFloat($("#total_all").val());
    var paid = parseFloat($("#paid").val());
    $("#remain").val(total_amount - paid);
    
});

$(document).on('keyup', '#other_costs', function() {
    total_cost();
});

function total_cal(count) {
    // alert(count);
    var total_price = 0;
    for (var x = 1; x <= count; x++) {
        var row_id_price = $('#price_' + x).val();
        if (row_id_price > 0) {
            var row_id_com = $('#com_' + x).val();
            var row_id_discount = $('#discount_' + x).val();

            var remain_com = (parseFloat(row_id_com) / 100)* (100 - parseFloat(row_id_discount));
            var actual_price = parseFloat(row_id_price) + remain_com;
            
            total_price = total_price + actual_price;
            $('#total_' + x).val(actual_price.toFixed(2));

            $("#subtotal").val(total_price.toFixed(2));
            $("#total_all").val(total_price.toFixed(2));
        }
    }
    
  
}
    function total_cost() {
    
    
    var sub_total = $("#subtotal").val();
     var tax_rate = parseFloat($("#tax_rate").val());
     var other_costs = $('#other_costs').val();
     $("#total_all").val(parseFloat(tax_rate) + parseFloat(other_costs) + parseFloat(sub_total));
 
    } 