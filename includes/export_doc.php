<?php
     include_once 'dbh.inc.php';

     if(isset($_POST['submit'])){
         $title = mysqli_real_escape_string($conn, $_POST['title']);
         $text = mysqli_real_escape_string($conn, $_POST['text']);
         date_default_timezone_set('Europe/London');
         $month = date('M');
         $day = date('d');
         $time = date('H:ia');
         $date = $month." ".$day." at ".$time;

         if(empty($title) || empty($text)){
             header("Location: ../admin/postPage.php?error");
         }
         else{
            $sql = "INSERT INTO `post`(`postTitle`, `postDescription`, `postDate`) 
            VALUES ('$title','$text','$date');";
            mysqli_query($conn, $sql);
            header("Location: ../admin/postPage.php?success");
         }
     }
?>