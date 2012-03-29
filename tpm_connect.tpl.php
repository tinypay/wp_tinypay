<?php
require_once('includes/token.php');
global $current_user;
get_currentuserinfo();
$user_id= $current_user->ID;
$key = 'tpm_paypal_access';
$single = true;
$tpm_AccessToken = get_user_meta( $user_id, $key, $single );

$have_access_token = false;

if(!empty($tpm_AccessToken)){
	// check if Access Token is still valid
	try{
		$result = $obj->checkOAuthAccessToken($tpm_AccessToken);
	
		if(isset($result->success) AND $result->success){
			// tpm_debug('access token is still valid!');
			$have_access_token = true;
		}else{
			// tpm_debug('access token is not valid!');
		}
	}catch(Exception $e){
		// tpm_debug($e);
	}
}

$logged_in = true;
if (!is_user_logged_in()){
	$logged_in = false;
}else{

	/* The user is logged into Wordpress, check to see if they have a paypal access stored */
	if (!$have_access_token){

		/* 	The user is logged into Wordpress, doesn't have a paypal access stored, so let's get one */

		if (isset($_GET['code']) and !empty($_GET['code'])){

			/* Yay! We got a code */
			try{
				$result = $obj->getOAuthAccessToken($access_token, $_GET['code']);
				
				// tpm_debug($result);	
				if(isset($result->access_token)){
	
					$tpm_AccessToken = $result->access_token;
					// tpm_debug($tpm_AccessToken);
	
					update_user_meta($user_id, 'tpm_paypal_access', $tpm_AccessToken);
	
					$have_access_token = true;
	
				}else{
					?>
						<script type="text/javascript">
							// reload page to try again
							window.location.href = '<?php echo $_SERVER['REDIRECT_URL'];?>';
						</script>
					<?php
				}
			}catch(Exception $e){
				// tpm_debug($e);
			}
			

		}else{

		}
	}
}

// still have access token? fetch single sign on token to autologin
if($have_access_token == true and isset($tpm_AccessToken) and !empty($tpm_AccessToken)){
	
	try{
		$result = $obj->createSSOToken($tpm_AccessToken);

		if (isset ($result->sso_token)){
			$sso_token = $result->sso_token;
			
			$tpm_items = $obj->getMyItems($tpm_AccessToken, $select = 'currency,description,images,item_id,price,quantity,shipment_costs,shipment_costs_per_item,title,user', $not_select = null, $page = null, $limit = null, $marketplace_id = $tpmm_id);
		}else{
			$have_access_token = false;
		}
	}catch(Exception $e){
		// tpm_debug($e);
	}

}

// tpm_debug($tpm_AccessToken);

?>

<!-- Check to see if the user is logged in -->

<?php if($logged_in == true):?>

		<script type="text/javascript" charset="UTF-8" src="https://tinypay.me/oauth/js/connect_01"></script>


	<?php if($have_access_token == true):?>

	<div class="tpm-subhead clear8">[ MARKTPLAATS ]</div>
	

	<iframe src="https://tinypay.me/oauth/dashboard?sso_token=<?php echo $sso_token;?>&iframe=1&lang=nl-nl" style="width:560px;height:300px;margin-left:auto;margin-right:auto;"></iframe>

		<div class="tpm-subhead">[ MIJN PRODUCTEN ]</div>
		<div id="tpm-paging" class="container">
			<div class="content clearfix">
			<?php if (isset($tpm_items) AND !empty($tpm_items)): ?>	
					<?php foreach($tpm_items as $tpm_item) : ?>

						<div id="tooltip_<?php echo $tpm_item->item_id; ?>" class="tpm-item tooltip">
							<div class="item-inner">
								<div class="image">
					
									<?php if (isset($tpm_item->images[0]->xsmall)): ?>
										<img src="<?php echo $tpm_item->images[0]->xsmall; ?>"/>
									<?php endif; ?>
									
								</div>
							<div class="tpm-title">
								<?php echo truncate($tpm_item->title,24); ?>
							</div>
							<div class="edit_links">
							
								<?php 
									$edit_url = 'https://tinypay.me/oauth/popup?gt='.urlencode('/embed/manage?gt='.urlencode('login/item/'.$tpm_item->item_id.'?iframe_popup=1'));
								?>

								<a href="<?php echo $edit_url;?>" class="tpm_edit_item link">bewerken</a> | 
								<a href="<?php echo bloginfo('url'); ?>/<?php echo TPM_PATH_MARKETPLACE; ?>/<?php echo TPM_PATH_ITEM; ?>/?item=<?php echo $tpm_item->item_id; ?>" class="tpm_edit_item">bekijken</a>
							</div>
							</div>

					<!-- Data for the tooltip -->
							<div id="data_tooltip_<?php echo $tpm_item->item_id; ?>" class="hidden">
								<div class="tooltip-inner">
										<div class="tooltip-title"><?php echo $tpm_item->title; ?></div>
										<?php  if (isset ($tpm_item->description)){echo truncate( $tpm_item->description,130);}?>
								<div class="price">
									<span class="price <?php echo $tpm_item->currency; ?>"><strong><?php echo $tpm_item->price; ?></strong></span>
								</div>
								</div>
								
							</div>
						</div>

					<?php endforeach;?>
				<?php endif; ?>

				</div>
			<div class="tpm-dotted"> </div>
			<!-- Only show navigation if needed -->
		<?php if (isset($tpm_items) AND !empty($tpm_items)): ?>	
			<?php if (count($tpm_items)>12): ?>
				<div class="page_navigation clearfix"></div>
			<?php endif; ?>
		<?php endif; ?>

			</div>
	<?php else: ?>

		<iframe src="https://tinypay.me/oauth/widget?mp_id=<?php echo $tpmm_id;?>&iframe=1&lang=en-us" style="width:560px;height:250px;margin-left:auto;margin-right:auto;"></iframe>
	<?php endif;?>
<?php else:?>

	<p>You have to be logged in to view this page. <a href="<?php echo bloginfo('url'); ?>/wp-login.php">Click here</a> to login.</p>

<?php endif;?>
