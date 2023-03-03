<?php
require_once "food_data_layer.php";

    function generate_food_list() {
        $result = get_food_list();
        foreach($result as $row) {
            echo "<option value=" . "$row[1]". ">" . "$row[1]". "" . $row[4] . "</option>";    
      }
    }
    
    function display_food() {
        $result = get_food_table();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" .$row[0]. "</td>";
            echo "<td>" .$row[1]. "</td>";
            echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]. "</td>";
            echo "<td> <a href='delete_food.php?id=". $row[0] . "'>Delete</a></td>";
            echo "</tr>";
        }
    }
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
                 border-collapse:collapse;
                 
            }
        </style>
    </head>    
    <body>
    <h1>Calorie Counter</h1> 
        <h2>Add a new entry</h2>
        <div>
            <form method="POST" action="add_food_log.php">
            <table>
                <tr>
                <td><label for="txtFoodname">Food Name: </label></td>
                    <td><select name="foodname" id="txtFoodname" >
                        <?php
                            generate_food_list();
                        ?>
                        </select>
                    </td>
                    </tr>
                    <br>
                <tr>
                <td>
                    <label for="mealtime">Time of Meal:</label></td>
                <td>
                    <select name="mealtime" id="txtMealtime">
                    <option>Breakfast</option>
                    <option>Lunch</option>
                    <option>Dinner</option>
                    </select></td>
            </tr>
            <tr>
                <td><label for="txtServing">Serving Size: </label></td>
                    <td><input type="text" id="txtServing" name="serving"></td>
                    </tr>
                    <br>
                    </table><br>
                    <input type="submit" value="Add">
                    <br><br> 
            <table border=1 >
                    <tr><th colspan=5>Food Log</th></tr><tr>
                    <th>Food ID</th>
                    <th>Food Name</th>
                    <th>Food Description</th>
                    <th>Calories</th>
                    <th>Delete</th>
                    </tr>
                    <?php
                        display_food();
                    ?>
                </table><br>
            </div>
                <br>c
            </form>
            <nav>
                <a href="https://csi3450tm.000webhostapp.com/about%20test.html">About Page</a>&nbsp&nbsp
                <a href="https://csi3450tm.000webhostapp.com/food_item.php">Add a new Food item</a>&nbsp&nbsp
                <a href="https://csi3450tm.000webhostapp.com/food_log.php">Food Log</a>
            </nav><br><br>
    </body>
</html>