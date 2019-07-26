<?php


$aalAmazon = new aalModule('amazon','Amazon Links',3);
$aalModules[] = $aalAmazon;

$aalAmazon->aalModuleHook('content','aalAmazonDisplay');


//amazon ajax
add_action( 'wp_ajax_aal_amazon_get', 'aal_amazon_ajax' );
add_action( 'wp_ajax_nopriv_aal_amazon_get', 'aal_amazon_ajax' );


function aal_amazon_ajax() {
	
	check_ajax_referer( 'aalamazonnonce', 'security' ); 
	

		// Your AWS Access Key ID, as taken from the AWS Your Account page
		$aws_access_key_id = get_option('aal_amazonapikey');
		
		// Your AWS Secret Key corresponding to the above ID, as taken from the AWS Your Account page
		$aws_secret_key = get_option('aal_amazonsecret');
		
		$amazonactive = get_option('aal_amazonactive');
		$amazonid = get_option('aal_amazonid');
		$amazoncat = get_option('aal_amazoncat');
		$amazonlocal = get_option('aal_amazonlocal');
		
		$amazondisplaylinks = get_option('aal_amazondisplaylinks');
		$amazondisplaywidget = get_option('aal_amazondisplaywidget');
		if(!$amazondisplaywidget) $amazondisplaylinks = 1;

		if(!$amazonactive || !$amazonid) { exit(); die(); }
				
		if($amazoncat) $acategory = $amazoncat;
		else $acategory = 'All';
	
		if($amazonlocal) $amazonlocal = $amazonlocal;
		else $amazonlocal = 'com';	
		
		
	
	if(isset($_POST['keywords']) && is_array($_POST['keywords'])) $keywords = array_map( 'sanitize_text_field', $_POST['keywords'] );
	if(isset($_POST['notimes'])) $notimes = sanitize_text_field($_POST['notimes']);
	$alinks = array();
	$awidgets = array();

	//print_r($data);
	if(!$keywords[0]) { echo 'no keys'; die(); }
	$nrk = 0;
	$nrw = 0;
	foreach($keywords as $keyword) {		
	
			if($nrk>=$notimes) if(!$amazondisplaywidget || $nrk>2) break;
			$searchstring = $keyword;
		   
			
			//echo $searchstring;	
			
		if($amazondisplaywidget) $responsegroup = "Small,Images";
		else $responsegroup = "Small";
			
		
		// The region you are interested in
		$endpoint = "webservices.amazon.com";
		
		$uri = "/onca/xml";
		
		$params = array(
		    "Service" => "AWSECommerceService",
		    "Operation" => "ItemSearch",
		    "AWSAccessKeyId" => $aws_access_key_id,
		    "AssociateTag" => $amazonid,
		    "SearchIndex" => $acategory,
		    "Keywords" => $searchstring,
		    "ResponseGroup" => $responsegroup,
		    "ItemPage" => '1'
		);
		
		// Set current timestamp if not set
		if (!isset($params["Timestamp"])) {
		    $params["Timestamp"] = gmdate('Y-m-d\TH:i:s\Z');
		}
		
		// Sort the parameters by key
		ksort($params);
		
		$pairs = array();
		
		foreach ($params as $key => $value) {
		    array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
		}
		
		// Generate the canonical query
		$canonical_query_string = join("&", $pairs);
		
		// Generate the string to be signed
		$string_to_sign = "GET\n".$endpoint."\n".$uri."\n".$canonical_query_string;
		
		// Generate the signature required by the Product Advertising API
		$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $aws_secret_key, true));
		
		// Generate the signed URL
		$request_url = 'http://'.$endpoint.$uri.'?'.$canonical_query_string.'&Signature='.rawurlencode($signature);
		
		
		$html_response = wp_remote_get($request_url);
		$nrk++;
		
		ob_clean();
		//echo "Signed URL: \"".$request_url."\"";	
			
			
		//	echo $html_response['body'];
			$xml = simplexml_load_string( $html_response['body'] );
			//print_r($xml);
			if($xml->Error->Code) { echo $xml->Error->Code; 
			exit(); die(); }
			//print_r($xml->Items);	
			$items = $xml->Items->Item;
			if(!$items) { 
			   //echo 'no links' ; 
				sleep(2); continue; 
			}
			
			//print_r($items);
			//$link = $items[0]->DetailPageURL;
		
			foreach($items as $item) {
				
				//print_r($item);
				
				
				
				if($amazondisplaywidget && $nrw<=2 && $item->MediumImage->URL) {
					
					$awidget = new StdClass();
					$awidget->url = $item->DetailPageURL;
					$awidget->id = $item->ASIN;
					$awidget->image = $item->MediumImage->URL;
					$awidget->title = $item->ItemAttributes->Title;
					
					$awidgets[] = $awidget;
					$nrw++;
									
				
				
				}
		
				
				if($amazondisplaylinks) {
					
					$link = (string) $item->DetailPageURL;
					
					$found = 0;
					foreach($alinks as $aa) {
						if($link == $aa->link) $found = 1;		
					}
					if($found != 1) {
						$alink = new StdClass();
						$alink->key = $searchstring;
						$alink->url = $link;
						$alinks[] = $alink;
						break;
					}
				
				}
				
				

				
					
			
			}
			
		sleep(2);
			
	}
	$jsonresult = new StdClass();
	$jsonresult->amazonlinks = $alinks;
	$jsonresult->amazonwidget = $awidgets;
	$jsonlinks = json_encode($jsonresult);
	echo $jsonlinks;
	?>
	

	<?php
	exit();
	die();
}



add_action( 'admin_init', 'aal_amazon_register_settings' );


function aal_amazon_register_settings() { 
   register_setting( 'aal_amazon_settings', 'aal_amazonid' );
   register_setting( 'aal_amazon_settings', 'aal_amazonapikey', 'aal_amazon_save_apikey' );
   register_setting( 'aal_amazon_settings', 'aal_amazonsecret', 'aal_amazon_save_secret' );
   register_setting( 'aal_amazon_settings', 'aal_amazoncat' );
   //register_setting( 'aal_amazon_settings', 'aal_amazonactive' );
   register_setting( 'aal_amazon_settings', 'aal_amazonlocal' );
   register_setting( 'aal_amazon_settings', 'aal_amazondisplaylinks' );
   register_setting( 'aal_amazon_settings', 'aal_amazondisplaywidget' );
}

function aal_amazon_save_apikey($value) {
	
		$savedata = @file_get_contents('https://autoaffiliatelinks.com/api/apisave.php?apikey='. get_option('aal_apikey') .'&amazonapikey='. $value );
		

	return $value;
}

function aal_amazon_save_secret($value) {
	
	$savedata = @file_get_contents('https://autoaffiliatelinks.com/api/apisave.php?apikey='. get_option('aal_apikey') .'&amazonsecret='. $value );

	return $value;
}


function aalAmazonDisplay() {
	
	$amazoncat = get_option('aal_amazoncat');
	
	if(get_option('aal_amazondisplaylinks') && get_option('aal_amazondisplaylinks') != 1  ) delete_option('aal_amazondisplaylinks');
	if(get_option('aal_amazondisplaywidget') && get_option('aal_amazondisplaywidget') != 1  ) delete_option('aal_amazondisplaywidget');
	
	?>

<script type="text/javascript">

function aal_amazon_validate() {
	
		if(!document.aal_amazonform.aal_amazoncat.value) { alert("Please select a category"); return false; }
		if(!document.aal_amazonform.aal_amazonid.value) { alert("Please add your amazon ID"); return false; }
		if(!document.aal_amazonform.aal_amazonapikey.value) { alert("Please add your amazon API Key"); return false; }
		if(!document.aal_amazonform.aal_amazonsecret.value) { alert("Please add your amazon Secret Key"); return false; }
				
	}

jQuery(document).ready(function() {
      jQuery("#aal_amazoncat").val("<?php echo $amazoncat; ?>");	
}); 

	
	</script>
	
	
<div class="wrap">  
    <div class="icon32" id="icon-options-general"></div>  
        
        
                <h2>Amazon Links</h2>
                <br /><br />
                
                         
                
                
                Once you add your affiliate ID and activate amazon links, they will start to appear on your website. The manual links that you add will have priority.<br />
                This feature will only work if you have set the API Key in the "API Key" menu.
                <br /><br />
                
<div class="aal_general_settings">
		<form method="post" action="options.php" name="aal_amazonform" onsubmit="return aal_amazon_validate();"> 
<?php
		settings_fields( 'aal_amazon_settings' );
		do_settings_sections('aal_amazon_settings_display');
		
?>
		<span class="aal_label">Amazon Affiliate ID:</span> <input type="text" name="aal_amazonid" value="<?php echo get_option('aal_amazonid'); ?>" />
		<br /><br />
	<span class="aal_label">Category: </span><select id="aal_amazoncat"  name="aal_amazoncat" ><option value="">-Select a cateogry-	</option>
		<option value="Apparel">Apparel & Accessories</option>
		<option value="Appliances">Appliances</option>
		<option value="ArtsAndCrafts">Arts, Crafts & Sewing</option>
		<option value="Automotive">Automotive</option>
		<option value="Baby">Baby</option>
		<option value="Beauty">Beauty</option>
		<option value="Books">Books</option>
		<option value="Classical">Classical</option>
		<option value="Collectibles">Collectibles & Fine Art</option>
		<option value="DigitalMusic">Digital Music</option>
		<option value="Grocery">Grocery & Gourmet Food</option>
		<option value="DVD">Movies &amp; TV</option>
		<option value="Electronics">Electronics</option>
		<option value="HealthPersonalCare">Health & Personal Care</option>
		<option value="HomeGarden">Home & Garden</option>
		<option value="Industrial">Industrial & Scientific</option>
		<option value="Jewelry">Jewelry</option>
		<option value="KindleStore">Kindle Store</option>
		<option value="Kitchen">Home & Kitchen</option>
		<option value="LawnGarden">Lawn & Garden</option>
		<option value="Magazines">Magazine Subscriptions</option>		
		<option value="Marketplace">Marketplace</option>
		<option value="Merchants">Merchants</option>
		<option value="Miscellaneous">Miscellaneous</option>
		<option value="MobileApps">Android apps</option>
		<option value="MP3Downloads">MP3Downloads</option>
		<option value="Music">Music</option>
		<option value="MusicalInstruments">Musical Instruments</option>	
		<option value="MusicTracks">Music Tracks</option>
		<option value="OfficeProducts">Office Products</option>		
		<option value="OutdoorLiving">OutdoorLiving</option>
		<option value="PCHardware">PCHardware</option>
		<option value="PetSupplies">PetSupplies</option>
		<option value="Photo">Photo</option>
		<option value="Shoes">Shoes</option>
		<option value="Software">Software</option>
		<option value="SportingGoods">Sports & Outdoors</option>
		<option value="Tools">Home Improvement</option>		
		<option value="Toys">Toys and Games</option>
		<option value="UnboxVideo">UnboxVideo</option>
		<option value="VHS">VHS</option>
		<option value="Video">Video</option>
		<option value="VideoGames">Video Games</option>	
		<option value="Watches">Watches</option>
		<option value="Wireless">Cell Phones</option>		
		<option value="WirelessAccessories">Cell Phones & Accessories</option>		
		<option value="All">All Categories</option>
	</select>
	<br /><br />
	<span class="aal_label">Localization: </span><select id="aal_amazonlocal"  name="aal_amazonlocal" >
		<option value="com" <?php if(get_option('aal_amazonlocal')=='com') echo "selected"; ?> >COM</option>
		<option value="ca" <?php if(get_option('aal_amazonlocal')=='ca') echo "selected"; ?>>CA</option>
		<option value="cn" <?php if(get_option('aal_amazonlocal')=='cn') echo "selected"; ?>>CN</option>
		<option value="de" <?php if(get_option('aal_amazonlocal')=='de') echo "selected"; ?>>DE</option>
		<option value="es" <?php if(get_option('aal_amazonlocal')=='es') echo "selected"; ?>>ES</option>
		<option value="fr" <?php if(get_option('aal_amazonlocal')=='fr') echo "selected"; ?>>FR</option>
		<option value="in" <?php if(get_option('aal_amazonlocal')=='in') echo "selected"; ?>>IN</option>
		<option value="it" <?php if(get_option('aal_amazonlocal')=='it') echo "selected"; ?>>IT</option>
		<option value="co.jp" <?php if(get_option('aal_amazonlocal')=='co.jp') echo "selected"; ?>>JP</option>
		<option value="co.uk" <?php if(get_option('aal_amazonlocal')=='co.uk') echo "selected"; ?>>UK</option>
	</select>
	<br /><br />

	
	<span class="aal_label">Display</span> 
	<input type="checkbox" name="aal_amazondisplaylinks" value="1" <?php checked( '1', get_option('aal_amazondisplaylinks'), 'checked');  ?>  /> Display links in text &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" name="aal_amazondisplaywidget" value="1" <?php checked( '1', get_option('aal_amazondisplaywidget'), 'checked');  ?> /> Display product widget at bottom of post

	<!-- <br />
		<span class="aal_label">Status: </span><select name="aal_amazonactive">
			<option value="0" <?php if(get_option('aal_amazonactive')=='0') echo "selected"; ?> > Inactive</option>
			<option value="1" <?php if(get_option('aal_amazonactive')=='1') echo "selected"; ?> >Active</option>
		</select><br /> -->
	<br /><br />
	<h4>Amazon API settings:</h4>
	<br />
	<span class="aal_label">Amazon API key:</span> <input class="aal_big_input" type="text" name="aal_amazonapikey" value="<?php echo get_option('aal_amazonapikey'); ?>" />
		<br /><br />
	<span class="aal_label">Amazon API Secret:</span> <input class="aal_big_input" "aal_big_input" type="text" name="aal_amazonsecret" value="<?php echo get_option('aal_amazonsecret'); ?>" />
		<br /><br />
		<p>You can get your Amazon API key and secret from your Amazon Associates account, from <a href="https://affiliate-program.amazon.com/assoc_credentials/home">Manage Credentials</a>	 page. Check <a href="https://autoaffiliatelinks.com/how-to-obtain-amazon-product-advertising-api-key-and-secret/">this article</a> for instructions.</p>	
		<br /><br />



<?php
	submit_button('Save');
	echo '</form></div>';
	echo '</div>';

}




?>