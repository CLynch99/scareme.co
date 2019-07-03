<?php
    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $password = $_POST['password'];

        $sql = "SELECT `username` FROM `admin_signin`;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $resultValue = $row['username'];
                if($resultValue == $user){

                    $sql = "SELECT `password` FROM `admin_signin`;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
            
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $resultValue = $row['password'];
                            if($resultValue == $password){
                                header("Location: ../admin/postPage.php");
                            }
                            else{
                                header("Location: ../admin/admin.php?incorrectLogin");
                            }
                        }
                    }
                }
                else{
                    header("Location: ../admin.php?incorrectLogin");
                }
            }
        }
    }
