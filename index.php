<?php require "connect.php";

if (isset($_POST["afwezigknop"])) {    

  $id = $_POST["id"];

  $test = date('y-m-j h:i:s');

  $query= "UPDATE ziekregistratie SET status='afwezig', duur='$test' WHERE id='$id'";

  $stm = $pdo->prepare($query);

  if ($stm->execute()) {

  } else {
      echo "Deze persoon is gemeld";
  }
}


if (isset($_POST["ziekknop"])) {    

  $id = $_POST["id"];

$test = date('y-m-j h:i:s');

$query= "UPDATE ziekregistratie SET status='ziek', duur='$test' WHERE id='$id'";

  $stm = $pdo->prepare($query);

  if ($stm->execute()) {

  } else {
      echo "Deze persoon is gemeld";
  }
}


if (isset($_POST["aanwezigknop"])) {    

  $id = $_POST["id"];

  
  $query= "UPDATE ziekregistratie SET status='aanwezig', duur='Niet van toepassing' WHERE id='$id'";

  $stm = $pdo->prepare($query);

  if ($stm->execute()) {

  } else {
      echo "Deze persoon is gemeld";
  }
}

$stm = $pdo->query("SELECT * FROM ziekregistratie ORDER BY `naam` ASC");

?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="shortcut icon" href="img/prutslogo.png" />
    <title>Ziekmelding pagina | Dylano Valentijn</title>
    <img src="img/prutslogo.png" class="logo">  </a>
</head>
<body>

<div class='leerlingen'>
  <?php
    if ($stm->execute()) {
      $zieken = $stm->fetchAll(PDO::FETCH_OBJ);
      foreach ($zieken as $ziek) {
        if ($ziek->status == "aanwezig") {
          $color = "rgb(0, 253, 0)";
        }
        if ($ziek->status == "ziek") {
          $color = "rgb(227, 171, 0)";
        }
        if ($ziek->status == "afwezig") {
          $color = "rgb(255, 0, 0)";
        }
        if ($ziek->status == null) {
          $color = "rgb(58, 58, 61)";
        }

        echo
        "<form method ='POST' style='background-color: $color;' class='leerling'>".
          "<img id='result_img' src='$ziek->foto' />".
          "<h2>".
            "$ziek->naam".
          "</h2>".
          "<input type='text' name='id' value='$ziek->id' hidden>".
          "<div class='buttons'>".
          "<div class='button'>".  
            "<input class='button' type='submit' name='aanwezigknop' value='Aanwezig'></div>".
          "<div class='button'>". 
            "<input class='button' type='submit' name='ziekknop' value='Ziek'></div>".
          "<div class='button'>". 
            "<input class='button' value='Afwezig' type='submit' name='afwezigknop'></input></div>".
            "</div>".
        "</form>";
      }
    }
  ?>

</div>
  
</body>
</html>

<?php require "footer.php" ?>
