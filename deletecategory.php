<?php
    include "config.php";
    $category_id = $_GET['category_id'];
    $sql = "DELETE FROM 19n30008category WHERE category_id='$category_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultcategory.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultcategory.php'>Back</a>";
        }
?>