<?php
    include "config.php";
    $customer_id = $_GET['customer_id'];
    //$sql = "DELETE FROM 19n30008customer WHERE customer_id='$customer_id'";
    $sql = "UPDATE 19n30008customer SET active='0' WHERE customer_id='$customer_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultcustomer.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultcustomer.php'>Back</a>";
        }
?>