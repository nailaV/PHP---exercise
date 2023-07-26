<?php
    include 'konekcija.php';
    if(isset($_POST['submit'])){
        $naziv = $_POST['naziv'];
        $boja = $_POST['boja'];
        $lokacija="slike/";
        $imageName=basename($_FILES["image"]["name"]);
        $targetPath=$lokacija . $imageName;

        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)){

            $sql = "INSERT INTO `proizvodi` (`Naziv`,`Boja`, `image_path`, `velicinaID`) VALUES('$naziv','$boja', '$targetPath', 1)";
            $result = mysqli_query($conn,$sql);
            if($result){
                header("Location: primjer1.php");
                exit();
            }
            else{
                echo "Insert error - " ;
            }
        }
        else
            echo("Fail uploading image.");
        mysqli_close($conn);
    }
?>