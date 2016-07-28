<?php

	
	$postData = "officecode=511&officetype=2";
	$l = strlen($postData);
	#print "10 ";
	//API URL
	$url="http://mobileapp.mahadiscom.in/Emp_App_Request/GetAccess/SubStationFeeder";
	
	
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

	#print "11 ";
	//Ignore SSL certificate verification
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

#print "12 ";
	//get response
	$output = curl_exec($ch);
	print_r($output);
	print $output;

	//Print error if any
	if(curl_errno($ch))
	{
		echo 'error:' . curl_error($ch);
	}

	curl_close($ch);
	
?>	