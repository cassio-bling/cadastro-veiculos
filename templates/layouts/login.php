<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["nomeUsuario"])) {
    header("Location: " . WEBROOT);    
} else if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    session_unset();
    session_destroy();
    echo "<script type='text/javascript'>alert('Sessão expirou!'); window.location=" . WEBROOT . ";</script>";
} else {
    $_SESSION['LAST_ACTIVITY'] = time();
}
