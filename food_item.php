<?php
require_once "food_data_layer.php";

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Food Log</title>
        <style>
            h1,h2{
                text-align:center;
            }
            nav{
                text-align:center;
            }
            div{
                text-align:center;
                border: 10px solid black;
                width:30%;
                margin:auto;
                padding: auto;
            }
            table{
                text-align: center;
                 margin:auto;
                 padding: auto;
                 width:auto;
            }
        </style>
    </head>    
    <body>
    <h1>Calorie Counter</h1> 
        <h2>Add a new food item</h2>
        <div>
            <form method="POST" action="add_food_item.php">
            <table>
                <tr><br>
                <td><label for="txtFoodname">Food Name: </label></td>
                    <td><input type="text" id="txtFooditem" name="foodname"></td>
                </tr>
                <tr>
                    <td><label for="txtFooddesc">Food Description: </label></td>
                    <td><input type="text" id="txtFooddesc" name="fooddesc"></td>
                </tr>
                <tr>
                <td><label for="txtCalories">Calories per Serving: </label></td>
                <td><input type="text" id="txtCal" name="calories"></td>
                </tr>
                </table>
                <br>
                <input type="submit" value="Add"><br><br>
                </form>
            </div>
            <br><br>
            <nav>&nbsp&nbsp
                <a href="https://csi3450tm.000webhostapp.com/about%20test.html">About Page</a>&nbsp&nbsp
                <a href="https://csi3450tm.000webhostapp.com/calorie_counter.php">Back to Calorie Counter</a>&nbsp&nbsp
                <a href="https://csi3450tm.000webhostapp.com/food_log.php">Food Log</a>
                </nav>
            <br>
    </body>
</html>
