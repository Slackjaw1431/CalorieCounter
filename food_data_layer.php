<?php
    $server = "mysql:host=localhost:3306;dbname=calories";
    $username = 'root';
    $password = '';
$db;

//function getDB() {
//    if (!isset(self::$db)) {
//        try {
//            self::$db = new PDO(self::$dsn,
//                    self::$username,
//                    self::$password);
//        } catch (PDOException $e) {
//            $error = "Database access error: " . $e->getMessage();
//            include('error.php');
//            exit();
//        }
//    }
//    return self::$db;
//}

try {
    $db = new PDO($dsn, $username, $password);
    echo "<h1></h1>";
    $query = "SELECT * FROM food_log";
    $statement = $db->prepare($query);
    $statement->execute();
    $foodlogs = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($$foodlogs as $foodlog) {
        $id = $foodlog['id'];
        $food_name = $foodlog['food_name'];
        $food_desc = $foodlog['food_desc'];
        $calories = $foodlog['calories'];

        echo "<p>$id, $food_name, $food_desc, $calories</p>";
    }
} catch (Exception $e) {
    $err = $e->getMessage();
    echo "<p>Error! $err</p>";
}

function get_food_list() {
	global $server, $userName, $pass, $db;

	$con=mysqli_connect($server,$userName,$pass,$db);
	if (mysqli_connect_errno()) {
		echo "failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	$result = mysqli_query($con, "SELECT * FROM food_log;");
        $data = array();
    while($row = mysqli_fetch_array($result)) {
	$temp=array();
	array_push($temp,$row['id']);
	array_push($temp,$row['food_name']);
	array_push($temp,$row['food_desc']);
	array_push($temp,$row['calories']);
	array_push($data,$temp);
    }
mysqli_close($con);
return $data;
}



function get_food_log() {
	global $server, $userName, $pass, $db;

	$con=mysqli_connect($server,$userName,$pass,$db);
	if (mysqli_connect_errno()) {
		echo "failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	$result=mysqli_query($con, "SELECT * FROM log ORDER BY time_log DESC;");
	$data=array();
	while($row = mysqli_fetch_array($result)) {
	$temp=array();
	array_push($temp,$row['id']);
	array_push($temp,$row['food_id']);
	array_push($temp,$row['food_name']);
	array_push($temp,$row['food_desc']);
	array_push($temp,$row['meal_time']);
	array_push($temp,$row['total_cal']);
	array_push($temp,$row['serving']);
	array_push($temp,$row['time_log']);
	array_push($data,$temp);
    }
mysqli_close($con);
return $data;
}



/*function get_historic_log() {
	global $server, $userName, $pass, $db;

	$con=mysqli_connect($server,$userName,$pass,$db);
	if (mysqli_connect_errno()) {
		echo "failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	$result=mysqli_query($con, "SELECT id, food_id, food_name, food_desc, meal_time, total_cal, serving FROM historic_log;");
	$data=array();
	while($row = mysqli_fetch_array($result)) {
	$temp=array();
	array_push($temp,$row['id']);
	array_push($temp,$row['food_id']);
	array_push($temp,$row['food_name']);
	array_push($temp,$row['food_desc']);
	array_push($temp,$row['meal_time']);
	array_push($temp,$row['total_cal']);
	array_push($temp,$row['serving']);
	array_push($data,$temp);
    }
mysqli_close($con);
return $data;
}*/


function add_food_item_data($arg_foodname, $arg_fooddesc, $arg_calories) {
    global $server, $userName, $pass, $db;
    $con=mysqli_connect($server, $userName,$pass,$db);
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        die();
    }
    $stmt = mysqli_prepare($con, "INSERT INTO food (food_name, food_desc, calories) VALUES(?,?,?);");
    mysqli_stmt_bind_param($stmt,"ssi", $arg_foodname, $arg_fooddesc, $arg_calories);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
}



function add_log($arg_foodid, $arg_foodname, $arg_desc, $arg_mealtime, $arg_totalcal, $arg_serving) {
    global $server, $userName, $pass, $db;
    $con=mysqli_connect($server, $userName,$pass,$db);
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        die();
    }
    $stmt = mysqli_prepare($con, "INSERT INTO log (food_id,food_name, food_desc, meal_time, time_log, total_cal, serving) VALUES (?,?,?,?,NOW(),?,?);");
    mysqli_stmt_bind_param($stmt,"isssii", $arg_foodid, $arg_foodname, $arg_desc, $arg_mealtime, $arg_totalcal, $arg_serving);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
}

function delete_food($arg_id) {

    global $server, $userName, $pass, $db;
    $con=mysqli_connect($server, $userName,$pass,$db);
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        die();
    }

    $stmt = mysqli_prepare($con, "INSERT INTO historic_food (id,food_name,food_desc,calories)
    SELECT * FROM food WHERE id=?");
    mysqli_stmt_bind_param($stmt,"i", $arg_id);
    mysqli_stmt_execute($stmt);
    $stmt = mysqli_prepare($con, "DELETE FROM `food` WHERE id = ?");
    mysqli_stmt_bind_param($stmt,"i", $arg_id);
    mysqli_stmt_execute($stmt);
    mysqli_close($con);
}

 function get_cal($arg_foodname) {

    global $server, $userName, $pass, $db;
    $con=mysqli_connect($server, $userName,$pass,$db);
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        die();
    }

    $stmt = mysqli_prepare($con, "SELECT calories FROM food WHERE food_name = ?;");
    mysqli_stmt_bind_param($stmt,"s", $arg_foodname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $col1);
    mysqli_stmt_fetch($stmt);
    mysqli_close($con);
    return $col1;

}


function get_description($arg_foodname) {
    global $server, $userName, $pass, $db;
    $con=mysqli_connect($server, $userName,$pass,$db);
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        die();
    }

    $stmt = mysqli_prepare($con, "SELECT food_desc FROM food WHERE food_name= ?;");
    mysqli_stmt_bind_param($stmt,"s", $arg_foodname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $col1);
    mysqli_stmt_fetch($stmt);
    mysqli_close($con);
    return $col1;
}

function get_food_id($arg_foodname) {

    global $server, $userName, $pass, $db;
    $con=mysqli_connect($server, $userName,$pass,$db);
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL" . mysqli_connect_error();
        die();
    }

    $stmt = mysqli_prepare($con, "SELECT id FROM food WHERE food_name = ?;");
    mysqli_stmt_bind_param($stmt,"s", $arg_foodname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $col1);
    mysqli_stmt_fetch($stmt);
    mysqli_close($con);
    return $col1;
}

function get_food_table() {

    global $server, $userName, $pass, $db;

	$con=mysqli_connect($server,$userName,$pass,$db);
	if (mysqli_connect_errno()) {
		echo "failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	    $result=mysqli_query($con, "SELECT * FROM food;");
	    $data=array();
	     while($row = mysqli_fetch_array($result)) {
	    $temp=array();
	    array_push($temp,$row['id']);
    	array_push($temp,$row['food_name']);
    	array_push($temp,$row['food_desc']);
    	array_push($temp,$row['calories']);
    	array_push($data,$temp);
    }
    mysqli_close($con);
    return $data;
}



function get_data_year() {


}


function get_data_month() {


}

function get_data_date() {


}



?>
