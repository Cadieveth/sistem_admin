<?php
    include "config.php";
    $category_id = $_GET['category_id'];
    $sql = "DELETE FROM 19n30008film_category WHERE category_id='$category_id'";
    if($mysqli->query($sql)===TRUE){ 
    header("location: resultfilm_category.php");
    }else{  
        echo "Data gagal dihapus. <a href='resultfilm_category.php'>Back</a>";
        }
?>