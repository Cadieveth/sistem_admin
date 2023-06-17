<?php
require_once('config.php');
$country_id = $_POST['country_id'];
$country = $_POST['country'];

$sql = "UPDATE 19n30008country SET country_id='$country_id', country='$country' WHERE country_id='$country_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultcountry.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultcountry.php'>Kembali Ke Form</a>";
        }
        ?>