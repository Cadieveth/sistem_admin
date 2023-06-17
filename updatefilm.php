<?php
require_once('config.php');
$film_id = $_POST['film_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$release_year = $_POST['release_year'];
$language_id = $_POST['language_id'];
$original_language_id = $_POST['original_language_id'];
$length = $_POST['length'];
$rating= $_POST['rating'];
$special_features = $_POST['special_features'];

$sql = "UPDATE 19n30008film SET film_id='$film_id', title='$title', description='$description', release_year='$release_year', language_id='$language_id', original_language_id='$original_language_id', length='$length', rating='$rating', special_features='$special_features' WHERE film_id='$film_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultfilm.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultfilm.php'>Kembali Ke Form</a>";
        }
        ?>