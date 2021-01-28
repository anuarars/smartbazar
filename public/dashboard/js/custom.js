/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

// -------------------------------------------

function priceAfterCalc(){
    var discountPercent = $("#discountPercent").val();
    var newPrice = $("#newPrice").val(); 
    var discountPrice = (newPrice * discountPercent)/100;
    var result = newPrice - discountPrice;
    if(result > 0){
        $("#priceAfterCalc").text("Цена после скидки " + result + " тг.");
    }else{
        $("#priceAfterCalc").text("");
    }
}
$("#discountPercent").bind("change paste keyup", function() {
    priceAfterCalc();
});

$("#newPrice").bind("change paste keyup", function() {
    priceAfterCalc();
});

// ----------------------------------------------

tinymce.init({
    selector: '#productDescription',
    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    toolbar_mode: 'floating',
 });

//  ----------------------------------------------------------------------------