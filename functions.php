<?php
    function get_num_workouts(){
       global $connection;
       $query = "SELECT COUNT(*) AS total_workouts FROM workouts";
       $result = mysqli_query($connection, $query);
       if(!$result){
           die("Query failed..." . mysqli_error($connection));
       }
       $row = mysqli_fetch_assoc($result);
       return $row['total_workouts'];
    }
?>