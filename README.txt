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
                    echo "<td><input type='submit' name='Valider'></td>";
                ?>
            </tr>
        </tbody>
        <?php if(isset($message)) { echo "<font style='color:green'>" . $message . "</font>";} ?>
    </table>

    <!-- <h2>Modifier les données de <u><?php echo $username; ?></u></h2>
    <form method="post">
        <input type='text' name='role' placeholder='<?php echo $role; ?>'>
        <input type='text' name='class' placeholder='<?php echo $class; ?>'>
        <input type='text' name='classSkill' placeholder='<?php echo $classSkill; ?>'>
        <input type='text' name='beast' placeholder='<?php echo $beast; ?>'>
        <input type='text' name='beastAsset' placeholder='<?php echo $beastAsset; ?>'>
        <input type="submit" name="Valider">
    </form> -->















    <table id="users">
    <caption>Users</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Class</th>
            <th>Date</th>
            <th>Rôle</th>
            <th>Admin :</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once('../includes/db_connect.php');
        if($_SESSION['role'] != 'admin') {
            header('Location: 4231.php');
        }

        $reqUser = $bdd->prepare("SELECT * FROM user;");
        $reqUser->execute();
        while($row = $reqUser->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                echo "<td><a href='CRUD.php?id=" . htmlspecialchars($row['id']) . "'>Modifier</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<hr>

<table id="class">
    <caption>Class</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Skill</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once('../includes/db_connect.php');
        $reqClass = $bdd->prepare("SELECT * FROM class;");
        $reqClass->execute();
        while($row = $reqClass->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
                echo "<td>" . htmlspecialchars($row['idUser']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['skill']) . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<hr>

<table id="beast">
    <caption>Beasts</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>propertyName</th>
            <th>asset</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once('../includes/db_connect.php');
        $reqBeast = $bdd->prepare("SELECT * FROM beast;");
        $reqBeast->execute();
        while($row = $reqBeast->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
                echo "<td>" . htmlspecialchars($row['idUser']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['propertyName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['asset']) . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>