<?php
    include 'konekcija.php';
    if(isset($_GET['ID'])){
        $user_id = $_GET['ID'];
        $sql = "DELETE FROM `proizvodi` WHERE `ID`='$user_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location: primjer1.php");
            exit();
        }
        else{
            echo "Greska: " . $sql->error();
        }
    }
?>