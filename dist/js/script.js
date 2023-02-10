
$(function(){
  exchaneg(); 
});
// set rate function
function exchaneg() {
    
    var ex_rate = $('#monetary_unit').val();
    if(ex_rate == '1') {
        $('#quantity').val(localStorage.getItem(1));


    } else if(ex_rate == '2')
$('#quantity').val(1);
  }
  
  


// document.addEventListener('invalid', (function () {
//   return function (e) {
//     e.preventDefault();
//     document.getElementById("name").focus();
//   };
// })(), true);

//   // $("form").on('submit',function(){
//   //   alert("qdqw");


    
//     // var data = $(".form-control:last").val();
//     var elems = document.querySelectorAll(".form-control");
//     var elems_group = document.querySelectorAll(".form-group");
//     var elems_group_child = document.querySelectorAll(".from-group-child");
    
    
    
    
//     for (let index = 0; index < elems.length; index++) {
//       if(elems[index].value == ""){
//         if(elems[index].hasAttribute('required')){
          
    
//           elems[index].style.border="1px solid red";
//           elems_group[index].innerHTML +=  
//           "<span style='color:red; position:absolute;right:20px;' class='from-group-child'>درج این اطلاعات لازمی میباشد</span>";
//         }
        
//       }
//       else{
//         elems[index].style.border="1px solid green";
        
//       }
//     }
//     // alert(len);

    

//     // if(data.length > 0){
//     //   $(".form-control:last").css({'border':'1px solid green'});
//     // }
//     // else{
//     //   $(".form-control:last").css({'border':'1px solid red'});
//     //   $(".form-control:last").append('<span style="padding:10px; color:red;">این اطلاعات ضروری هست</span>');
//     // }
//   });
  

// // end set rate Function