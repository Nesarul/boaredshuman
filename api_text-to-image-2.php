<script src="https://cdnjs.deepai.org/deepai.min.js"></script>
<?php
ob_start();
$MaxCount = 10;						// set the max of the counter.


if(!isset($_COOKIE['boredHuman']))
{
	setcookie('boredHuman',date("Y-m-d"),time()+24*60*60);
}
else{
	if($_COOKIE['boredHuman'] != date("Y-m-d"))
	{
		setcookie('boredHuman',date("Y-m-d"),time()+24*60*60);
		setcookie('VisitCount', 1, time()+24*60*60);
	}
		
}

					
if(!isset($_COOKIE['VisitCount'])) 		
{
    setcookie('VisitCount', 1, time()+24*60*60);
}
else
{
    $lastNum = $_COOKIE['VisitCount']; 	//hold the last number if it was set before
	if($lastNum >= $MaxCount && $_COOKIE['boredHuman'] == date("Y-m-d"))
	{
		echo "You have reached your limit of 10 images a day. Please try again tomorrow.";
		die();
	}
	if($lastNum == 1)					//some logic to avoid repeats
	{
		if($lastNum < $MaxCount)		//if below max, add 1
		{
			$lastNum++;
			setcookie('VisitCount', $lastNum, time()+24*60*60);   
		}
	}
	else
	{
		setcookie('VisitCount', $_COOKIE['VisitCount']+1, time()+24*60*60);   
	}
}
ob_end_flush();



if (isset($_POST['question']) && !empty($_POST['question'])) {
	$str = $_POST['question'];

	$file="badwords2.txt";
	$fopen = fopen($file, 'r');
	$fread = fread($fopen,filesize($file));
	fclose($fopen);

	$lb = "\n";
	$bw = explode($lb, $fread);
	
	if ($str == trim($str) && strpos($str, ' ') !== false) {
		$cr = explode(' ',$str);
		for($i = 0; $i < count($cr); $i++)
		{
			if(in_array(strtolower($cr[$i]),$bw))
			{
				echo "We do not allow NSFW (r-rated or offensive) content. Please try a different word or phrase.";
				die();
			}
		}
	}else if(in_array(strtolower($str),$bw))
	{
		echo "We do not allow NSFW (r-rated or offensive) content. Please try a different word or phrase.";
		die();
	}
	

	$resp = getData($str);
}

function getData($str)
{
$str = rawurlencode($str);
$dt['error'] = "";
// $curl = curl_init();



// $curl = curl_init();
// 	curl_setopt_array($curl, array(
// 	CURLOPT_URL => "https://deepai.org/machine-learning-model/stable-diffusion/" . $str,
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 60,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
// 	CURLOPT_SSL_VERIFYHOST => 0,
// 	CURLOPT_CUSTOMREQUEST => "GET",
// 	CURLOPT_HTTPHEADER => array(
// 		"Api-Key: 2350dbe7-ecfd-47ed-9ffa-b29ecc988b2e",
// 		"cache-control: no-cache",
// 	),
// ));

// curl_setopt_array($curl, array(
// 	CURLOPT_URL => "http://51.68.206.144:8003/" . $str,
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 60,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
// 	CURLOPT_SSL_VERIFYHOST => 0,
// 	CURLOPT_CUSTOMREQUEST => "GET",
// 	CURLOPT_HTTPHEADER => array(
// 		"cache-control: no-cache",
// 	),
// ));


	// $response = curl_exec($curl);


	$response = curl -F 'text=Love' -H 'api-key:2350dbe7-ecfd-47ed-9ffa-b29ecc988b2e' https://api.deepai.org/api/stable-diffusion;
	
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
		$dt['error'] = $err;
	} else {
		$dt['anagrams'] = json_decode($response, true);
		
		if (empty($dt['anagrams'])) {
			echo $dt['error'];
		} else {
			echo "Here Is Your AI-Generated Image: <br>";
			foreach ($dt['anagrams'] as $response2) {
				echo  <br>';
			}
		}
	}

	

}
?>
<script>
// Get the 'deepai' package here (Compatible with browser & nodejs):
//     https://www.npmjs.com/package/deepai
// All examples use JS async-await syntax, be sure to call the API inside an async function.
//     Learn more about async-await here: https://javascript.info/async-await

// Example posting a text URL:

//const deepai = require('deepai'); // OR include deepai.min.js as a script tag in your HTML

// deepai.setApiKey('2350dbe7-ecfd-47ed-9ffa-b29ecc988b2e');

// (async function() {
//     var resp = await deepai.callStandardApi("stable-diffusion", {
//             text: "Love",
//     });
//     console.log(resp);
// })()



// // Example directly sending a text string:

// const deepai = require('deepai'); // OR include deepai.min.js as a script tag in your HTML

// deepai.setApiKey('2350dbe7-ecfd-47ed-9ffa-b29ecc988b2e');

// (async function() {
//     var resp = await deepai.callStandardApi("stable-diffusion", {
//             text: "YOUR_TEXT_HERE",
//     });
//     console.log(resp);
// })()
</script>