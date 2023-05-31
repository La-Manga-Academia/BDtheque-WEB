<?php
session_start(); //page test.php
?>
        <?php
        // Vérifie si l'utilisateur est connecté
        function is_user_logged_in() {
            // Vérifie si la clé "user_id" est présente dans la session
            return isset($_SESSION["user_id"]);
        }

        // Obtient le nom de l'utilisateur connecté
        function get_logged_in_username() {
            // Récupère le nom d'utilisateur depuis la session
            return isset($_SESSION["user_prenom"]) ? $_SESSION["user_prenom"] : "";
        }
        ?>
