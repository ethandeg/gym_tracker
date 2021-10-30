<?php

    function confirm_connection($result){
        global $connection;
        if(!$result){
            die("Query Failed..." . mysqli_error($connection));
        }
    }
    function get_num_workouts(){
       global $connection;
       $query = "SELECT COUNT(*) AS total_workouts FROM workouts";
       $result = mysqli_query($connection, $query);
       confirm_connection($result);
       $row = mysqli_fetch_assoc($result);
       return $row['total_workouts'];
    }

    function insert_workout($assoc){
        global $connection;
        $workout_muscle_group = $assoc['workout_muscle_group'];
        $workout_gym = $assoc['workout_gym'];
        $workout_length = $assoc['workout_length'];
        $workout_date = $assoc['workout_date'];

        $query = "INSERT INTO workouts (workout_muscle_group, workout_gym, workout_length, workout_date)
                  VALUES ('{$workout_muscle_group}', '{$workout_gym}', '{$workout_length}', '{$workout_date}')";
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


    // function authenticate()
?>