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
$city_id = $city = $country_id = "";
$city_id_err = $city_err = $country_id_err = "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi city_id
$input_city_id = trim($_POST["city_id"]);
if(empty($input_city_id)){
$city_id_err = "Input city ID hanya angka.";
} elseif(!ctype_digit($input_city_id)){
$city_id_err = 'hanya nilai/integer angka.';
} else{
$city_id = $input_city_id;
}

// Validate city
$input_city = trim($_POST["city"]);
if(empty($input_city)){
$city_err = "silakan input city yang benar.";
} elseif(!filter_var(trim($_POST["city"]), FILTER_VALIDATE_REGEXP,
array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
$city_err = 'silakan input city yang valid.';
} else{
$city = $input_city;
}

// Validate kelurahan
$input_country_id = trim($_POST["country_id"]);
$country_id = $input_country_id;

// cek input errors sebelum proses insert ke tabel
if(empty($city_id_err) && empty($city_err) && empty($country_id_err)){
// sqlnya
$sql = "INSERT INTO 19n30008city (city_id, city, country_id) VALUES (?,?,? )";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("sss", $param_city_id, $param_city, $param_country_id);
// Set parameters
$param_city_id = $city_id;
$param_city = $city;
$param_country_id = $country_id;
// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultcity.php");
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
<title>Form input | data City</title>
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

<div class="form-group <?php echo (!empty($city_id_err)) ? 'has-error' : ''; ?>">
<label>City ID</label>
<input type="text" name="city_id" class="form-control" value="<?php echo $city_id; ?>">
<span class="help-block"><?php echo $city_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
<label>City</label>
<textarea name="city" class="form-control"><?php echo $city; ?></textarea>
<span class="help-block"><?php echo $city_err;?></span>
</div>


<div class="form-group <?php echo (!empty($country_id_err)) ? 'has-error' : ''; ?>">
<label>Country ID</label>
<p></p>
<select name="country_id" class="form-control" value="<?php echo $country_id; ?>">
<option value=""> Please Select</option>
<?php
$sql = "SELECT * from 19n30008country";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value=\"".$row['country_id']."\" ";
if ($country_id == $row['country_id']) {
echo "selected";
}
echo ">".$row['country']."-".$row['country_id']."</option>";
}
}
?>
</select></div>

<input type="submit" class="btn btn-success" value="Simpan">
<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
<a href="resultcity.php" class="btn btn-danger">Batal</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>