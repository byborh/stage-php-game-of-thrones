<?php 

require('../includes/db_connect.php');

var_dump($_SESSION); 

if(empty($_SESSION)) {
    header('Location: ../index.php');
}

?>

<a href="../admin/deconnexion.php">Se déconnecter</a>
<a href="../admin/destroy.php">Supprimer mon compte</a>