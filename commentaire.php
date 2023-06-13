<!-- Page commentaire -->

<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit;
}

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentaire = $_POST['commentaire'];
    $id_utilisateur = $_SESSION['user']['id'];
    $date = date('Y-m-d H:i:s');

    try {
        $sql = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$commentaire, $id_utilisateur, $date]);
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout du commentaire : " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="commentaire.css">
</head>

<body>
<header class="header">
        <div>
            <h1>ZUBI</h1>
        </div>
        <nav class="nav">
            <a href="index.php">Accueil</a>
            <a href="connexion.php">Se connecter</a>
            <a href="profil.php">Modifier son compte</a>
            <a href="livre-or.php">Livre d'or</a>
        </nav>
</header>

<div class="form-container" id="form-container">
    <h3 class="title">Ajouter un commentaire</h3>
    <form method="POST" action="commentaire.php">
        Commentaire: <br>
        <textarea name="commentaire" required></textarea> <br>
        <input type="submit" value="Publier le commentaire" id="submit-button">
    </form>
</div>

    <footer>
        <h4>With a lot of fun by Eléonora Tartaglia<h4>
    </footer>
</body>
</html>
