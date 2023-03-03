<?php
    require_once "food_data_layer.php";

    if ($_POST) {
        if (isset($_POST['foodname']) && isset($_POST['fooddesc']) && isset($_POST['calories'])) {
            
            $foodname = htmlspecialchars($_POST['foodname']);
            $fooddesc = htmlspecialchars($_POST['fooddesc']);
	        $calories = htmlspecialchars($_POST['calories']);
            
            add_food_item_data($foodname, $fooddesc, $calories);
            
            header("location: calorie_counter.php");
        }
    }

?>