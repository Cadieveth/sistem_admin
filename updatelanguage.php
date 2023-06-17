<?php
require_once('config.php');
$language_id = $_POST['language_id'];
$name = $_POST['name'];

$sql = "UPDATE 19n30008language SET language_id='$language_id', name='$name' WHERE language_id='$language_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultlanguage.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultlanguage.php'>Kembali Ke Form</a>";
        }
        ?>