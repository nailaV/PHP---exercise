<?php
    include 'konekcija.php';
    if(isset($_POST['submit'])){
        $naziv = $_POST['naziv'];
        $boja = $_POST['boja'];
        $sql = "INSERT INTO `proizvodi` (`Naziv`,`Boja`) VALUES('$naziv','$boja')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location: primjer1.php");
            exit();
        }
        else{
            echo "Insert error - " . $sql->error() . " " . $conn->error();
        }
        mysqli_close($conn);
    }
?>