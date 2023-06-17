<?php

function get_city($id){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', '19n30008');
    $data="";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT city from 19n30008city WHERE city_id='".$id."'";
    $result = $mysqli->query($sql);
    if($result) {
        while($row=mysqli_fetch_array($result))
    {
        $data=$row['city'];
    }
    }
    return $data;

}

?>

<?php

function get_actor($id){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', '19n30008');
    $data="";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT last_name from 19n30008actor WHERE actor_id='".$id."'";
    $result = $mysqli->query($sql);
    if($result) {
        while($row=mysqli_fetch_array($result))
    {
        $data=$row['last_name'];
    }
    }
    return $data;

}

?>

<?php

function get_film($id){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', '19n30008');
    $data="";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT title from 19n30008film WHERE film_id='".$id."'";
    $result = $mysqli->query($sql);
    if($result) {
        while($row=mysqli_fetch_array($result))
    {
        $data=$row['title'];
    }
    }
    return $data;

}

?>

<?php

function get_category($id){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', '19n30008');
    $data="";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT name from 19n30008category WHERE category_id='".$id."'";
    $result = $mysqli->query($sql);
    if($result) {
        while($row=mysqli_fetch_array($result))
    {
        $data=$row['name'];
    }
    }
    return $data;

}

?>