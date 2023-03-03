<?php
    require_once "food_data_layer.php";
    if ($_POST) {
        if (isset($_POST['foodname']) && isset($_POST['mealtime']) && isset($_POST['serving'])) {
            $foodname = htmlspecialchars($_POST['foodname']);
            $mealtime = htmlspecialchars($_POST['mealtime']);
            $serving = htmlspecialchars($_POST['serving']);
            
            $desc= get_description($foodname);
            
            $cal_per_serving = get_cal($foodname);
            $totalcal = $serving * $cal_per_serving;
            
            
            $foodid=get_food_id($foodname);
            
                       add_log($foodid, $foodname, $desc, $mealtime, $totalcal, $serving);
            
            
            header("location: calorie_counter.php");
        }
    }