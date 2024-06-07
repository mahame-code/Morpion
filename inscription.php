<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body class="body">
 

    <section class="log">
      
        <article> 
           
            <form action="traitement_perso.php" method="post" class="inscription">
                <div>
                    <a href="saas_inscription.php"><i class="fa fa-arrow-left"></i></a>
               
                <h2>Entrez vos informations</h2>
                </div>
               
                <h3>Cela vous permet de vous connecter sur n'importe quel appareil</h3>

                <label for="pseudo"></label>
                <input type="text" class="formulaire" name="pseudo" placeholder="pseudo"  pattern="[/^ [A-Za-z0-9\x{00c0}-\x{00ff}]{3,250}$/u]">

                <label for="email"></label>
                <input type="email" class="formulaire" name="email" placeholder="email" >

                <label for="password"></label>
                <input type="password" class="formulaire" name="password" placeholder="mot de passe"     pattern="[A-Za-z0-9_$]{4,}">

                <span style="font-size: 12px; color:red;"> 
                    <?php
                        
                    ?>
                </span>

                <!-- <label for="confirm_password"></label>
                <input type="password" id="" name="confirm_password" placeholder="confirmer le mot de passe"  pattern="[A-Za-z0-9_$]{4,}"> -->

                <!-- <p>Votre mot de passe doit se composer au minimum de 8 caractère(s)<br> et contenir au moins 3 des types de caractères suivants:<br> lettres en minuscules, lettres en majuscules, nombres et caractères spéciaux.</p> -->
                
                <input id="bouton-log" type="submit" value="S'inscrire">

                 <a href="connexion.php"><p>J'ai déjà un compte !</p></a> 
            </form>
        </article>
    </section>
   
</body>
</html>