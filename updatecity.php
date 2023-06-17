<?php
require_once('config.php');
$city_id = $_POST['city_id'];
$city = $_POST['city'];
$country_id = $_POST['country_id'];

$sql = "UPDATE 19n30008city SET city_id='$city_id', city='$city', country_id='$country_id' WHERE city_id='$city_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultcity.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultcity.php'>Kembali Ke Form</a>";
        }
        ?>