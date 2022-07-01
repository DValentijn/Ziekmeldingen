<?php require_once "connect.php"; ?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="shortcut icon" href="img/prutslogo.png" />
    <title>Registratie | Dylano Valentijn</title>
    <img src="img/prutslogo.png" class="logo">  </a> 
</head>
<body>
</body>
</html>

<div class="form">
    <form method="post">


        <h2>Naam van leerling</h2> <INPUT TYPE="text" name='naam'>

        <h2>Foto van leerling</h2> <INPUT name='foto'/>

        <h2> <input type="submit", name="btcSave">  </h2>



           
        </form>

<?php
        if (isset($_POST["btcSave"])) {
    require('connect.php');
    header("location: index.php");


    $naam = $_POST["naam"];
    $foto = $_POST["foto"];

    $query = "INSERT INTO ziekregistratie (naam, foto) VALUES" . "(':naam', '$foto')";

    $stm = $pdo->prepare($query);
    $stm->bindParam(":naam",$naam)

    if ($stm->execute()) {

    } else {
        echo "Dit persoon kan niet worden toegevoegd!";
    }
}
?>
        

<?php require "footer.php" ?>
