<?php
    include "config.php";
    $actor_id = $_GET['actor_id'];
    $sql = "DELETE FROM 19n30008film_actor WHERE actor_id='$actor_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultfilm_actor.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultfilm_actor.php'>Back</a>";
        }
?>