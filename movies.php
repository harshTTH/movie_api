<?php
    include 'connect.php';
    $movies = array();
    $getMovieQuery = "SELECT movieId FROM movieinfo";
    $getMovieQueryRun = mysqli_query($conn,$getMovieQuery);
    while($row = mysqli_fetch_array($getMovieQueryRun)){
        $movies[] = $row['movieId'];
    }
    echo json_encode($movies);
    include "disconnect.php";
?>
