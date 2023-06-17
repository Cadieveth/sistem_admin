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
$language_id = $name = "";
$language_id_err = $name_err =  "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi language_id
$input_language_id = trim($_POST["language_id"]);
if(empty($input_language_id)){
$language_id_err = "Input language_id hanya angka.";
} elseif(!ctype_digit($input_language_id)){
$language_id_err = 'hanya nilai/integer angka.';
} else{
$language_id = $input_language_id;
}

// Validate name
$input_name = trim($_POST["name"]);
if(empty($input_name)){
$name_err = "silakan input name yang benar.";
} elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP,
array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
$name_err = 'silakan input name yang valid.';
} else{
$name = $input_name;
}

// cek input errors sebelum proses insert ke tabel
if(empty($language_id_err) && empty($name_err)){
// sqlnya
$sql = "INSERT INTO 19n30008language (language_id, name) VALUES (?,?)";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("ss", $param_language_id, $param_name);
// Set parameters
$param_language_id = $language_id;
$param_name = $name;

// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultlanguage.php");
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
<title>Form input | Data Language</title>
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
<h2 class="alert alert-info text-center">Masukkan Data Country</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group <?php echo (!empty($country_id_err)) ? 'has-error' : ''; ?>">
<label>Language ID</label>
<input type="text" name="language_id" class="form-control" value="<?php echo $language_id; ?>">
<span class="help-block"><?php echo $language_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
<label>Language</label>
<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
<span class="help-block"><?php echo $name_err;?></span>
</div>

</select></div>
<input type="submit" class="btn btn-success" value="Simpan">
<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
<a href="resultlanguage.php" class="btn btn-danger">Batal</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>