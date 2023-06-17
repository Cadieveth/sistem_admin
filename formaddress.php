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
$address_id = $address = $address2 = $district = $city_id = $postal_code = $cphone = "";
$address_id_err = $address_err = $address2_err = $district_err = $city_id_err = $postal_code_err = $phone_err = "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi address_id
$input_address_id = trim($_POST["address_id"]);
if(empty($input_address_id)){
$address_id_err = "Input address ID hanya angka.";
} elseif(!ctype_digit($input_address_id)){
$address_id_err = 'hanya nilai/integer angka.';
} else{
$address_id = $input_address_id;
}

// Validate address
$input_address = trim($_POST["address"]);
if(empty($input_address)){
$address_err = 'input address yang benar.';
} else{
$address = $input_address;}

// Validate address2
$input_address2 = trim($_POST["address2"]);
if(empty($input_address2)){
$address2_err = 'input address 2 yang benar.';
} else{
$address2 = $input_address2;}

// Validate district
$input_district = trim($_POST["district"]);
if(empty($input_district)){
$district_err = 'input district yang benar.';
} else{
$district = $input_district;}


// Validate city_id
$input_city_id = trim($_POST["city_id"]);
$city_id = $input_city_id;

// Validate postal_code
$input_postal_code = trim($_POST["postal_code"]);
if(empty($input_postal_code)){
$postal_code_err = 'input postal code yang benar.';
} else{
$postal_code = $input_postal_code;}

// Validate phone
$input_phone = trim($_POST["phone"]);
if(empty($input_phone)){
$phone_err = 'input phone yang benar.';
} else{
$phone = $input_phone;}

// cek input errors sebelum proses insert ke tabel
if(empty($address_id_err) && empty($address_err) && empty($caddress2_err) && empty($district_err) && empty($city_id_err) && empty($postal_code_err) && empty($phone_err)){
// sqlnya
$sql = "INSERT INTO 19n30008address (address_id, address, address2, district, city_id, postal_code, phone) VALUES (?,?,?,?,?,?,? )";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("sssssss", $param_address_id, $param_address, $param_address2, $param_district, $param_city_id, $param_postal_code, $param_phone,);
// Set parameters
$param_address_id = $address_id;
$param_address = $address;
$param_address2 = $address2;
$param_district = $district;
$param_city_id = $city_id;
$param_postal_code = $postal_code;
$param_phone = $phone;
// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultaddress.php");
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
<title>Form input | data Address</title>
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
<h2 class="alert  text-center">Input data Address</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group <?php echo (!empty($address_id_err)) ? 'has-error' : ''; ?>">
<label>Address ID</label>
<input type="text" name="address_id" class="form-control" value="<?php echo $address_id; ?>">
<span class="help-block"><?php echo $address_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
<label>Address</label>
<textarea name="address" class="form-control"><?php echo $address; ?></textarea>
<span class="help-block"><?php echo $address_err;?></span>
</div>

<div class="form-group <?php echo (!empty($address2_err)) ? 'has-error' : ''; ?>">
<label>Address 2</label>
<textarea name="address2" class="form-control"><?php echo $address2; ?></textarea>
<span class="help-block"><?php echo $address2_err;?></span>
</div>

<div class="form-group <?php echo (!empty($district_err)) ? 'has-error' : ''; ?>">
<label>District</label>
<textarea name="district" class="form-control"><?php echo $district; ?></textarea>
<span class="help-block"><?php echo $district_err;?></span>
</div>

						
<div class="form-group <?php echo (!empty($city_id_err)) ? 'has-error' : ''; ?>">
<label>City ID</label>
<p></p>
<select name="city_id" class="form-control" value="<?php echo $city_id; ?>">
<option value=""> Please Select</option>
<?php
$sql = "SELECT * from 19n30008city";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value=\"".$row['city_id']."\" ";
if ($city_id == $row['city_id']) {
echo "selected";
}
echo ">".$row['city']."-".$row['city_id']."</option>";
}
}
?>
</select></div>

<div class="form-group <?php echo (!empty($postal_code_err)) ? 'has-error' : ''; ?>">
<label>Postal Code</label>
<textarea name="postal_code" class="form-control"><?php echo $postal_code; ?></textarea>
<span class="help-block"><?php echo $postal_code_err;?></span>
</div>

<div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
<label>Phone</label>
<textarea name="phone" class="form-control"><?php echo $phone; ?></textarea>
<span class="help-block"><?php echo $phone_err;?></span>
</div>

<input type="submit" class="btn btn-success" value="Simpan">
<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
<a href="resultaddress.php" class="btn btn-danger">Batal</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>