<?php
    include "config.php";
    $film_id = $_GET['film_id'];
    $sql = "DELETE FROM 19n30008film WHERE film_id='$film_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultfilm.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultfilm.php'>Back</a>";
        }
?>