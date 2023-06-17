<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit | Data Customer</title>
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
	$id = $_GET['customer_id'];
	$sql = "SELECT * from 19n30008customer WHERE customer_id='$id'";
	$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $customer_id = $row['customer_id'];
        $store_id = $row['store_id'];
		$first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
		$address_id = $row['address_id'];
		}
		}
?>

	<div class="wrapper">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="page-header">
	<h2 class = "alert alert-info text-center">Edit Data Customer</h2>

	<form action="updatecustomer.php" method="post" class="form-group alert">
	<table cellpadding="8">

	<div class="form-group">
	<label for="customer_id">Customer ID</label>
	<input type="text" name="customer_id" id="customer_id" class="form-control" value="<?php echo $customer_id;?>"/>
	</div>

    <div class="form-group">
	<label for="store_id">Store ID</label>
	<input type="text" name="store_id" id="store_id" class="form-control" value="<?php echo $store_id;?>"/>
	</div>

	<div class="form-group">
	<label for="first_name">First Name</label>
	<input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $first_name;?>"/>
	</div>

	<div class="form-group">
	<label for="last_name">Last Name</label>
	<input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $last_name;?>"/>
	</div>

    <div class="form-group">
	<label for="email">Email</label>
	<input type="text" name="email" id="email" class="form-control" value="<?php echo $email;?>"/>
	</div>

    <div class="form-group">
	<label>Address ID </label>
	<p></p>
	<select name="address_id" class="form-control" value="<?php echo $address_id; ?>">
	<option value=""> Please Select</option>
		<?php
		$sql = "SELECT * from 19n30008address";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		echo "<option value=\"".$row['address_id']."\" ";
		if ($address_id== $row['address_id']) {
		echo "selected";
		}
		echo ">".$row['address']."-".$row['address_id']."</option>";
		}
		}
		?>			
		</select>
		</div>

	<p>
	<div>
	<input type="submit" class="btn btn-success" name="Submit" value="Simpan" />
	<input name="batal" class="btn btn-danger" type="reset" id="batal" value="Reset" />
	<a href="resultcustomer.php" class="btn btn-primary">Back</a>
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