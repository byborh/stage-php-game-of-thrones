<?php

require_once('../includes/db_connect.php');

if(isset($_SESSION['email'])) {
    try {
        $email = $_SESSION['email'];

        $req = $bdd->prepare('DELETE user, class, beast FROM user INNER JOIN class ON user.id = class.idUser INNER JOIN beast ON user.id = beast.idUser WHERE user.email = ?');
        $req->execute(array($email));
        
        $_SESSION = array();

        session_destroy();

        var_dump($_SESSION);

        header('Location: ../index.php');
    } catch(PDOException $e) {
        echo "Une erreur s'est produit : " . $e;
    }
} else {
    echo "Vous n'avez pas de session. Erreur lors de la suppression du compte : ";
    header('Location: ../index.php');
}