<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

    <title>Modificateur - Progressus Bootstrap template</title>

    <link rel="shortcut icon" href="asset/images/gt_favicon.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="asset/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="asset/css/main.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <form action="traitement.php" method="post">
    </form>
    <div class="navbar navbar-inverse navbar-fixed-top headroom">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="sidebar-left.html">Left Sidebar</a></li>
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
            <li><a href="index (1).html">Home</a></li>
            <li class="active">Registration</li>
        </ol>

        <div class="row">
			<!-- Article main content -->
            <?php
            function transfert(){
        $ret = false;
        $img_blob = '';
        $img_taille = 0;
        $img_type = '';
        $img_nom = '';
        $Titre = $_POST["Titre"];
        $taille_max = 250000;
        $ret = is_uploaded_file($_FILES['fic']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];

            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['fic']['type'];
            $img_nom = $_FILES['fic']['name'];
        }

        $databasePath = 'C:\xampp\htdocs\web\Sae-23\Sae-23-web\asset\bd_tech.db';
        // Crée une connexion à la base de données
        $db = new SQLite3($databasePath);
        $img_blob = file_get_contents($_FILES['fic']['tmp_name']);

        $req = "INSERT INTO images (img_nom, img_taille, img_type, img_blob, Titre) VALUES (" .
            "'" . $img_nom . "', " .
            "'" . $img_taille . "', " .
            "'" . $img_type . "', " .
            "'" . SQLite3::escapeString($img_blob) . "', " .
            "'" . $Titre . "')";

        $ret = $db->exec($req);

        if ($ret === false) {
            echo "Erreur lors de l'exécution de la requête d'insertion : " . $db->lastErrorMsg();
            return false;
        }

        return true;
    }

    if (isset($_FILES['fic'])) {
        transfert();
    }
    ?>
    <h3>Envoi d'une image</h3>
    <form enctype="multipart/form-data" action="#" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
        <input type="file" name="fic" size="50" />
        <input type="text" name="Titre" placeholder="Titre de l'image" /> <!-- Champ de saisie pour le titre -->
        <input type="submit" value="Envoyer" />
    </form>
    <p><a href="liste.php">Liste</a></p>
</div>
</div>
   </body>
</html>