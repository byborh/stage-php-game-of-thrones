<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin</title>
</head>

<body>
    <a href="../index.php">Revenir en arrière</a>

    <table id="all">
        <caption>Users</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Date</th>
                <th>Role</th>
                <th>Class</th>
                <th>Class Skill</th>
                <th>Beast</th>
                <th>Beast Asset</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require_once('../includes/db_connect.php');
                if($_SESSION['role'] != 'admin') {
                    header('Location: 4231.php');
                }

                try {
                        $query = "
                            SELECT
                                user.id, user.email, user.username, user.password, user.date, user.role, user.class,
                                class.skill,
                                beast.name, beast.asset
                            FROM user
                            LEFT JOIN class ON user.id = class.idUser
                            LEFT JOIN beast ON user.id = beast.idUser;
                        ";
                        $req = $bdd->prepare($query);
                        $req->execute();


                        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['skill']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['asset']) . "</td>";
                            echo "<td><a href='4231.php?id=" . htmlspecialchars($row['id']) . "'>Modifier</a></td>";
                            echo "<tr>";
                        }                  
                } catch (PDOException $e) {
                    echo "Une erreur s'est produite lors de la récupération de la base de donnée : " . $e;
                }
                ?>
        </tbody>
    </table>


    <hr>
    <br>
    <a href="deconnexion.php">Se déconnecter</a>
</body>

</html>