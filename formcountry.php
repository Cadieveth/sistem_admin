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
$country_id = $country = "";
$country_id_err = $country_err =  "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi country_id
$input_country_id = trim($_POST["country_id"]);
if(empty($input_country_id)){
$country_id_err = "Input country_id hanya angka.";
} elseif(!ctype_digit($input_country_id)){
$country_id_err = 'hanya nilai/integer angka.';
} else{
$country_id = $input_country_id;
}

// Validate country
$input_country = trim($_POST["country"]);
if(empty($input_country)){
$country_err = "silakan input country yang benar.";
} elseif(!filter_var(trim($_POST["country"]), FILTER_VALIDATE_REGEXP,
array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
$country_err = 'silakan input country yang valid.';
} else{
$country = $input_country;
}

// cek input errors sebelum proses insert ke tabel
if(empty($country_id_err) && empty($country_err)){
// sqlnya
$sql = "INSERT INTO 19n30008country (country_id, country) VALUES (?,?)";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("ss", $param_country_id, $param_country);
// Set parameters
$param_country_id = $country_id;
$param_country = $country;

// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultcountry.php");
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
<title>Form input | Data Category</title>
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

<div class="form-group <?php echo (!empty($country_id_err)) ? 'has-error' : ''; ?>">
<label>Country ID</label>
<input type="text" name="country_id" class="form-control" value="<?php echo $country_id; ?>">
<span class="help-block"><?php echo $country_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($country_err)) ? 'has-error' : ''; ?>">
<label>Country</label>
<input type="text" name="country" class="form-control" value="<?php echo $country; ?>">
<span class="help-block"><?php echo $country_err;?></span>
</div>

</select></div>
<input type="submit" class="btn btn-success" value="Simpan">
<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
<a href="resultcountry.php" class="btn btn-danger">Batal</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>