<?php
include "konekcija.php";
if(isset($_GET['ID']))
{
    $userID=$_GET['ID'];
    $sql= "SELECT * FROM `proizvodi` WHERE `ID`='$userID'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=$result->fetch_assoc())
        {
            $naziv=$row['Naziv'];
            $boja=$row['Boja'];
        }
    }
    else
        echo("Error.");
}


if(isset($_POST['submit']))
{
    $naziv=$_POST['Naziv'];
    $boja=$_POST['Boja'];

    $sql="UPDATE `proizvodi` SET `Naziv`='$naziv',`Boja`='$boja' WHERE `ID`='$userID'";
    $result=mysqli_query($conn, $sql);

    if($result)
    {
        header("Location:primjer1.php");
        exit();
    }
    else
        echo("Error");
}

mysqli_close($conn);

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
<form action="" method="POST" id="forma">
  <div class="form-group" id="divzaformu">
    <label>Naziv</label>
    <input type="text" name="Naziv" value="<?php echo $naziv ?>">
  </div>
  <div class="form-group" id="divzaformu">
    <label>Boja</label>
    <input type="text" name="Boja" value="<?php echo $boja ?>">
  </div>
  <button type='submit' value='submit' name='submit' class="btn btn-primary" style="margin-left:40%">Submit</button>
</form> 

</body>
</html>