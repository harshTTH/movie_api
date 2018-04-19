<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data);
    
    if($decoded){
        include "connect.php";
        include "commentClass.php";
        $movieId = $decoded->id;
        $comments = array();

        $fetchQuery = "SELECT jwt,comment,date FROM userComments WHERE movieId = '$movieId'";
        $fetchQueryRun = mysqli_query($conn,$fetchQuery);
        
        while($result = mysqli_fetch_array($fetchQueryRun)){
            $jwt = $result['jwt'];
            $comment = $result['comment'];
            $date = $result['date'];
            $commentsEntry = new commentClass($jwt,$comment,$date);            
            $comments[] = $commentsEntry;
        }  
         
    }
    echo json_encode($comments);
?>