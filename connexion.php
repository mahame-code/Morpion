<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Document</title>
</head>
<body class="body" id="body">
    <main>
        <section class="section_connexion">
            <article class="article_connexion">

                <a href="acceuil.php"><img src="asset/img/logo.png" alt="logo du site ecrit tic tac toe"></a>

                <form action="traitement.php" method="post" class="connexion">

                    <label for="email"></label>
                    <input class="formulaire" type="email" name="email" placeholder=" adresse email">

                    <label for="password"></label>
                    <input class="formulaire" type="password" name="password" placeholder="mot de passe" pattern="[A-Za-z0-9_$]{8,}">
                    <a id="mdp_oublier" href="forgot.php"><p>Mot de passe oublier ?</p></a>

                    <span>
                        
                    </span>
                    <input id="bouton-log" type="submit" value="Se Connecter">
                </form>
                <div class="bas_article_connexion">
                    <a href="inscription.php">Nouveau ?<br>Inscrivez-vous et commencez a jouer !</a>
                </div>
            </article>
        </section>
    </main>
   
</body>
</html>