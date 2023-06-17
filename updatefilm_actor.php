<?php
require_once('config.php');
$actor_id = $_POST['actor_id'];
$film_id = $_POST['film_id'];

$sql = "UPDATE 19n30008film_actor SET actor_id='$actor_id', film_id='$film_id' WHERE actor_id='$actor_id'";

if($mysqli->query($sql)===TRUE){ 
    // Cek jika proses simpan ke database sukses atau tidak  
    // Jika Sukses
    header("location: resultfilm_actor.php"); 
    
  
    }
    else{  
        // Jika Gagal
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";  
        echo "<br><a href='resultfilm_actor.php'>Kembali Ke Form</a>";
        }
        ?>