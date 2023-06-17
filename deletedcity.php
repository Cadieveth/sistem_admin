<?php
    include "config.php";
    $city_id = $_GET['city_id'];
    $sql = "DELETE FROM 19n30008city WHERE city_id='$city_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultcity.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultcity.php'>Back</a>";
        }
?>