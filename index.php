<!DOCTYPE html>
<html>
<head>
  <script
  src="https://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="calculate-checkbox-value.js"></script>
</head>
<body>
  <div class="price_sum">
    <form method="post">
    <span>Select meals</span><br/>
    <ul>
      <li><input type="checkbox" id="chek" checked><span data-price="10">tea(10 rupee)</span></li>
      <li><input type="checkbox" id="chek" ><span data-price="20">coffee(20 rupee)</span></li>
      <li><input type="checkbox" id="chek"  checked><span data-price="30">milk(30 rupee)</span></li>
      <li><input type="checkbox" id="chek" ><span data-price="40">banana_shake(40 rupee)</span></li>
    </ul>
    </form>
  </div>
  <div>
    <!-- <p>total price : <span class="price_display"></span> rupee</p> -->
  </div>
</body>
</html>
<?php


?>
<script>
$(document).ready(function(){
//   calPrice();
  $("input").on("change", function(){
//     calPrice();
//  alert("hello");
    var val =0;
    $('.price_sum li').each(function(){
      if($(this).is(":checked"))
      {
        val = val+val.push($(this).val());
      }
    })
    alert(val);
//   });

//   function calPrice(){
//     var totalPrice = 0;
//     $(".price_sum li").each(function(){
//       if ($(this).find("input").prop("checked")) {
//         totalPrice += Number($(this).find("span").data("price"));
//       }
//     $(".price_display").text(totalPrice);
//     });
//   }
// });
// $(document).ready(function(){  
//   $("input").on("change", function(){  
        // alert("hello");
          //  var languages = [];  
          //  $('.get_value').each(function(){  
          //       if($(this).is(":checked"))  
          //       {  
          //            languages.push($(this).val());  
          //       }  
          //  });  
//            languages = languages.toString();  
//            $.ajax({  
//                 url:"insert.php",  
//                 method:"POST",  
//                 data:{languages:languages},  
//                 success:function(data){  
//                      $('#result').html(data);  
//                 }  
//            });  
      });  
 });
</script>