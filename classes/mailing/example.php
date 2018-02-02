<?php


// Initialize PHPMailer here. Either with composer or trough includes/requires

require("class.standardvalues.php");
require("class.mailing.php");


if(isset($_POST['submit'])){
  $MailTo = array(array("email" => $_POST["email"], "name" => $_POST["fullname"]));
  $Message = $_POST["mail_message"];
  $Subject = $_POST["subject"];

  $Attachment = "";
  
  $thisMail = new Mailing();
  $thisMail->sendThisEmail($MailTo,$Message,$Subject,$Attachment);
}

?>



<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
	<input type="email" placeholder="johndoe@example.com" name="email">
	<input type="text" placeholder="John Doe" name="fullname">
	<input type="text" placeholder="Subject" name="subject">
	<textarea name="mail_message"></textarea>
	<input type="submit">
</form>




