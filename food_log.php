<?php
    require_once "food_data_layer.php";

    function display_table() {
        $result = get_food_log();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" .$row[0]. "</td>";
            echo "<td>" .$row[1]. "</td>";
            echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]. "</td>";
            echo "<td>" .$row[4]. "</td>";
            echo "<td>" .$row[5]. "</td>";
            echo "<td>" .$row[6]. "</td>";
            echo "<td>" .$row[7]. "</td>";
            echo "</tr>";
        }
    }
    
    /*function display_table1() {
        $result = get_data_year();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" .$row[0]. "</td>";
            echo "<td>" .$row[1]. "</td>";
            echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]. "</td>";
            echo "<td>" .$row[4]. "</td>";
            echo "<td>" .$row[5]. "</td>";
            echo "<td>" .$row[6]. "</td>";
            echo "<td>" .$row[7]. "</td>";
            echo "</tr>";
        }
    }
    
    function display_table2() {
        $result = get_data_month();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" .$row[0]. "</td>";
            echo "<td>" .$row[1]. "</td>";
            echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]. "</td>";
            echo "<td>" .$row[4]. "</td>";
            echo "<td>" .$row[5]. "</td>";
            echo "<td>" .$row[6]. "</td>";
            echo "<td>" .$row[7]. "</td>";
            echo "</tr>";
        }
    }
    function display_table3() {
        $result = get_data_date();
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" .$row[0]. "</td>";
            echo "<td>" .$row[1]. "</td>";
            echo "<td>" .$row[2]. "</td>";
            echo "<td>" .$row[3]. "</td>";
            echo "<td>" .$row[4]. "</td>";
            echo "<td>" .$row[5]. "</td>";
            echo "<td>" .$row[6]. "</td>";
            echo "<td>" .$row[7]. "</td>";
            echo "</tr>";
        }
    }
    */
?>

<!DOCTYPE html>
  <head>
      <title>
          
      </title>
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
                width:auto;
                margin:auto;
                padding: auto;
            }
            table{
                text-align: center;
                 margin:auto;
                 padding: auto;
                 width:auto;
                 border-collapse: collapse;
            }
        </style>
  </head>
        <body>
          <h1>Food Log</h1>
            <div><br>
                <table border=1>
                    <tr>
                    <th>Log ID</th>
                    <th>Food ID</th>
                    <th>Food Name</th>
                    <th>Food Description</th>
                    <th>Meal Time</th>
                    <th>Calories</th>
                    <th>Serving</th>
                    <th>Time</th>
                    </tr>
                    <?php
                        display_table();
                        /*display_table1();*/
                        /*display_table2();*/
                        /*display_table3();*/
                     ?>
            </div> 
                </table><br>
              </div>
            <br>
           
            <br><br><br><br><br>
        <nav>&nbsp&nbsp
        <a href="https://csi3450tm.000webhostapp.com/about%20test.html">About Page</a>&nbsp&nbsp
        <a href="https://csi3450tm.000webhostapp.com/calorie_counter.php">Back to Calorie Counter</a>&nbsp&nbsp
        </nav><br>
    </body>
</DOCTYPE>