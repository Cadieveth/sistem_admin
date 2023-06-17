<?php
require_once('config.php');
$category_id = $_POST['category_id'];
$name = $_POST['name'];

$sql = "UPDATE 19n30008category SET category_id='$category_id', name='$name' WHERE category_id='$category_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultcategory.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultcategory.php'>Kembali Ke Form</a>";
        }
        ?>