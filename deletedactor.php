<?php
    include "config.php";
    $actor_id = $_GET['actor_id'];
    $sql = "DELETE FROM 19n30008actor WHERE actor_id='$actor_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultactor.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultactor.php'>Back</a>";
        }
?>