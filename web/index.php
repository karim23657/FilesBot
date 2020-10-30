<?php
require_once __DIR__ . "/config.php";
use kyle2142\PHPBot;

// Set the bot TOKEN
$bot_id = $GLOBALS["TG_BOT_TOKEN"];
$bot = new PHPBot($bot_id);
$content = file_get_contents("php://input");
$update = json_decode($content, true);


$token = $bot_id;
// read incoming info and grab the chatID 
$json = file_get_contents('php://input');
$telegram = urldecode ($json);
$telegram = str_replace ('jason=','',$telegram); //Just for Teletter.net
$results = json_decode($telegram); 


$message = $results->message;
$text = $message->text;
$chat = $message->chat;
$user_id = $chat->id;

function tgmsg ($txt,$token,$user_id){
	 $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id.'&text='.$txt;
     file_get_contents($url);
}

switch ($text) {
	case '/start':
	$txt = "سلام کاربر گرامی  \n /start \n /date \n سلام \n /id \n /second \n /server \n اذان" ;
	tgmsg ($txt,$token,$user_id);
	break;
	case '/date':
	date_default_timezone_set("Iran"); 
	$txt = "امروز" ;
	tgmsg ($txt,$token,$user_id);
	$txt = 'ساعت'.'='.'      '. date("h:i:sa"); 
	tgmsg ($txt,$token,$user_id);
	$txt = 'یا به عبارتی'.'='.'      '. date("H:i:s"); 
	tgmsg ($txt,$token,$user_id);
	$txt = "تاریخ" .'='.'      '. date("Y-m-d") ;
	tgmsg ($txt,$token,$user_id);
	$txt = "روز هفته" .'='.'      '. date("l") ;
	tgmsg ($txt,$token,$user_id);
	break;
	case 'سلام':
	$txt = 'سلام علیکم' ;
	tgmsg ($txt,$token,$user_id);
	break;
	case '/id':
	$txt = $user_id ;
	tgmsg ($txt,$token,$user_id);
	break;
	case '/second':
	$txt = date("s");
	tgmsg ($txt,$token,$user_id);
	break;
	case '/server':
    $direname = getcwd();
    $freesp = round(disk_free_space($direname)/1000000000,3);
    $totsp = round(disk_total_space($direname)/1000000000,3);
    $percentsp = round($freesp/$totsp*100,2);
    $percusdsp = 100-$percentsp;
	$df1 = $_SERVER['PHP_SELF']."\n".$_SERVER['HTTP_REFERER']."\n".$_SERVER['HTTP_USER_AGENT']."\n".$_SERVER['SCRIPT_NAME']."\n\n";
    $txt = "$df1 Free space :$freesp Gb \n Total space :$totsp Gb\n$percentsp % free\n$percusdsp % used";  
	tgmsg ($txt,$token,$user_id);
	break;
	case 'اذان';
	$json1 = file_get_contents('https://prayer.aviny.com/api/prayertimes/643');
    $avini = urldecode ($json1);
    $avinijs = json_decode($avini);
    $azsobh = $avinijs->Imsaak;
    $azzohr = $avinijs->Noon;
    $azmaghreb = $avinijs->Maghreb;
    $aftolu = $avinijs->Sunrise;
    $afghor = $avinijs->Sunset;
    $animesh = $avinijs->Midnight;
	$Today = $avinijs->Today;
	$TodayQamari = $avinijs->TodayQamari;
	$txt = "امروز:$Today \n الیوم:$TodayQamari \n اذان صبح:$azsobh  \n طلوع آفتاب: $aftolu \n اذان ظهر:$azzohr  \n اذان مغرب: $azmaghreb \n غروب آفتاب $afghor \n نیمه شب شرعی : $animesh";
	tgmsg ($txt,$token,$user_id);
	break;
	default:
	$txt = "؟ $text یعنی مخای بگی";
	tgmsg ($txt,$token,$user_id);
}











