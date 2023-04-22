<?php
require_once 'config.php';
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cypher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body style='background-color:black; color:green;'>
    
    <!--?cypher?-->
    
    <h1 align="center" class="my-5">Bienvenue <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>

    

    <img src="https://i.pinimg.com/originals/b8/a3/cd/b8a3cd1fad69ee87b4a843ca7769f49a.gif" alt="?" width="80%"height="80%"/>

        <p>Bienvenue.....et félicitations! si vous lisez ceci c'est que vous avez trouvé mon cookie...appellez moi Cypher_Venom. Ce site est véritablement rempli de failles
        de sécurité diverses...étonnant que l'admin ne reçoive pas beaucoup de plaintes...Maintenant que vous etes là deux choix s'offrent à vous. Me dénoncer
        maintenant à l'admin qui ne pourra que me bannir et vous offrir une minable récompense...ou alors vous pouvez jouer avec moi pour tenter de gagner plus gros...
        ma spécialité c'est la cryptographie...cracker les mots de passe, dissimuler les informations obscursir les données...avec moi aucune information n'est évidente. Le cookie
        c'était un jeu d'enfant...maintenant je vous propose un challenge plus...intense.
        </p>
        
        <img src="https://assets.tryhackme.com/img/modules/cryptography.png" alt="?" width="60%"height="60%"/>

        <p>Il existe de nombreuses techniques en cryptographie mais nous allons utiliser les plus simples pour un premier contact. je n'attends d'ailleurs pas grand chose de vous...
            Le jeu est donc d'une simplicité enfantine...il y a ci-dessous un fichier pdf téléchargeable. il est encodé avec un mot de passe simple...je ne vais pas vous faire utiliser
            la force brute...ce serait ignoble...mais je vais carrément vous donner le mot de passe:
        </p>
            <a href="fichier-protected.pdf" download>Fichier encodé: cliquez ici pour télécharger!</a>

            <p style='color:red;'>mot de passe: <b>venivedivici</b></p>


        <p>En réalité ça ne peut pas etre aussi simple...le mot de passe donné n'ouvre pas le fichier car celui utilisé pour verrouiller le pdf est l'encodage
            du mot de passe donné. En gros c'est à vous de l'encoder pour déverrouiller le fichier. mais avec quelle technique s'il en existe des centaines, demandez vous? 
            en réalité la réponse correcte serait 'démerdez vous!', mais je vous sens très novice alors 
            je vous répond <a href="https://fr.wikipedia.org/wiki/Chiffrement_par_d%C3%A9calage" >césar 32</a>.
            Une fois le fichier ouvert, il contient ce qu'on appelle un "Hash"(je vous conseille de vous habituer à utiliser Google) ou "empreinte". il existe plusieurs façons de faire
            un <a href='https://fr.wikipedia.org/wiki/Fonction_de_hachage'> hachage </a> et cette méthode n'est souvent pas réversible (cryptographie asymétrique). 
            mais on peut le cracker surtout si on connait la méthode de chiffrage. la deuxième partie du challenge consiste à décrypter ce hash. 
            ici je vous laisse vous débrouiller...internet est une source incroyable d'informations et <b style='color:yellow'>d'outils</b>...démerdez vous et crackez ce hash!
            c'est l'un des plus faciles à cracker alors ne me faites pas honte.
        </p>
        
        <p>Une fois le hash cracké, vous obtenez un mot. c'est le nom de la technique utilisée par l'admin pour protéger les mots de passes des tilisateurs de ce site.
            C'est un algorythme solide, pratiquement invincible (sans blague)...contactez l'admin et dites lui que vous avez piraté sa page, que vous aez accès à sa base de donnée
            via son panel de gestion et que vos savez déchiffrer son hash..précisez le nom de l'algorythme. c'est du bluff mais là vous pourrez demander ce qe vous voulez. j'ai également
            accès à la page de l'admin...c'est une chose négociable et je suis toujours pret à négocier.
        </p>
        
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Se déconnecter</a>
    </p>
    <footer> <p class="copyright">&copy; florian EDEMESSI 2021 <a href="https://wa.me/+22967242336">nairolf32</a>.</p> </footer>
</body>
</html>
