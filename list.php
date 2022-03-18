<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "store";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);



$ID=$_GET['id'];


$sql1 = "SELECT * FROM `stors` where SL=$ID";

$result = mysqli_query($conn,$sql1);
$row = mysqli_fetch_assoc($result);



?>
 

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  </head>
  <body>
  <div class="container my-3">
          <h2>Details of Software System...</h2>
        <form >
            
            <div class="my-4">
              <strong><label for="SS" class="form-label">Software System</label> </strong>
              <input type="text" class="form-control" value="<?php echo $row['SS'];?>" >

            </div>

            <div class="my-4">
            <strong> <label for="Purpose" class="form-label">Purpose</label></strong>
              <input type="text" class="form-control" value="<?php echo $row['Purpose'];?>" >

            </div>
            <a class='btn btn-primary' href="http://localhost/CRUD/">Back</a>
            

            </form>
  </body>
</html>


