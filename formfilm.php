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
$film_id = $title = $description = $release_year = $language_id = $original_language_id = $rental_duration = $rental_rate = $length = $replacement_cost = $rating = $special_features = "";
$film_id_err = $title_err = $description_err = $release_year_err = $language_id_err = $original_language_id_err = $rental_duration_err = $rental_rate_err = $length_err = $replacement_cost_err = $rating_err = $special_features_err = "";
// proses penginputan saat form di submit apa saja yang dilakukan
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validasi film_id
$input_film_id = trim($_POST["film_id"]);
if(empty($input_film_id)){
$film_id_err = "Input film_id hanya angka.";
} elseif(!ctype_digit($input_film_id)){
$film_id_err = 'hanya nilai/integer angka.';
} else{
$film_id = $input_film_id;
}

// Validasi title
$input_title = trim($_POST["title"]);
if(empty($input_title)){
$title_err = 'input title yang benar.';
} else{
$title = $input_title;
}

// Validasi description
$input_description = trim($_POST["description"]);
if(empty($input_description)){
$description_err = 'input description yang benar.';
} else{
$description = $input_description;
}

// Validasi release_year
$input_release_year = trim($_POST["release_year"]);
if(empty($input_release_year)){
$release_year_err = "Input release_year hanya angka.";
} elseif(!ctype_digit($input_release_year)){
$release_year_err = 'hanya nilai/integer angka.';
} else{
$release_year = $input_release_year;
}

// Validasi language_id
$input_language_id = trim($_POST["language_id"]);
$language_id = $input_language_id;

// Validasi original_language_id
$input_original_language_id = trim($_POST["original_language_id"]);
if(empty($input_original_language_id)){
$original_language_id_err = "Input original_language_id hanya angka.";
} elseif(!ctype_digit($input_original_language_id)){
$original_language_id_err = 'hanya nilai/integer angka.';
} else{
$original_language_id = $input_original_language_id;
}

// Validasi length
$input_length = trim($_POST["length"]);
if(empty($input_length)){
$length_err = "Input length hanya angka.";
} elseif(!ctype_digit($input_length)){
$length_err = 'hanya nilai/integer angka.';
} else{
$length = $input_length;
}

// Validasi special_features
$input_special_features = trim($_POST["special_features"]);
$special_features = $input_special_features;

// cek input errors sebelum proses insert ke tabel
if(empty($film_id_err) && empty($title_err) && empty($description_err) && empty($release_year_err) && 
empty($language_id_err) && empty($original_language_id_err) && 
empty($length_err) && empty($special_futures_err)){
// sqlnya
$sql = "INSERT INTO 19n30008film (film_id, title, description, release_year, language_id, original_language_id, length, special_features) 
VALUES (?,?,?,?,?,?,?,?)";
if($stmt = $mysqli->prepare($sql)){
// Bind variable
$stmt->bind_param("ssssssss", $param_film_id, $param_title, $param_description, $param_release_year, $param_language_id, $param_original_language_id, $param_length, $param_special_features);
// Set parameters
$param_film_id = $film_id;
$param_title = $title;
$param_description = $description;
$param_release_year = $release_year;
$param_language_id = $language_id;
$param_original_language_id = $original_language_id;
$param_length = $length;
$param_special_features = $special_features;

// Attempt to execute the prepared statement
if($stmt->execute()){
// record telah tersimpan dan akan melakukan redirection ke tampilan.php
header("location: resultfilm.php");
exit();
} else{
echo "ada yang salah, coba input lagi";
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
<title>Data Film</title>
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
<h2 class="alert alert-info text-center">Masukkan Data Film</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group <?php echo (!empty($film_id_err)) ? 'has-error' : ''; ?>">
<label>Film ID</label>
<input type="text" name="film_id" class="form-control" value="<?php echo $film_id; ?>">
<span class="help-block"><?php echo $film_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
<label>Title</label>
<input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
<span class="help-block"><?php echo $title_err;?></span>
</div>

<div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
<label>Description</label>
<textarea name="description" class="form-control"><?php echo $description; ?></textarea>
<span class="help-block"><?php echo $description_err;?></span>
</div>

<div class="form-group <?php echo (!empty($release_year_err)) ? 'has-error' : ''; ?>">
<label>Release Year</label>
<input type="text" name="release_year" class="form-control" value="<?php echo $release_year; ?>">
<span class="help-block"><?php echo $release_year_err;?></span>
</div>

<div class="form-group <?php echo (!empty($language_id_err)) ? 'has-error' : ''; ?>">
<label>Language ID</label>
<p></p>
<select name="language_id" class="form-control" value="<?php echo $language_id; ?>">
<option value=""> Please Select</option>
<?php
$sql = "SELECT * from 19n30008language";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value=\"".$row['language_id']."\" ";
if ($language_id == $row['language_id']) {
echo "selected";
}
echo ">".$row['name']."-".$row['language_id']."</option>";
}
}
?>
</select></div>

<div class="form-group <?php echo (!empty($original_language_id_err)) ? 'has-error' : ''; ?>">
<label>Original Language ID</label>
<input type="text" name="original_language_id" class="form-control" value="<?php echo $original_language_id; ?>">
<span class="help-block"><?php echo $original_language_id_err;?></span>
</div>

<div class="form-group <?php echo (!empty($length_err)) ? 'has-error' : ''; ?>">
<label>Length</label>
<input type="text" name="length" class="form-control" value="<?php echo $length; ?>">
<span class="help-block"><?php echo $length_err;?></span>
</div>

<div class="form-group <?php echo (!empty($special_features_err)) ? 'has-error' : ''; ?>">
<label>Special Features</label>
<p></p>
<select name="special_features" class="form-control" value="<?php echo $special_features; ?>">
<option value=""> Please Select</option>
<?php
$sql = "SELECT * from 19n30008special_features";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value=\"".$row['special_features']."\" ";
if ($special_features == $row['special_features']) {
echo "selected";
}
echo ">".$row['special_features']."</option>";
}
}
?>
</select></div>

</select></div>
<input type="submit" class="btn btn-success" value="Save">
<a href="resultfilm.php" class="btn btn-danger">Cancel</a>
</form>
</div>
</div>
</div>
</div>
</body>
</html>