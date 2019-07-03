<?php 
        include_once 'dbh.inc.php';

        $sql = "SELECT * FROM `post`;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $postDate = $row['postDate'];
                $resultTitle = $row['postTitle'];
                $postDesc = $row['postDescription'];
                echo $postDate."#".$resultTitle."#".$postDesc."_";
            }
        }
    ?>