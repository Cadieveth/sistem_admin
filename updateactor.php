<?php
require_once('config.php');
$actor_id = $_POST['actor_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

$sql = "UPDATE 19n30008actor SET actor_id='$actor_id', first_name='$first_name', last_name='$last_name' WHERE actor_id='$actor_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultactor.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultactor.php'>Kembali Ke Form</a>";
        }
        ?>