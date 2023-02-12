<?php include('includes/dbc.php');
if (isset($_POST['Submit_Mail_List'])) {
$name = $_POST['theName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$comments = $_POST['comments'];
if($name=="") {
$nameMsg = "<br><span style='color:red;'>Your name cannot be blank.</span>";
}
if($phone=="") {
$phoneMsg = "<br><span style='color:red;'>Your phone number cannot be blank.</span>";
}
if($email=="") {
$emailMsg = "<br><span style='color:red;'>Your email address cannot be blank.</span>";
}else{
$query = "INSERT INTO mailing_list (name,phone,email,comments) VALUES ('$name','$phone','$email','$comments')";
$success = mysqli_query($con, $query);
if($success){
$inserted = "<h2>Thanks!</h2><h3>Your gonna see some emails</h3>";
}else{
$error_message = mysqli_error($con);
$inserted = "There was an error: $error_message";
exit($inserted);
}
}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function validateForm() {
var theName = document.form1.theName.value;
var phone = document.form1.phone.value;
var email = document.form1.email.value;
var nameMsg = document.getElementById('nameMsg');
var phoneMsg = document.getElementById('phoneMsg');
var emailMsg = document.getElementById('emailMsg');
if(theName=="") {nameMsg.innerHTML = "Your name cannot be blank."; return false;}
if(phone=="") {phoneMsg.innerHTML = "Your phone number cannot be blank."; return false;}
if(email=="") {emailMsg.innerHTML = "Your email address cannot be blank."; return false;}
}
</script>


</head>

<body>

<?php include('includes/header.inc');?>

<?php include('includes/nav.inc');?>

<div id="wrapper">

<?php include('includes/aside.inc');?>



<section>

</div>

<?php include('includes/footer.inc');?>

</body>
</html>
