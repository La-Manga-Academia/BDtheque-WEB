<?php
// Démarre la session
session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Si vous souhaitez détruire complètement la session, supprimez également le cookie de session
// Notez que cela détruira la session et pas seulement les données de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Détruit la session
session_destroy();

// Redirige vers la page de connexion ou toute autre page souhaitée
header("Location: signin.php");
exit;
?>
