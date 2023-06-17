<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "19n30008";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// Include config file
require_once 'config.php';
// mendefinisikan variabel dan mngeset nilainya kosong
$actor_id = $film_id =  "";
$actor_id_err = $film_id_err =  "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi actor_id
$input_actor_id = trim($_POST["actor_id"]);
if(empty($input_actor_id)){
$actor_id_err = "Input actor ID hanya angka.";
} elseif(!ctype_digit($input_actor_id)){
$actor_id_err = 'hanya nilai/integer angka.';
} else{
$actor_id = $input_actor_id;
}

// Validasi film_id
$input_film_id = trim($_POST["film_id"]);
if(empty($input_film_id)){
$film_id_err = "Input film ID hanya angka.";
} elseif(!ctype_digit($input_film_id)){
$film_id_err = 'hanya nilai/integer angka.';
} else{
$film_id = $input_film_id;
}

// cek input errors sebelum proses insert ke tabel
if(empty($actor_id_err) && empty($film_id_err)){
// sqlnya
$sql = "INSERT INTO 19n30008film_actor (actor_id, film_id) VALUES (?,?)";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("ss", $param_actor_id, $param_film_id);
// Set parameters
$param_actor_id = $actor_id;
$param_film_id = $film_id;
// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultfilm_actor.php");
exit();
} else{
echo "ada yang salah coba input lagi";
}
}
// Close statement
$stmt->close();
}
// Close connection
$mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form input | data Film Actor</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;}
</style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2 class="alert  text-center">Input data</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group <?php echo (!empty($actor_id_err)) ? 'has-error' : ''; ?>">
<label>Actor ID</label>
<p></p>
<select name="actor_id" class="form-control" value="<?php echo $actor_id; ?>">
<option value=""> Please Select</option>
<?php
$sql = "SELECT * from 19n30008actor";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value=\"".$row['actor_id']."\" ";
if ($film_id == $row['actor_id']) {
echo "selected";
}
echo ">".$row['last_name']."-".$row['actor_id']."</option>";
}
}
?>
</select></div>


<div class="form-group <?php echo (!empty($film_id_err)) ? 'has-error' : ''; ?>">
<label>Film ID</label>
<p></p>
<select name="film_id" class="form-control" value="<?php echo $film_id; ?>">
<option value=""> Please Select</option>
<?php
$sql = "SELECT * from 19n30008film";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value=\"".$row['film_id']."\" ";
if ($film_id == $row['film_id']) {
echo "selected";
}
echo ">".$row['title']."-".$row['film_id']."</option>";
}
}
?>
</select></div>

<input type="submit" class="btn btn-success" value="Simpan">
<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
<a href="resultfilm_actor.php" class="btn btn-danger">Batal</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>