(function($){
$(document).ready(function(){

//Validation for buy form
	var buy_form = $("#tpm-buy-form");
	var buy_name = $("#buy-name");
	var buy_nameInfo = $("#buy-nameInfo");
	var buy_email = $("#buy-email");
	var buy_emailInfo = $("#buy-emailInfo");
	var buy_inventory = $("#buy-inventory");
	var buy_quantity = $("#buy-quantity");
	var buy_quantityInfo = $("#buy-quantityInfo");



	//Validate fields on key up and the entire form on submission
	buy_quantity.keyup(validateBuyQuantity);
	buy_name.keyup(validateBuyName);
	buy_email.keyup(validateBuyEmail);

	buy_form.submit(function(){
		if(validateBuyName() & validateBuyEmail()& validateBuyQuantity())
			return true
		else
			return false;
	});

	//field validation functions
	function validateBuyEmail(){
		var a = $("#buy-email").val();
		var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(filter.test(a)){
			buy_email.removeClass("error");
			buy_emailInfo.text("E-mail");
			buy_emailInfo.removeClass("error");
			return true;
		}
		else{
			buy_email.addClass("error");
			buy_emailInfo.text("Please enter a valid e-mail");
			buy_emailInfo.addClass("error");
			return false;
		}
	}
	function validateBuyName(){
		if(buy_name.val().length < 2){
			buy_name.addClass("error");
			buy_nameInfo.text("Please enter a valid name");
			buy_nameInfo.addClass("error");
			return false;
		}
		else{
			buy_name.removeClass("error");
			buy_nameInfo.text("Name");
			buy_nameInfo.removeClass("error");
			return true;
		}
	}

	function validateBuyQuantity(){
		if(buy_quantity.val() > buy_inventory.val()){
			buy_quantity.addClass("error");
			buy_quantityInfo.text("");
			buy_quantityInfo.text("The entered amount exceeds the current stock.");
			return false;
		}
		else{
			buy_quantityInfo.text("");
			buy_quantity.removeClass("error");
			return true;
		}
	}	


//Validation for contact form
	var contact_form = $("#tpm-contact-form");
	var contact_name = $("#contact-name");
	var contact_nameInfo = $("#contact-nameInfo");
	var contact_email = $("#contact-email");
	var contact_emailInfo = $("#contact-emailInfo");
	var contact_subject = $("#contact-subject");
	var contact_subjectInfo = $("#contact-subjectInfo");
	var contact_message = $("#contact-message");
	var contact_messageInfo = $("#contact-messageInfo");

	//Validate fields on key up and the entire form on submission
	contact_name.keyup(validateContactName);
	contact_message.keyup(validateContactMessage);
	contact_subject.keyup(validateContactSubject);
	contact_email.keyup(validateContactEmail);

	contact_form.submit(function(){
		if(validateContactName() & validateContactEmail() & validateContactSubject() & validateContactMessage())
			return true,
				$('#tpm-contact-form-wrapper').fadeOut('500'),
				$('#tpm-contact-loading').show()

			
		else
			return false;
	});

	//field validation functions
	function validateContactEmail(){
		var a = $("#contact-email").val();
		var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(filter.test(a)){
			contact_email.removeClass("error");
			contact_emailInfo.text("E-mail");
			contact_emailInfo.removeClass("error");
			return true;
		}
		else{
			contact_email.addClass("error");
			contact_emailInfo.text("Please enter a valid e-mail");
			contact_emailInfo.addClass("error");
			return false;
		}
	}
	function validateContactName(){
		if(contact_name.val().length < 2){
			contact_name.addClass("error");
			contact_nameInfo.text("Please enter a valid name");
			contact_nameInfo.addClass("error");
			return false;
		}
		else{
			contact_name.removeClass("error");
			contact_nameInfo.text("Name");
			contact_nameInfo.removeClass("error");
			return true;
		}
	}
	function validateContactSubject(){
		if(contact_subject.val().length < 1){
			contact_subject.addClass("error");
			contact_subjectInfo.text("Please include a subject");
			contact_subjectInfo.addClass("error");
			return false;
		}
		else{
			contact_subjectInfo.removeClass("error");
			contact_subject.removeClass("error");
			contact_subjectInfo.text("Subject");
			return true;
		}
	}	
	function validateContactMessage(){
		if(contact_message.val().length < 1){
			contact_message.addClass("error");
			contact_messageInfo.text("Please add a message");
			contact_messageInfo.addClass("error");
			return false;
		}
		else{			
			contact_message.removeClass("error");
			contact_messageInfo.text("Message");
			contact_messageInfo.removeClass("error");
			return true;
		}
	}
});
})(jQuery);