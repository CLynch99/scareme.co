<?php
    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['email']) || empty($_POST['message'])){
            header("Location: ../about.php?signup=empty");
        }
        else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../about.php?signup=invalidEmail");
            }
            else{
                $mailTo = "scareme@scareme.co";
                $headers = "From: ".$email;
                $text = "You have received an e-mail from ".$name."\n\n".$message;
                mail($mailTo, $subject, $text, $headers);
                header("Location: ../contact.php?mail=success");
            }
        }
    }
