<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function checkForm() {
var theName = document.getElementById('name').value;
var theEmail = document.getElementById('email').value;
var theMessage = document.getElementById('message');
var emailerr = document.getElementById('emailspan');
var nameerr = document.getElementById('namespan');
var messageerr = document.getElementById('messagespan');
var message;
var myregex = /\S+@\S+\.\S+/; 
if(theName=="") {
	message ='Name is required;';
	document.form1.name.focus();
	nameerr.innerHTML = message;return false;
} else {
	nameerr.innerHTML ="";
}
if(theEmail=="") {
	message ='Email is required;';
	document.form1.email.focus();
	emailerr.innerHTML = message;return false;
} else if (!myregex.test(theEmail)) {
	emailerr.innerHTML ="Your email entry is invalid;";
	document.form1.email.focus();
        returnfalse;
} else {
	emailerr.innerHTML ="";}
if(theMessage.value==""|| theMessage.value ==null|| theMessage.value.indexOf('\n') > 0) {
	message = 'Please enter your message;';
	document.form1.message.focus();
	messageerr.innerHTML = message;
        return false;
} else {
	messageerr.innerHTML ="";
}
}
</script>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<?php include('includes/header.inc');?>

	<?php include('includes/nav.inc');?>
	
	

<div id="wrapper">

	<?php include('includes/aside.inc');?>
	<section>
	<h2>Contact Us!</h2>
	<?php 
	if(isset($_POST['send_email'])){
		// collect the form values
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		// set the email properties 
		$to = 'you@youremail.com';
		$subject = "Contact Form Submission";
		$from = $email;
		$headers = "From: $from";
		// attempt to send the mail, catch errors if they occur
		try {
			mail($to, $subject, $message, $headers);
			$msg = "<strong>Your mail was sent successfully!</strong>";
		} catch(Exception $e) {
			$msg = "An Exception was thrown: ".$e -> getMessage()."<br>";
		}
	}
?>
<table align="left">
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return checkForm()">
	<tr><th>Name:</th>
		<td><input type="text" name="name" id="name" /><br><span style="color:red;" id="namespan"></span>
		</td>
	</tr>
	<tr><th>EMail:</th>
		<td> <input type="text" name="email" id="email" /><br><span style="color:red;" id="emailspan"></span>
		</td>
	</tr>
	<tr><th>Phone:</th>
		<td> <input type="text" name="phone" id="phone" /> 
		</td>
	</tr>
	<tr><th>Message:</th>
		<td><textarea name="message" id="message"></textarea><br><span style="color:red;" id="messagespan"></span>
		</td>
	</tr>
	<tr><td> </td><td><input type="submit" name="send_email" value="Send Email Message" /></td></tr>
</form>
</table>

	</section>

</div>

<?php include('includes/footer.inc');?>
<p>
<?php if (isset($msg)) { 
	      $msg .= "<br><a href='home.php'>Return to Home Page</a>";
	     echo $msg;
        }
?>
</p>

</body>
</html>
