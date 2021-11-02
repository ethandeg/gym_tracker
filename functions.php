<?php

    function confirm_connection($result){
        global $connection;
        if(!$result){
            die("Query Failed..." . mysqli_error($connection));
        }
    }
    function get_num_workouts($user_id){
       global $connection;
       $query = "SELECT COUNT(*) AS total_workouts FROM workouts WHERE workout_user_id = {$user_id}";
       $result = mysqli_query($connection, $query);
       confirm_connection($result);
       $row = mysqli_fetch_assoc($result);
       return $row['total_workouts'];
    }

    function insert_workout($assoc){
        global $connection;
        $workout_muscle_group = mysqli_real_escape_string($connection, $assoc['workout_muscle_group']);
        $workout_gym = mysqli_real_escape_string($connection, $assoc['workout_gym']);
        $workout_length = mysqli_real_escape_string($connection, $assoc['workout_length']);
        $workout_date = mysqli_real_escape_string($connection, $assoc['workout_date']);
        $workout_user_id = mysqli_real_escape_string($connection, $assoc['workout_user_id']);
        $query = "INSERT INTO workouts (workout_muscle_group, workout_gym, workout_length, workout_date, workout_user_id)
                  VALUES ('{$workout_muscle_group}', '{$workout_gym}', '{$workout_length}', '{$workout_date}', {$workout_user_id})";
        $result = mysqli_query($connection, $query);
        confirm_connection($result);

    }

    function create_user($assoc){
        global $connection;
        $username = $assoc['username'];
        $user_firstname = $assoc['user_firstname'];
        $user_lastname = $assoc['user_lastname'];
        $user_email = $assoc['user_email'];
        $password = $assoc['password'];

            $query = "INSERT INTO users 
                      (username, user_firstname, user_lastname, user_email, password) 
                      VALUES 
                      ('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$password}')";
            $result = mysqli_query($connection, $query);
            confirm_connection($result);
    }

    function find_user($search_by, $val){
        //only works for string search bys at the moment, will add other variants later if needed
        global $connection;
        if(gettype($val) === 'string'){
            $query = "SELECT * FROM users WHERE {$search_by} = '{$val}'";
        } elseif(gettype($val) === 'integer') {
            $query = "SELECT * FROM users WHERE {$search_by} = {$val}";
        }
        
        $result = mysqli_query($connection, $query);
        confirm_connection($result);
        return mysqli_fetch_assoc($result);
    }

    function get_workout_length_report($interval, $user_id){
        global $connection;
        $query = "SELECT SUM(workout_length) AS total_minutes, workout_date 
                  FROM workouts 
                  WHERE workout_date > now() - INTERVAL {$interval} DAY 
                  AND workout_user_id = {$user_id} 
                  GROUP BY workout_date 
                  ORDER BY workout_date 
                  DESC
                ";
        $result = mysqli_query($connection, $query);
        confirm_connection($result);
        return $result;
    }

    // function authenticate()
?>