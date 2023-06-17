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
$customer_id = $store_id = $first_name = $last_name = $email = $address_id = "";
$customer_id_err = $store_id_err = $first_name_err = $last_name_err = $email_err = $address_id_err = "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi customer_id
$input_customer_id = trim($_POST["customer_id"]);
if(empty($input_customer_id)){
$customer_id_err = "Input customer ID hanya angka.";
} elseif(!ctype_digit($input_customer_id)){
$customer_id_err = 'hanya nilai/integer angka.';
} else{
$customer_id = $input_customer_id;
}

// Validate store_id
$input_store_id = trim($_POST["store_id"]);
if(empty($input_store_id)){
$store_id_err = "Input store id dengan benar";
} else{
$store_id = $input_store_id;
}

// Validate first_name
$input_first_name = trim($_POST["first_name"]);
if(empty($input_first_name)){
$first_name_err = "silakan input first name yang benar.";
} elseif(!filter_var(trim($_POST["first_name"]), FILTER_VALIDATE_REGEXP,
array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
$first_name_err = 'silakan input first name yang valid.';
} else{
$first_name = $input_first_name;
}

// Validate last_name
$input_last_name = trim($_POST["last_name"]);
if(empty($input_last_name)){
$last_name_err = "Input last name dengan benar";
} else{
$last_name = $input_last_name;
}

// Validate email
$input_email = trim($_POST["email"]);
if(empty($input_email)){
$email_err = "Input email dengan benar";
} else{
$email = $input_email;
}

// Validate address_id
$input_address_id = trim($_POST["address_id"]);
$address_id = $input_address_id;

// cek input errors sebelum proses insert ke tabel
if(empty($customer_id_err) && empty($store_id_err) && empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($address_id_err)){
// sqlnya
$sql = "INSERT INTO 19n30008customer (customer_id, store_id, first_name, last_name, email, address_id) VALUES (?,?,?,?,?,? )";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("ssssss", $param_customer_id, $param_store_id, $param_first_name, $param_last_name, $param_email, $param_address_id);
// Set parameters
$param_customer_id = $customer_id; 
$param_store_id = $store_id; 
$param_first_name = $first_name;
$param_last_name = $last_name; 
$param_email = $email; 
$param_address_id = $address_id;

// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultcustomer.php");
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
<title>Form input | data Customer</title>
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

<div class="form-group <?php echo (!empty($customer_id_err)) ? 'has-error' : ''; ?>">
<label>Customer ID</label>
<input type="text" name="customer_id" class="form-control" value="<?php echo $customer_id; ?>">
<span class="help-block"><?php echo $customer_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($store_id_err)) ? 'has-error' : ''; ?>">
<label>Store ID</label>
<textarea name="store_id" class="form-control"><?php echo $store_id; ?></textarea>
<span class="help-block"><?php echo $store_id_err;?></span>
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

<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
<label>Email</label>
<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
<span class="help-block"><?php echo $email_err;?></span>
</div>

<div class="form-group <?php echo (!empty($address_id_err)) ? 'has-error' : ''; ?>">
<label>Address ID</label>
<p></p>
<select name="address_id" class="form-control" value="<?php echo $address_id; ?>">
<option value=""> Please Select</option>
<?php
$sql = "SELECT * from 19n30008address";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value=\"".$row['address_id']."\" ";
if ($address_id == $row['address_id']) {
echo "selected";
}
echo ">".$row['address']."-".$row['address_id']."</option>";
}
}
?>
</select></div>

<input type="submit" class="btn btn-success" value="Simpan">
<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
<a href="resultcustomer.php" class="btn btn-danger">Batal</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>