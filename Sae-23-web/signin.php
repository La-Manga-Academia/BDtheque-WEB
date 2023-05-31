<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Sign in - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="asset/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="asset/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="asset/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<form action="traitement.php" method="post"></form>
	<!-- Fixed navbar -->
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
							<li><a href="modificateur.php">Ajout de BD</a></li>
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>
					<li class="active"><a class="btn" href="signin.php">SIGN IN / SIGN UP</a></li>
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
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Se connecter</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sign in to your account</h3>
							<p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signup.php">Register</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
							<hr>

                            <?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupérer les valeurs saisies par l'utilisateur
    $user = $_POST["prenom"];
    $password = $_POST["password"];

    // Connexion à la base de données
    $databasePath = 'C:\xampp\htdocs\web\Sae-23\Sae-23-web\asset\utilisateurs.db';
    // Crée une connexion à la base de données
    $db = new SQLite3($databasePath);

    //exécuter la requête SQL
	$requete = "SELECT * FROM utilisateurs WHERE mdp = :password AND prenom = :user";;
	$query = $db->prepare($requete);
	$query->bindParam(":password", $password);
	$query->bindParam(":user", $user);
	$query->execute();
	
	// Vérifier si l'utilisateur existe
	$results = $query->execute();
$user = $results->fetchArray(SQLITE3_ASSOC);
if ($user) {
    // Utilisateur trouvé, effectuez les actions nécessaires
    // Démarrer la session et enregistrer les informations de l'utilisateur
    session_start();
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["user_prenom"] = $user["prenom"];
    $_SESSION["user_nom"] = $user["nom"];
    $_SESSION["user_email"] = $user["email"];

    header("Location: index (1).php");
    exit();
} else {
    // Aucun utilisateur correspondant trouvé
    $error = "Nom d'utilisateur ou mot de passe incorrect.";
}
// Vérifie si l'utilisateur est connecté
function is_user_logged_in() {
    // Démarre la session
    session_start();

    // Vérifie si la clé "user_id" est présente dans la session
    return isset($_SESSION["user_id"]);
}

// Obtient le nom de l'utilisateur connecté
function get_logged_in_username() {
    // Démarre la session
    session_start();

    // Récupère le nom d'utilisateur depuis la session
    return isset($_SESSION["user_prenom"]) ? $_SESSION["user_prenom"] : "";
}




}


?>

<!-- Formulaire de connexion -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="top-margin">
        <label>Prénom <span class="text-danger">*</span></label>
        <input type="text" name="prenom" class="form-control">
    </div>
    <div class="top-margin">
        <label>Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control">
    </div>

    <hr>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-4">
            <b><a href="">Forgot password?</a></b>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6 text-right">
            <a href="signup.php"> <input type="button" class="btn btn-action" value="nouveau compte"> </a>
        </div>
        <div class="col-lg-3 text-right">
            <button class="btn btn-action" type="submit">Se connecter</button>
        </div>
    </div>
</form>
						</div>
					</div>

				</div>
				
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
								<a href="index (1).php">Home</a> | 
								<a href="about.html">About</a> |
								<a href="sidebar-right.html">Sidebar</a> |
								<a href="contact.html">Contact</a> |
								<b><a href="signup.php">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
							Copyright &copy; 2023, Clement Hochard & Elie Klapsia. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>> 
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