<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tampil | Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
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
    <h2 class="pull-left">Data Customer</h2>
    </div>
        <?php
        // Include config file
        include 'config.php';
        include 'function_address.php';
                    
        // Attempt select query execution
        $sql = "SELECT * FROM 19n30008customer WHERE active='0'";
        if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>No</th>";
            echo "<th>Customer ID</th>";
            echo "<th>Store ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Address ID</th>";
            echo "<th>Address name</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        while($row = $result->fetch_array()){
            echo "<tr>";
            $i++;
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row['customer_id'] . "</td>";
            echo "<td>" . $row['store_id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['address_id'] . "</td>";
            echo "<td>" . get_address($row['address_id']) . "</td>";
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
		
        <a href="resultcustomer.php" class="btn btn-danger pull-right">Kembali</a>
       

    </div>        
    </div>
    </div>
</body>
</html>