<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tampil | Film</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 1400px;
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
    <h2 class="pull-left">Data Film</h2>
    </div>
        <?php
        // Include config file
        require_once 'config.php';
        require_once 'function_film.php';
                    
        // Attempt select query execution
        $sql = "SELECT * FROM 19n30008film";
        if($result = $mysqli->query($sql)){
        if($result->num_rows > 0){
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>No</th>";
            echo "<th>Film ID</th>";
            echo "<th>Title</th>";
            echo "<th>Description</th>";
            echo "<th>Release Year</th>";
            echo "<th>Language ID</th>";
            echo "<th>Language</th>";
            echo "<th>Original Language ID</th>";
            echo "<th>Rental Duration</th>";
            echo "<th>Rental Rate</th>";
            echo "<th>Length</th>";
            echo "<th>Replacement Cost</th>";
            echo "<th>Rating</th>";
            echo "<th>Special Features</th>";
            
            echo "<th>Option</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
        while($row = $result->fetch_array()){
            echo "<tr>";
            $i++;
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row['film_id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['release_year'] . "</td>";
            echo "<td>" . $row['language_id'] . "</td>";
            echo 
                "<td>".get_language($row['language_id']). "</td>";

            echo "<td>" . $row['original_language_id'] . "</td>";
            echo "<td>" . $row['rental_duration'] . "</td>";
            echo "<td>" . $row['rental_rate'] . "</td>";
            echo "<td>" . $row['length'] . "</td>";
            echo "<td>" . $row['replacement_cost'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "<td>" . $row['special_features'] . "</td>";
           
            echo "<td>";
            echo "<a href='edittampilfilm.php?film_id=". $row['film_id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "<a href='deletedfilm.php?film_id=". $row['film_id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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
		<a href="formfilm.php" class="btn btn-success pull-right">Tambah Data</a>
        <a href="indexmenu.html" class="btn btn-danger pull-right">Kembali</a>
    </div>        
    </div>
    </div>
</body>
</html>