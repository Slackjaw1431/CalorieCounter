<?php
    require_once 'food_data_layer.php';

    if ($_GET['id']) {
        
        $id=htmlspecialchars($_GET['id']);
        
        delete_food($id);
        
        header("location: calorie_counter.php");
    }
?>
