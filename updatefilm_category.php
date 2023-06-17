<?php
require_once('config.php');
$category_id = $_POST['category_id'];
$film_id = $_POST['film_id'];

$sql = "UPDATE 19n30008film_category SET category_id='$category_id', film_id='$film_id' WHERE category_id='$category_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultfilm_category.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultfilm_category.php'>Kembali Ke Form</a>";
        }
        ?>