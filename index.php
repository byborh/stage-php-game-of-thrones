<?php
require('./includes/db_connect.php');

var_dump($_SESSION);

// Inscription
if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['class']) && isset($_POST['date'])) {
    if(!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['class']) && !empty($_POST['date'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $class = $_POST['class'];
        $date = $_POST['date'];
        $role = "user";

        $reqVerif = $bdd->prepare('SELECT email, username FROM user WHERE email = ? AND username = ?;');
        $reqVerif->execute(array($email, $username));


        if($reqVerif->rowCount() == 0) {
            $req = $bdd->prepare('INSERT INTO user (email, username, password, class, date, role) VALUES (?, ?, ?, ?, ?, ?);');
            $req->execute(array($email, $username, $password, $class, $date, $role));

            $reqGet = $bdd->prepare('SELECT id FROM user WHERE email = ?;');
            $reqGet->execute(array($email));

            $row = $reqGet->fetch(PDO::FETCH_ASSOC);
            $idUser = $row ? $row['id'] : null;

            $req2 = $bdd->prepare("INSERT INTO beast (idUser, name, propertyName, asset) VALUES (?, '', ?, '');");
            $req2->execute(array($idUser, $username));

            $req3 = $bdd->prepare("INSERT INTO class (idUser, name, skill) VALUES (?, ?, '');");
            $req3->execute(array($idUser, $class));

            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['class'] = $class;
            $_SESSION['date'] = $date;
            $_SESSION['role'] = $role;

            if($role == 'admin') {
                header('Location: ./admin/4231.php');
            } else {                    
                header('Location: ./page/main.php');
            }
        } else {
            $message = "L'utilisateur existant, veuillez vous connecter";
        }
    } else {
        $message = "Tous les champs ne sont pas remplis";
    }
}


// Connexion
if(isset($_POST['emailC']) && isset($_POST['passwordC'])) {
    if(!empty($_POST['emailC']) && !empty($_POST['passwordC'])) {
        $email = $_POST['emailC'];
        $password = $_POST['passwordC'];

        $req = $bdd->prepare('SELECT * FROM user WHERE email = ?');
        $req->execute(array($email));

        if($req->rowCount() == 1) {
            
            $row = $req->fetch(PDO::FETCH_ASSOC);
            
            if(password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['class'] = $row['class'];
                $_SESSION['date'] = $row['date'];

                if($row['role'] == 'admin') {
                    header('Location: ./admin/4231.php');
                } else {                    
                    header('Location: ./page/main.php');
                }

            } else {
                $messageC = "Le mot de passe est incorrect";
            }
        } else {
            $messageC = "Cet utilisateur est inexistant";
        }
    } else {
        $messageC = "Vous n'avez pas remplis tous les champs";
    }
} else {
    $messageC = "Les champs sont inexsitants";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Game of Thrones</title>
</head>

<body>
    <hr>
    <form method="post" id="inscription">
        <h1>Inscription</h1>
        <input type="email" name="email" placeholder="Saisissez votre mail"
            value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
        <br>
        <br>
        <input type="text" name="username" placeholder="Saisissez votre username"
            value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>">
        <br>
        <br>
        <input type="password" name="password" placeholder="Saisissez votre mot de passe"
            value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>">
        <br>
        <br>
        <input type="text" name="class" placeholder="Saisissez votre class"
            value="<?php if(isset($_POST['class'])){echo $_POST['class'];} ?>">
        <br>
        <br>
        <input type="date" name="date" placeholder="Saisissez la date"
            value="<?php if(isset($_POST['date'])){echo $_POST['date'];} ?>">
        <br>
        <br>
        <?php if(isset($message)){ echo "<font color='red'>" . $message . "</font>";} ?>
        <input type="submit" name="Valider">
    </form>
    <form method="post" id="connexion">
        <h1>Connexion</h1>
        <input type="text" name="emailC" placeholder="Saisissez votre mail"
            value="<?php if(isset($_POST['emailC'])){echo $_POST['emailC'];} ?>">
        <br>
        <br>
        <input type="password" name="passwordC" placeholder="Saisissez votre mot de passe"
            value="<?php if(isset($_POST['passwordC'])){echo $_POST['passwordC'];} ?>">
        <br>
        <br>
        <?php if(isset($messageC)){ echo "<font color='red'>" . $messageC . "</font>";} ?>
        <input type="submit" name="Valider">
    </form>
    <br>
    <button id="switch" onclick="auth();">Se connecter</button>
</body>
<script src="./js/script.js">
</script>

</html>