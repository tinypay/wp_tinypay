<?php

$options = get_option('tinypay_advanced_settings');

if(isset ($options['embed_script']) AND !empty($options['embed_script'])){

echo $options['embed_script'];

} else{
echo 'To moderate your marketplace, paste your marketplace embed script in the Advanced Settings tab. It\'s available when visiting your marketplace options page on TinyPay.me.';
//echo '<script type="text/javascript" charset="utf-8" src="http://dennisbest.tinypay.me/embed/manage"></script>';

}
?>