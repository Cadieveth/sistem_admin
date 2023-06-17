<?php
    include "config.php";
    $country_id = $_GET['country_id'];
    $sql = "DELETE FROM 19n30008country WHERE country_id='$country_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultcountry.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultcountry.php'>Back</a>";
        }
?>