<?php
	$musteriIdYT = "XXX";
	$username = "XXX";
	$password = "XXX";
	$size='200';
	$page=-1;
	$endDate = time() * 1000;
	$startDate = ( time() - (3 * 60 * 60)) *1000;

	do{
		$page+=1;
		$url = 'https://api.trendyol.com/sapigw/suppliers/'.$musteriIdYT.'/orders?startDate='.$startDate.'&endDate='.$endDate.'&orderByField=CreatedDate&orderByDirection=DESC&size='.$size.'&page='.$page.'';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		$result=json_decode(curl_exec($ch),true);
		curl_close($ch);
		
		$TY_item_count=count($result['content']);
		echo "<pre>";
		print_r($result);
		echo "</pre>";
		sleep(1);
	}while($TY_item_count == $size);
?>