<?php
switch (@$_GET['do'])
 {

 case "send":

      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

    if (!preg_match("/\S+/",$name))
    {
      unset($_GET['do']);
      $message = "Name required. Please try again.";
      break;
    }
    if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$email))
    {
      unset($_GET['do']);
      $message = "Email Address is incorrect. Please try again.";
      break;
    }
    if (!preg_match("/\S+/",$subject))
    {
      unset($_GET['do']);
      $message = "Subject required. Please try again.";
      break;
    }
    if (!preg_match("/\S+/",$message))
    {
      unset($_GET['do']);
      $message = "Message required. Please try again.";
      break;
    }
 
       $myemail = "contact@cycurelabs.com";
       $emess = $message."\n";
       $ehead = "From: ".$email."\r\n";
       $subj = $subject
       $mailsend=mail("$myemail","$subj","$emess","$ehead");
       $message = "Email was sent.";
       unset($_GET['do']);
 
       header("Location: index.html");
     break;
 
 default: break;
 }
?>