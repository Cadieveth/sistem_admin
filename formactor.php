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
$actor_id = $first_name = $last_name = "";
$actor_id_err = $first_name_err = $last_name_err = "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi actor_id
$input_actor_id = trim($_POST["actor_id"]);
if(empty($input_actor_id)){
$actor_id_err = "Input actor_id hanya angka.";
} elseif(!ctype_digit($input_actor_id)){
$actor_id_err = 'hanya nilai/integer angka.';
} else{
$actor_id = $input_actor_id;
}

// Validate first_name
$input_first_name = trim($_POST["first_name"]);
if(empty($input_first_name)){
$first_name_err = "silakan input first_name yang benar.";
} elseif(!filter_var(trim($_POST["first_name"]), FILTER_VALIDATE_REGEXP,
array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
$first_name_err = 'silakan input first_name yang valid.';
} else{
$first_name = $input_first_name;
}

// Validate last_name
$input_last_name = trim($_POST["last_name"]);
if(empty($input_last_name)){
$last_name_err = 'input last_name yang benar.';
} else{
$last_name = $input_last_name;}

// cek input errors sebelum proses insert ke tabel
if(empty($actor_id_err) && empty($first_name_err) && empty($last_name_err)){
// sqlnya
$sql = "INSERT INTO 19n30008actor (actor_id, first_name, last_name) VALUES (?,?,?)";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("sss", $param_actor_id, $param_first_name, $param_last_name);
// Set parameters
$param_actor_id = $actor_id;
$param_first_name = $first_name;
$param_last_name = $last_name;

// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultactor.php");
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
<title>Form input | Data Actor</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 600px;
margin: 0 auto;}
</style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2 class="alert alert-info text-center">Masukkan Country</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group <?php echo (!empty($actor_id_err)) ? 'has-error' : ''; ?>">
<label>ID Actor</label>
<input type="text" name="actor_id" class="form-control" value="<?php echo $actor_id; ?>">
<span class="help-block"><?php echo $actor_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
<label>First Name</label>
<input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
<span class="help-block"><?php echo $first_name_err;?></span>
</div>

<div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
<label>Last Name</label>
<input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
<span class="help-block"><?php echo $last_name_err;?></span>
</div>

</select></div>
<input type="submit" class="btn btn-success" value="Simpan">
<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
<a href="resultactor.php" class="btn btn-danger">Batal</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>