<?php

//Installation of plugin
function aal_install() {
	global $wpdb; 
	$table_name = $wpdb->prefix . "automated_links";
	
	//TODO: Instead of deleting, check if it is already added;
	if(!get_option('aal_target')) add_option( 'aal_target', '_blank');
	if(!get_option('aal_notimes')) add_option( 'aal_notimes', '3');
	if(!get_option('aal_showhome')) add_option( 'aal_showhome', 'true');
	if(!get_option('aal_showlist')) add_option( 'aal_showlist', 'true');
	
	update_option( 'aal_pluginstatus', 'active');  
	$displayc[] = 'post';
	$displayc[] = 'page';
	$dc = json_encode($displayc); 
	if(!get_option('aal_displayc')) add_option( 'aal_displayc', $dc);
	
	

	//if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {

	$sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  link text NOT NULL,
	  keywords text,
	  meta text,
	  medium varchar(255),
	  grup int(5),
	  grup_desc varchar(255),
	  stats text,
	  PRIMARY KEY  (id)
	  ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
    
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
       // $wpdb->last_error;
       // die();
	
}


function aal_admin_notice() {  
	
	$aal_notice_dismissed = get_option('aal_option_dismissed67'); 
	if(!$aal_notice_dismissed && !get_option('aal_apikey'))
	{  if(current_user_can('activate_plugins')) {
    ?>
    <div id="aal_notice_div" class="updated">
     <div style="float: right;padding-top: 10px;margin-left: 100px;"><a id="aal_dismiss_link" href="javascript:;" >Dismiss this notice</a></div>
      <p><?php    // _e( 'Amazon, Clickbank and Shareasale, Ebay, Walmart, Commission Junction, Bestbuy and Envato Marketplace  links can be automatically added into your content , you only have to <a href="https://autoaffiliatelinks.com/wp-auto-affiliate-links-pro/">get your API key</a>, add your affiliate ID and start earning. ', 'wp-auto-affiliate-links' ); 
      
		 _e( 'Amazon, Clickbank, Ebay, Walmart, Shareasale, Commission Junction, Bestbuy and Envato Marketplace  links can be automatically added into your content. Learn more about <a href="https://autoaffiliatelinks.com/wp-auto-affiliate-links-pro/">Auto Affiliate Links PRO</a>. ', 'wp-auto-affiliate-links' ); 
            
      
  		//  _e( 'Thank you for using Auto Affiliate Links. Upgrade to <a href="https://autoaffiliatelinks.com/wp-auto-affiliate-links-pro/">Auto Affiliate Links PRO</a> to take advantage of all plugin features.', 'wp-auto-affiliate-links' );      

		//  _e( 'Amazon, Clickbank, Ebay, Walmart, Bestbuy and Envato Marketplace  links can be automatically added into your content. Try our new web service <a href="http://azerna.com">Azerna</a>.', 'wp-auto-affiliate-links' ); 
		
	 //	_e( 'Check out <b>Auto Affiliate Links</b> new feature: Category exclusion. Now you can exclude entire categories for showing automated links. <a href="'. get_admin_url() .'?page=aal_topmenu">Check it now</a>', 'wp-auto-affiliate-links' ); 
	 
	// _e( 'Try Auto Affiliate Links PRO for free. Amazon, Clickbank and Shareasale, Ebay, Walmart, Commission Junction, Bestbuy and Envato Marketplace  links can be automatically added into your content. <a href="https://autoaffiliatelinks.com/wp-login.php?action=register">Register on our website</a> and claim your free trial. ', 'wp-auto-affiliate-links' ); 

      
      ?></p>
     
    </div>  
    
    
    <?php
    	}
    
	}
	
	if(get_option('aal_apistatus') == 'expired' && current_user_can('activate_plugins') && get_option('aal_apikey')) {
		echo '<div id="aal_notice_div" class="updated"><p>';
		_e( 'Your Auto Affiliate Links PRO subscription is expired. Please <a href="https://autoaffiliatelinks.com/auto-affiliate-links-payment-plans/">renew your subscription</a> or <a href="https://autoaffiliatelinks.com/auto-affiliate-links-payment-plans/">create a new API key</a>  ', 'wp-auto-affiliate-links' ); 
      
		echo '</p></div>';
	}
	
	if(get_option('aal_apistatus') == 'invalid' && current_user_can('activate_plugins') && get_option('aal_apikey')) {
		echo '<div id="aal_notice_div" class="updated"><p>';
		_e( 'The API key you entered is invalid. You have to <a href="https://autoaffiliatelinks.com/wp-auto-affiliate-links-pro/">register on our website</a> to get a valid API key ', 'wp-auto-affiliate-links' ); 
      
		echo '</p></div>';
	}
	
}


function aalDismissNotice() {
	

		delete_option('aal_option_dismissed65');
		delete_option('aal_option_dismissed66');
		add_option('aal_option_dismissed67',true);
	
	
}


add_action( 'admin_notices', 'aal_admin_notice' );
add_action('wp_ajax_aal_dismiss_notice', 'aalDismissNotice');






?>
