<?php
session_start();
include "head.php";
include "navbar.php";
printf("<h1>Odhlášení uživatele</h1>");
// Nastavení proměnných pro připojení k databázi
$hostName = "localhost";
$databaseName = "matej_paclik";
$userName = "root";
$password = "";

// Připojení k MySQL/MariaDB serveru
$idSpojeni = mysqli_connect($hostName, $userName, $password);

// Připojení k DB
$idDB = mysqli_select_db($idSpojeni, $databaseName);

if (isset($_SESSION['loggedUser'])) {
    $login = $_SESSION['loggedUser'];
    unset($_SESSION['loggedUser']);
    printf("<p>Uživatel <b>$login</b> byl úspěšně odhlášen.</p>");
    printf("<p>Pokračovat na <a href='index.php'>úvodní stránku</a></p>");
} else
    printf("<p>Nikdo není přihlášen, nelze tedy nikoho odhlásit!</p>");

mysqli_close($idSpojeni);

