<?php
require_once("config.php");
if(!empty($_GET['id'])) {
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
            return($client->SendSimpleSMS($parameters));
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
	$id = $_GET['id'];
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

	$sms_result = mysqli_query($con,"SELECT * FROM tasks WHERE id = $id");
	$sms_row = mysqli_fetch_array($sms_result);
	$message_id = $sms_row['message_id'];
	$contact_id = $sms_row['contact_id'];
	$message_result = mysqli_query($con,"SELECT * FROM messages WHERE id = $message_id");
	$message_row = mysqli_fetch_array($message_result);
	$SmsText = $message_row['text']."\n".$signature;
	$customers_result = mysqli_query($con,"SELECT * FROM customers WHERE id = $contact_id");
	$customers_row = mysqli_fetch_array($customers_result);
	$mobile = $customers_row['mobile'];
	$string = send_sms($url,$lineNumber,$username,$password,$mobile,$SmsText);
	
	mysqli_query($con,"UPDATE tasks SET status = 1,sent_date = '$sent_date',sms_result = '$string2' WHERE id = $id ");




///////////////////////////////////////////// strategy_tasks /////////////////////////////////////////////////////////////////
/// select from strategy tasks

    $time = time();
    $strategy_result = mysqli_query($con,"SELECT * FROM strategy_tasks WHERE id = $id ");
    $strategy_row = mysqli_fetch_array($strategy_result);
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
?>
<script type="text/javascript">$('#tasks').load('pages/ajax/tasks.php');</script>