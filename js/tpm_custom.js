(function($){


//Formatting currency
function formatCurrency(num) {
    num = isNaN(num) || num === '' || num === null ? 0.00 : num;
    return parseFloat(num).toFixed(2);
}

$(document).ready(function () {

//Add FB meta to item pages
/*
var fbhtml=$('#tpm_fb_head').html(); 
$('head').append(fbhtml);
*/

/* Make things clickable */
$(".clickable").clickable();


// Get slide number if it exists
if (window.location.hash) {
	//startSlide = window.location.hash.replace('#','');
}
// Initialize Slides
$('#slides').slides({
	preload: false,
	randomize: true,
	generatePagination: true,
	autoheight: true,
	play: 5000,
	pause: 2500,
	hoverPause: true,
	animationComplete: function(current){
		// Set the slide number as a hash
		//window.location.hash = '#' + current;
	}
});
	
$(".slides_container").mouseenter(function() {
		
		$('.slides_container .image').animate({height:"420px"},400);
		$(this).animate({height:"550px"},400);
		});

$(".slides_container").mouseleave(function() {
		
		$('.slides_container .image').animate({height:"270px"},400);
		$(this).animate({height:"400px"},400);
		});

//Format the currency
$.formatCurrency.regions['nl-NL'] = {
	symbol: '€',
	positiveFormat: '%s %n',
	negativeFormat: '%s -%n',
	decimalSymbol: ',',
	digitGroupSymbol: '.',
	groupDigits: true
};
$('.USD').formatCurrency();
$('.EUR').formatCurrency({region: 'nl-NL' });


$('#tpm-contact-form').ajaxForm(function() { 
	$('#contact-button').hide();
    $('#tpm-contact-loading').hide()
    $('#tmp_contact_message').show();
 }); 

//For popup windows see http://swip.codylindley.com/popupWindowDemo.html

	$('.tpm_edit_item').popupWindow({
		height:650,
		width:850,
		top:100,
		left:100
	});


//Buy/sell form updating

	   var shipping = $('#buy-country').find('option:selected').attr('data');
		if ($('#shipment_cost').hasClass('0'))
		{
		$('#shipping_per_order').text(formatCurrency(shipping));
			}else {
		$('#shipping_per_item').text(formatCurrency(shipping));
		}
	    var a = $('#buy-quantity').val();
	   	var b = $('#subtotal').text();
	   	var c = $('#shipping_per_item').text();
	   	var d = $('#shipping_per_order').text();
		var total = a*1 * (b*1 + c*1) + d*1;
	    $('#total').text(formatCurrency(total));
	    $('.USD').formatCurrency();
		$('.EUR').formatCurrency({region: 'nl-NL' });


	$('#buy-country').change(function() {

	   var shipping = $(this).find('option:selected').attr('data');
		if ($('#shipment_cost').hasClass('0'))	
		{
		$('#shipping_per_order').text(formatCurrency(shipping));
			}else {
		$('#shipping_per_item').text(formatCurrency(shipping));
		}
		var a = $('#buy-quantity').val();
	   	var b = $('#subtotal').text();
	   	var c = $('#shipping_per_item').text();
	   	var d = $('#shipping_per_order').text();
		var total = a*1 * (b*1 + c*1) + d*1;
	    $('#total').text(formatCurrency(total));
	    $('.USD').formatCurrency();
		$('.EUR').formatCurrency({region: 'nl-NL' });
	});
	$('#buy-quantity').keyup(function() {

   var shipping = $('#buy-country').find('option:selected').attr('data');
		if ($('#shipment_cost').hasClass('0'))
		{
		$('#shipping_per_order').text(formatCurrency(shipping));
			}else {
		$('#shipping_per_item').text(formatCurrency(shipping));
		}
	    var a = $('#buy-quantity').val();
	   	var b = $('#subtotal').text();
	   	var c = $('#shipping_per_item').text();
	   	var d = $('#shipping_per_order').text();
		var total = a*1 * (b*1 + c*1) + d*1;
	    $('#total').text(formatCurrency(total));
	    $('.USD').formatCurrency();
		$('.EUR').formatCurrency({region: 'nl-NL' });
	});

//Item thumbnails	
	$(".tpm-image-thumbs .image").click(function() {
		var image = $(this).attr("rel");
		$('#image').hide();
		$('#image').show();
		$('#image').html('<img src="' + image + '"/>');
		return false;
	});

//Show the buy/sell form		
	$("#buy-now-button").click(function() {
		$('#buy-now-button').toggleClass('selected');
		$('#tpm-buy-form-wrapper').slideToggle('900');
		$('#tpm-contact-form-wrapper').hide();
		$('#contact-button').removeClass('selected');
	});
	

//Show the contact form		
	$("#contact-button").click(function() {
		$('#contact-button').toggleClass('selected');
		$('#tpm-contact-form-wrapper').slideToggle('900');
		$('#tpm-buy-form-wrapper').hide();
		$('#buy-now-button').removeClass('selected');

	});

//Add number classes for easy styling		
	var i = 1;
	$(".tpm-page-wrapper .tpm-item").each(function(){
	$(this).addClass('row-' + i++);
	});	

//Pagination
$('#tpm-paging .content').hide(function() {
	$('#tpm-paging').pajinate({
		items_per_page : 12  
	});
	$('#tpm-paging .content').show();
	});
	
	
//Tooltip parameters
	
$('.tooltip').tooltip({width: '280px',offsetX: 15,offsetY: 10,fadeIn : '400',fadeOut : '200',bordercolor: '#d7d7d7',bgcolor: '#FFFFFF',fontcolor : '#555',fontsize : '11px', height: 'auto',cursor : 'pointer'});
	


});

})(jQuery);

		    