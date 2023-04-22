<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(!isset($_COOKIE['cypher'])) {
        setcookie('Cyph3r','cyph$rven0m');
        echo '<script>alert("cookie&#191;")</script>';
} else {
        
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site web</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
        <!--?-->

    <h1 align="center" class="my-5">Salut, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
    <p align="center">Bienvenue sur le site web. il n'y a toujours pas de contenu mais l'admin a un message important pour tous les utilisateurs.</p>
    <div align="center" class="message-admin">
        <img src="https://cdn-icons-png.flaticon.com/512/3039/3039374.png" alt="msg-red" width="50"height="50"/> 
        <p>Message de l'<b>Admin</b>: A l'attention de tous! il y a eu des effractions non-autorisées sur la page privée de l'admin. un certain
        <b>Giovanni</b> serait en cause. toutefois aucun dommage causé mais l'admin heurté dans sa fierté a désormais changé son mot de passe. nous avons également remarqué une
        activité suspecte sur le site web...un utilisateur inconnu aurait créé sa propre page et aurait possiblement toujours accès à la page de l'admin (ignorez l'incompétence de
        l'admin). Il est donc activement recherché et tout utilisateur pouvant fournir le nom de ce dangereux pirate sera récompensé. <br><b>ps: nous avons une nouvelle 
        politique de cookies en cours mais pour le moment ils ne fonctionnent pas comme prévus..peut etre que quelqu'un s'amuse à les modifier...restez prudents!</b> </p>
    </div>
    
    <p align="center">ok maintenant dégagez!</p>
    
    <div class="tenor-gif-embed" data-postid="11146192" data-share-method="host" data-aspect-ratio="1.82857" data-width="60%"><a href="https://tenor.com/view/johnny-depp-jack-sparrow-potc-move-gif-11146192">Johnny Depp Jack Sparrow GIF</a>from <a href="https://tenor.com/search/johnny+depp-gifs">Johnny Depp GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    
    <p align="center">Tu peux te déconnecter en bas ou changer ton mot de passe...Si entre-temps tu a trouvé une faille ou le nom du pirate contacte l'admin (moi quoi) 
        en cliquant sur le lien whatsapp (nairolf32) en bas de la page. </p>
    <p align="center">
        <a href="reset-password.php" class="btn btn-warning">Changer de mot de passe</a>
        <a href="logout.php" class="btn btn-danger ml-3">Se déconnecter</a>
    </p>
    <footer> <p class="copyright">&copy; florian EDEMESSI 2021 <a href="https://wa.me/+22967242336">nairolf32</a>.</p> </footer>
</body>
</html>