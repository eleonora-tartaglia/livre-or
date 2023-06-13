<!-- Page profil -->

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

    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $sql = "UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$login, $password, $_SESSION['user']['id']]);

        $_SESSION['user']['login'] = $login;

    } catch(PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="profil.css">
</head>

<body>
<header class="header">
        <div>
            <h1>ZUBI</h1>
        </div>
        <nav class="nav">
            <a href="index.php">Accueil</a>
            <a href="connexion.php">Se connecter</a>
            <a href="commentaire.php">Laisser un bref commentaire</a>
            <a href="livre-or.php">Livre d'or</a>
        </nav>
</header>

<div class="form-container" id="form-container">
    <h3 class="title">Modifier son compte</h3>
    <form method="POST" action="profil.php">
        Login: <input type="text" name="login" value="<?php echo $_SESSION['user']['login']; ?>" required><br>
        Mot de passe: <input type="password" name="password" required><br>
        <input type="submit" value="Mettre à jour" id="submit-button">
    </form>
</div>

    <footer>
        <h4>With a lot of fun by Eléonora Tartaglia<h4>
    </footer>
</body>
</html>
