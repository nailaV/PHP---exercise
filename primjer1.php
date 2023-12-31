<?php include 'session.php'; ?>
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
<h1 style="text-align:center; margin-top: 2%;">CRUD OPERACIJE</h1>
<?php if(isset($_SESSION['logged_in'])):?>
<div>
  <a href="logout.php" class="btn btn-dark" style="margin-left:70%;margin-right:20%;width:10%"> LogOut </a>
  <?php echo $_SESSION['rola']; ?>
</div>
<?php else: ?>
  <a href="login.php" class="btn btn-dark" style="margin-left:70%;margin-right:20%;width:10%"> LogIn </a>
  <?php endif; ?>
<table class="table table-dark " style="margin-left:auto; width:50%; margin-right:auto; margin-top:2%">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Naziv</th>
      <th scope="col">Boja</th>
      <th scope="col">Velicina</th>
      <th scope="col">Slika</th>
      <th scope="col"> Akcija </th>
    </tr>
  </thead>
  <tbody>
  <?php
   include "konekcija.php";
    $sql1="SELECT * FROM `proizvodi` LEFT JOIN `velicine` ON `velicinaID`=`ID` ORDER BY ID ASC";
    $sql2="SELECT proizvodi.ID, proizvodi.Naziv as PNaziv, proizvodi.Boja, proizvodi.image_path, velicine.Naziv FROM `proizvodi` LEFT JOIN `velicine` ON proizvodi.velicinaID=velicine.ID ORDER BY proizvodi.ID ASC";
    $result=mysqli_query($conn, $sql2);
    while($row=mysqli_fetch_assoc($result)){
        ?>
         <tr>
      <td> <?php echo $row['ID'] ?></td>
      <td>  <?php echo $row['PNaziv'] ?></td>
      <td> <?php echo $row['Boja'] ?></td>
      <td> <?php echo $row['Naziv'] ?></td>
      <td> <img src="<?php echo $row['image_path'] ?>" alt="No picture." style="width:50px; height:50px"> </td>
      <td> <a href="delete.php?ID=<?php echo $row['ID']?>" class="btn btn-danger"> Delete </a> &nbsp; 
      <a href="edit.php?ID=<?php echo $row['ID']?>" class="btn btn-info"> Edit</a>  &nbsp; 
      <a href="detalji.php?ID=<?php echo $row['ID']?>" class="btn btn-info"> Details</a> </td>
    </tr>
    <?php
    }
    mysqli_close($conn);
    ?>
  </tbody>
</table>

<?php if(isset($_SESSION['logged_in'])):?>
<form action="insert.php" method="POST" id="forma" enctype="multipart/form-data">
  <div class="form-group" id="divzaformu">
    <label>Naziv</label>
    <input type="text" name="naziv">
  </div>
  <div class="form-group" id="divzaformu">
    <label>Boja</label>
    <input type="text" name="boja">
  </div>
  <div class="form-group" id="divzaformu">
    <label>Slika</label>
    <input type="file" name="image" id="image">
  </div>
  <button type='submit' value='submit' name='submit' class="btn btn-primary" style="margin-left:40%">Submit</button>
</form> 

<?php endif; ?>
  </body>
</html>

