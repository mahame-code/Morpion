<?php
include_once("commun/inc_perso.php");

// Vérification des jetons

$pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$erreurs = [];

// Vérification du nom
if (!preg_match("/^[A-Za-z0-9\x{00c0}-\x{00ff}]{1,250}$/u", $pseudo)) {
    $erreurs["pseudo"] = "Le format du  est invalide";
}

// Vérification de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreurs["email"] = "L'email n'est pas valide";
}

// Vérification du mot de passe
if (!preg_match("/^[A-Za-z0-9_$]{4,}$/", $password)) {
    $erreurs["password"] = "Le format du mot de passe n'est pas valide";
}

// Protection XSS
$pseudo = htmlspecialchars($pseudo);
$email = htmlspecialchars($email);
$password = htmlspecialchars($password);

if (count($erreurs) > 0) {
    $_SESSION["donnees"]["pseudo"] = $pseudo;
    $_SESSION["donnees"]["email"] = $email;
    $_SESSION["donnees"]["password"] = $password;
    $_SESSION["erreurs"] = $erreurs;
    // echo "Désolé, les champs ne sont pas corrects";
    // echo "<a href='formulaire_perso.php'>Vers la page formulaire</a>";
    header("location:inscription.php");
    // echo "<script type='text/javascript'>alert('Veuillez remplir le formulaire')</script>";
    exit(); // Ajouté pour arrêter l'exécution en cas d'erreurs
}

// Parcourir le tableau et valider les entrées
$tableauDonnes = [];
foreach ($_POST as $key => $val) {
    $tableauDonnes[":" . $key] = isset($val) && !empty($val) ? htmlspecialchars($val) : null;
}

// Cryptage du mot de passe
$tableauDonnes[":password"] = password_hash($password, PASSWORD_BCRYPT);

include_once("commun/inc_perso.php");

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    // Options de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Préparation de la requête pour vérifier si l'email existe dans la base
    $sql = "SELECT COUNT(*) as nb FROM inscription WHERE email=?";
    $qry = $pdo->prepare($sql);
    $qry->execute([$tableauDonnes[":email"]]);
    $row = $qry->fetch();

    // Vérification si l'email existe
    if ($row["nb"] > 0) { // Changé de === 1 à > 0 pour être plus générique
        echo "Cette email est déjà utiliser<br> veuillez inserer une autre adresse mail ou vous connecter";
        echo "<a href='inscription.php'>Vers la page d'inscription</a>";
    } else {
        $sql = "INSERT INTO inscription(pseudo, email, password) VALUES (:pseudo, :email, :password)";
        $qry = $pdo->prepare($sql);
        $qry->execute($tableauDonnes);
        unset($pdo);
        echo "Vous êtes bien inscrit";
        echo "<a href='acceuil.php'>Vers la page d'accueil</a>";
    }

} catch (PDOException $err) {
    // Gestion des erreurs
    $_SESSION["compte-erreur-sql"] = $err->getMessage();
    header("location:pageerreur.php");
    exit();
}
