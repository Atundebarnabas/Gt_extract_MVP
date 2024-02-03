<?php
include('../config/dbconn.php');
include('function_room.php');
$response = array();

if(isset($_POST['submit_note']))
{
	$recipient = mysqli_real_escape_string($con, $_POST['recipient']);
	$note = mysqli_real_escape_string($con, $_POST['note']);
	$from_who = mysqli_real_escape_string($con, $_POST['from_who']);
	$msg = '';
	$know_code = md5(uniqid());
	// Set character set and collation for the connection
    mysqli_set_charset($con, 'utf8mb4');



	$privateKey = '1f4276388ad3214c873428dbef42888A' ; //some random hex characters

	$encrypted_recipient = encrypt($recipient,$privateKey);
	$encrypted_note = encrypt(str_replace(["\r\n", "\r", "\n"], '<br>', $note), $privateKey);
	$encrypted_from_who = encrypt($from_who, $privateKey);
	$encrypted_know_code = encrypt($know_code, $privateKey);

	if(empty($recipient) || empty($note))
	{
			$response['status'] = 'Error';
			$response['message'] = "You've got to fill all the mandatory fields to complete this😜!";
	}
	else {

		$sql = "INSERT INTO `note_to` (`know_code`, `recipient`, `note`, `from_who`) VALUES('".$know_code."', '$encrypted_recipient', '$encrypted_note', '$encrypted_from_who')";
		$inputs = mysqli_query($con, $sql);
		
		if($inputs > 0)
		{
			 $response['status'] = 'Success';
			 $response['know_code'] = $know_code;
			 $response['time_generated'] = date('Y-m-d H:i:sa');
		}
		else
		{
			 $response['status'] = 'Error';
			 $response['message'] = 'An error occured, while sending data!🤔, Try again';
		}
	}
}
else
{

		$response['status'] = 'Error';
		$response['message'] = 'Invalid request!';
}

header('Content-Type: application/json');
echo json_encode($response);
?>