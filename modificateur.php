<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Modificateur - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="asset/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="asset/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="asset/css/main.css">

	<script>
      $(document).ready(function() {
        $("#myForm").submit(function(event) {
          if (!$("input[type='checkbox']").is(":checked")) {
            event.preventDefault();
            $("#error").text("Please accept the Terms and Conditions");
          }
        });
      });
    </script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<form action="traitement.php" method="post"></form>
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index (1).php">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>
					<li>

                    <?php
            // Inclure le fichier contenant les fonctions
                    include 'functions.php';

                if (is_user_logged_in()) {
            // Obtenez le nom de l'utilisateur connecté depuis votre système d'authentification
                    $username = get_logged_in_username();
                    echo "Bonjour, $user!";
                } else {
                    echo '<a class="btn" href="signin.php">SIGN IN / SIGN UP</a>';
                }
                    ?>

                    </li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index (1).php">Home</a></li>
			<li class="active">Ajout de BD</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Ajout de BD</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Remplissez ce formulaire</h3>
							<p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signin.php">Login</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
							<hr>

							<?php
// Fonction pour nettoyer et valider les données du formulaire
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $Titre = test_input($_POST["Titre"]);
    $Annee = test_input($_POST["Annee"]);
    $NoSerie = test_input($_POST["NoSerie"]);
    $Nom = test_input($_POST["Nom"]);
    $Auteur = test_input($_POST["Auteur"]);
    $Style= test_input($_POST["Style"]);
	$Images = test_input($_POST["Images"]);
       
	$databasePath = 'C:\xampp\htdocs\web\Sae-23\Sae-23-web\asset\bd_tech.db';

        // Crée une connexion à la base de données
        $db = new SQLite3($databasePath);

        // Insérer les données dans la base de données
        $query = "INSERT INTO BD (Titre, Annee, NoSerie, chemin_image) VALUES ('$Titre', '$Annee', '$NoSerie', '$Images')";
		$db->exec($query);
		$query = "INSERT INTO Serie (Nom, Auteur, Style) VALUES ('$Nom', '$Auteur', '$Style')";
        // Ferme la connexion à la base de données
        $db->close();

        // Afficher un message de succès
        echo "Votre inscription a été enregistrée avec succès.";
    } else {
        // Afficher les erreurs
        echo "Erreur dans le formulaire transmis.";
    }
?>
	                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="top-margin">
                                <label>Titre de la BD</label>
                                <input type="text" name="Titre" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Auteur</label>
                                <input type="text" name="Auteur" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Nom de l'auteur<span class="text-danger">*</span></label>
                                <input type="text" name="Nom" class="form-control">
                            </div>

                            <div class="row top-margin">
                            <div class="col-sm-6">
                                <label>Année de parution<span class="text-danger">*</span></label>
                                <input type="integer" name="Annee" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Style<span class="text-danger">*</span></label>
                                <input type="text" name="Style" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label>Numéro de Série<span class="text-danger">*</span></label>
                                <input type="text" name="NoSerie" class="form-control">
                            </div>
							<div class="col-sm-6">
                                <label>chemin de l'image<span class="text-danger">*</span></label>
                                <input type="text" name="Images" class="form-control">
                            </div>
								<hr>                     
    							</div>
                                <br>
								<div class="col-lg-4 text-right">
									<button class="btn btn-action" type="submit">Register</button>
								</div>
							</div>
					</form>
					</div>
					</div>

				</div>

			<?php
$databasePath = 'C:\xampp\htdocs\web\Sae-23\Sae-23-web\asset\bd_tech.db';

	// Crée une connexion à la base de données
	$db = new SQLite3($databasePath);
	$requete = "SELECT Titre, chemin_image FROM BD";
	$resultat = $db->query($requete);

	// Génération du tableau HTML
	echo '<table style="border-collapse: collapse; width: 100%;">';
	echo '<tr>';
	echo '<th style="border: 3px solid black; padding: 8px; font-weight: bold; font-size: 18px;">Titre</th>';
	echo '<th style="border: 3px solid black; padding: 8px;">Image</th>';
	echo '</tr>';
	
	while ($row = $resultat->fetchArray(SQLITE3_ASSOC)) {
		echo '<tr>';
		echo '<td style="border: 3px solid black; padding: 8px; font-size: 16px;">' . $row['Titre'] . '</td>';
		echo '<td style="border: 3px solid black; padding: 8px;"><img src="' . $row['chemin_image'] . '" style="max-width: 500px; max-height: 500px;"></td>';
		echo '</tr>';
	}
	
	echo '</table>';

	// Ferme la connexion à la base de données
	$db->close();
	?>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+234 23 9873237<br>
								<a href="mailto:#">Newham.bdtheque@gmail.com</a><br>
								<br>
								234 Hidden Pond Road, Newham, TN 37015
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons clearfix">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Text widget</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Home</a> | 
								<a href="about.html">About</a> |
								<a href="modificateur.php">Ajout de BD</a> | |
								<b><a href="signup.html">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2023, Clement Hochard & Elie Klapsia. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>