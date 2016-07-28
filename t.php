<?php
set_time_limit(0);

	// $postData = array(
		// 'officecode' => '511',
		// 'officetype' => '2'
	// );
	
	#print "Feed Proxy <br>\n";
	$url = '';
	$url = @$_POST['url'];
	$postData = '';
	if (@$_POST['url']) 
	{
		while ($element = current($_POST)) 
		{
			$key = key($_POST);
			#print "$key == $element ** \n";
			// if(trim($key) === trim('url'))
			// {
				// $url = $element;
			// }else
			// {
				$postData .= key($_POST).'='.$element.'&';
				next($_POST);
				 //$postData = substr($postData, 0, -1);  // removing trailing &
				 $postData = stripslashes($postData);				
			//}
		}
	}
	
	$postData = str_replace("url=$url","",$postData);
	$postData = substr($postData, 1, -1); 
	#print $url . " ** " . $postData . "<br>\n";//exit;
	
	
	#$postData = "officecode=511&officetype=2";
	#$l = strlen($postData);
	//API URL
	#$url="http://mobileapp.mahadiscom.in/Emp_App_Request/GetAccess/SubStationFeeder";
	#print " ** " . $postData . "<br>\n";exit;
	
	// init the resource
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $postData,

		CURLOPT_VERBOSE => true
		//,CURLOPT_FOLLOWLOCATION => true
	));

	//Ignore SSL certificate verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	//get response
	$output = curl_exec($ch);
	#print_r($output);
	print $output;

	//Print error if any
	if(curl_errno($ch))
	{
		echo 'error:' . curl_error($ch);
	}

	curl_close($ch);

	
?>	