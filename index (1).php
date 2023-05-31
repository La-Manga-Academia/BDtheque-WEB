<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>web sae23</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="asset/css/bootstrap-theme.css" media="screen" >
    <link rel="stylesheet" href="asset/css/main.css">
</head>

<body class="home">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom custom-navbar">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="index (1).php"></a>
            </div>
            <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav pull-right">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="modificateur.php">Ajout de BD</a></li>
                <li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
            </ul>
        </li>
        <?php
        // Inclure le fichier contenant les fonctions
        include 'functions.php';

        if (is_user_logged_in()) {
            // Obtenez le nom de l'utilisateur connecté depuis votre système d'authentification
            $username = get_logged_in_username();
            echo '<li class="navbar-text" style="color: #FFFFFF;">Bonjour, ' . $username . '!</li>';
            echo '<li><a class="btn" href="logout.php">Déconnexion</a></li>';
        } else {
            echo '<li><a class="btn" href="signin.php">SIGN IN / SIGN UP</a></li>';
        }
        ?>
    </ul>
</div><!--/.nav-collapse -->
        </div>
    </div> 
    <!-- /.navbar -->
    
    <!-- Highlights - jumbotron -->
    <div class="jumbotron top-space">
        <div class="container">
            
            <h3 class="text-center thin">Reasons to use this template</h3>
            
            </div> <!-- /row  -->
        
        </div>
    </div>
    <!-- /Highlights -->

    <!-- container -->
    <div class="container">

</div>  <!-- /container -->
    
    <!-- Social links. @TODO: replace by link/instructions in template -->
    <section id="social">
        <div class="container">
            <div class="wrapper clearfix">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_tweet"></a>
                <a class="addthis_button_linkedin_counter"></a>
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                </div>
                <!-- AddThis Button END -->
            </div>
        </div>
    </section>
    <!-- /social links -->


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
                            <p class="follow-me-icons">
                                <a href=""><i class="fa fa-twitter fa-2"></i></a>
                                <a href=""><i class="fa fa-dribbble fa-2"></i></a>
                                <a href=""><i class="fa fa-github fa-2"></i></a>
                                <a href=""><i class="fa fa-facebook fa-2"></i></a>
                            </p>    
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
                                <a href="modificateur.php">Ajout de BD</a> |
                                <b><a href="signup.php">Sign up</a></b>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
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
