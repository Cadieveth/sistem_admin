<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit | Data Address</title>
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
	$id = $_GET['address_id'];
	$sql = "SELECT * from 19n30008address WHERE address_id='$id'";
	$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$address_id = $row['address_id'];
		$address = $row['address'];
        $address2 = $row['address2'];
        $district = $row['district'];
        $city_id = $row['city_id'];
        $postal_code = $row['postal_code'];
        $phone = $row['phone'];
		}
		}
?>

	<div class="wrapper">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="page-header">
	<h2 class = "alert alert-info text-center">Edit Data Address</h2>

	<form action="updateaddress.php" method="post" class="form-group alert">
	<table cellpadding="8">

	<div class="form-group">
	<label for="address_id">Address ID</label>
	<input type="text" name="address_id" id="address_id" class="form-control" value="<?php echo $address_id;?>"/>
	</div>

	<div class="form-group">
	<label for="address">Adress</label>
	<input type="text" name="address" id="address" class="form-control" value="<?php echo $address;?>"/>
	</div>

	<div class="form-group">
	<label for="address2">Address 2</label>
	<input type="text" name="address2" id="address2" class="form-control" value="<?php echo $address2;?>"/>
	</div>

    <div class="form-group">
	<label for="district">District</label>
	<input type="text" name="district" id="district" class="form-control" value="<?php echo $district;?>"/>
	</div>

	<div class="form-group">
	<label>City ID </label>
	<p></p>
	<select name="city_id" class="form-control" value="<?php echo $city_id; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008city";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['city_id']."\" ";
		if ($city_id== $row['city_id']) {
		echo "selected";
		}
		echo ">".$row['city']."-".$row['city_id']."</option>";
		}
		}
		?>			
		</select>
		</div>

    <div class="form-group">
	<label for="postal_code">Postal Code</label>
	<input type="text" name="postal_code" id="postal_code" class="form-control" value="<?php echo $postal_code;?>"/>
	</div>

	<div class="form-group">
	<label for="phone">Phone</label>
	<input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone;?>"/>
	</div>

	<p>
	<div>
	<input type="submit" class="btn btn-success" name="Submit" value="Save" />
	<input name="batal" class="btn btn-danger" type="reset" id="batal" value="Reset" />
	<a href="resultaddress.php" class="btn btn-primary">Back</a>
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