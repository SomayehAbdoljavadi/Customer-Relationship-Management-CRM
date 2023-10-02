<?php
require_once('config.php');
ini_set("display_errors", "Off");
ini_set("soap.wsdl_cache_enabled", "0");
function send_sms($url,$lineNumber,$username,$password,$mobile,$SmsText){
    try {
        $client = new SoapClient($url);
        $parameters['username'] = $username;
        $parameters['password'] = $password;
        $parameters['from'] = $lineNumber;
        $parameters['to'] = array("$mobile");
        $parameters['text'] =$SmsText;
        $parameters['isflash'] = false;
        $parameters['udh'] = "";
        $parameters['recId'] = array(0);
        $parameters['status'] = 0x0;
        return $client->SendSimpleSMS($parameters);
    } catch (SoapFault $ex) {
        date_default_timezone_set('Asia/Tehran');
        $client= new SoapClient($url);
        $parameters['userName'] = $username;
        $parameters['password'] = $password;
        $parameters['mobileNos'] = array("$mobile");
        $parameters['messages'] = array("$SmsText");
        $parameters['lineNumber'] = $lineNumber;
        $parameters['sendDateTime'] = null;
        $parameters['message'] = '';
        return $client->SendMessageWithLineNumber($parameters);
    }
}
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_url'");
$row = mysqli_fetch_array($result);
$url = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_number'");
$row = mysqli_fetch_array($result);
$lineNumber = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_username'");
$row = mysqli_fetch_array($result);
$username = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'sms_password'");
$row = mysqli_fetch_array($result);
$password = $row['value'];
$result = mysqli_query($con,"SELECT * FROM configuration WHERE item = 'signature'");
$row = mysqli_fetch_array($result);
$signature = $row['value'];
$time = time();

///////////////////////////////////////////// normal tasks /////////////////////////////////////////////////////////////////
/// select from tasks
$result = mysqli_query($con,"SELECT * FROM tasks WHERE status = 0 AND send_date < '$time' LIMIT 10");
while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $contact_id = $row['contact_id'];
    $message_id = $row['message_id'];
    $contact_result = mysqli_query($con,"SELECT * FROM customers WHERE id = $contact_id");
    $contact_row = mysqli_fetch_array($contact_result);
    $title_id = $contact_row['title_id'];
    $title_result = mysqli_query($con,"SELECT * FROM titles WHERE id = $title_id");
    $title_row = mysqli_fetch_array($title_result);
    $title = $title_row['title'];
    $mobile = $contact_row['mobile'];
    $message_result = mysqli_query($con,"SELECT * FROM messages WHERE id = $message_id");
    $message_row = mysqli_fetch_array($message_result);
    $SmsText = $title."\n".$message_row['text']."\n".$signature;
    $sms_resutlt = send_sms($url,$lineNumber,$username,$password,$mobile,$SmsText);
    $sent_date = time();
    $time = time();
    $string = $sms_resutlt;
    //print_r($sms_resutlt);
    if(!empty($string->SendMessageWithLineNumberResult)) {
        if(!empty($string->SendMessageWithLineNumberResult->long)) {
            $string2 = json_encode($string);
            mysqli_query($con,"UPDATE tasks SET status = 1,sent_date = '$sent_date',sms_result = '$string2' WHERE id = $id ");
        }
        print_r($string);
    }
    $sms_resutlt = json_encode($sms_resutlt);
    mysqli_query($con,"UPDATE tasks SET sms_result = '$sms_resutlt' WHERE id = $id ");
}


///////////////////////////////////////////// strategy_tasks /////////////////////////////////////////////////////////////////
/// select from strategy tasks

$time = time();
$strategy_result = mysqli_query($con,"SELECT * FROM strategy_tasks WHERE status = 0 AND send_date < '$time' LIMIT 10 ");
while($strategy_row = mysqli_fetch_array($strategy_result)) {
    $contact_id = $strategy_row['contact_id'];
    $id = $strategy_row['id'];
    $st_id = $strategy_row['st_id'];
    $st_time_result = mysqli_query($con, "SELECT * FROM strategy_times WHERE id = $st_id");
    $st_time_row = mysqli_fetch_array($st_time_result);
    $st_message = $st_time_row['message'];
    $contact_result = mysqli_query($con, "SELECT * FROM customers WHERE id = $contact_id");
    $contact_row = mysqli_fetch_array($contact_result);
    $mobile = $contact_row['mobile'];
    $title_id = $contact_row['title_id'];
    $title_result = mysqli_query($con, "SELECT * FROM titles WHERE id = $title_id");
    $title_row = mysqli_fetch_array($title_result);
    $title = $title_row['title'];
    $SmsText = $title . "\n" . $st_message . "\n" . $signature;
    $sms_resutlt = send_sms($url,$lineNumber,$username,$password,$mobile,$SmsText);
    $sent_date = time();
    $time = time();
    $string = $sms_resutlt;
    //print_r($sms_resutlt);
    if(!empty($string->SendMessageWithLineNumberResult)) {
        if(!empty($string->SendMessageWithLineNumberResult->long)) {
            $string2 = json_encode($string);
            mysqli_query($con,"UPDATE strategy_tasks SET status = 1,sent_date = '$sent_date',sms_result = '$string2' WHERE id = $id ");
        }
        print_r($string);
    }
    $sms_resutlt = json_encode($sms_resutlt);
    mysqli_query($con,"UPDATE strategy_tasks SET sms_result = '$sms_resutlt' WHERE id = $id ");
}



///////////////////////////////////////////// custom_tasks /////////////////////////////////////////////////////////////////
/// select from custom tasks


$time = time();
$custom_result = mysqli_query($con,"SELECT * FROM custom_tasks WHERE status = 0 AND date  < '$time' LIMIT 10 ");
while($custom_row = mysqli_fetch_array($custom_result)) {
    $message = $custom_row['message'];
    $contact_id = $custom_row['contacts'];
    $contact_result = mysqli_query($con, "SELECT * FROM customers WHERE id = $contact_id");
    $contact_row = mysqli_fetch_array($contact_result);
    $mobile = $contact_row['mobile'];
    $sms_resutlt = send_sms($url,$lineNumber,$username,$password,$mobile,$message);
    $sent_date = time();
    $time = time();
    $string = $sms_resutlt;
    $id = $custom_row['id'];
    //print_r($sms_resutlt);
    if(!empty($string->SendMessageWithLineNumberResult)) {
        if(!empty($string->SendMessageWithLineNumberResult->long)) {
            $string2 = json_encode($string);
            mysqli_query($con,"UPDATE custom_tasks SET status = 1,sent_date = '$sent_date',sms_result = '$string2' WHERE id = $id ");
        }
//        print_r($string);
    }
    $sms_resutlt = json_encode($sms_resutlt);
    mysqli_query($con,"UPDATE custom_tasks SET sms_result = '$sms_resutlt' AND status = 1 WHERE id = $id ");
}

header("location: ../#/tasks");
?>