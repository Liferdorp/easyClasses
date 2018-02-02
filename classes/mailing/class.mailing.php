<?php


class Mailing {
  
  public $mail;
  
  function sendThisEmail($MailTo,$Message,$Subject,$Attachment){
    
    $hostName = $_SERVER["SERVER_NAME"];
    $findWWW   = 'www.';
    $pos = strpos($hostName, $findWWW);
 
    if ($pos === false) {
        $hostName = $hostName;
    } else {
      $thisIfThisIsBetter = substr($hostName, 4);
      $pos2 = strpos($thisIfThisIsBetter, $findWWW);
      if ($pos2 === false) {
        $hostName = $thisIfThisIsBetter;
      }else{
        $hostName = $hostName;
      }
    }
    
    $mail = new PHPMailer; 
    // $mail->SMTPDebug = 3; // Enable verbose debug output. This wil mean you need to return $mail and catch it where you call the function
    $mail->isSMTP();
    $mail->Host = MailSendHost;
    $mail->SMTPAuth = true;
    $mail->Username = MailSendUserName."@".$hostName;
    $mail->Password = MailSendUserPass;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;         
    
    $mail->setFrom(MailSendUserName."@".$hostName, MailSendUserTitle);

    // Recipients array or string.
    // The array is a multi level array existing of several arrays. Example: array(array("email" => "johndoe@example.com", "name" => "John Doe"),array("email" => "chrisfoo@example.com", "name" => "Chris Foo"));
    // The string is split with '~_^'. Example: "johndoe@example.com~_^John Doe";
    if(is_array($MailTo)){
      for($i=0;$i<count($MailTo);$i++){
        $mail->addAddress($MailTo[$i]["email"], $MailTo[$i]["name"]);
      }
    }else{
      $towardsAddress = explode($MailTo,"~_^");
      $mail->addAddress($towardsAddress[0], $towardsAddress[1]);
    }
    $mail->addReplyTo(MailReplyUserName."@".$hostName, MailReplyUserTitle);
    
    
    // Can be an array or string with a path relative fromt this file. like: '../../Uploaded/Exampled.pdf' .
    if($Attachment != ""){
      if(is_array($Attachment)){
        for($a=0;$a<count($Attachment);$a++){
           $mail->AddAttachment($Attachment[$a]);
        }
      }else{
        $mail->AddAttachment($Attachment);
      }
    }

    $mail->isHTML(true);
    $mail->Subject = $Subject;
    $mail->Body    = $Message;
    $mail->AltBody = 'Your mail client does not support HTML. Consider using another client';
    
    $mail->send();
  }
}

?>