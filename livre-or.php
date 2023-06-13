<!-- Page livre d'or -->

<?php
session_start();

$host = "localhost";
$db = "livreor";
$user = "hayley";
$pass = "monarque";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

try {
    $sql = "SELECT commentaires.commentaire, commentaires.date, utilisateurs.login FROM commentaires 
            JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id 
            ORDER BY commentaires.date DESC";
    $stmt = $conn->query($sql);
    $commentaires = $stmt->fetchAll();
} catch(PDOException $e) {
    echo "Erreur lors de la récupération des commentaires : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="livre-or.css">
</head>

<body>
<header class="header">
    <div>
        <h1>ZUBI</h1>
    </div>
    <nav class="nav">
        <a href="index.php">Accueil</a>
        <?php
        if (isset($_SESSION['user'])) {
            echo '<a href="commentaire.php">Ajouter un commentaire</a>';
        } else {
            echo '<a href="connexion.php">Se connecter</a>';
        }
        ?>
        <a href="inscription.php">Créer un compte</a>
    </nav>
</header>

<div class="form-container" id="form-container">
    <h3 class="title">Livre d'Or</h3>
    <?php
    foreach ($commentaires as $commentaire) {
        $date = date('d/m/Y', strtotime($commentaire['date']));
        echo "<p>Posté le {$date} par {$commentaire['login']}<br>{$commentaire['commentaire']}</p>";
    }
    ?>
</div>

<footer>
    <h4>With a lot of fun by Eléonora Tartaglia<h4>
</footer>
</body>
</html>
