<?php
    $insert = false;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "store";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$database);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
      $name = $_POST["SS"];
      $Purpose = $_POST["Purpose"];

      $sql = "INSERT INTO `stors` ( `SS`, `Purpose`) VALUES ('$name', '$Purpose')";
      $result = mysqli_query($conn,$sql);

      if($result){
        $insert =true ;
      }
      else{
        echo " The record was not inserted!".mysqli_error($conn);
      }

    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
   


    <title>First Assignment!</title>
    

  </head>
  <body>
 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PHP CRUD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <?php
        if($insert){
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Success!</strong> Your Data Successfully Inserted...
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        }
      ?>

      <div class="container my-3">
          <h2>Software System and Solutions of Manufacturing Automation Team</h2>
        <form action="/CRUD/home.php" method="POST">
            
            <div class="mb-3">
              <label for="SS" class="form-label">Software System</label>
              <input type="input" class="form-control" id="SS" name="SS" >
        
            </div>

            <div class="mb-3">
              <label for="Purpose" class="form-label">Purpose</label>
              <textarea class="form-control" id="Purpose" name="Purpose" rows="3"></textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
<div class="container my-4">  
        

<table class="table" id ="myTable">
  <thead>
    <tr>
      <th scope="col">SL</th>
      <th scope="col">Software System</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
            $sql = "SELECT * From `stors`";
            $sl=0;
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
              $sl+=1;
                echo "<tr>
               <th scope='row'>".$sl."</th> 
                 <td>".$row['SS']."</td> 
                 <td> <a class='btn btn-secondary' href='/CRUD/list.php?id=".$row['SL']."'>Details</a></td>
               </tr>";
              
                
            }
       ?>
   
    
  </tbody>
</table>

</div>
<br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
           $('#myTable').DataTable();
        } );
    </script>
    

  </body>
</html>