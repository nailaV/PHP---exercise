<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD</title>
  </head>
  <body>
<h1>CRUD OPERACIJE</h1>
<table class="table table-dark " style="margin-left:auto; width:50%; margin-right:auto; margin-top:2%">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv</th>
      <th scope="col">Boja</th>
      <th scope="col"> Akcija </th>
    </tr>
  </thead>
  <tbody>
  <?php
  include "konekcija.php";
    $sql="SELECT * FROM `proizvodi` ORDER BY ID ASC";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        ?>
         <tr>
      <td> <?php echo $row['ID'] ?></td>
      <td>  <?php echo $row['Naziv'] ?></td>
      <td> <?php echo $row['Boja'] ?></td>
      <td> <a href="delete.php?ID=<?php echo $row['ID']?>" class="btn btn-danger"> Delete </a> &nbsp; 
      <a href="update.php?ID=<?php echo $row['ID']?>" class="btn btn-info"> Edit</a> </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<form action="insert.php" method="POST" id="forma">
  <div class="form-group" id="divzaformu">
    <label>Naziv</label>
    <input type="text" name="naziv">
  </div>
  <div class="form-group" id="divzaformu">
    <label>Boja</label>
    <input type="text" name="boja">
  </div>
  <button type='submit' value='submit' name='submit' class="btn btn-primary" style="margin-left:40%">Submit</button>
</form> 




  </body>
</html>
