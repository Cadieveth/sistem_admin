<?php

function get_language($id){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', '19n30008');
    $data="";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT name from 19n30008language WHERE language_id='".$id."'";
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