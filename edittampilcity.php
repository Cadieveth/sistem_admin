<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit | Data City</title>
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
	$id = $_GET['city_id'];
	$sql = "SELECT * from 19n30008city WHERE city_id='$id'";
	$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$city_id = $row['city_id'];
		$city = $row['city'];
		$country_id = $row['country_id'];
		}
		}
?>
	<div class="wrapper">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="page-header clearfix">
	<h2 class = "alert alert-dark text-center">Edit Data City</h2>
  	</div>
	<form action="updatecity.php" method="post" class="form-group alert">
	<table cellpadding="8">

	<div class="form-group">
	<label for="city_id">City ID</label>
	<input type="text" name="city_id" id="city_id" class="form-control" value="<?php echo $city_id;?>"/>
	</div>

	<div class="form-group">
	<label for="city">City</label>
	<input type="text" name="city" id="city" class="form-control" value="<?php echo $city;?>"/>
	</div>


	<div class="form-group">
	<label>Country ID </label>
	<p></p>
	<select name="country_id" class="form-control" value="<?php echo $country_id; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008country";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['country_id']."\" ";
		if ($country_id== $row['country_id']) {
		echo "selected";
		}
		echo ">".$row['country']."-".$row['country_id']."</option>";
		}
		}
		?>			
		</select>
		</div>

	</div>
</div>

</label>
</div>
</form>	
<div>
<input type="submit" class="btn btn-success" name="Submit" value="Simpan" />
<input name="batal" class="btn btn-danger" type="reset" id="batal" value="Reset" />
<a href="resultcity.php" class="btn btn-primary">Kembali</a>
</div>
</div>
</div>
</div> 
</body>
</html>