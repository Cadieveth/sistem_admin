<?php
    include "config.php";
    $address_id = $_GET['address_id'];
    $sql = "DELETE FROM 19n30008address WHERE address_id='$address_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultaddress.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultaddress.php'>Back</a>";
        }
?>