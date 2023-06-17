<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit | Data Film Category</title>
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
	$id = $_GET['category_id'];
	$sql = "SELECT * from 19n30008film_category WHERE category_id='$id'";
	$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$category_id = $row['category_id'];
		$film_id = $row['film_id'];
		}
		}
?>
	<div class="wrapper">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="page-header clearfix">
	<h2 class = "alert alert-dark text-center">Edit Data Film Category</h2>
  	</div>
	<form action="updatefilm_category.php" method="post" class="form-group alert">
	<table cellpadding="8">


	<div class="form-group">
	<label>Category ID </label>
	<p></p>
	<select name="category_id" class="form-control" value="<?php echo $category_id; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008category";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['category_id']."\" ";
		if ($category_id== $row['category_id']) {
		echo "selected";
		}
		echo ">".$row['name']."-".$row['category_id']."</option>";
		}
		}
		?>			
		</select>
		</div>


	<div class="form-group">
	<label>Film ID </label>
	<p></p>
	<select name="film_id" class="form-control" value="<?php echo $film_id; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008film";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['film_id']."\" ";
		if ($film_id== $row['film_id']) {
		echo "selected";
		}
		echo ">".$row['title']."-".$row['film_id']."</option>";
		}
		}
		?>			
		</select>
		</div>


</label>
</div>
</form>	
<div>
<input type="submit" class="btn btn-success" name="Submit" value="Simpan" />
<input name="batal" class="btn btn-danger" type="reset" id="batal" value="Reset" />
<a href="resultfilm_category.php" class="btn btn-primary">Kembali</a>
</div>
</div>
</div>
</div> 
</body>
</html>