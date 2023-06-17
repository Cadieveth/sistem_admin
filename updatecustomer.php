<?php
require_once('config.php');
$customer_id = $_POST['customer_id'];
$store_id = $_POST['store_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$address_id = $_POST['address_id'];

$sql = "UPDATE 19n30008customer SET customer_id='$customer_id', store_id='$store_id', first_name='$first_name', last_name='$last_name', email='$email', address_id='$address_id' WHERE customer_id='$customer_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultcustomer.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultcustomer.php'>Kembali Ke Form</a>";
        }
        ?>