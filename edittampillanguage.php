<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit | Data Language</title>
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
	$id = $_GET['language_id'];
	$sql = "SELECT * from 19n30008language WHERE language_id='$id'";
	$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$language_id = $row['language_id'];
		$name = $row['name'];
		}
		}
?>

	<div class="wrapper">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="page-header">
	<h2 class = "alert alert-info text-center">Edit Data Language</h2>

	<form action="updatelanguage.php" method="post" class="form-group alert">
	<table cellpadding="8">

	<div class="form-group">
	<label for="language_id">ID Country</label>
	<input type="text" name="language_id" id="language_id" class="form-control" value="<?php echo $language_id;?>"/>
	</div>

	<div class="form-group">
	<label for="name">Language</label>
	<input type="text" name="name" id="name" class="form-control" value="<?php echo $name;?>"/>
	</div>
						
	<p>
	<div>
	<input type="submit" class="btn btn-success" name="Submit" value="Simpan" />
	<input name="batal" class="btn btn-primary" type="reset" id="batal" value="Reset" />
	<a href="resultlanguage.php" class="btn btn-danger">Kembali</a>
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