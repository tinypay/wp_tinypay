<?php 
global $current_user;
get_currentuserinfo();

?>	


<?php if( isset($_POST['send']) && (!validateText($_POST['contact-name']) || !validateEmail($_POST['contact-email'])|| !validateText($_POST['contact-subject']) || !validateText($_POST['contact-message']) ) ):?>
	<div id="error">
		<ul>
			<?php if(!validateText($_POST['contact-name'])):?>
				<li><strong>Invalid Name:</strong> Please enter your name</li>
			<?php endif ?>
			<?php if(!validateEmail($_POST['contact-email'])):?>
				<li><strong>Invalid E-mail:</strong> Please enter a valid e-mail</li>
			<?php endif ?>
			<?php if(!validateText($_POST['contact-message'])):?>
				<li><strong>Invalid message:</strong> Please include a </li>
			<?php endif?>
		</ul>
	</div>
<?php elseif(isset($_POST['send'])):?>
<?php endif ?>




<?php if( isset($_POST['send']) && (!validateName($_POST['name']) || !validateEmail($_POST['email'])|| !validateSubject($_POST['subject']) || !validateMessage($_POST['message']) ) ):?>
	<div id="error">
		<ul>
			<?php if(!validateName($_POST['name'])):?>
				<li><strong>Invalid Name:</strong> Please enter your name</li>
			<?php endif ?>
			<?php if(!validateEmail($_POST['email'])):?>
				<li><strong>Invalid E-mail:</strong> Please enter a valid e-mail</li>
			<?php endif ?>
			<?php if(!validateMessage($_POST['message'])):?>
				<li><strong>Ivalid message:</strong> Type a message consisting of at least 10 characters</li>
			<?php endif?>
		</ul>
	</div>
<?php elseif(isset($_POST['send'])):?>
<?php endif ?>

<form id="tpm-contact-form" method="post" class="tpmForm" action="<?php echo plugins_url('tpm_contact_process.php', __FILE__) ?>">
	<input type="hidden" name="user_id" value="<?php echo $tpm_profile; ?>">
		<input type="hidden" name="seller_name" value="<?php echo $marketplace_item->user->name; ?>">
	<input type="hidden" name="item_title" value="<?php echo $marketplace_item->title; ?>">
	<input type="hidden" name="item_page" value="<?php echo bloginfo('url').'/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item='.$marketplace_item->item_id; ?>">
	<div class="rowElem left">
		<label id="contact-nameInfo" for="contact-name">Name</label>
		<input id="contact-name" name="contact-name" type="text" value="<?php echo $current_user->user_firstname.' '.$current_user->user_lastname; ?>" />
	</div>
	<div class="rowElem right">
		<label for="contact-email" id="contact-emailInfo">E-mail</label>
		<input id="contact-email" name="contact-email" type="text" value="<?php echo $current_user->user_email; ?>"/>
	</div>
	<div class="rowElem left">
		<label id="contact-subjectInfo" for="contact-subject">Subject</label>
		<input id="contact-subject" name="contact-subject" type="text" value="<?php echo $marketplace_item->title;?>" />
	</div>	
	<div class="clearfix"></div>
	<div class="rowElem">
		<label id="contact-messageInfo" for="contact-message">Message</label>
		<textarea id="contact-message" name="contact-message" cols="" rows=""></textarea>
	</div>
	<div class="buy_button">
		<input id="send" name="send" type="submit" value="Send" />
	</div>
</form>