<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tampil | Address</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 800px;
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
    <div class="wrapper">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
    <div class="page-header clearfix">
    <h2 class="pull-left">Data Address</h2>
    </div>
        <?php
        // Include config file
        require_once 'config.php';
        include 'function.php';
                    
        // Attempt select query execution
        $sql = "SELECT * FROM 19n30008address";
        if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>No</th>";
            echo "<th>Address ID</th>";
            echo "<th>Address</th>";
            echo "<th>Address2</th>";
            echo "<th>District</th>";
            echo "<th>City ID</th>";
            echo "<th>Name City</th>";
            echo "<th>Postal Code</th>";
            echo "<th>Phone</th>";
            echo "<th>Option</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        while($row = $result->fetch_array()){
            echo "<tr>";
            $i++;
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row['address_id'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['address2'] . "</td>";
            echo "<td>" . $row['district'] . "</td>";
            echo "<td>" . $row['city_id'] . "</td>";
            echo "<td>" . get_city($row['city_id']) . "</td>";
            echo "<td>" . $row['postal_code'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>";
            echo "<a href='edittampiladdress.php?address_id=". $row['address_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "<a href='deletedaddress.php?address_id=". $row['address_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
            echo "</td>";
            echo "</tr>";
            } echo "</tbody>";                            
            echo "</table>";
        
        // Free result set
        $result->free();
        } else{
        echo "<p class='lead'><em>No records were found.</em></p>";
        }
        } else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        }
                    
        // Close connection
        $mysqli->close();
        ?>
        </div>
		<a href="formaddress.php" class="btn btn-success pull-right">Tambah Data</a>
        <a href="indexmenu.html" class="btn btn-danger pull-right">Kembali</a>

    </div>        
    </div>
    </div>
</body>
</html>