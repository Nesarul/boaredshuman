<?php
if (isset($_POST['question']) && !empty($_POST['question'])) {
	$str = strtolower($_POST['question']);

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
			if(in_array($cr[$i],$bw))
			{
				echo "We do not allow NSFW (r-rated or offensive) content. Please try a different word or phrase.";
				die();
			}
		}
	}else if(in_array($str,$bw))
	{
		echo "We do not allow NSFW (r-rated or offensive) content. Please try a different word or phrase.";
		die();
	}
	

	$resp = getData($str);
}

function getData($str)
{
	setCk();
	echo "clean";
}



function setCk(){
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
}
?>
