<?php
require('../includes/db_connect.php');
// require('4231.php');

// if(!isset($_SESSION['email'])) {
//     header('Location: ../index.php');
//     exit();
// }

// if($_SESSION['role'] != "admin") {
//     header('Location: ../index.php');
//     exit();
// }

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $reqUser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
    $reqUser->execute(array($id));
    
    while($row = $reqUser->fetch(PDO::ATTR_AUTOCOMMIT)) {
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
        $class = $row['class'];
        $date = $row['date'];
        $role = $row['role'];
    }

    $reqClass = $bdd->prepare('SELECT * FROM class WHERE name = ?');
    $reqClass->execute(array($class));

    $row = $reqClass->fetch(PDO::ATTR_AUTOCOMMIT);
    $classSkill = $row['skill'];
    
    $reqBeast = $bdd->prepare('SELECT * FROM beast WHERE propertyName = ?');
    $reqBeast->execute(array($username));

    while($row = $reqBeast->fetch(PDO::ATTR_AUTOCOMMIT)) {
        $beast = $row['name'];
        $beastAsset = $row['asset'];
    }

    // Class
    // Class Skill
    // Beast
    // Beast asset

    if(isset($_POST['role']) && isset($_POST['class']) && isset($_POST['classSkill']) && isset($_POST['beast']) && isset($_POST['beastAsset'])) {
        if(!empty($_POST['role'])) {
            $role = $_POST['role'];
        } else {
            $role = "";
        }
        if(!empty($_POST['class'])) {
            $class = $_POST['class'];
        } else {
            $class = "";
        }
        if(!empty($_POST['classSkill'])) {
            $classSkill = $_POST['classSkill'];
        } else {
            $classSkill = "";
        }
        if(!empty($_POST['beast'])) {
            $beast = $_POST['beast'];
        } else {
            $beast = "";
        }
        if(!empty($_POST['beastAsset'])) {
            $beastAsset = $_POST['beastAsset'];
        } else {
            $beastAsset = "";
        }

        try {
            $req = $bdd->prepare('
            UPDATE user
            INNER JOIN class ON user.id = class.idUser
            INNER JOIN beast ON user.id = beast.idUser
            SET user.role = ?,
                user.class = ?,
                class.name = ?,
                class.skill = ?,
                beast.name = ?,
                beast.asset = ?
            WHERE user.email = ?;
            ');
            $req->execute(array($role, $class, $class, $classSkill, $beast, $beastAsset, $email));

            $message = "Le compte de cet utilisateur a été bien modifié";
        } catch (PDOException $e) {
            echo "Une erreur s'est produite au cours de la modification de donnée : " . $e;
        }
    } else {
        echo "Les champs inexistants";
    }

} else {
    echo "désolé, je n'ai pas reçu l'id d'utilisateur";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Modification</title>
</head>

<body>
    <a href="dashboard.php">Revenir en arrière</a>
    <form method="post">
        <table id="users">
            <caption>Users</caption>
            <thead>
                <tr>
                    <!-- Non modifable -->
                    <th>ID</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Date</th>

                    <!-- Modifiable -->
                    <th>Role</th>
                    <th>Class</th>
                    <th>Class Skill</th>
                    <th>Beast</th>
                    <th>Beast asset</th>

                    <!-- Bouton -->
                    <th>Valider</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    // Non modifiable
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $email . "</td>";
                    echo "<td>" . $username . "</td>";
                    echo "<td>" . $password . "</td>";
                    echo "<td>" . $date . "</td>";

                    // Modifiable
                    echo "<td><input type='text' name='role' placeholder='" . $role . "'></td>";
                    echo "<td><input type='text' name='class' placeholder='" . $class . "'></td>";
                    echo "<td><input type='text' name='classSkill' placeholder='" . $classSkill . "'></td>";
                    echo "<td><input type='text' name='beast' placeholder='" . $beast . "'></td>";
                    echo "<td><input type='text' name='beastAsset' placeholder='" . $beastAsset . "'></td>";
                    echo "<td><input type='submit' name='Valider' value='Valider'></td>";

                ?>
                </tr>
            </tbody>
            <?php if(isset($message)) { echo "<br><font style='color:green'>" . $message . "</font>";} ?>
        </table>
    </form>
</body>

</html>