<?php

include('connect.php');

// Query maken om alle rijen uit de tabel taak op te halen
$query = $pdo->query("SELECT * FROM `ziekregistratie` ORDER BY `naam` ASC");

?>
<style>
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}</style>
<!-- Tabel aanmaken in HTML -->
<table>
    <tr>
        <th>Naam</th>
        <th>Status</th>
        <th>Duur</th>
    </tr>

    <!-- While loop die door alle opgehaalde rijen van de tabel taak gaat -->
    <?php while ($row = $query->fetch()) { ?>

    <!-- Alle data van de opgehaalde rij in table row stoppen -->
    <?php echo '<tr>' ?>
        <td><?php echo $row['naam']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['duur']; ?></td>

    <?php echo '</tr>' ?>

    <?php } ?>
</table>