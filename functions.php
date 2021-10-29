<?php 
function get_number_of_workouts(){
    global $connection;
    $query = "SELECT COUNT(*) AS total_workouts FROM workouts";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query failed..." . mysqli_error($connection));
    }
    return mysqli_fetch_assoc($result);
}



?>