<?php

// configuration
require("../includes/config.php");
require_once("PHPMailer/class.phpmailer.php");

// if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         // validate submission
        if (empty($_POST["email"]))
        {
            apologize("You must provide your username.");
        }    
        
        query("UPDATE users SET hash = ? WHERE email = ?", crypt("123abc"), $_POST["email"]);     

        // instantiate mailer
        $mail = new PHPMailer();

        $mail->IsSMTP(); // telling the class to use SMTP

        $mail->Host       = "mail.yourdomain.com"; // SMTP server

        // enables SMTP debug information (for testing)
        $mail->SMTPDebug  = 2;                    
        // 1 = errors and messages
        // 2 = messages only
        
         // enable SMTP authentication
        $mail->SMTPAuth   = true;                 

        // sets the prefix to the servier
        $mail->SMTPSecure = "tls"; 
                      
        // sets GMAIL as the SMTP server
        $mail->Host       = "smtp.gmail.com";      

        // set the SMTP port for the GMAIL server
        $mail->Port       = 587;                 

        // GMAIL username
        $mail->Username   = "ringlord928@gmail.com";  
     
         // GMAIL password
        $mail->Password   = "baggins928";           

        // set From:
        $mail->SetFrom("drew@example.com");

        // set To:
        $mail->AddAddress("{$_POST["email"]}");

        // set Subject:
        $mail->Subject = "hello, world";

        // set body
        $mail->Body = "<html><body>Your temporary password is: 123abc. Change it immediately!</body></html>";

        // set alternative body, in case user's mail client doesn't support HTML
        $mail->AltBody = "hello, world";

        // send mail
        if ($mail->Send() === false)
            die($mail->ErrorInfo . "\n");
        // redirect to index.php
        redirect("index.php");
    }
    else
    {
        // else render form
        render("forgot_form.php", ["title" => "forgot password"]);
    }

?>
