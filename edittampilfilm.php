<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit | Data Film</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	<style type="text/css">
		.wrapper{
			width: 600px;
			margin: 0 auto;
		}
		.page-header h2{
			margin-top: 0;
		}
		table tr td:last-child a{
			margin-right: 15px;
		}
		</style>
		<script type="text/javascript">
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</head>
<body>
<?php
require_once('config.php');
	$id = $_GET['film_id'];
	$sql = "SELECT * from 19n30008film WHERE film_id='$id'";
	$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$film_id = $row['film_id'];
		$title = $row['title'];
		$description = $row['description'];
		$release_year = $row['release_year'];
		$language_id = $row['language_id'];
		$original_language_id = $row['original_language_id'];
		$length = $row['length'];
		$rating = $row['rating'];
		$special_features = $row['special_features'];
		}
		}
?>

	<div class="wrapper">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="page-header">
	<h2 class = "alert alert-info text-center">Edit Data Film</h2>

	<form action="updatefilm.php" method="post" class="form-group alert">
	<table cellpadding="8">

	<div class="form-group">
	<label for="film_id">Film ID</label>
	<input type="text" name="film_id" id="film_id" class="form-control" value="<?php echo $film_id;?>"/>
	</div>

	<div class="form-group">
	<label for="title">Title</label>
	<input type="text" name="title" id="title" class="form-control" value="<?php echo $title;?>"/>
	</div>

	<div class="form-group">
	<label for="description">Description</label>
	<input type="text" name="description" id="description" class="form-control" value="<?php echo $description;?>"/>
	</div>

	<div class="form-group">
	<label for="release_year">Release Year</label>
	<input type="text" name="release_year" id="release_year" class="form-control" value="<?php echo $release_year;?>"/>
	</div>

	<div class="form-group">
	<label>Language ID </label>
	<p></p>
	<select name="language_id" class="form-control" value="<?php echo $language_id; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008language";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['language_id']."\" ";
		if ($language_id== $row['language_id']) {
		echo "selected";
		}
		echo ">".$row['name']."-".$row['language_id']."</option>";
		}
		}
		?>			
		</select>
		</div>
	
		
	<div class="form-group">
	<label for="original_language_id">Original Language ID</label>
	<input type="text" name="original_language_id" id="original_language_id" class="form-control" value="<?php echo $original_language_id;?>"/>
	</div>

	<div class="form-group">
	<label for="length">Length</label>
	<input type="text" name="length" id="length" class="form-control" value="<?php echo $length;?>"/>
	</div>	

	<div class="form-group">
	<label>Rating</label>
	<p></p>
	<select name="rating" class="form-control" value="<?php echo $rating; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008rating";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['rating']."\" ";
		if ($rating== $row['rating']) {
		echo "selected";
		}
		echo ">".$row['rating']."</option>";
		}
		}
		?>			
		</select>
		</div>

	<div class="form-group">
	<label>Special Features</label>
	<p></p>
	<select name="special_features" class="form-control" value="<?php echo $special_features; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008special_features";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['special_features']."\" ";
		if ($special_features== $row['special_features']) {
		echo "selected";
		}
		echo ">".$row['special_features']."</option>";
		}
		}
		?>			
		</select>
		</div>	

	<p>
	<div>
	<input type="submit" class="btn btn-success" name="Submit" value="Simpan" />
	<input name="batal" class="btn btn-danger" type="reset" id="batal" value="Reset" />
	<a href="resultfilm.php" class="btn btn-primary">Back</a>
	</div>
	</p>
</div></div>
</label>
</div>
</form>	
</div>
</div>
</div>
</div> 
</body>
</html>