<?php
require_once('config.php');
$address_id = $_POST['address_id'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$district = $_POST['district'];
$city_id = $_POST['city_id'];
$postal_code = $_POST['postal_code'];
$phone = $_POST['phone'];

$sql = "UPDATE 19n30008address SET address_id='$address_id', address='$address', address2='$address2', district='$district', city_id='$city_id', postal_code='$postal_code', phone='$phone' WHERE address_id='$address_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultaddress.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultaddress.php'>Kembali Ke Form</a>";
        }
        ?>