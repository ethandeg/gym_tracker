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

    function insertMeal($assoc){
        global $connection;
        $meal_name = mysqli_real_escape_string($connection, $assoc['meal_name']);
        $meal_user_id = mysqli_real_escape_string($connection, $assoc['meal_user_id']);
        $meal_ingredients = mysqli_real_escape_string($connection, $assoc['meal_ingredients']);
        $meal_datetime = mysqli_real_escape_string($connection, $assoc['meal_datetime']);
        $meal_calories = mysqli_real_escape_string($connection, $assoc['meal_calories']);
        $query = "INSERT INTO meals (meal_user_id, meal_name, meal_ingredients, meal_calories, meal_datetime) 
                  VALUES ({$meal_user_id}, '{$meal_name}', '{$meal_ingredients}', {$meal_calories}, '{$meal_datetime}')";
        $result = mysqli_query($connection, $query);
        confirm_connection($result);
    }

    function logWeighin($assoc){
        global $connection;
        $weighin_weight = mysqli_real_escape_string($connection, $assoc['weighin_weight']);
        $weighin_user_id = mysqli_real_escape_string($connection, $assoc['weighin_user_id']);
        $weighin_date = mysqli_real_escape_string($connection, $assoc['weighin_date']);
        $query = "INSERT INTO weighins 
        (weighin_user_id, weighin_weight, weighin_date) 
        VALUES 
        ({$weighin_user_id}, {$weighin_weight}, '{$weighin_date}')";
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

    function updateColumn($tableName, $colsAndVals){
        //either input an associated array or nested arrays
        //better to use nested arrays, so a final index could indicate type of data
        global $connection;
        $keys = array_keys($colsAndVals);
        $statement = '';
        for($i = 0; $i < count($keys); $i++){
            // $statement .= $keys[$i] . " = " . (gettype($colsAndVals[$keys[$i]]) === 'string') ?  '\'' . $colsAndVals[$keys[$i]] . '\'' :  $colsAndVals[$keys[$i]];
            if(gettype($colsAndVals[$keys[$i]]) === 'string'){
                $statement .= $keys[$i] . " = " . '\'' . $colsAndVals[$keys[$i]] . '\'';
            } else {
                $statement .= $keys[$i] . " = " . $colsAndVals[$keys[$i]];
            }
            if($i != count($keys) - 1){
                $statement .= ', ';
            } else {
                $statement .= ' ';
            }
        }
        $query = "UPDATE {$tableName} 
                  SET {$statement}";
        $result = mysqli_query($connection, $query);
        confirm_connection($result);
        // $statement = '';
        // for($i = 0; $i < count($colsAndVals); $i++){
        //     $statement .= $colsAndVals[0] . ' = ' . ($colsAndVals[2] === 'string') ? '\'' . $colsAndVals[1] . '\'' : $colsAndVals[1];
        //     ($i != count($colsAndVals) - 1) ? $statement .= ', ' : $statement .= ' ';
        // }
        // echo $statement;
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

    function getMealCalorieReport($interval, $user_id){
        global $connection;
        $query = "SELECT SUM(meal_calories) AS total_calories, DATE(meal_datetime) AS meal_date 
                FROM meals WHERE 
                DATE(meal_datetime) > now() - INTERVAL {$interval} DAY 
                AND meal_user_id = {$user_id} 
                GROUP BY DATE(meal_datetime) 
                ORDER BY meal_date DESC";
        $result = mysqli_query($connection, $query);
        confirm_connection($result);
        return $result;
    }



    function grabAllWorkoutsByUser($user_id){
        global $connection;
        $query = "SELECT * FROM workouts WHERE workout_user_id = {$user_id} ORDER BY workout_date DESC";
        $result = mysqli_query($connection, $query);
        confirm_connection($result);
        return $result;
    }

    function getNumMealsByUserAndDate($user_id, $date){
        global $connection;
        $query = "SELECT COUNT(*) AS totalMeals FROM meals WHERE meal_user_id = {$user_id} AND DATE(meal_datetime) = '{$date}'";
        $result = mysqli_query($connection, $query);
        confirm_connection($result);
        $row = mysqli_fetch_assoc($result);
        return $row['totalMeals'];
    }

    // function authenticate()
?>