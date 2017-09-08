<?php

ob_start();
$API_KEY = '387820040:AAF9CMhXSIEYOk_-FEO6g2AmcRypOX9iUGM';
define('API_KEY', $API_KEY);

function bot($method, $datas = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

$update 	= json_decode(file_get_contents('php://input'));
$message 	= $update->message;
$chat_id 	= $update->message->chat->id;
$chat_id2 	= $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data 		= $update->callback_query->data;
$id 		= $update->message->from->id;
$name 		= $update->message->from->first_name;
$text = $message->text;
  $time = mktime(0, 0, 0, Date(m), Date(j), Date(Y));
  $TDays=round($time/(60*60*24));  
  $HYear=round($TDays/354.37419);  
  $Remain=$TDays-($HYear*354.37419);  
  $HMonths=round($Remain/29.531182);  
  $HDays=$Remain-($HMonths*29.531182);  
  $HYear=$HYear+1389;  
  $HMonths=$HMonths+10;$HDays=$HDays+23;  
  if ($HDays>29.531188 and round($HDays)!=30){  
	$HMonths=$HMonths+1;$HDays=Round($HDays-29.531182);  
  }else{  
	$HDays=Round($HDays);  
  }  
  if ($HMonths>12) {  
	$HMonths=$HMonths-12;  
	$HYear = $HYear+1;  
  } 
  $NowDay=$HDays;
  $NowMonth=$HMonths;
  $NowYear=$HYear;
  $MDay_Num = date("w");
  if ($MDay_Num=="0"){
	$MDay_Name = "الأحد";
  }elseif ($MDay_Num=="1"){
	$MDay_Name = "الإثنين";
  }elseif ($MDay_Num=="2"){
	$MDay_Name = "الثلاثاء";
  }elseif ($MDay_Num=="3"){
	$MDay_Name = "الأربعاء";
  }elseif ($MDay_Num=="4"){
	$MDay_Name = "الخميس";
  }elseif ($MDay_Num=="5"){
	$MDay_Name = "الجمعة";
  }elseif ($MDay_Num=="6"){
	$MDay_Name = "السبت";
  }
  $NowDayName = $MDay_Name;
  $NowDate = $MDay_Name."، ".$HDays."/".$HMonths."/".$HYear." هـ";
  if ($text ) {
  	bot('sendMessage',[
    	'chat_id'=>$chat_id,
    	'text'=>"$NowDate"
    ]);
}
