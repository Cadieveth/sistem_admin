<?php

function get_address($id){
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', '19n30008');
    $data="";
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT address from 19n30008address WHERE address_id='$id'";
    $result = $mysqli->query($sql);
    if($result) {
        while($row=mysqli_fetch_array($result))
    {
        $data=$row['address'];
    }
    }
    return $data;

}

?>