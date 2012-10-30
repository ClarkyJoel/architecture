<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {
	
	// require a name from user
	if(trim($_POST['contactName']) == '') {
		$nameError =  'Forgot your name!'; 
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	
	// need valid email
	if(trim($_POST['email']) == '')  {
		$emailError = 'Forgot to enter in your e-mail address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
		
	// we need at least some content
	if(trim($_POST['comments']) == '') {
		$commentError = 'You forgot to enter a message!';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {
		
		$pego_prefix="pego_";
		$emailTo = get_option($pego_prefix.'contact_form_email');
	
		
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		mail($emailTo, $headers, $body);
		$emailSent = true;
	}
}
?>