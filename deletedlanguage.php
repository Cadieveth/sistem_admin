<?php
    include "config.php";
    $language_id = $_GET['language_id'];
    $sql = "DELETE FROM 19n30008language WHERE language_id='$language_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultlanguage.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultlanguage.php'>Back</a>";
        }
?>