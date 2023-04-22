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
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    
    <!--les gens lisent vraiment mon code?-->
    
    <h2 align="center" class="my-5">Bienvenue <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, modérateur supreme.</h2>
    <div align="center" class="tenor-gif-embed" data-postid="4949771" data-share-method="host" data-aspect-ratio="1.37363" data-width="60%"><a href="https://tenor.com/view/bugsbunny-king-gif-4949771">Bugsbunny King GIF</a>from <a href="https://tenor.com/search/bugsbunny-gifs">Bugsbunny GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    
    <p align="center">Inclinez vous utilisateurs mécréants car vous voici dans l'antre de votre maitre supreme, l'admin. par les pouvoirs qui me sont conférés, par mon puissant 
		panel de gestion ci-dessous et sa puissante base de données, je peux créer, modifier ou effacer n'importe quel utilisateur. si vous voyez ce message et que vos n'etes pas moi,
	l'admin, le seul l'unique, c'est que vous m'avez encore piraté et ça commence à devenir énervant!</p>
	<b style='color:red;'>ps: Ne touchez pas à mon panel de gestion..bon je peux pas vos en empecher mais NE FAITES PAS N'IMPORTE QUOI! je n'ai pas fini de le configurer</b>



<div align="center"> <img src="https://i.kym-cdn.com/entries/icons/original/000/030/359/cover4.jpg" alt="disappoint meme" width="80%"height="80%"/>  </div>



<div align="center" class="container container-fluid">
	<p id="success"></p>
        <div align="center" class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Gérer les <b>utilisateurs</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Ajouter utilisateur</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Effacer</span></a>						
					</div>
                </div>
            </div>
            <table class="table"  border="1">
                <thead class="thead-dark">
                    <tr>
						<th scope="col">
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th scope="col">
						<th scope="col">Id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
				<tbody class="table-stripped">
				
				<?php
				$result = mysqli_query($link,"SELECT * FROM users");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>

				<tr scope="row" id="<?php echo $row["id"]; ?>">
				<td scope="row">
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td scope="row" class="trow"><?php echo $i; ?></td>
					<td scope="row" class="trow"><?php echo $row["username"]; ?></td>
					<td scope="row" class="trow">
						<a href="#editUserModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-name="<?php echo $row["username"]; ?>"
                            data-password="<?php echo $row["password"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteUserModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						title="Delete"></i></a>
                    </td>
				</tr>

				<?php
				$i++;
				}
				?>

				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addUserModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form" action="save.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Ajouter utilisateur</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nom</label>
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Mot de passe</label>
							<input type="password" id="password" name="password" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
                    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Ajouter</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editUserModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form" action="save.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Modifier utilisateur</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Nom</label>
							<input type="text" id="name_u" name="name" class="form-control" required>
						</div>
                            <div class="form-group">
							<label>Mot de passe</label>
							<input type="password" id="password" name="password" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Modifier</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteUserModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="save.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Effacer utilisateur</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>yo! t'es sur que tu veux faire ça?</p>
						<p class="text-warning"><small>C'est irréersible</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Effacer</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<p align="center">En pratique <b style='color:red;'> un mot de passe ne doit etre vu que par son utilisateur! </b>, hélas meme pas par moi...je ne connais donc pas vos stupides mots de passe
    mais je peux voir leur hash (version encryptée)...seul un individu mal intentionné (un certain pirate) pourrait tenter de les decrypter. 
    Je n'ai pas ce temps à perdre alors je vais juste lister ici le hash de chaque utilisateur...pour le plaisir</p>

    <?php  
    $result = mysqli_query($link,"SELECT * FROM users");
    while($row = mysqli_fetch_array($result)) {
        ?>
        <div align="center" class = "passlist">
                <p class="pass"><b> <?php echo $row["username"]; ?>:</b>  <?php echo $row["password"]; ?>  </p>
        </div>
        <?php 
        } ?>
</div>





    <p align="center"><b>note pour l'admin:</b> gérer les failles évidentes (cookies, url, privilèges..),ajouter une chatroom pour les utilisateurs
	et ouvrir une liste de bountyhunt pour les failles trouvées</p>



    <p align="center">
        <a href="logout.php" class="btn btn-danger ml-3">Se déconnecter</a>
    </p>
    <footer> <p class="copyright">&copy; florian EDEMESSI 2021 <a href="https://wa.me/+22967242336">nairolf32</a>.</p> </footer>


	<script src="ajax.js"></script>
</body>
</html>

