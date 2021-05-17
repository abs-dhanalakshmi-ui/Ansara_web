<?php
if($_POST["type"]=='enquiry'){
	$full_name=$_POST['full_name'];
	$email=$_POST['email'];
	$country=$_POST['country'];
	$phone=$_POST['phone'];
    $sc_id=$_POST['sc_id'];
    $message=$_POST['message'];
	$phoneno=$country."".$phone;
	$to ="info@ansara.co";
	$subject = "Enquiry From ".$full_name;
	$body = '
	 <p>Full Name: '.$full_name.'</p>
	 <p>Email: '.$email.'</p>
	 <p>Email: '.$phoneno.'</p>
	 <p>Email: '.$sc_id.'</p>
	 <p>Project Brief: </p>
	 <p>Email: '.$message.'</p>';
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers ="From: " .$_POST['email'];
	if(mail($to,$subject,$message,$headers))
	{
		echo "sent";
	}
	else
	{
		echo "not_sent";
	}
}
else if($_POST["type"]=='contact'){

	$f_name=$_POST['f_name'];
	$email=$_POST['email'];
	$country=$_POST['country'];
	$phone=$_POST['phone'];
    $last_name=$_POST['l_name'];
    $message=$_POST['message'];
	$phoneno=$country."".$phone;
	$nameDetails=$f_name."".$last_name;
	$to ="info@ansara.co";
	$subject = "Enquiry From ".$nameDetails;
	$body = '
	 <p>Full Name: '.$nameDetails.'</p>
	 <p>Email: '.$email.'</p>
	 <p>Phone No: '.$phoneno.'</p>
	 <p>Project Brief: </p>
	 <p>Email: '.$message.'</p>';
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers ="From: " .$_POST['email'];
	if(mail($to,$subject,$message,$headers))
	{
		echo "sent";
	}
	else
	{
		echo "not_sent";
	}
}
