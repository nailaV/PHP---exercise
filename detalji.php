<?php
include "konekcija.php";

if(isset($_GET['ID']))
{
    $proizvodID=$_GET['ID'];
   $sql="SELECT * FROM `proizvodi` LEFT JOIN `detalji` ON ID='$proizvodID'";
   $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        while($row=$result->fetch_assoc())
        {
            $naziv=$row['Naziv'];
            $opis=$row['Opis'];
            $kolicina=$row['KolicinaNaLageru'];
            $boja=$row['Boja'];
            $slika=$row['image_path'];
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="card" style="width: 20%; margin-left: 40%; margin-right:40%; margin-top:2%">
  <img class="card-img-top" src="<?php
  if($slika == null){
    echo $slika;
  }
   ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $naziv ?></h5>
    <p class="card-text"><?php echo $opis ?></p>
    <h5 class="card-title"><?php if($kolicina!=0){ 
                                    echo $kolicina;}
                                    else echo("Nema na stanju");?></h5>
    <a href="primjer1.php" class="btn btn-primary">Go back</a>
  </div>
</div>
</body>
</html>
        <?php
    }
    else
       {
        header("Location:primjer1.php");
        exit();
    }

mysqli_close($conn);
}
?>

